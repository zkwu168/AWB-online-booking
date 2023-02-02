<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyShipmentRequest;
use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\LocalServiceProvider;
use App\Models\Shipment;
use App\Models\ShipmentPickupType;
use App\Models\ShipmentStatus;
use App\Models\ShipmentTracking;
use App\Models\Payment;
use App\Models\Team;
use App\Models\Cargo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\AdyenClient;
use App\Traits\IbsSoapClient;
use App\Traits\YodelFcrClient;
use App\Traits\iuopAPI;
use Illuminate\Support\Facades\Auth;

class ShipmentsController extends Controller
{
    use CsvImportTrait;
    use IbsSoapClient;
    use YodelFcrClient;
    use iuopAPI;

    public function index()
    {
        abort_if(Gate::denies('shipment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //$results = get_address()->find("UB108UF");

        ////dd($results);
        $shipments = Shipment::with(['tracking', 'team', 'status', 'pickup_type', 'local_service_provider'])->get();

        $shipment_trackings = ShipmentTracking::get();

        $teams = Team::get();

        $shipment_statuses = ShipmentStatus::get();

        $shipment_pickup_types = ShipmentPickupType::get();

        $local_service_providers = LocalServiceProvider::get();

        return view('frontend.shipments.index', compact('shipments', 'shipment_trackings', 'teams', 'shipment_statuses', 'shipment_pickup_types', 'local_service_providers'));
    }

    public function create()
    {
        abort_if(Gate::denies('shipment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trackings = ShipmentTracking::pluck('sf_awb_url', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ShipmentStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pickup_types = ShipmentPickupType::where('is_active',1)->pluck('service_name', 'id');

        $local_service_providers = LocalServiceProvider::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        if(app()->getLocale() == 'en')
        {
            $viewBlade = 'frontend.shipments.create';
        }else
        {
            $viewBlade = 'frontend.shipments.create';
        }
        return view($viewBlade, compact('trackings', 'statuses', 'pickup_types', 'local_service_providers'));
    }

    public function store(StoreShipmentRequest $request)
    {
       #Store Unique Order/Product Number
       $unique_no = Shipment::orderBy('id', 'DESC')->pluck('id')->first();
        

          $unique_no = mt_rand(); // or below :
          //$unique_no = time().'-'.mt_rand();

        $request->request->add(['reference_no_1' => "WEU1".sprintf("%07d", auth()->id()).$unique_no.$request->input('j_country')]); 
        $request->request->add(['is_gen_bill_no' => '1']); 
        $request->request->add(['express_type' => '223']); 
        $request->request->add(['custid' => '']);  // OSMS AC number
        $request->request->add(['pay_method' => '1']);   //shipper pay for freight 
        $request->request->add(['tax_pay_type' => '2']);  //Receiver pay for import tax
        $request->request->add(['status_id' => '1']);
        $request->request->add(['import_customer_type' => '2']);
        $request->request->add(['outstanding_fee' => $request->input('estimated_freight')]);

        $shipment = Shipment::create($request->all());

        $names = $request->input('names', []);
        $counts = $request->input('counts', []);
        $amounts = $request->input('amounts', []);
        $units = $request->input('units', []);
        $total_values = $request->input('total_values', []);
        $source_areas = $request->input('source_areas', []);
        $hs_codes = $request->input('hs_codes', []);
        $currency = $request->input('currency');
        
        $cargoContents='';
        for ($i=0; $i < count($names); $i++) {
            if ($names[$i] != '') {
                $cargo = new Cargo;
                $cargo->name=$names[$i];
                $cargo->count=$counts[$i];
                $cargo->unit=$units[$i];
                $cargo->amount=$amounts[$i];
                $cargo->total_value=$total_values[$i];
                $cargo->source_area=$source_areas[$i];
                $cargo->hs_code=$hs_codes[$i];
                $cargo->currency=$currency;
            
                $shipment->shipmentCargos()->save($cargo);

           
            }
        }


        //$this->ibsSoapClient($xml);

        if ($request->input('submit') == 'save')
        {
            return redirect()->route('frontend.shipments.index');
        }else
        {
            return redirect()->route('frontend.shipments.show', [$shipment->id]);
        }
    }

    public function edit(Shipment $shipment)
    {
        abort_if(Gate::denies('shipment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trackings = ShipmentTracking::pluck('sf_awb_url', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ShipmentStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pickup_types = ShipmentPickupType::pluck('service_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $local_service_providers = LocalServiceProvider::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shipment->load('tracking', 'team', 'status', 'pickup_type', 'local_service_provider');

        return view('frontend.shipments.edit', compact('trackings', 'statuses', 'pickup_types', 'local_service_providers', 'shipment'));
    }

    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {

        $shipment->update($request->all());
        $shipment->customer_update_status = 1;
        $shipment->save();
        Cargo::where('shipment_id', $shipment->id)->delete();
        $names = $request->input('names', []);
        $counts = $request->input('counts', []);
        $amounts = $request->input('amounts', []);
        $units = $request->input('units', []);
        $total_values = $request->input('total_values', []);
        $source_areas = $request->input('source_areas', []);
        $hs_codes = $request->input('hs_codes', []);
        $currency = $request->input('currency');

        for ($i=0; $i < count($names); $i++) {
            if ($names[$i] != '') {
                $cargo = new Cargo;
                $cargo->name=$names[$i];
                $cargo->count=$counts[$i];
                $cargo->unit=$units[$i];
                $cargo->amount=$amounts[$i];
                $cargo->total_value=$total_values[$i];
                $cargo->source_area=$source_areas[$i];
                $cargo->hs_code=$hs_codes[$i];
                $cargo->currency=$currency;
            
                $shipment->shipmentCargos()->save($cargo);

           
            }
        }

        return redirect()->route('frontend.shipments.index');
    }

    public function show(Shipment $shipment,Request $request)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //dd($shipment);
        $shipment->load('tracking', 'team', 'status', 'pickup_type', 'local_service_provider', 'shipmentCargos','payment');
        if($request->ajax()){
            return view('frontend.shipments.show_ajax', compact('shipment'));
        }
        return view('frontend.shipments.show', compact('shipment'));
    }

    public function destroy(Shipment $shipment)
    {
        abort_if(Gate::denies('shipment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipment->delete();

        return back();
    }

    public function massDestroy(MassDestroyShipmentRequest $request)
    {
        Shipment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

       
    public function ajax_get_shipment(Shipment $shipment,Request $request)
    {

        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipment->load('tracking', 'team', 'status', 'pickup_type', 'local_service_provider', 'shipmentCargos');
      
    }

    public function getAWB1(Shipment $shipment, Request $request)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $xmlObj = $this->createIuopOrder($shipment);

        //$status=$xmlObj->Body->OrderResponse->mailNo;

        return $xmlObj;
    }

    public function generateFCR(Shipment $shipment, Request $request)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $response = $this->genEcrByObject($shipment);

    }
    

    public function paymentProcessed(Shipment $shipment, Request $request)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //dd($request->pspReference);
        $paymentStore=array(
            "shipment_id" => $shipment->id,
            "user_id" => Auth::id(),
            "amount" => $shipment->outstanding_fee,
            "currency" =>  'GBP',
            "payment_date" => now(),
            "payment_method" => "Credit Card",
            "transaction" => $request->pspReference
        );
        //dd($paymentStore);
        $payment = Payment::create($paymentStore); //Create a transaction record
        //dd($payment);
        $sum = Payment::where('shipment_id', '=', $shipment->id)->sum('amount'); //calculate shipment's total receivable
        //$shipment = Shipment::find($request->shipment_id); 
        $shipment->load('shipmentCargos');
        $shipment->paid_freight = $sum;    
        $shipment->outstanding_fee = ($shipment->actual_freight == null ? $shipment->estimated_freight : $shipment->actual_freight) - $sum;
        $shipment->status_id = 2;
        $shipment->save(); 
    }

    public function createIuopOrder(Shipment $shipment, Request $request)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $AwbResult = $this->orderService($shipment,1);
        return $AwbResult;
    }

    public function updateIuopOrder(Shipment $shipment, Request $request)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $xmlObj = $this->orderService($shipment,5);
        return $xmlObj;
    }

    public function orderResultQuery()
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $xmlObj = $this->orderResult();
        return $xmlObj;
    }

}
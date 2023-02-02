<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWarehouseRequest;
use App\Http\Requests\StoreWarehouseRequest;
use App\Http\Requests\UpdateWarehouseRequest;
use App\Models\Warehouse;
use App\Models\ShipmentProcess;
use App\Models\LocalServiceProvider;
use App\Models\ShipmentPickupType;
use App\Models\ShipmentStatus;
use App\Models\ShipmentTracking;
use App\Models\Payment;
use App\Models\Team;
use App\Models\Cargo;
use App\Models\Shipment;
use App\Models\ShipmentStatusPlus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Intervention\Image\Facades\Image;
use Mail;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use File;
use App\Traits\iuopAPI;

class WarehouseController extends Controller
{

    use iuopAPI;


    public function index()
    {
        abort_if(Gate::denies('shipment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipment = ShipmentProcess::all();

        return view('warehouse.index', compact('shipment'));
    }

    public function incoming()
    {
        abort_if(Gate::denies('shipment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipments = ShipmentProcess::where('wh_status',0)->where('reference_no_2','<>','')->get();

        return view('warehouse.incoming', compact('shipments'));
    }

    public function inventory()
    {
        abort_if(Gate::denies('shipment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipments = ShipmentProcess::where('wh_status','1')->get();
        return view('warehouse.inventory', compact('shipments'));
    }
    

    public function create()
    {
        abort_if(Gate::denies('warehouse_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('warehouse.warehouses.create');
    }

    public function store(StoreWarehouseRequest $request)
    {
        $warehouse = Warehouse::create($request->all());

        return redirect()->route('warehouse.warehouses.index');
    }

    public function edit(Warehouse $warehouse)
    {
        abort_if(Gate::denies('warehouse_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('warehouse.warehouses.edit', compact('warehouse'));
    }

    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse)
    {
        $warehouse->update($request->all());

        return redirect()->route('warehouse.warehouses.index');
    }

    public function show(Warehouse $warehouse)
    {
        abort_if(Gate::denies('warehouse_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('warehouse.warehouses.show', compact('warehouse'));
    }

    public function destroy(Warehouse $warehouse)
    {
        abort_if(Gate::denies('warehouse_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $warehouse->delete();

        return back();
    }

    public function massDestroy(MassDestroyWarehouseRequest $request)
    {
        Warehouse::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


    public function getShipmentById(ShipmentProcess $shipment, Request $request)
    {

        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipment->load('tracking', 'team', 'status', 'pickup_type', 'local_service_provider', 'shipmentCargos');
        if($request->ajax()){
            return view('warehouse.show_ajax', compact('shipment'));
        }
        return view('warehouse.show', compact('shipment'));
    }

    
    public function inboundScan(Request $request)
    {

        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trackingNo = $request->trackingNo;
       
        if(!empty($trackingNo))
        { 
            $shipment = ShipmentProcess::where('reference_no_2',$trackingNo)->first(); 
            if(!isset($shipment))
            {
                return view('warehouse.inbound-scan', compact('trackingNo'));
            }else{
                ShipmentProcess::findOrFail($shipment->id)
                ->status_plus()
                ->updateOrCreate([]);
                $shipment = ShipmentProcess::findOrFail($shipment->id);
                return view('warehouse.inbound-scan', compact('shipment','trackingNo'));
            }
        }
        else
        {
            return view('warehouse.inbound-scan');
        }

 
 
    }

    public function weighing(Request $request)
    {

        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trackingNo = $request->trackingNo;

        if(!empty($trackingNo))
        {
           $shipment = ShipmentProcess::where('reference_no_2', $trackingNo)->first(); 

            if (isset($shipment->id)){
                $token = MD5(strval($shipment->id).env('APP_MD5_KEY'));
                $shipment->load('tracking', 'team', 'status', 'pickup_type', 'local_service_provider', 'shipmentCargos','payment');
                return view('warehouse.weighing', compact('shipment','trackingNo','token'));
            }
           
            return view('warehouse.weighing', compact('shipment','trackingNo'));
        }else
        {
            return view('warehouse.weighing');
        }

 
    }

    public function despatch()
    {

        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('warehouse.despatch',);

    }

    public function checkIn(Request $request)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipment = ShipmentProcess::find($request->shipment_id); 
        ShipmentProcess::findOrFail($request->shipment_id)
        ->status_plus()
        ->updateOrCreate([],['inbound_condition' => $request->condition, 'wh_location' => $request->whLocation, 'wh_remark' => $request->remark]);
        $shipment->wh_status = 1;
        $shipment->status_id = 5;
        $shipment->save(); 


        return redirect('/warehouse/inbound-scan')->with('status', $shipment->reference_no_2.':  Parcel information updated sucessfully.');

    }

    public function sendEmailReminder(Request $request)
    {
        $user = User::findOrFail(1);
        Mail::send('warehouse.emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('no-reply@sf-eu.com', 'SF EU team(顺丰国际西欧团队)');

            $m->to(Auth::user()->email)->subject('Your Reminder!');
        });
    }

    public function updateIuopOrder($shipment)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $xmlObj = $this->orderService($shipment,5);
        return $xmlObj;
    }


    public function chargeableUpdate(Request $request)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $verifyStr = MD5(strval($request->shipmentId).env('APP_MD5_KEY')) === $request->token;
        if($verifyStr)
        {   
            $priceList = array( 
                "0.5" => 17.50, 
                "1.0" => 20.50, 
                "1.5" => 23.50,
                "2.0" => 26.50,
                "2.5" => 29.50,
                "3.0" => 32.50,
                "3.5" => 35.50,
                "4.0" => 38.50,
                "4.5" => 41.50,
                "5.0" => 44.50,
                "5.5" => 47.00,
                "6.0" => 49.50, 
                "6.5" => 52.00,
                "7.0" => 54.50,
                "7.5" => 57.00,
                "8.0" => 59.50,
                "8.5" => 62.00,
                "9.0" => 64.50,
                "9.5" => 67.00,
                "10.0" => 69.50,
                "10.5" => 72.00,
                "11.0" => 74.50, 
                "11.5" => 77.00, 
                "12.0" => 79.50,
                "12.5" => 82.00,
                "13.0" => 84.50,
                "13.5" => 87.00,
                "14.0" => 89.50,
                "14.5" => 92.00,
                "15.0" => 94.50,
                "15.5" => 96.50,
                "16.0" => 98.50, 
                "16.5" => 100.00,
                "17.0" => 102.00,
                "17.5" => 104.50,
                "18.0" => 106.50,
                "18.5" => 108.50,
                "19.0" => 110.50,
                "19.5" => 112.50,
                "20.0" => 114.00,
            );

            $request->shipmentId;
            $request->actualWeight;
            $request->parcelLength;
            $request->parcelWidth;
            $request->parcelHeight;
            $request->token;
            
            $actualWeight= round($request->actualWeight,2);
            $vol_weight= round($request->parcelLength*$request->parcelWidth*$request->parcelHeight/5000,2);
            $vol_weight= ($vol_weight>20) ? 20:$vol_weight;
            $chargeableWeight = $actualWeight>$vol_weight?$actualWeight:$vol_weight;
            


            if ($chargeableWeight == 0 || $chargeableWeight > 20){
                return "Weight cannot be 0 or greater than 20kg";
            }else{
                $int = intval($chargeableWeight); 
                $decimal = $chargeableWeight - $int; 

                switch (true) {                      
                    case ($decimal>0 && $decimal<0.5) :
                        $decimal = 0.5;
                        break;
                    case ($decimal>0.5 && $decimal<1) :
                        $decimal = 1;
                        break;
                }
                $chargeableWeight = number_format($int+$decimal,1);
            }
           
            $actualFreight=$priceList[$chargeableWeight]; //获取实际应收价格
            
            $shipment = ShipmentProcess::find($request->shipmentId);
            $shipment->actual_freight=$actualFreight;
            $pending_fee = $actualFreight-$shipment->paid_freight;
            $shipment->outstanding_fee = $pending_fee> 0 ? $pending_fee : 0; //需补交货款， 若为附属则为0
            $shipment->realweightqty = round($request->actualWeight,4);
            $shipment->status_plus->actual_length = $request->parcelLength;
            $shipment->status_plus->actual_width = $request->parcelWidth;
            $shipment->status_plus->actual_height = $request->parcelHeight;
            $shipment->volumeweightqty = $vol_weight;
            $shipment->save();
            $shipment->status_plus->save();

            $shipment->status_id=4;
            $shipment->save();

            //$result = $this->updateIuopOrder($shipment);
            return dd($result);
        }
        else
        {
            return "We are watching you, don't be an idiot.";
        }
    }


    public function snapshot(Request $request)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if(isset($request->contentInspec))
        {
            ShipmentProcess::findOrFail($request->shipmentId)
            ->status_plus()
            ->updateOrCreate([],['content_check' => $request->contentInspec]);


            return $sendmail;
        }


        if(isset($request->issueCode))
        {
            ShipmentProcess::findOrFail($request->shipmentId)
            ->status_plus()
            ->updateOrCreate([],['wh_location' => 2,'issue_code' => $request->issueCode,'issue_remark' => $request->issueRemark]);

            $sendmail=$this->sendEmailReminder($request);
            return true;
        }

        $folderToSave=$request->shipmentId;
        $dir = public_path("content-img/".$folderToSave);


    // check if $folder is a directory
    if( !File::isDirectory($dir) ) {

        // Params:
        // $dir = name of new directory
        //
        // 493 = $mode of mkdir() function that is used file File::makeDirectory (493 is used by default in \File::makeDirectory
        //
        // true -> this says, that folders are created recursively here! Example:
        // you want to create a directory in company_img/username and the folder company_img does not
        // exist. This function will fail without setting the 3rd param to true
        // http://php.net/mkdir  is used by this function

        File::makeDirectory($dir, 493, true);
    }

        $uploadImage = ShipmentProcess::findOrFail($request->shipmentId)
        ->status_plus;

            $path = $dir;
            $filename = 'img'.time() . '.jpg';
            $image = Image::make($request->get('imgBase64'));
            $image->save($path.'/'.$filename);
            $uploadImage->content_img= ltrim($uploadImage->content_img.",".$filename,',');
            $uploadImage->save();
            $imgUrl = '<img src="'.url("/content-img/{$folderToSave}/{$filename}").'" alt="no pic" width="160" height="120">';

            return $imgUrl;

    }

    public function getSFawb(Request $request)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       $shipment = ShipmentProcess::find($request->shipmentId); 

       $xmlObj = $this->orderService($shipment,5);
       return  dd($xmlObj);


    }
}
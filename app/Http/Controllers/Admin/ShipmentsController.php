<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ShipmentsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('shipment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Shipment::with(['tracking', 'team', 'status', 'pickup_type', 'local_service_provider'])->select(sprintf('%s.*', (new Shipment())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'shipment_show';
                $editGate = 'shipment_edit';
                $deleteGate = 'shipment_delete';
                $crudRoutePart = 'shipments';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('mailno', function ($row) {
                return $row->mailno ? $row->mailno : '';
            });
            $table->editColumn('j_country', function ($row) {
                return $row->j_country ? $row->j_country : '';
            });
            $table->editColumn('d_contact', function ($row) {
                return $row->d_contact ? $row->d_contact : '';
            });
            $table->editColumn('d_country', function ($row) {
                return $row->d_country ? $row->d_country : '';
            });
            $table->editColumn('d_city', function ($row) {
                return $row->d_city ? $row->d_city : '';
            });
            $table->editColumn('cargo_total_weight', function ($row) {
                return $row->cargo_total_weight ? $row->cargo_total_weight : '';
            });
            $table->editColumn('realweightqty', function ($row) {
                return $row->realweightqty ? $row->realweightqty : '';
            });
            $table->editColumn('currency', function ($row) {
                return $row->currency ? $row->currency : '';
            });
            $table->editColumn('is_under_call', function ($row) {
                return $row->is_under_call ? $row->is_under_call : '';
            });
            $table->editColumn('estimated_freight', function ($row) {
                return $row->estimated_freight ? $row->estimated_freight : '';
            });
            $table->editColumn('actual_freight', function ($row) {
                return $row->actual_freight ? $row->actual_freight : '';
            });
            $table->editColumn('paid_freight', function ($row) {
                return $row->paid_freight ? $row->paid_freight : '';
            });
            $table->editColumn('outstanding_fee', function ($row) {
                return $row->outstanding_fee ? $row->outstanding_fee : '';
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });

            $table->addColumn('pickup_type_service_name', function ($row) {
                return $row->pickup_type ? $row->pickup_type->service_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'pickup_type']);

            return $table->make(true);
        }

        $shipment_trackings      = ShipmentTracking::get();
        $teams                   = Team::get();
        $shipment_statuses       = ShipmentStatus::get();
        $shipment_pickup_types   = ShipmentPickupType::get();
        $local_service_providers = LocalServiceProvider::get();

        return view('admin.shipments.index', compact('shipment_trackings', 'teams', 'shipment_statuses', 'shipment_pickup_types', 'local_service_providers'));
    }

    public function create()
    {
        abort_if(Gate::denies('shipment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trackings = ShipmentTracking::pluck('sf_awb_url', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ShipmentStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pickup_types = ShipmentPickupType::pluck('service_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $local_service_providers = LocalServiceProvider::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.shipments.create', compact('trackings', 'statuses', 'pickup_types', 'local_service_providers'));
    }

    public function store(StoreShipmentRequest $request)
    {
        $shipment = Shipment::create($request->all());

        return redirect()->route('admin.shipments.index');
    }

    public function edit(Shipment $shipment)
    {
        abort_if(Gate::denies('shipment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trackings = ShipmentTracking::pluck('sf_awb_url', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ShipmentStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pickup_types = ShipmentPickupType::pluck('service_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $local_service_providers = LocalServiceProvider::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shipment->load('tracking', 'team', 'status', 'pickup_type', 'local_service_provider');

        return view('admin.shipments.edit', compact('trackings', 'statuses', 'pickup_types', 'local_service_providers', 'shipment'));
    }

    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        $shipment->update($request->all());

        return redirect()->route('admin.shipments.index');
    }

    public function show(Shipment $shipment)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipment->load('tracking', 'team', 'status', 'pickup_type', 'local_service_provider', 'shipmentCargos');

        return view('admin.shipments.show', compact('shipment'));
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
}

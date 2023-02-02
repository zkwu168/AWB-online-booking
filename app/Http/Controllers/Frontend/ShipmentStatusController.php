<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShipmentStatusRequest;
use App\Http\Requests\StoreShipmentStatusRequest;
use App\Http\Requests\UpdateShipmentStatusRequest;
use App\Models\ShipmentStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShipmentStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shipment_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipmentStatuses = ShipmentStatus::all();

        return view('frontend.shipmentStatuses.index', compact('shipmentStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('shipment_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.shipmentStatuses.create');
    }

    public function store(StoreShipmentStatusRequest $request)
    {
        $shipmentStatus = ShipmentStatus::create($request->all());

        return redirect()->route('frontend.shipment-statuses.index');
    }

    public function edit(ShipmentStatus $shipmentStatus)
    {
        abort_if(Gate::denies('shipment_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.shipmentStatuses.edit', compact('shipmentStatus'));
    }

    public function update(UpdateShipmentStatusRequest $request, ShipmentStatus $shipmentStatus)
    {
        $shipmentStatus->update($request->all());

        return redirect()->route('frontend.shipment-statuses.index');
    }

    public function show(ShipmentStatus $shipmentStatus)
    {
        abort_if(Gate::denies('shipment_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipmentStatus->load('statusShipments');

        return view('frontend.shipmentStatuses.show', compact('shipmentStatus'));
    }

    public function destroy(ShipmentStatus $shipmentStatus)
    {
        abort_if(Gate::denies('shipment_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipmentStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyShipmentStatusRequest $request)
    {
        ShipmentStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

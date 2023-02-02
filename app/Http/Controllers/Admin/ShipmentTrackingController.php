<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShipmentTrackingRequest;
use App\Http\Requests\StoreShipmentTrackingRequest;
use App\Http\Requests\UpdateShipmentTrackingRequest;
use App\Models\ShipmentTracking;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShipmentTrackingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shipment_tracking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipmentTrackings = ShipmentTracking::all();

        return view('admin.shipmentTrackings.index', compact('shipmentTrackings'));
    }

    public function create()
    {
        abort_if(Gate::denies('shipment_tracking_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shipmentTrackings.create');
    }

    public function store(StoreShipmentTrackingRequest $request)
    {
        $shipmentTracking = ShipmentTracking::create($request->all());

        return redirect()->route('admin.shipment-trackings.index');
    }

    public function edit(ShipmentTracking $shipmentTracking)
    {
        abort_if(Gate::denies('shipment_tracking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shipmentTrackings.edit', compact('shipmentTracking'));
    }

    public function update(UpdateShipmentTrackingRequest $request, ShipmentTracking $shipmentTracking)
    {
        $shipmentTracking->update($request->all());

        return redirect()->route('admin.shipment-trackings.index');
    }

    public function show(ShipmentTracking $shipmentTracking)
    {
        abort_if(Gate::denies('shipment_tracking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shipmentTrackings.show', compact('shipmentTracking'));
    }

    public function destroy(ShipmentTracking $shipmentTracking)
    {
        abort_if(Gate::denies('shipment_tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipmentTracking->delete();

        return back();
    }

    public function massDestroy(MassDestroyShipmentTrackingRequest $request)
    {
        ShipmentTracking::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

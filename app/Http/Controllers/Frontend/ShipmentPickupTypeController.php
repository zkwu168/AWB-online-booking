<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShipmentPickupTypeRequest;
use App\Http\Requests\StoreShipmentPickupTypeRequest;
use App\Http\Requests\UpdateShipmentPickupTypeRequest;
use App\Models\ShipmentPickupType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShipmentPickupTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shipment_pickup_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipmentPickupTypes = ShipmentPickupType::all();

        return view('frontend.shipmentPickupTypes.index', compact('shipmentPickupTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('shipment_pickup_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.shipmentPickupTypes.create');
    }

    public function store(StoreShipmentPickupTypeRequest $request)
    {
        $shipmentPickupType = ShipmentPickupType::create($request->all());

        return redirect()->route('frontend.shipment-pickup-types.index');
    }

    public function edit(ShipmentPickupType $shipmentPickupType)
    {
        abort_if(Gate::denies('shipment_pickup_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.shipmentPickupTypes.edit', compact('shipmentPickupType'));
    }

    public function update(UpdateShipmentPickupTypeRequest $request, ShipmentPickupType $shipmentPickupType)
    {
        $shipmentPickupType->update($request->all());

        return redirect()->route('frontend.shipment-pickup-types.index');
    }

    public function show(ShipmentPickupType $shipmentPickupType)
    {
        abort_if(Gate::denies('shipment_pickup_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipmentPickupType->load('pickupTypeShipments');

        return view('frontend.shipmentPickupTypes.show', compact('shipmentPickupType'));
    }

    public function destroy(ShipmentPickupType $shipmentPickupType)
    {
        abort_if(Gate::denies('shipment_pickup_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipmentPickupType->delete();

        return back();
    }

    public function massDestroy(MassDestroyShipmentPickupTypeRequest $request)
    {
        ShipmentPickupType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

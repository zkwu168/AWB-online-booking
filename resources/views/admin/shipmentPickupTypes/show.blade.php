@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shipmentPickupType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shipment-pickup-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shipmentPickupType.fields.id') }}
                        </th>
                        <td>
                            {{ $shipmentPickupType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipmentPickupType.fields.service_name') }}
                        </th>
                        <td>
                            {{ $shipmentPickupType->service_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipmentPickupType.fields.is_active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $shipmentPickupType->is_active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shipment-pickup-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#pickup_type_shipments" role="tab" data-toggle="tab">
                {{ trans('cruds.shipment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="pickup_type_shipments">
            @includeIf('admin.shipmentPickupTypes.relationships.pickupTypeShipments', ['shipments' => $shipmentPickupType->pickupTypeShipments])
        </div>
    </div>
</div>

@endsection
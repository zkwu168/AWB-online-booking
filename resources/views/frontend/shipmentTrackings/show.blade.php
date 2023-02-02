@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.shipmentTracking.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.shipment-trackings.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipmentTracking.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $shipmentTracking->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipmentTracking.fields.sf_awb_url') }}
                                    </th>
                                    <td>
                                        {{ $shipmentTracking->sf_awb_url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipmentTracking.fields.international_route') }}
                                    </th>
                                    <td>
                                        {{ $shipmentTracking->international_route }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipmentTracking.fields.local_route') }}
                                    </th>
                                    <td>
                                        {{ $shipmentTracking->local_route }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipmentTracking.fields.api_request') }}
                                    </th>
                                    <td>
                                        {{ $shipmentTracking->api_request }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipmentTracking.fields.api_response') }}
                                    </th>
                                    <td>
                                        {{ $shipmentTracking->api_response }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.shipment-trackings.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
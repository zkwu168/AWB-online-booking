@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.shipmentStatus.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.shipment-statuses.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipmentStatus.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $shipmentStatus->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipmentStatus.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $shipmentStatus->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipmentStatus.fields.detail') }}
                                    </th>
                                    <td>
                                        {{ $shipmentStatus->detail }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipmentStatus.fields.color') }}
                                    </th>
                                    <td>
                                        {{ $shipmentStatus->color }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipmentStatus.fields.active') }}
                                    </th>
                                    <td>
                                        {{ $shipmentStatus->active }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.shipment-statuses.index') }}">
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
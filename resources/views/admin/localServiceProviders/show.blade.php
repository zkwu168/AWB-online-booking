@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.localServiceProvider.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.local-service-providers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.localServiceProvider.fields.id') }}
                        </th>
                        <td>
                            {{ $localServiceProvider->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.localServiceProvider.fields.name') }}
                        </th>
                        <td>
                            {{ $localServiceProvider->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.localServiceProvider.fields.pu_agent') }}
                        </th>
                        <td>
                            {{ $localServiceProvider->pu_agent }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.local-service-providers.index') }}">
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
            <a class="nav-link" href="#local_service_provider_shipments" role="tab" data-toggle="tab">
                {{ trans('cruds.shipment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="local_service_provider_shipments">
            @includeIf('admin.localServiceProviders.relationships.localServiceProviderShipments', ['shipments' => $localServiceProvider->localServiceProviderShipments])
        </div>
    </div>
</div>

@endsection
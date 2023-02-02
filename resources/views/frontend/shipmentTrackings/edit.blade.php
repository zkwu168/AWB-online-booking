@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.shipmentTracking.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.shipment-trackings.update", [$shipmentTracking->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="sf_awb_url">{{ trans('cruds.shipmentTracking.fields.sf_awb_url') }}</label>
                            <input class="form-control" type="text" name="sf_awb_url" id="sf_awb_url" value="{{ old('sf_awb_url', $shipmentTracking->sf_awb_url) }}">
                            @if($errors->has('sf_awb_url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sf_awb_url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipmentTracking.fields.sf_awb_url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="international_route">{{ trans('cruds.shipmentTracking.fields.international_route') }}</label>
                            <textarea class="form-control" name="international_route" id="international_route">{{ old('international_route', $shipmentTracking->international_route) }}</textarea>
                            @if($errors->has('international_route'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('international_route') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipmentTracking.fields.international_route_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="local_route">{{ trans('cruds.shipmentTracking.fields.local_route') }}</label>
                            <textarea class="form-control" name="local_route" id="local_route">{{ old('local_route', $shipmentTracking->local_route) }}</textarea>
                            @if($errors->has('local_route'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('local_route') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipmentTracking.fields.local_route_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="api_request">{{ trans('cruds.shipmentTracking.fields.api_request') }}</label>
                            <textarea class="form-control" name="api_request" id="api_request">{{ old('api_request', $shipmentTracking->api_request) }}</textarea>
                            @if($errors->has('api_request'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('api_request') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipmentTracking.fields.api_request_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="api_response">{{ trans('cruds.shipmentTracking.fields.api_response') }}</label>
                            <textarea class="form-control" name="api_response" id="api_response">{{ old('api_response', $shipmentTracking->api_response) }}</textarea>
                            @if($errors->has('api_response'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('api_response') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipmentTracking.fields.api_response_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
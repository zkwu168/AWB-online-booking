@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.shipmentTracking.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.shipment-trackings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="sf_awb_url">{{ trans('cruds.shipmentTracking.fields.sf_awb_url') }}</label>
                <input class="form-control {{ $errors->has('sf_awb_url') ? 'is-invalid' : '' }}" type="text" name="sf_awb_url" id="sf_awb_url" value="{{ old('sf_awb_url', '') }}">
                @if($errors->has('sf_awb_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sf_awb_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipmentTracking.fields.sf_awb_url_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.shipmentStatus.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.shipment-statuses.update", [$shipmentStatus->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.shipmentStatus.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $shipmentStatus->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipmentStatus.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="detail">{{ trans('cruds.shipmentStatus.fields.detail') }}</label>
                            <input class="form-control" type="text" name="detail" id="detail" value="{{ old('detail', $shipmentStatus->detail) }}">
                            @if($errors->has('detail'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('detail') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipmentStatus.fields.detail_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="color">{{ trans('cruds.shipmentStatus.fields.color') }}</label>
                            <input class="form-control" type="text" name="color" id="color" value="{{ old('color', $shipmentStatus->color) }}">
                            @if($errors->has('color'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('color') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipmentStatus.fields.color_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="active">{{ trans('cruds.shipmentStatus.fields.active') }}</label>
                            <input class="form-control" type="number" name="active" id="active" value="{{ old('active', $shipmentStatus->active) }}" step="1" required>
                            @if($errors->has('active'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('active') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipmentStatus.fields.active_helper') }}</span>
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
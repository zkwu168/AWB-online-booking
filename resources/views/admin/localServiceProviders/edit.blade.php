@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.localServiceProvider.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.local-service-providers.update", [$localServiceProvider->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.localServiceProvider.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $localServiceProvider->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.localServiceProvider.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pu_agent">{{ trans('cruds.localServiceProvider.fields.pu_agent') }}</label>
                <input class="form-control {{ $errors->has('pu_agent') ? 'is-invalid' : '' }}" type="text" name="pu_agent" id="pu_agent" value="{{ old('pu_agent', $localServiceProvider->pu_agent) }}">
                @if($errors->has('pu_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pu_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.localServiceProvider.fields.pu_agent_helper') }}</span>
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
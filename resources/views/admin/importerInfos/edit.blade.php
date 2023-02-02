@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.importerInfo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.importer-infos.update", [$importerInfo->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="vat">{{ trans('cruds.importerInfo.fields.vat') }}</label>
                <input class="form-control {{ $errors->has('vat') ? 'is-invalid' : '' }}" type="text" name="vat" id="vat" value="{{ old('vat', $importerInfo->vat) }}">
                @if($errors->has('vat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.importerInfo.fields.vat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="eori">{{ trans('cruds.importerInfo.fields.eori') }}</label>
                <input class="form-control {{ $errors->has('eori') ? 'is-invalid' : '' }}" type="text" name="eori" id="eori" value="{{ old('eori', $importerInfo->eori) }}">
                @if($errors->has('eori'))
                    <div class="invalid-feedback">
                        {{ $errors->first('eori') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.importerInfo.fields.eori_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="importer_company_name">{{ trans('cruds.importerInfo.fields.importer_company_name') }}</label>
                <input class="form-control {{ $errors->has('importer_company_name') ? 'is-invalid' : '' }}" type="text" name="importer_company_name" id="importer_company_name" value="{{ old('importer_company_name', $importerInfo->importer_company_name) }}">
                @if($errors->has('importer_company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('importer_company_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.importerInfo.fields.importer_company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="importer_tel_no">{{ trans('cruds.importerInfo.fields.importer_tel_no') }}</label>
                <input class="form-control {{ $errors->has('importer_tel_no') ? 'is-invalid' : '' }}" type="text" name="importer_tel_no" id="importer_tel_no" value="{{ old('importer_tel_no', $importerInfo->importer_tel_no) }}">
                @if($errors->has('importer_tel_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('importer_tel_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.importerInfo.fields.importer_tel_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="importer_address">{{ trans('cruds.importerInfo.fields.importer_address') }}</label>
                <input class="form-control {{ $errors->has('importer_address') ? 'is-invalid' : '' }}" type="text" name="importer_address" id="importer_address" value="{{ old('importer_address', $importerInfo->importer_address) }}">
                @if($errors->has('importer_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('importer_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.importerInfo.fields.importer_address_helper') }}</span>
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
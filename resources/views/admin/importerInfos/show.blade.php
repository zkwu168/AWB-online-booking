@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.importerInfo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.importer-infos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.importerInfo.fields.id') }}
                        </th>
                        <td>
                            {{ $importerInfo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importerInfo.fields.vat') }}
                        </th>
                        <td>
                            {{ $importerInfo->vat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importerInfo.fields.eori') }}
                        </th>
                        <td>
                            {{ $importerInfo->eori }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importerInfo.fields.importer_company_name') }}
                        </th>
                        <td>
                            {{ $importerInfo->importer_company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importerInfo.fields.importer_tel_no') }}
                        </th>
                        <td>
                            {{ $importerInfo->importer_tel_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importerInfo.fields.importer_address') }}
                        </th>
                        <td>
                            {{ $importerInfo->importer_address }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.importer-infos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
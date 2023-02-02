@extends('layouts.admin')
@section('content')
@can('importer_info_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.importer-infos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.importerInfo.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.importerInfo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ImporterInfo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.importerInfo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.importerInfo.fields.vat') }}
                        </th>
                        <th>
                            {{ trans('cruds.importerInfo.fields.eori') }}
                        </th>
                        <th>
                            {{ trans('cruds.importerInfo.fields.importer_company_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.importerInfo.fields.importer_tel_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.importerInfo.fields.importer_address') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($importerInfos as $key => $importerInfo)
                        <tr data-entry-id="{{ $importerInfo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $importerInfo->id ?? '' }}
                            </td>
                            <td>
                                {{ $importerInfo->vat ?? '' }}
                            </td>
                            <td>
                                {{ $importerInfo->eori ?? '' }}
                            </td>
                            <td>
                                {{ $importerInfo->importer_company_name ?? '' }}
                            </td>
                            <td>
                                {{ $importerInfo->importer_tel_no ?? '' }}
                            </td>
                            <td>
                                {{ $importerInfo->importer_address ?? '' }}
                            </td>
                            <td>
                                @can('importer_info_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.importer-infos.show', $importerInfo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('importer_info_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.importer-infos.edit', $importerInfo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('importer_info_delete')
                                    <form action="{{ route('admin.importer-infos.destroy', $importerInfo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('importer_info_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.importer-infos.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-ImporterInfo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
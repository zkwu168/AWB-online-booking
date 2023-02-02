@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('cargo_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.cargos.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.cargo.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.cargo.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Cargo">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cargo.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.count') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.unit') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.amount') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.weight') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.total_value') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.currency') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.source_area') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.product_record_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.brand') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.statebarcode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.specifications') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.goods_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.good_prepard_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.hs_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.hts_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.hts_desc') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.item_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.qty_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.unit_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cargo.fields.shipment') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cargos as $key => $cargo)
                                    <tr data-entry-id="{{ $cargo->id }}">
                                        <td>
                                            {{ $cargo->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->count ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->unit ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->weight ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->total_value ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->currency ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->source_area ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->product_record_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->brand ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->statebarcode ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->specifications ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->goods_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->good_prepard_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->hs_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->hts_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->hts_desc ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->item_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->qty_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->unit_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cargo->shipment->mailno ?? '' }}
                                        </td>
                                        <td>
                                            @can('cargo_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.cargos.show', $cargo->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('cargo_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.cargos.edit', $cargo->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('cargo_delete')
                                                <form action="{{ route('frontend.cargos.destroy', $cargo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('cargo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.cargos.massDestroy') }}",
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
  let table = $('.datatable-Cargo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
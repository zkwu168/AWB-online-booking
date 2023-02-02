@extends('layouts.frontend1')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('shipment_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.shipments.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.shipment.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Shipment', 'route' => 'admin.shipments.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.shipment.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Shipment">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.mailno') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.j_country') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_contact') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_country') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_city') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.cargo_total_weight') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.realweightqty') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.currency') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.is_under_call') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.estimated_freight') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.actual_freight') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.paid_freight') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.outstanding_fee') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shipment.fields.pickup_type') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($shipment_statuses as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($shipment_pickup_types as $key => $item)
                                                <option value="{{ $item->service_name }}">{{ $item->service_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shipments as $key => $shipment)
                                    <tr data-entry-id="{{ $shipment->id }}">
                                        <td>
                                            {{ $shipment->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->mailno ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->j_country ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->d_contact ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->d_country ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->d_city ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->cargo_total_weight ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->realweightqty ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->currency ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->is_under_call ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->estimated_freight ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->actual_freight ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->paid_freight ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->outstanding_fee ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->status->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shipment->pickup_type->service_name ?? '' }}
                                        </td>
                                        <td>
                                            @can('shipment_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.shipments.show', $shipment->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('shipment_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.shipments.edit', $shipment->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('shipment_delete')
                                                <form action="{{ route('frontend.shipments.destroy', $shipment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('shipment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.shipments.massDestroy') }}",
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
  let table = $('.datatable-Shipment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection
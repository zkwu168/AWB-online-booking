@extends('layouts.admin')
@section('content')
@can('shipment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.shipments.create') }}">
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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Shipment">
            <thead>
                <tr>
                    <th width="10">

                    </th>
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('shipment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.shipments.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.shipments.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'mailno', name: 'mailno' },
{ data: 'j_country', name: 'j_country' },
{ data: 'd_contact', name: 'd_contact' },
{ data: 'd_country', name: 'd_country' },
{ data: 'd_city', name: 'd_city' },
{ data: 'cargo_total_weight', name: 'cargo_total_weight' },
{ data: 'realweightqty', name: 'realweightqty' },
{ data: 'currency', name: 'currency' },
{ data: 'is_under_call', name: 'is_under_call' },
{ data: 'estimated_freight', name: 'estimated_freight' },
{ data: 'actual_freight', name: 'actual_freight' },
{ data: 'paid_freight', name: 'paid_freight' },
{ data: 'outstanding_fee', name: 'outstanding_fee' },
{ data: 'status_name', name: 'status.name' },
{ data: 'pickup_type_service_name', name: 'pickup_type.service_name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Shipment').DataTable(dtOverrideGlobals);
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
});

</script>
@endsection
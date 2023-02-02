@extends('layouts.admin')
@section('content')
@can('shipment_tracking_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.shipment-trackings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.shipmentTracking.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.shipmentTracking.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ShipmentTracking">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.shipmentTracking.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.shipmentTracking.fields.sf_awb_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.shipmentTracking.fields.international_route') }}
                        </th>
                        <th>
                            {{ trans('cruds.shipmentTracking.fields.local_route') }}
                        </th>
                        <th>
                            {{ trans('cruds.shipmentTracking.fields.api_request') }}
                        </th>
                        <th>
                            {{ trans('cruds.shipmentTracking.fields.api_response') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shipmentTrackings as $key => $shipmentTracking)
                        <tr data-entry-id="{{ $shipmentTracking->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $shipmentTracking->id ?? '' }}
                            </td>
                            <td>
                                {{ $shipmentTracking->sf_awb_url ?? '' }}
                            </td>
                            <td>
                                {{ $shipmentTracking->international_route ?? '' }}
                            </td>
                            <td>
                                {{ $shipmentTracking->local_route ?? '' }}
                            </td>
                            <td>
                                {{ $shipmentTracking->api_request ?? '' }}
                            </td>
                            <td>
                                {{ $shipmentTracking->api_response ?? '' }}
                            </td>
                            <td>
                                @can('shipment_tracking_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.shipment-trackings.show', $shipmentTracking->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('shipment_tracking_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.shipment-trackings.edit', $shipmentTracking->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('shipment_tracking_delete')
                                    <form action="{{ route('admin.shipment-trackings.destroy', $shipmentTracking->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('shipment_tracking_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.shipment-trackings.massDestroy') }}",
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
  let table = $('.datatable-ShipmentTracking:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
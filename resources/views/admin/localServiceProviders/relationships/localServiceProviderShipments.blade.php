@can('shipment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.shipments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.shipment.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.shipment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-localServiceProviderShipments">
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
                </thead>
                <tbody>
                    @foreach($shipments as $key => $shipment)
                        <tr data-entry-id="{{ $shipment->id }}">
                            <td>

                            </td>
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
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.shipments.show', $shipment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('shipment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.shipments.edit', $shipment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('shipment_delete')
                                    <form action="{{ route('admin.shipments.destroy', $shipment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('shipment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.shipments.massDestroy') }}",
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
  let table = $('.datatable-localServiceProviderShipments:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
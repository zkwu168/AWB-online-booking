@extends('layouts.admin')
@section('content')
@can('address_book_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.address-books.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.addressBook.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.addressBook.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-AddressBook">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.company') }}
                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.contact') }}
                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.country') }}
                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.province') }}
                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.city') }}
                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.county') }}
                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.post_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.mobile') }}
                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.is_shipper') }}
                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.is_receiver') }}
                    </th>
                    <th>
                        {{ trans('cruds.addressBook.fields.user') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
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
@can('address_book_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.address-books.massDestroy') }}",
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
    ajax: "{{ route('admin.address-books.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'company', name: 'company' },
{ data: 'contact', name: 'contact' },
{ data: 'country', name: 'country' },
{ data: 'province', name: 'province' },
{ data: 'city', name: 'city' },
{ data: 'county', name: 'county' },
{ data: 'address', name: 'address' },
{ data: 'post_code', name: 'post_code' },
{ data: 'mobile', name: 'mobile' },
{ data: 'email', name: 'email' },
{ data: 'is_shipper', name: 'is_shipper' },
{ data: 'is_receiver', name: 'is_receiver' },
{ data: 'user_name', name: 'user.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-AddressBook').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection
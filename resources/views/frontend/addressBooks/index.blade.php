@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('address_book_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.address-books.create') }}">
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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AddressBook">
                            <thead>
                                <tr>
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
                            <tbody>
                                @foreach($addressBooks as $key => $addressBook)
                                    <tr data-entry-id="{{ $addressBook->id }}">
                                        <td>
                                            {{ $addressBook->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addressBook->company ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addressBook->contact ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addressBook->country ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addressBook->province ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addressBook->city ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addressBook->county ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addressBook->address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addressBook->post_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addressBook->mobile ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addressBook->email ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $addressBook->is_shipper ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $addressBook->is_shipper ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $addressBook->is_receiver ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $addressBook->is_receiver ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $addressBook->user->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('address_book_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.address-books.show', $addressBook->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('address_book_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.address-books.edit', $addressBook->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('address_book_delete')
                                                <form action="{{ route('frontend.address-books.destroy', $addressBook->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('address_book_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.address-books.massDestroy') }}",
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
  let table = $('.datatable-AddressBook:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
@extends('layouts.warehouse')

@section('css')
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
@endsection


@section('scripts')
@parent
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>

<script>
$(function() {
    let copyButtonTrans = '{{ trans("global.datatables.copy") }}'
    let csvButtonTrans = '{{ trans("global.datatables.csv") }}'
    let excelButtonTrans = '{{ trans("global.datatables.excel") }}'
    let pdfButtonTrans = '{{ trans("global.datatables.pdf") }}'
    let printButtonTrans = '{{ trans("global.datatables.print") }}'
    let colvisButtonTrans = '{{ trans("global.datatables.colvis") }}'
    let selectAllButtonTrans = '{{ trans("global.select_all") }}'
    let selectNoneButtonTrans = '{{ trans("global.deselect_all") }}'

    let languages = {
        'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json',
        'fr': 'https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json',
        'zh-Hans': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Chinese.json',
        'it': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Italian.json',
        'pt': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese.json',
        'de': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/German.json',
        'es': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
    };

    $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
        className: 'btn'
    })
    $.extend(true, $.fn.dataTable.defaults, {
        language: {
            url: languages['{{ app()->getLocale() }}']
        },
        columnDefs: [{
            orderable: false,
            className: 'details-control',
            targets: 0
        }, {
            orderable: false,
            searchable: false,
            targets: -1
        }],

        order: [],
        pageLength: 25,
        dom: 'lBfrtip<"">',
        buttons: [

            {
                extend: 'copy',
                className: 'btn-default',
                text: copyButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csv',
                className: 'btn-default',
                text: csvButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                className: 'btn-default',
                text: excelButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            },

            {
                extend: 'print',
                className: 'btn-default',
                text: printButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            },

        ]
    });

    $.fn.dataTable.ext.classes.sPageButton = '';

    $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
    });

    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    @can("shipment_delete")
    let deleteButtonTrans = '{{ trans("global.datatables.delete") }}'
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('frontend.shipments.massDestroy') }}",
        className: 'btn-danger',
        action: function(e, dt, node, config) {
            var ids = $.map(dt.rows({
                selected: true
            }).nodes(), function(entry) {
                return $(entry).data('entry-id')
            });

            if (ids.length === 0) {
                alert('{{ trans("global.datatables.zero_selected") }}')

                return
            }

            if (confirm('{{ trans("global.areYouSure") }}')) {
                $.ajax({
                        headers: {
                            'x-csrf-token': _token
                        },
                        method: 'POST',
                        url: config.url,
                        data: {
                            ids: ids,
                            _method: 'DELETE'
                        }
                    })
                    .done(function() {
                        location.reload()
                    })
            }
        }
    }
    dtButtons.push(deleteButton)
    @endcan

    $.extend(true, $.fn.dataTable.defaults, {
        orderCellsTop: true,
        order: [
            [8, 'desc']
        ],
        pageLength: 25,
    });
    let table = $('.datatable-Shipment:not(.ajaxTable)').DataTable({
        buttons: dtButtons
    })
    $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

    $('.datatable-Shipment tbody').on('click', 'td.details-control--', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        var shipmentId = tr.data('entry-id');
        var loading = '<img class="rounded mx-auto d-block" data-src="../img/loading.svg" src="../img/loading.svg" style="width: 60px; height:60px;">'
            //fetch order detials with Ajex here:
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            $(this).addClass('tri');
            $(this).removeClass('tri_left');
        } else {
            // Open this row
            // Enumerate all rows
            table.rows().every(function() {
                // If row has details expanded
                if (this.child.isShown()) {
                    // Collapse row details
                    this.child.hide();
                    $(this.node()).removeClass('shown');
                    $('.details-control:not(:first)').addClass('tri');
                    $('.details-control').removeClass('tri_left');
                }
            });
            //Opening all child rows in a table with Responsive extension requires a different approach:
            //table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
            row.child(loading).show();
            tr.addClass('shown');
            $(this).removeClass('tri');
            //$(this).addClass('tri_left');

            $.ajax({
                url: '{{url("/shipments")}}' + '/' + shipmentId,
                type: "get",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(response) {
                    //console.log(response);
                    row.child(response).show();
                    $('div.slider', row.child()).slideDown(700);
                    //$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });

        }
    });

    let visibleColumnsIndexes = null;
    $('.datatable thead').on('input', '.search', function() {
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

$('.inbound').on('click', function(e) {
    event.preventDefault();
var shipmentId = $(this).attr("data-sid");
//$('#inbound').modal('show'); 
$.ajax({
                url: '{{url("warehouse/shipments")}}' + '/' + shipmentId,
                type: "get",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(response) {
                    //alert(response);
                    $('#inboundContents').html(response);
                    $('#inbound').modal('show'); 
                    //console.log(response);
                    //row.child(response).show();
                    //$('div.slider', row.child()).slideDown(700);
                    //$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
});



$('#checkIn').on('click', function(e) {
    event.preventDefault();
    alert($('#inboundContents').html());
});


</script>
@endsection


@section('content')
<style>
    td.details-control {
        height: 20px;
        width: 20px;
        background: url('../img/details_open_sf.png') no-repeat center center;
        cursor: pointer;
        background-size: 16px 16px;
    }

    tr.shown td.details-control {
        background: url('../img/details_close.png') no-repeat center center;
        background-size: 16px 16px;
    }

    div.slider {
        display: none;
    }


    .card-body {
        padding-left: 0;
        padding-right: 0;
    }

    .dataTables_length label {
        padding-left: 1.25rem;
    }

    #DataTables_Table_0_info {
        padding-left: 15px;
    }

    #DataTables_Table_0_filter,
    #DataTables_Table_0_paginate {
        padding-right: 15px;
    }
</style>

<div class="container-fluid">
    <!-- Page header -->
    <div class="page-header" style="margin-top:150px">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h3><i class="fas fa-boxes mr-2"></i> <span class="font-weight-semibold"> Inventry of parcels</h3>
            </div>
            <div class="header-elements d-none py-0 mb-3 mb-lg-0">

            </div>
        </div>
    </div>
    <!-- /page header -->
</div>

<!-- Page content -->
<div class="page-content pt-0">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class=" container-fluid">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <table class=" table  datatable datatable-Shipment">
                                        <thead>
                                            <tr>
                                                <th>

                                                </th>

                                                <th>
                                                    {{ trans('cruds.shipment.headers.j_country') }}
                                                </th>
                                                <th>
                                                    Booking No.
                                                </th>
                                                <th>
                                                    {{ trans('cruds.shipment.fields.status') }}
                                                </th>
                                                <th>
                                                    Last update
                                                </th>
                                                <th>
                                                    {{ trans('cruds.shipment.fields.outstanding_fee') }}
                                                </th>
                                                <th>
                                                    Customer update
                                                </th>
                                                <th>
                                                    Location
                                                </th>
                                                <th>
                                                   Content inspection
                                                </th>
                                                <th>
                                                    {{ trans('cruds.shipment.fields.mailno') }}
                                                </th>

                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach($shipments as $key => $shipment)
                                            @if($shipment->reference_no_2)
                                            <tr data-entry-id="{{ $shipment->id }}">
                                                <td class="tri">
                                                    <div>

                                                    </div>
                                                </td>

                                                <td>
                                                    {{ $shipment->j_country ?? '' }}  <i class="fas fa-plane"></i>  {{ $shipment->d_country ?? '' }}
                                                </td>
                                                <td>
                                                    {{$shipment->reference_no_1}}
                                                </td>
                                                <td>
                                                    {{ $shipment->status->name ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $shipment->status_plus->updated_at }}
                                                </td>
                                                <td>
                                                    {{ $shipment->outstanding_fee ?? '' }}
                                                </td>
                                                <td>
                                                    {!! $shipment->customer_update_status ==1 ? '<span class="badge badge-danger">Yes</span>' : '<span class="badge badge-secondary">Pending</span>' !!}
                                                </td>
                                                <td>
                                                    <?php
                                                        $location = ['1'=>'LOC1 - Ready for processing','2'=>'LOC2 - Escalation', '3' =>'LOC3 - Return Area']; //short array
                                                        echo $location[$shipment->status_plus->wh_location] ;
                                                    ?>
                                                
                                                </td>
                                                <td>
                                                    <?php
                                                        if($shipment->status_plus->content_check ==1)
                                                        {
                                                            echo '<h4><span class="badge badge-success">Passed</span></h4>';
                                                        }
                                                        else
                                                        {
                                                            $issues = ['1'=>'Has restricted items','2'=>'Contents don\'t match items description', '3' =>'Content damaged']; //short array
                                                            echo '<h4><span class="badge badge-warning">'.$issues[$shipment->status_plus->issue_code].'</span></h4>'; ;
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="https://www.yodel.co.uk/tracking/{{$shipment->reference_no_2}}" target="_blank">
                                                    {!! $shipment->reference_no_2 ?? '<h6><span class="badge badge-pill badge-secondary">Unbooked </span></h6>' !!}
                                                    </a>
                                                </td>                                                

                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /content area -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->



@endsection
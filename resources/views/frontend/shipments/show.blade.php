@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="https://checkoutshopper-live.adyen.com/checkoutshopper/sdk/4.1.0/adyen.css" integrity="sha384-+CPzBNZVkBXu4uXDECnVuVQ24Kl8vWrR61UzuuuUj5IBEP//BQ0G0KDNfz2iPcvJ" crossorigin="anonymous">
@endsection

@section('scripts')
@if($shipment->outstanding_fee>0)
<script src="https://checkoutshopper-live.adyen.com/checkoutshopper/sdk/4.1.0/adyen.js" integrity="sha384-3tEepwhhMcyxgIbL3HBe3I59BpSMNyKoNrbKWARYH1tJ7K7K6NdTDqOltKlwiVsH" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/adyenImplementation.js?v='.time()) }}"></script>

<script>
    // Javascript for shipment show/checkout page
    $('#openModel').on("click", function(e) {
        e.preventDefault();
        //alert();
        $('#Modal').modal('show');
        para = 0;
    });

    //alert(response);
    var myModal = $('#Modal').on('shown.bs.modal', function(e) {
        $.ajax({
            url: '../shipments/' + shipment_id + '/createIuopOrder',
            type: 'get',
            //dataType: 'json',
            //data: $('#shipper_address :input').serialize()+ "&j_country=" + $('#j_country').val(),
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(response) {
                $('#resultAWB').html('<h2>' + response + '</h2>');
                $('#ModalLabel').html('AWB generated successfully.');

                $('#modalMsg').html('Page refreshing in: ');

                var count = 5;
                var timer = setInterval(function() {

                    //var count = $('span.countdown').html();
                    if (count > 1) {
                        $('span.countdown').html(count + ' Seconds');
                        count = count - 1;
                    } else {
                        myModal.modal('hide');
                        clearInterval(timer);
                    }
                }, 1000);

            },
            error: function(xhr, textStatus, errorThrown) {
                $('#resultAWB').html('<h2>' + response + '</h2>');
                $('#ModalLabel').html('Error');
                setTimeout(
                    function() {
                        myModal.modal('hide');
                    }, 5000);

            },


        });
    });


    $('#Modal').on('hidden.bs.modal', function(e) {
        window.location.reload();
    });

    $('#form').on('shown.bs.modal', function(e) {

        var timer = setInterval(function() {

            var count = $('span.countdown').html();
            if (count > 1) {
                $('span.countdown').html(count - 1);
            } else {
                $('#form').modal('toggle');
                clearInterval(timer);
            }
        }, 1000);
    });
</script>

@endif
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page header -->
    <div class="page-header" style="margin-top:150px">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h3><i class="icon-radio-checked mr-2"></i> <span class="font-weight-semibold">{{ __('Browse Order') }}</h3>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
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
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        {{ trans('cruds.shipment.fields.reference_no_1') }}: {{ $shipment->reference_no_1 }}
                                    </div>
                                    <div class="col-md-6 text-right">
                                        @if(is_null($shipment->mailno) and $shipment->outstanding_fee <= 0) <a href="" id="openModel" class="btn btn-danger">get SF AWB</a>

                                            @else

                                            {{ trans('cruds.shipment.fields.mailno') }} : {{ $shipment->mailno }}
                                            @endif
                                    </div>
                                </div>
                            </div>



                            <div class="card-body">
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div>
                                            <h5 class="a-spacing-micro">Origin</h5>
                                        </div>
                                        <address>
                                            <strong>{{ ucwords($shipment->j_contact) }}</strong>, {{ $shipment->j_company }}<br>
                                            {{ ucwords($shipment->j_address) }}<br>
                                            {{ strtoupper($shipment->j_city) }},{{ strtoupper($shipment->j_province) }}<br>
                                            {{ strtoupper($shipment->j_post_code) }}, {{ strtoupper($shipment->j_country) }}<br>
                                        </address>

                                        <address>
                                            <strong>{{ $shipment->j_tel }}</strong><br>
                                            <a href="mailto:#">{{ $shipment->j_email }}</a>
                                        </address>
                                    </div>

                                    <div class="col-md-6">
                                        <div>
                                            <h5 class="a-spacing-micro">Destination</h5>
                                        </div>
                                        <address>
                                            <strong>{{ $shipment->d_contact }}</strong>, {{ $shipment->d_company }}<br>
                                            {{ $shipment->d_address }}<br>
                                            {{ $shipment->d_city }},{{ $shipment->d_province }}<br>
                                            {{ $shipment->d_post_code }}, {{ $shipment->d_country }}<br>
                                        </address>

                                        <address>
                                            <strong>{{ $shipment->d_tel }}</strong><br>
                                            <a href="mailto:#">{{ $shipment->d_email }}</a>
                                        </address>
                                    </div>
                                </div>
                                </br>




                                <!-- Modal -->

                                <div class="modal example-open " id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel3" aria-hidden="true" data-backdrop="static">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">Processing your request</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center" id='resultAWB'>
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <h3 id="">Please wait.....</h3>

                                                </div>
                                                <span id="modalMsg"></span><span class="countdown"></span>
                                            </div>
                                            <div class="modal-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <table class='table-xs table-bordered' width=100%>

                                            <tr>
                                                <th>Dimension(L*W*H):</th>
                                                <td>{{ $shipment->cargo_length }} * {{ $shipment->cargo_width }}* {{ $shipment->cargo_height }}(cm)</td>
                                            </tr>
                                            <tr>
                                                <th>{{ trans('cruds.shipment.fields.cargo_total_weight') }}:</th>
                                                <td>{{ $shipment->cargo_total_weight }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ trans('cruds.shipment.fields.realweightqty') }}:</th>
                                                <td>{!! $shipment->realweightqty ??'<span class="badge badge-info">to be Confirmed</span>' !!}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ trans('cruds.shipment.fields.volumeweightqty') }}:</th>
                                                <td>{!! $shipment->volumeweightqty ?? '<span class="badge badge-info">to be Confirmed</span>' !!}</td>
                                            </tr>
                                            <tr>
                                                <th> {{ trans('cruds.shipment.fields.meterageweightqty') }}:</th>
                                                <td> {!! $shipment->meterageweightqty ?? '<span class="badge badge-info">to be Confirmed</span>' !!}</td>
                                            </tr>
                                        </table>

                                    </div>
                                    <div class="col-md-6">
                                        <table class='table-xs table-bordered' width=100%>
                                            <tr>
                                                <th>{{ trans('cruds.shipment.fields.parcel_quantity') }}: </th>
                                                <td>{{ $shipment->parcel_quantity }}</td>
                                            </tr>
                                            <tr>
                                                <th> {{ trans('cruds.shipment.fields.estimated_freight') }}: </th>
                                                <td>{{ $shipment->estimated_freight }}</td>
                                            </tr>
                                            <tr>
                                                <th> {{ trans('cruds.shipment.fields.actual_freight') }}: </th>
                                                <td>{!! $shipment->actual_freight ?? '<span class="badge badge-info">to be Confirmed</span>' !!}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ trans('cruds.shipment.fields.paid_freight') }}: </th>
                                                <td>{{ $shipment->paid_freight }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ trans('cruds.shipment.fields.outstanding_fee') }}:</th>
                                                <td> {{ $shipment->outstanding_fee }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div class="">
                                    <h4>Payment</h4>
                                </div>
                                <table class="table-xs table-bordered">
                                    <thead>
                                        <th>Transaction</th>
                                        <th>Method</th>
                                        <th>Currency</th>
                                        <th>Paid Amout</th>
                                        <th>date</th>

                                    </thead>
                                    <tbody>
                                        @foreach($shipment->payment as $payment)
                                        <tr>
                                            <td>{{$payment->transaction}}</td>
                                            <td>{{$payment->payment_method}}</td>
                                            <td>{{$payment->currency}}</td>
                                            <td>{{$payment->amount}}</td>
                                            <td>{{$payment->payment_date}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </br>
                                <div class="">
                                    <h4>Shipment contents</h4>
                                </div>
                                <table class="table-xs table-bordered">
                                    <thead>
                                        <th>Item description</th>
                                        <th>Quatity</th>
                                        <th>Unit</th>
                                        <th>Unit price</th>
                                        <th>Sub-total</th>
                                        <th>Origin</th>
                                        <th>HS Code</th>
                                    </thead>
                                    <tbody>
                                        <?php $sum = 0 ?>
                                        @foreach($shipment->shipmentCargos as $cargo)
                                        <tr>
                                            <td>{{$cargo->name}}</td>
                                            <td>{{$cargo->count}}</td>
                                            <td>{{$cargo->unit}}</td>
                                            <td>{{$cargo->amount}}</td>
                                            <td>{{$cargo->total_value}}</td>
                                            <td>{{$cargo->source_area}}</td>
                                            <td>{{$cargo->hs_code}}</td>
                                        </tr>
                                        <?php $sum += $cargo->total_value ?>
                                        @endforeach
                                    </tbody>
                                </table>
                                </br>
                                <div class="">
                                    <h4>Custom Info</h4>
                                </div>
                                <table class="table-xs table-bordered">
                                    <thead>
                                        <th> {{ trans('cruds.shipment.fields.tax_pay_type') }}:</th>
                                        <th> {{ trans('cruds.shipment.fields.order_cert_type') }}:</th>
                                        <th>ID</th>
                                        <th>{{ trans('cruds.shipment.fields.currency') }}:</th>
                                        <th>Declare Value</th>

                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>{{ App\Models\Shipment::TAX_PAY_TYPE_SELECT[$shipment->tax_pay_type] ?? '' }}</td>
                                            <td>{{ App\Models\Shipment::ORDER_CERT_TYPE_SELECT[$shipment->order_cert_type] ?? '' }}</td>
                                            <td>{!! $shipment->order_cert_no ?? '<span class="badge badge-info">Awaiting input</span>'!!}</td>
                                            <td>{{ $shipment->currency }}</td>
                                            <td>{{$sum}}</td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5">
                        @if($shipment->outstanding_fee>0)
                        <div class="card">
                            <div class='card-header '>
                                <img class="inline-block float-left" src="../img/sf-intel-logo.svg" alt="SF International" style="width:2.8rem;">
                                <h2 class="inline-block float-right">GBP {{ $shipment->outstanding_fee }}</h2>
                            </div>
                            <div class="card-body">
                                <title>Integration: Drop In</title>
                                {{-- Hidden divs with data passed from the PHP server --}}
                                <div id="clientKey" class="d-none hidden">{{ env('CLIENT_KEY') }}</div>
                                <div id="type" class="d-none hidden">dropin</div>
                                <div id="payment-page">
                                    {{-- The Checkout integration type will be rendered below --}}
                                    {{-- Drop-in includes styling out-of-the-box, so no additional CSS classes are needed. --}}
                                    <div class="payment-container">
                                        <div id='dropin' class="payment"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(!is_null($shipment->mailno))
                        <div class="card">
                            <div class='box-header with-border mb-1 px-5 pt-3'>

                            </div>
                            <div class="card-body">
                                
                                <a href="https://iuop.sf.global/iuop-iuop/api/print/printLabel?sfWaybillNos={{$shipment->sf_api_ref}}" target="_blank" class="btn btn-danger">Print Lable</a>
                                <a href="https://iuop.sf.global/iuop-iuop/api/print/printInvoice?sfWaybillNos={{$shipment->sf_api_ref}}" target="_blank" class="btn btn-danger">Print Invoice</a>
                                <a href="https://iuop.sf.global/#/customsDoc?{{$shipment->sf_api_ref}}" target="_blank" class="btn btn-danger">Upload ID Photo</a>
                                
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->


<script>
    let pay_amount = "{{ $shipment->outstanding_fee }}";
    let pay_currency = "GBP";
    let shipment_id = "{{ $shipment->id }}";
    let reference_no1 = "{{ $shipment->reference_no_1 }}";
</script>


@endsection
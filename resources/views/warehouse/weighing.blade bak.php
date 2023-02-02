@extends('layouts.warehouse')

@section('scripts')
<script>
$("#searchKeyword").focus();
$("#searchKeyword").on( "keypress", function(event) {
    if (event.which == 13 && !event.shiftKey) {
        event.preventDefault();
        if($(this).val()){
            var trackingNo=$(this).val();
            $("#inboundSearch").submit();
        }
    }
});

</script>

@endsection


@section('content')
<div class="container-fluid">
   <!-- Page header -->
   <div class="page-header" style="margin-top:150px">
      <div class="page-header-content ">
         <div class="page-title">
            <div class="row  justify-content-center">
               <div class="col">
                  <h3><i class="icon-radio-checked mr-2"></i> <span class="font-weight-semibold">{{ __('Weighing & Labelling') }}</h3>
                  <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
               </div>
               <div class="col-6">
                  <form id="inboundSearch" method="POST" action='{{ route("warehouse.warehouse.weighing") }}' enctype="multipart/form-data" autocomplete="off">
                     @method('GET')
                     @csrf
                     <input id="searchKeyword" type="text" class="form-control" name="trackingNo" placeholder="Scan" >
                  </form>
               </div>
            </div>
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
               <div class="col-md-12">
                  <div class="card">
                     <div class='card-header '>
                        <!-- <img class="inline-block float-left" src="../img/sf-intel-logo.svg" alt="SF International" style="width:2.8rem;"> -->
                     </div>
                     <div class="card-body" style = "height:60vh">
                        <div class="row">
                           @if(isset($shipment))
                           <div class="col-md-12">
                              <form method="POST" action='{{ route("warehouse.warehouse.check-in") }}'  enctype="multipart/form-data" autocomplete="off">
                                 @method('POST')
                                 @csrf 
                                 <input hidden class="form-control" name="shipment_id" type="text" value = '{{ $shipment->id}}'>
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
                                 
                                 <table class="table">
                                    <thead>
                                       <th></th>
                                       <th></th>
                                       <th></th>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>{{ trans('cruds.shipment.fields.mailno') }}</td>
                                          <td>{{ $shipment->reference_no_2 }} </td>
                                       </tr>
                                       <tr>
                                          <td>{{ trans('cruds.shipment.fields.reference_no_1') }}</td>
                                          <td>{{ $shipment->reference_no_1 }}</td>
                                       </tr>
                                       <tr>
                                          <td> SF AWB: </td>
                                          <td>{{ $shipment->mailno }}</td>
                                       </tr>
                                       <tr>
                                          <td> <label class="required control-label" for="condition">Package condition:</label> </td>
                                          <td>
                                             <div class="form-group">
                                                <div class="ml-4 mt-1">
                                                   <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="condition1" name="condition" class="custom-control-input" value="1" {{ (old("condition", $shipment->status_plus->inbound_condition) == "1") ? "checked" : '' }}>
                                                      <label class="custom-control-label" for="condition1">Good to process</label>
                                                   </div>
                                                   <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="condition2" name="condition" class="custom-control-input" Value="2" {{ (old('condition', $shipment->status_plus->inbound_condition) == "2") ? 'checked' : '' }}>
                                                      <label class="custom-control-label" for="condition2">Packaging damaged (take photo)</label>
                                                   </div>
                                                   <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="condition3" name="condition" class="custom-control-input" Value="3" {{ (old('condition', $shipment->status_plus->inbound_condition) == "3") ? 'checked' : '' }}>
                                                      <label class="custom-control-label" for="condition3">Content damaged (take photo)</label>
                                                   </div>
                                                </div>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td> <label class="required" for="whLocation">Put into Bin/Area:</label> </td>
                                          <td>
                                             <div class="form-group">
                                                <div class="ml-4 mt-1">
                                                   <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="whLocation1" name="whLocation" class="custom-control-input" value="1" {{ (old("whLocation", $shipment->status_plus->wh_location) == "1") ? "checked" : '' }}>
                                                      <label class="custom-control-label" for="whLocation1">LOC1 - Ready for processing</label>
                                                   </div>
                                                   <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="whLocation2" name="whLocation" class="custom-control-input" Value="2" {{ (old('whLocation', $shipment->status_plus->wh_location) == "2") ? 'checked' : '' }}>
                                                      <label class="custom-control-label" for="whLocation2">LOC2 - Escalation</label>
                                                   </div>
                                                   <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="whLocation3" name="whLocation" class="custom-control-input" Value="3" {{ (old('whLocation', $shipment->status_plus->wh_location) == "3") ? 'checked' : '' }}>
                                                      <label class="custom-control-label" for="whLocation3">LOC3 - Return Area</label>
                                                   </div>
                                                </div>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td> Remark: </td>
                                          <td><input class="form-control" name="remark" type="text" placeholder="" value = '{{ old('whLocation', $shipment->status_plus->wh_remark) }}'></td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                 </div>
                              </form>
                           </div>
                           @else
                              @if(isset($trackingNo))
                              <h3>Nothing is found for this number: {{$trackingNo}}</h3>
                              @else
                                 @if (session('status'))
                                    <div class="alert alert-success">
                                      <h3> {{ session('status') }} </h3>
                                    </div>
                                 @else
                                 <h3>Please scan a parcel to start</h3>
                                 @endif
                              @endif
                           @endif
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
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

$('.wh_condition').on('click',function(event){

   if($(this).val()==1){
      $('#snapshot').addClass('d-none');

   }else{
      $('#snapshot').removeClass('d-none');
   }
});


// Grab elements, create settings, etc.
var video = document.getElementById('video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });
}

// Elements for taking the snapshot
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');

// Trigger photo take
document.getElementById("snap").addEventListener("click", function(c) {
   event.preventDefault();
   if($("#imgSnaps img").length > 8){
      alert("Only 9 snapshots can be taken.");
      return;
   }

	context.drawImage(video, 0, 0, 640, 480);
   take_snapshot()

});


function take_snapshot(){
   var canvas = document.getElementById('canvas');
   var dataURL = canvas.toDataURL();
   var shipmentId = document.getElementById('shipmentId').value;

   $.ajax({
    type: "POST",
    url: "{{url('warehouse/snapshot')}}",
    headers: {
      'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
   },
    data: { 
        imgBase64: dataURL, shipmentId: shipmentId
      }
      }).done(function(response) {
         console.log('image saved'); 
         $('#imgSnaps').append(response);
   });

}
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
                  <h3><i class="fas fa-barcode mr-2"></i> <span class="font-weight-semibold">{{ __('Inbound Scan') }}</h3>
                  <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
               </div>
               <div class="col-6">
                  <form id="inboundSearch" method="POST" action='{{ route("warehouse.warehouse.inboundScan") }}' enctype="multipart/form-data" autocomplete="off">
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
                     <div class="card-body" >
                        <div class="row">
                           @if(isset($shipment))
                           <div class="col-md-12">
                              <form method="POST" action='{{ route("warehouse.warehouse.check-in") }}'  enctype="multipart/form-data" autocomplete="off">
                                 @method('POST')
                                 @csrf 
                                 <input hidden class="form-control" name="shipment_id" type="text" value = '{{ $shipment->id}}'>
                                 <table class="table">
                                    <thead>
                                       <th></th>
                                       <th></th>
                                       <th></th>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td></td>
                                          <td>{{ trans('cruds.shipment.fields.mailno') }}:&nbsp;&nbsp;&nbsp;{{ $shipment->reference_no_2 }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                          {{ trans('cruds.shipment.fields.reference_no_1') }}:&nbsp;&nbsp;&nbsp;{{ $shipment->reference_no_1 }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                           SF AWB: {{ $shipment->mailno }}</td>
                                       </tr>
                                       <tr>
                                          <td> <label class="required control-label" for="condition">Package condition:</label> </td>
                                          <td>
                                             <div class="form-group">
                                                <div class="ml-4 mt-1">
                                                   <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="condition1" name="condition" class="custom-control-input wh_condition" value="1" {{ (old("condition", $shipment->status_plus->inbound_condition) == "1") ? "checked" : '' }}>
                                                      <label class="custom-control-label" for="condition1">Good to process</label>
                                                   </div>
                                                   <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="condition2" name="condition" class="custom-control-input wh_condition" Value="2" {{ (old('condition', $shipment->status_plus->inbound_condition) == "2") ? 'checked' : '' }}>
                                                      <label class="custom-control-label" for="condition2">Packaging damaged (take photo)</label>
                                                   </div>
                                                   <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="condition3" name="condition" class="custom-control-input wh_condition" Value="3" {{ (old('condition', $shipment->status_plus->inbound_condition) == "3") ? 'checked' : '' }}>
                                                      <label class="custom-control-label" for="condition3">Content damaged (take photo)</label>
                                                   </div>
                                                </div>
                                             </div>
                                          </td>
                                       </tr>

                                       <input type="hidden" id="shipmentId"  value="{{$shipment->id}}"/>
                                       
                                       <?php

                                             if($shipment->status_plus->inbound_condition == "1")
                                             {
                                                echo '<tr id="snapshot" class="d-none">';
                                             }else{
                                                echo '<tr id="snapshot" class="">';
                                             }
                                          ?>
                                      
                                       
                                       
                                       <td></td>
                                          <td>

                                             <div class = "row">
                                                <div class="col-4">
                                                </div>
                                                <div class="col-6">
                                                   <video id="video" width="480" height="360" autoplay></video>
                                                   <canvas hidden id="canvas" width="640" height="480"></canvas>
                                                   <div id='imgSnaps'>
                                                      <?php 
                                                      if(trim($shipment->status_plus->content_img) != ''){
                                                         $imgs=explode(',', $shipment->status_plus->content_img);
                                                            foreach($imgs as $image)
                                                            {
                                                               echo '<img src="'.url("/content-img/{$shipment->id}/{$image}").'" alt="no pic" width="160" height="120">';
                                                            }
                                                         }

                                                      ?>
                                                   </div>
                                                
                                                
                                                </div>
                                                <div class="col-2 align-self-center">
                                                   <button class="btn btn-secondary" id="snap" style="height:180px; width:100%" ><i class="fas fa-camera" style = "font-size:2.0rem;"></i></button>
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

                                     <h3>Scan a parcel to start</h3>

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
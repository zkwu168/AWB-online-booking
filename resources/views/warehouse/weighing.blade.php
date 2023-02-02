@extends('layouts.warehouse')

@section('css')
<style>
.steps-progress {
  pointer-events: none;
}
.steps-progress .btn-step-progress {
  background-color: #007bff;
  color: #ffffff;
}
.steps-progress .btn-step-progress.collapsed {
  background-color: #e9ecef;
  color: #ced4da;
}

.btn {
   font-size: 1.2rem;
}


.inspection { display: none; }                /* hide radio buttons */
.inspection + label { display: inline-block } /* show labels in line */
.inspection ~ .tab { display: none }          /* hide contents */
/* show contents only for selected tab */
#tab1:checked ~ .tab.content1,
#tab2:checked ~ .tab.content2{ display: block; }

.inspection + label {             /* box with rounded corner */
  width: 180px; 
  height:48px;
  background: #CCC;
  padding: 4px 12px;
  border-radius: 4px;
  position: relative;
  top: 1px;
  display: inline-flex;
    -ms-flex-align: center;
    align-items: center;
    cursor: pointer;
    transition: all 0.15s ease-out 0s;
}

.inspection + label:hover {
  background: #e63946;
}

.inspection ~ .tab {          /* grey line between tab and contents */
  border-top: 1px solid #999;
  padding: 12px;
}

.inspection:checked + label {     /* white background for selected tab */
  background: #dc1e31;
}

.inspection:checked + label > div > span::before{   
   font-family: "Font Awesome 5 Free"; 
   /*font-weight: 900; */
   content: "\f058";
   font-size: 2rem;
   margin-right:10px;
   color: #fff;
}

.inspection:checked + label > div > span{   
   color: #fff;
}

.inspection + label > div > span::before{   

   font-family: "Font Awesome 5 Free"; 
   /*font-weight: 900; */
   content: "\f111";
   font-size: 2rem;
   margin-right:10px;
   vertical-align: middle;
}

.inspection + label > div >span{   
   padding-left:10px;
   color: #999;
   font-size: 1.2rem;
}
.inspection ~ span{
   font-size:1.2rem;
   padding-left:80px;
}

.inspection:checked ~ span{
   font-size:1.2rem;
   display: none;
}

.tab {
    animation: slide-down 0.5s ease-out;
}

.custom {
  margin-bottom: 16px;
}
.custom.checkbox > label,
.custom.radio > label {
  position: relative;
  cursor: pointer;
  font-size:1.1rem;
  margin-bottom: 0;
}
.custom input[type="checkbox"],
.custom input[type="radio"] {
  position: relative;
  margin-left: -26px;
  margin-right: 12px;
  cursor: pointer;
}
.custom input[type="checkbox"]:after,
.custom input[type="radio"]:after {
  content: "";
  position: absolute;
  top: -5px;
  left: -4px;
  width: 24px;
  height: 24px;
  background: #fff;
  border: 2px solid #ddd;
  cursor: pointer;
}
.custom input[type="checkbox"]:before {
  transition: transform 0.4s cubic-bezier(0.45, 1.8, 0.5, 0.75);
  transform: rotate(-45deg) scale(0, 0);
  content: "";
  position: absolute;
  left: -1px;
  z-index: 1;
  width: 13px;
  height: 7.5px;
  border: 2px solid #dc1e31;
  border-top-style: none;
  border-right-style: none;
}
.custom input[type="checkbox"]:checked:before {
  transform: rotate(-45deg) scale(1, 1);
}
.custom input[type="checkbox"]:after {
  border-radius: 2px;
}
.custom input[type="radio"] {
  top: -2px;
}
.custom input[type="radio"]:before {
  transition: transform 0.4s cubic-bezier(0.45, 1.8, 0.5, 0.75);
  transform: scale(0, 0);
  content: "";
  position: absolute;
  top: 1px;
  left: 0;
  z-index: 1;
  width: 16px;
  height: 16px;
  background: #dc1e31;
  border-radius: 50%;
}
.custom input[type="radio"]:checked:before {
  transform: scale(1, 1);
}
.custom input[type="radio"]:after {
  border-radius: 50%;
  top: -3px;
}

legend {
   padding-bottom: 0;
}

@keyframes slide-down {
    0% { opacity: 0; transform: translateY(100%); }
    100% { opacity: 1; transform: translateY(0); }
}

@media (max-width: 575.98px) {
  .steps-progress .btn-step-progress.collapsed {
    display: none;
  }
}
@media (max-width: 991.98px) {
  .steps-progress .btn-step-progress.collapsed span {
    display: none;
  }
}
.steps-progress .btn-step-progress:not(:last-of-type) {
  margin-right: 20px;
}
.steps-progress .btn-step-progress span {
  margin-left: 10px;
}

.btn-step {
  position: relative;
  display: block;
  /*padding: 20px 85px 20px 25px;*/
  width: 100%;
  text-align: left;
  pointer-events: none;
}
.btn-step:not(:first-of-type) {
  margin-top: 20px;
}

@media (min-width: 768px) {
  .btn-step {
    /*padding: 20px 115px 20px 60px;*/
  }
}
.btn-step:before, .btn-step:after {
  position: absolute;
  top: 50%;
  right: 20px;
  width: 40px;
  height: 40px;
  transform: translateY(-50%);
}
@media (min-width: 768px) {
  .btn-step:before, .btn-step:after {
    right: 50px;
  }
}
.btn-step:before {
  content: "";
  border-radius: 0.25rem;
  background-color: #f9f9fa;
  border: 0 solid #adb5bd;
}
.btn-step:after {
  right: 30px;
  width: 20px;
  height: 20px;
}
@media (min-width: 768px) {
  .btn-step:after {
    right: 60px;
  }
}
.btn-step:after {
  content: "";
}
.btn-step:not(.collapsed):after, .btn-step:not(.collapsed) ~ .btn-step.collapsed:after {
  content: none;
}
.btn-step.btn-secondary:after {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3E%3Cpath fill='%230072bc' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3E%3C/svg%3E");
}
.btn-step:not(.collapsed) {
  border-radius: 4px 4px 0 0;
}
.btn-step span {
  margin-right: 20px;
}
@media (max-width: 767.98px) {
  .btn-step span {
    display: none;
  }
}
</style>

@endsection



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
$(function () {
    $('.nav-tabs').on('click', 'a[role=tab] input[type=radio]', function(event) {
    		event.stopPropagation();
        $(this).parent().tab('show');
    });
    $('.nav-tabs').on('show.bs.tab', 'a[role=tab]', function() {
        $(this).find('input[type=radio]').prop('checked', true);
    });
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


$('input[type=radio][name=tabs]').change(function() {
   var contentInspec = $(this).val();
   var shipmentId = document.getElementById('shipmentId').value;

   $.ajax({
    type: "POST",
    url: "{{url('warehouse/snapshot')}}",
    headers: {
      'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
   },
    data: { 
      contentInspec: contentInspec, shipmentId: shipmentId
      }
      }).done(function(response) {
         //console.log('image saved'); 
         //$('#imgSnaps').append(response);
   });
});

$('#saveIssue').on('click',function(event) {
   event.preventDefault();
   
   $(this).addClass('disabled');
   var shipmentId = document.getElementById('shipmentId').value;
   var issueCode = $('input[type=radio][name=issueCode]:checked').val();
   var issueRemark = $('#issueRemark').val();
   //alert(issueCode+issueRemark+shipmentId);
   $.ajax({
    type: "POST",
    url: "{{url('warehouse/snapshot')}}",
    headers: {
      'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
   },
    data: { 
      issueCode: issueCode, issueRemark: issueRemark, shipmentId: shipmentId
      }
      }).done(function(response) {
         //console.log('image saved'); 
         $('#infoUpdate').removeClass('d-none');
         
         window.setInterval(function() {
         var timeLeft    = $("#timeLeft").html();
         //alert(timeLeft);
         if(eval(timeLeft) == 0) {
                window.location= ("https://sf-eu.test/warehouse/weighing");
         } else {
            $("#timeLeft").html(eval(timeLeft)- eval(1));
         }
         }, 1000);
   });
});



function getQuote(parcelWeight){
      
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $("#result").html('Please wait......');
      event.preventDefault();
      //alert( $(this).val());
      var values = {};
      values.parcelWeight = parcelWeight;
      values.volWeight = 2;
      values.shipFrom = 2;
      values.shipTo = 2;
      values.parcelLenght = 2;
      values.parcelHeight = 2;
      $.ajax({
          url: "../freightcost.php",
          type: "post",
          data: values,
          success: function(res) {
              //$("#result").html('&pound ' + res);
              //$("#estimated_freight").val(res);
              $("#actual_freight").val(res);
              $("#pending_payment").val(res-$('#paid').text());
              //alert('Form submitted successfully...')
              //console.log(res)
          },
          error: function(xhr, status, error) {
              console.log(xhr.responseText);
          }
      });
  }

$('#cargo_total_weight').on('input', function() {
    if (this.value <0){
      this.value= 0;
      return;
    }
    
    if (this.value<=20){
      //if(parseFloat(this.value) >= $('#vol_weight').val()){
        if(this.value>$('#vol_weight').val()){
         $('#chargeable_weight').val(this.value)
        }else{
         $('#chargeable_weight').val($('#vol_weight').val());
        }
        //if(isNaN(tal))
        getQuote(parseFloat($('#chargeable_weight').val()));
      //} 
          
    }else{
      alert("Weight cannot be greater than 20kg");
      this.value="";
      $("#result").html('');
    }
 
});



$('.cargo-dim').on('input', function() {
    //var volWeight=$('#vol_weight').val();
    //alert(chargableWeight);
    var dimWeight=1;
    $('.cargo-dim').each(function()
    {
      dimWeight *= parseInt(this.value);
    });
      volWeight=roundToTwo(dimWeight/5000);
      if (volWeight>20){
        volWeight=20;
      }
      $('#vol_weight').val(volWeight);
      if (volWeight >  $('#cargo_total_weight').val()){
         $('#chargeable_weight').val(volWeight)
        getQuote(volWeight);
      }else{
        getQuote($('#cargo_total_weight').val());
      }
      
});

$('#freight-calculate').on('click', function(event){
   event.preventDefault();
   var values = {};
      values.shipmentId =document.getElementById('shipmentId').value;
      values.actualWeight = $('#cargo_total_weight').val();
      values.parcelLength = $('#cargo_length').val();
      values.parcelWidth = $('#cargo_width').val();
      values.parcelHeight = $('#cargo_height').val();
      values.token = $(this).data('token');
      $.ajax({
         type: "POST",
         url: "{{url('warehouse/chargeable-update')}}",
         headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
         },
          data: values,
          success: function(res) {

          },
          error: function(xhr, status, error) {
              console.log(xhr.responseText);
          }
      });
})



function roundToTwo(num) {    
   return +(Math.round(num + "e+2")  + "e-2");
}


$('#printAWB').on('click',function(event){
   event.preventDefault();
   var shipmentId =document.getElementById('shipmentId').value;
   $.ajax({
         type: "POST",
         url: "{{url('warehouse/get-sf-awb')}}",
         headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
         },
          data: { shipmentId: shipmentId },
          success: function(res) {
            window.open('https://iuop.sf.global/iuop-iuop/api/print/printLabel?sfWaybillNos={{$shipment->sf_api_ref ?? ''}}','newwindow',  'width=980,height=640');
            return false;
          },
          error: function(xhr, status, error) {
              console.log(xhr.responseText);
          }
      });   

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
                  <h3>
                  <i class="fas fa-weight mr-2"></i> <span class="font-weight-semibold">{{ __('Weighing & Labelling') }} @if(isset($shipment))   :      
                     <h2 style="display:inline-block;">{{$trackingNo}} @endif</h2>
                  </h3>
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
                  <div class="row">
                     @if(isset($shipment))
                        @if(!isset($shipment->status_plus) || $shipment->status_plus->wh_location<>1)
                           <div class="col-md-12">
                              <div class="pt-3 card" style="height:60vh">
                                 <div class="col-md-12">
                                    <h3>This parcel's not been approved for processing, please check inbound status</h3>
                                 </div>
                              </div>
                           </div>
                           
                        @else
            

                     <input type="hidden" id="shipmentId"  value="{{$shipment->id}}"/>
                     <div class="col-md-12">
                        <div class="steps-fields pt-3 card">
                           <div class="container">
                              <form>
                                 <div class="accordion" id="steps">
                                    <button class="btn btn-step btn-secondary" type="button" data-toggle="collapse" data-target="#edit-step1"><span class="display-6">1</span> Content Inspection: </button>
                                    <div id="edit-step1" class="collapse show" aria-labelledby="headingOne" data-parent="#steps">
                                       <div class="pt-3 px-3 pb-2 px-md-3 pt-md-3 bg-white">
                                          <div class="row">
                                             <table class="table  table-sm ">
                                                <thead class="thead-light">
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
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-auto ">
                                          </div>
                                       </div>
                                       <div class="p-3 px-md-4 bg-light">
                                          <div class="row">
                                             <div class="col ml-auto">
                                                <input class ="inspection" type="radio" name="tabs" id="tab1" value="1" {{ (old("tabs", $shipment->status_plus->content_check) == "1") ? "checked" : '' }}/>
                                                <label for="tab1">
                                                   <div>
                                                      <span>Passed</span>
                                                   </div>
                                                </label>
                                                <input  class ="inspection" type="radio" name="tabs" id="tab2" value="2" {{ (old("tabs", $shipment->status_plus->content_check) == "2") ? "checked" : '' }}/>
                                                <label for="tab2">
                                                   <div>
                                                      <span >Failed</span>
                                                   </div>
                                                </label>
                                                <span class="">Please open this parcel and check its contents carefully</span>
                                                <div class="tab content1 ">
                                                   <div class="row ">
                                                      <div class="col-sm-10 col-12  align-self-center">
                                                         <h3>You've confirmed that all items are matched, please repacke all items and click the "Next" button </h3>
                                                      </div>
                                                      <div class="col-sm-2 col-12 align-self-center">

                                                         <button class="btn btn-danger btn-block scroll-to" type="button" data-toggle="collapse" data-target="#edit-step2">Next</button>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="tab content2">
                                                   <div class="row ">
                                                      <div class="col-sm-5 col-12">
                                                         <h3>You've found something wrong with this parcel, please describe the issue and take a few photos. </h3>
                                                         
                                                            <legend><h4>What's the issue?</h4></legend>
                                                            <div class="form-check">
                                                               <div class="radio custom">
                                                               <input type="radio" name="issueCode" id="issueCode1" value="1" {{ (old("issueCode", $shipment->status_plus->issue_code) == "1") ? "checked" : '' }} />
                                                               <label for="issueCode1" class='user-select-none'>Has restricted items.</label>
                                                               </div>
                                                            </div>
                                                            <div class="form-check">
                                                               <div class="radio custom">
                                                               <input type="radio" name="issueCode" id="issueCode2" value="2" {{ (old("issueCode", $shipment->status_plus->issue_code) == "2") ? "checked" : '' }} />
                                                               <label for="issueCode2" class='user-select-none'> Contents don't match items description.</label>
                                                               </div> 
                                                            </div>
                                                            <div class="form-check">
                                                               <div class="radio custom">
                                                               <input type="radio" name="issueCode" id="issueCode3" value="3" {{ (old("issueCode", $shipment->status_plus->issue_code) == "3") ? "checked" : '' }} />
                                                               <label for="issueCode3" class='user-select-none'> Content damaged.</label>
                                                               </div> 
                                                            </div>                                                            
                                                            <legend><h4>Remark</h4></legend>
                                                            <div class="form-group">
                                                            <input type="text" class="form-control" id="issueRemark" name="issueRemark" aria-describedby="issueHelp" placeholder="" value = '{{ old("issueRemark", $shipment->status_plus->issue_remark) }}' />
                                                            </div>
                                                            <button id="saveIssue" class="btn btn-danger">Save</button>
                                                            <div id="infoUpdate" class="alert alert-success d-none" role="alert"><h3>Information updated and a notification email has been send to customer. <strong>Please place the parcel in a safe location.</strong></h3>
                                                               <div>Redirectiing in &nbsp;<span class='' id="timeLeft" >5</span>&nbsp;&nbsp; seconds</div>
                                                            </div>
                                                         
                                                </div>
                                 <div class="col-sm-7 col-12">
                                    <div class = "row">
                                       <div class="col-10">
                                          <video id="video" width="480" height="360" autoplay></video>
                                       </div>
                                       <div class="col-2 align-self-center">
                                          <button class="btn btn-secondary" id="snap" style="height:180px; width:100%"" ><i class="fas fa-camera" style = "font-size:2.0rem;"></i></button>
                                       </div>
                                    </div>
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
                              </div>
                              </div>
                              </div>
                              </div>
                              </div>
                              </div>
                              <button class="btn btn-step btn-secondary collapsed" type="button" data-toggle="collapse" data-target="#edit-step2"><span>2</span> Dimension & Weight</button>
                              <div id="edit-step2" class="collapse" aria-labelledby="headingTwo" data-parent="#steps">
                              <div class="pt-3 px-1 pb-1 px-md-1 pt-md-3 bg-white">
                                 <div class="row">
                                    <div class="col-md-4">
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
                                          </table>
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
                                                <td id="paid">{{ $shipment->paid_freight }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ trans('cruds.shipment.fields.outstanding_fee') }}:</th>
                                                <td> {{ $shipment->outstanding_fee }}</td>
                                            </tr>
                                        </table>
                                          <span id="result d-none" style="font-size: 1.5em;"></span>
                                    </div>
                                    <div class="col-md-8">
                                       <form action="">
                                       <div class = "row">
                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <label class="required" for="cargo_length">{{ trans('cruds.shipment.fields.cargo_length') }}</label>
                                                <input class="form-control cargo-dim" type="number" name="cargo_length" id="cargo_length" value="{{ old('cargo_length', $shipment->status_plus->actual_length) }}" step="1"  min="1" max="200" required> 
                                                @if($errors->has('cargo_length'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('cargo_length') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.shipment.fields.cargo_length_helper') }}</span>
                                             </div>
                                          </div>

                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <label class="required" for="cargo_width">{{ trans('cruds.shipment.fields.cargo_width') }}</label>
                                                <input class="form-control  cargo-dim" type="number" name="cargo_width" id="cargo_width" value="{{ old('cargo_width', $shipment->status_plus->actual_width) }}" step="1"  min="1" max="70" required>
                                                @if($errors->has('cargo_width'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('cargo_width') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.shipment.fields.cargo_width_helper') }}</span>
                                             </div>                    
                                          </div>
                                          <div class="col-md-4">
                                             <div class="form-group">
                                                    <label class="required" for="cargo_height">{{ trans('cruds.shipment.fields.cargo_height') }}</label>
                                                    <input class="form-control  cargo-dim" type="number" name="cargo_height" id="cargo_height" value="{{ old('cargo_height', $shipment->status_plus->actual_height) }}" step="1"  min="1" max="70" required>
                                                    @if($errors->has('cargo_height'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('cargo_height') }}
                                                        </div>
                                                    @endif
                                                    <span class="help-block">{{ trans('cruds.shipment.fields.cargo_height_helper') }}</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class = "row">
                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <label class="required" for="cargo_total_weight">Actual Weight</label>
                                                <input class="form-control" type="number" name="cargo_total_weight" id="cargo_total_weight" value='{{ old("cargo_total_weight", $shipment->realweightqty) }}' step="0.1" min="0.1" max="20" required>
                                                @if($errors->has('cargo_total_weight'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('cargo_total_weight') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.shipment.fields.cargo_total_weight_helper') }}</span>
                                             </div>
                                          </div>

                                          <div class="col-md-4  d-none">
                                             <label class="required" for="vol_weight">Volumn weight</label>
                                             <input  class="form-control" readonly="readonly" type="number" name="vol_weight" id="vol_weight" value='{{ old("vol_weight", $shipment->volumeweightqty) }}'>
                                                @if($errors->has('vol_weight'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('vol_weight') }}
                                                    </div>
                                                @endif
                                          </div>
                                          <div class="col-md-4  d-none">
                                             <label class="required" for="chargeable_weight">Chargeable weight</label>
                                             <input  class="form-control" readonly="readonly" type="number" name="chargeable_weight" id="chargeable_weight" value="{{ old('vol_weight', '') }}">
                                                @if($errors->has('chargeable_weight'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('chargeable_weight') }}
                                                    </div>
                                                @endif
                                          </div>
                                       </div>   
                                       <div class = "row">
                                          <div class="col-md-4">
                                             
                                          </div>
                                          <div class="col-md-4  d-none">
                                          <div class="form-group">
                                          <label class="" for="actual_freight">Actual freight</label>
                                          <input  class="form-control" readonly="readonly" type="number" name="actual_freight" id="actual_freight" value="">
                                          </div>
                                          </div>
                                          <div class="col-md-4">
                                          <div class="form-group d-none">
                                          <label class="" for="pending_payment">Pending payment</label>
                                          <input hidden class="form-control" readonly="readonly" type="number" name="pending_payment" id="pending_payment" value="">
                                          </div>
                                          </div>
                                       </div>
                                       <div class = "row">
                                       <div class="col-md-12">
                                          <div class="text-right">
                                             <button  id="freight-calculate"  data-token="{{ $token }}" type="submit" class="btn btn-danger">Submit</button>
                                          </div>
                                          </div>
                                          </div>


                                       </form>

                                    </div>
                                 </div>
                              </div>
                              <div class="p-3 px-md-4 bg-light">
                                 <div class="row">
                                    <div class="col-sm-auto ml-auto">
                                    <div class="btn-group inline">
                                       <h3>{{$shipment->mailno}}</h3>   -
                                    <!--<button class="btn btn-danger btn-block scroll-to" type="button" data-toggle="collapse" data-target="#edit-step1">Back</button>
                                    <button class="btn btn-danger btn-block scroll-to" type="button" data-toggle="collapse" data-target="#edit-step3">Next</button> -->
                                    <?php 
                                    if($shipment->outstanding_fee>0){
                                       echo "<h2>This parcel has outstanding balance, please put it on hold</h2>";
                                    }else{
                                       echo  '<a href="print.html" id="printAWB" class="btn btn-danger btn-block">Print SF Label</a>';
                                    }
                                    
                                    ?>
                                    </div>
                                    </div>
                                 </div>.
                              </div>
                        </div>




                              <button class="btn btn-step btn-secondary collapsed" type="button" data-toggle="collapse" data-target="#edit-step3"><span>3</span> Preferences & References</button>
                              <div id="edit-step3" class="collapse" aria-labelledby="headingThree" data-parent="#steps">
                              <div class="pt-3 px-3 pb-2 px-md-5 pt-md-5 bg-white">
                              <div class="row">
                              <div class="form-group col-12 col-sm-6">
                              <label>Lorem</label>
                              <input class="form-control bg-white" type="text">
                              </div>
                              <div class="form-group col-12 col-sm-6">
                              <label>Ipsum</label>
                              <input class="form-control bg-white" type="text">
                              </div>
                              </div>
                              </div>
                              <div class="p-3 px-md-4 bg-light">
                              <div class="row">
                              <div class="col-sm-auto ml-auto">
                              <button class="btn btn-primary btn-block" type="submit" data-toggle="collapse">Save</button>
                              </div>
                              </div>
                              </div>
                              </div>
                              </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     @endif
                     @else
                        @if(isset($trackingNo))
                           <div class="col-md-12">
                              <div class="pt-3 card" style="height:60vh">
                                 <div class="col-md-12">
                                    <h3>Nothing is found for this number: {{$trackingNo}}</h3>
                                 </div>
                              </div>
                           </div>
                        
                        @else
                           @if (session('status'))
                           <div class="alert alert-success">
                              <h3> {{ session('status') }} </h3>
                           </div>
                           @else
                           <div class="col-md-12">

                              <div class="card" style="height:60vh">
                              <div class="card-header ">
                                 <!-- <img class="inline-block float-left" src="../img/sf-intel-logo.svg" alt="SF International" style="width:2.8rem;"> -->
                              </div>
                                 <div class="col-md-12">
                                    <h3>Scan a parcel to start</h3>
                                 </div>
                              </div>
                           </div>
                           @endif
                        @endif
                     @endif
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
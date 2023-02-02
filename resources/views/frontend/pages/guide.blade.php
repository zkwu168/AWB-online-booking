@extends('layouts.frontend')
@section('content')

    <section class="" style = 'padding-top: 140px;'>
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 data-title-border></h1>
                </div>
            </div>
        </div>
    </section>

<div class="container-lg my-2" >
    <div class="row">
        <div class="col-sm-3" id="myScrollspy">
            <div class="list-group" id="main-menu">
                <a class="list-group-item list-group-item-action nounderline active " href="#section1">Register</a>
                <a class="list-group-item list-group-item-action nounderline" href="#section2">Place order</a>
                <a class="list-group-item list-group-item-action nounderline" href="#section3">Freight Payment</a>
                <a class="list-group-item list-group-item-action nounderline" href="#section4">Others</a>

            </div>
        </div>
        <div class="col-sm-9">
        
            <div class='sec' id="section1">
                <h2 style = "margin-top: 20px">Register</h2>
                <li><p>Click ‘register’ on homepage（www.sf-eu.com）to set up an account. </p></li>
                <img src="{{asset('frontend/img/guide/img1-1.png')}}" alt="" style = "width:70%;height:auto">
            <hr>
                <li><p>Fill out user name, email, password, captcha, then click ‘Register’ and your account will be set up, followed by order placement page.   </p></li>
                <img src="{{asset('frontend/img/guide/img1-2.png')}}" alt="" style = "width:60%;height:auto">
            </div>
            <hr>
            <div class='sec' id="section2">
                <h2>Place order</h2>
                <p>（Red-outlined cells are compulsory to be filled out）</p>
                <li><p>Sequentially click ‘My Order’ ‘Create Order’ on order placement page.</p></li>
                <img src="{{asset('frontend/img/guide/img2-1.png')}}" alt="" style = "width:70%;height:auto">
            <hr>
                <li><p>Fill out basic parcel information to get an estimated freight.</p></li>
                <img src="{{asset('frontend/img/guide/img2-2.png')}}" alt="" style = "width:70%;height:auto">
            <hr>
                <li><p>Fill out information of consignor and consignee. You can click ‘save’ to save such information for later use.</p></li>
                <img src="{{asset('frontend/img/guide/img2-3.png')}}" alt="" style = "width:70%;height:auto">
            <hr>
                <li><p>Fill out content information. Please click DG good list to check prohibited/limited items. You may ‘Add’ line(s) of item description if you post more than 1 items.</p></li>
                <img src="{{asset('frontend/img/guide/img2-4.png')}}" alt="" style = "width:70%;height:auto">
            <hr>
                <li><p>Completing above, you could ‘ Save for Later’ to come back later or ‘Checkout’ to proceed to freight payment page.</p></li>
                <img src="{{asset('frontend/img/guide/img2-5.png')}}" alt="" style = "width:70%;height:auto">

            </div>
            <hr>
            <div class='sec' id="section3">
                <h2>Freight Payment</h2>
                <li><p>Left column of freight payment page is a summary of parcel information for you to check. Right column is payment interface. You can complete payment with your bank card information.</p></li>
                <img src="{{asset('frontend/img/guide/img3-1.png')}}" alt="" style = "width:70%;height:auto">
            <hr>
                <p>Congratulations! You’ve now completed all the order placement procedures. You don’t need to print the label. All you need to do is get the parcel packed and wait for our local partner to contact you for collection. Thank you for choosing SF International service. </p>
            </div>
            <hr>
            <div class='sec' id="section4">
                <h2>Others</h2>
                <li><p>Upload Customs clearance documents: Upon competing order placement, sequentially click 1 Order List→2Order Overview →3 Upload ID Photo to upload receiver’s ID photo to be used for China inbound Customs clearance. </p></li>
                <img src="{{asset('frontend/img/guide/img4-1.png')}}" alt="" style = "width:70%;height:auto">
                <div  style = "height:400px"></div>
            <hr>
            </div>
            <hr>
        </div>
    </div>
</div>



@endsection
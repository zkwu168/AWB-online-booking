<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SFE Internationl | Western Europe</title>

    <meta name="keywords" content="SF International" />
    <meta name="description" content="SFE (Europe)">
    <meta name="author" content="Leon Z.K WU">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">


    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link id="googleFonts"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/animate/animate.compat.css')}}">
  
    

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/theme-elements.css')}}">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="{{asset('/frontend/css/skins/default.css')}}">


    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('/frontend/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/cookie-consent/css/cookie-consent.css')}}">

    <!-- Head Libs -->
    <script src="{{asset('/vendor/modernizr/modernizr.min.js')}}"></script>
    <style>

        body{
            position: relative; /* required */
        }
        
        /* Custom style to stick list group on top */
        .list-group{
            position: sticky;
            top: 200px;
        }
        .sec {
        padding-top:200px;
        margin-top:-200px;
        }

        #footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .page-header {
           
            margin: 0;
            border-bottom: 5px solid #dc1e31;
        }

        .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: #dc1e31;
            border-color: #dc1e31;
        }

        .nounderline {
        text-decoration: none !important
        }

        .img-flag {
            height: .9375rem;
            margin-top: .21875rem;
            vertical-align: top;
            -ms-flex-item-align: start;
            align-self: flex-start;
            margin-right:10px;
        }



        @media (min-width: 992px){
            #header .header-nav.header-nav-dropdowns-dark nav > ul > li.dropdown .dropdown-menu {
                background: #ffffff;
                margin-top: 0;
            }
        }
                </style>
</head>
<!-- <body class="loading-overlay-showing" data-loading-overlay data-plugin-options="{'hideDelay': 500, 'effect': 'cubes'}">-->

<body data-bs-spy="scroll" data-bs-offset="15" data-bs-target="#myScrollspy">
    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="cssload-thecube">
                <div class="cssload-cube cssload-c1"></div>
                <div class="cssload-cube cssload-c2"></div>
                <div class="cssload-cube cssload-c4"></div>
                <div class="cssload-cube cssload-c3"></div>
            </div>
        </div>
    </div>

    <div class="body">

        <header id="header" class="header-transparent header-effect-shrink position-fixed">
            <div class="header-body border-top-0  box-shadow-none" style="background-color: #5e5e5e;">
                <div class="header-container container" style="height: 84px; min-height: 0px;">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="header-row">
                                <div class="header-logo">
                                    <a href="{{ URL::to('/'); }}">
                                        <img alt="SF International" width="160" min-height="76" data-sticky-width="140"
                                            data-sticky-height="67" src="{{ asset('/img/sf-logo-defauld-white.svg')}}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <div
                                    class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
                                    <div
                                        class="header-nav-main header-nav-main-font-lg header-nav-main-font-lg-upper-2 header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                        <nav class="collapse">
                                            <ul class="nav nav-pills" id="mainNav">
                                                <li class="dropdown">
                                                    <a data-hash class="nav-link" href="{{ url('/') }}">
                                                        Home
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-hash data-hash-offset="68"
                                                        href="{{ url('/#strengh') }}">Services</a>
                                                </li>

                                                <li>
                                                    <a class="nav-link" data-hash data-hash-offset="68"
                                                        href="{{ url('/#announcement') }}">Announcement</a>
                                                </li>

                                                <li>
                                                    <a class="nav-link" data-hash data-hash-offset="68"
                                                        href="{{ url('/#contact') }}">Contact Us</a>
                                                </li>
          <li class="nav-item nav-item-dropdown-lg dropdown">
          <a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle" data-toggle="dropdown">
            <img class="align-middle me-2" src="../../../../global_assets/images/lang/{{strtoupper(app()->getLocale())}}.png"  alt="">
            <span class="d-none d-lg-inline-block ml-2">{{ strtoupper(app()->getLocale())=="EN" ? "English" : "简体中文" }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">

            <a class="dropdown-item english " href="{{ url()->current() }}?change_language=en ">
              <img src="../../../../global_assets/images/lang/EN.png" class="img-flag" alt="">English</a>

            <a class="dropdown-item zh-hans" href="{{ url()->current() }}?change_language=zh-hans ">
              <img src="../../../../global_assets/images/lang/ZH-HANS.png" class="img-flag" alt="">简体中文</a>
          </div>
        </li>



                                                @if (Route::has('login'))

                                                @auth
                                                <li>
                                                    <a href="{{ url('/home') }}" class="nav-link" data-hash
                                                        data-hash-offset="68">{{ Auth::user()->name }}</a>
                                                </li>
                                                @else
                                                <li>
                                                    <a href="{{ route('login') }}" class="nav-link" data-hash
                                                        data-hash-offset="0">Login</a>
                                                </li>
                                                @endauth
                                                @endif
                                            </ul>
                                        </nav>
                                    </div>
                                    <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse"
                                        data-bs-target=".header-nav-main nav">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@yield('pageTitle')
        </header>

        <div role="main" class="main">
            @yield('content')
        </div>

        <footer id="footer" class="mt-0">
            <div class="footer-copyright">
                <div class="container">
                    <div class="row py-2">
                        <div class="col d-flex align-items-center justify-content-center">
                            <p style="color:#dc1e31"><strong>SF Express (Europe) Co. Ltd</strong> - © Copyright 2021.
                                All Rights Reserved.</p>
                            <a href="javascript:void(0)" class="js-lcc-settings-toggle">&nbsp&nbsp&nbsp&nbsp&nbspCookie
                                @lang('cookie-consent::texts.alert_settings')</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <!-- Vendor -->
    <script src="{{ asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
    $('#refresh-captcha').click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function(data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
    </script>

</body>

</html>
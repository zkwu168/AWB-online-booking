<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SFE Internationl | Western Europe</title>

    <meta name="keywords" content="SF Int." />
    <meta name="description" content="build for SFE (Europe)">
    <meta name="author" content="Leon Z.K. WU ">
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
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="frontend/css/theme.css">
    <link rel="stylesheet" href="frontend/css/theme-elements.css">


    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="frontend/css/skins/default.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="frontend/css/custom.css">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/cookie-consent/css/cookie-consent.css')}}">

	<!-- Head Libs -->
	<script src="vendor/modernizr/modernizr.min.js"></script>

</head>
	<!-- <body class="loading-overlay-showing" data-loading-overlay data-plugin-options="{'hideDelay': 500, 'effect': 'cubes'}">-->
	<body id="body" class="one-page alternative-font-5" data-plugin-scroll-spy data-plugin-options="{'target': '#header'}"> 
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

        <header id="header" class="header-transparent header-effect-shrink"
            data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
            <div class="header-body border-top-0 box-shadow-none" style = "background-color: #000;">
                <div class="header-container container" style="height: 84px; min-height: 0px;">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="header-row">
                                <div class="header-logo">
                                    <a href="{{ URL::to('/'); }}">
                                        <img alt="SF International" width="160" height="76" data-sticky-width="140"
                                            data-sticky-height="67" src="img/sf-logo-defauld-white.svg">
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
                                                    <a data-hash class="nav-link active" href="#home">
                                                        Home
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-hash data-hash-offset="68"
                                                        href="#strengh">Services</a>
                                                </li>

                                                <li>
                                                    <a class="nav-link" data-hash data-hash-offset="68"
                                                        href="#announcement">Announcement</a>
                                                </li>

                                                <li>
                                                    <a class="nav-link" data-hash data-hash-offset="68"
                                                        href="#contact">Contact Us</a>
                                                </li>

                                                @if (Route::has('login')) 

                                                @auth
                                                <li>
                                                    <?php 
                                                    $role = (Auth::User()->roles()->get())[0]->title;
                                                        if( $role == 'SFWA'){
                                                            $url='/warehouse';
                                                        }else{
                                                            $url='/home';
                                                        }
                                                    ?>
                                                    <a href="{{url($url)}}" class="nav-link" data-hash
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
        </header>

			<div role="main" class="main">
				<div id="home" class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover mb-0" data-plugin-options="{'autoplayTimeout': 7000}" style="height: 60vh;">
					<div class="owl-stage-outer">
						<div class="owl-stage">

							<!-- Carousel Slide 1 -->
							<div class="owl-item position-relative overlay overlay-show overlay-op-2 pt-5" style="background-image: url(img/slides/corporate-1.png); background-size: cover; background-position: center; background-color: #35383d;">
								<div class="container position-relative z-index-3 h-100">
									<div class="row justify-content-center align-items-center h-100">
										<div class="col-lg-6">
											<div class="d-flex flex-column align-items-center py-4" style = "background-color: #5c5e61; opacity: 0.9;">
												<h3 class="position-relative text-color-light text-5 line-height-5 font-weight-medium px-4 mb-2 appear-animation" data-appear-animation="fadeInDownShorterPlus" data-plugin-options="{'minWindowWidth': 0}">
													<span class="position-absolute right-100pct top-50pct transform3dy-n50 opacity-3">
														<img src="img/slides/slide-title-border.png" class="w-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
													</span>
													International Express Service
													<span class="position-absolute left-100pct top-50pct transform3dy-n50 opacity-3">
														<img src="img/slides/slide-title-border.png" class="w-auto appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
													</span>
												</h3>
												<h4 class="text-color-light font-weight-bold text-11 mb-3 appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">Your Key to Asia</h4>
												<p class="text-4 text-color-light font-weight-light opacity-7 text-center mb-0" data-plugin-animated-letters data-plugin-options="{'startDelay': 1000, 'minWindowWidth': 0, 'animationSpeed': 25}">Deliver on Our Every Promise</p>
											</div>
										</div>
										<div class="col-lg-6">

										</div>
									</div>
								</div>
							</div>

							<!-- Carousel Slide 2 -->
							<div class="owl-item position-relative overlay overlay-show overlay-op-3 pt-5" style="background-image: url(img/slides/corporate-2.png); background-size: cover; background-position: center;">
								<div class="container position-relative z-index-3 h-100">
									<div class="row justify-content-center align-items-center h-100">
										<div class="col-lg-8">
											<div class="d-flex flex-column align-items-center py-4" style = "background-color: #5c5e61; opacity: 0.9;">
												<h3 class="position-relative text-color-light text-5 line-height-5 font-weight-medium px-4 mb-2 appear-animation" data-appear-animation="fadeInDownShorterPlus" data-plugin-options="{'minWindowWidth': 0}">
													<span class="position-absolute right-100pct top-50pct transform3dy-n50 opacity-3">
														<img src="img/slides/slide-title-border.png" class="w-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
													</span>
													Safe and Reliable 
													<span class="position-absolute left-100pct top-50pct transform3dy-n50 opacity-3">
														<img src="img/slides/slide-title-border.png" class="w-auto appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
													</span>
												</h3>
												<h4 class="text-color-light font-weight-bold text-11 mb-3 appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">Professional Team</h4>
												<p class="text-4 text-color-light font-weight-light opacity-7 text-center px-4 mb-0" data-plugin-animated-letters data-plugin-options="{'startDelay': 1000, 'minWindowWidth': 0, 'animationSpeed': 25}">Ensuring shipment safety by standard operation practices, professional pre and after sales customer services</p>
											</div>
										</div>
										<div class="col-lg-4">

										</div>
									</div>
								</div>
							</div>

							<!-- Carousel Slide 3 -->
							<div class="owl-item position-relative overlay overlay-show overlay-op-2 pt-5" style="background-image: url(img/slides/corporate-3.png); background-size: cover; background-position: center;">

								<div class="position-relative z-index-3">
									<div class="row justify-content-center align-items-center h-100">
										<div class=" position-relative py-sm-5 my-5">
											<svg class="custom-svg-1 d-none d-sm-block appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="800" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink viewBox="-82.031 -211.197 861.011 892.19" width="861.011" height="892.19">
											<path d="M -77.213 215.375 L 281.237 672.335 C 288.947 682.165 303.157 683.875 312.987 676.175 L 769.947 317.725 C 779.777 310.015 781.487 295.805 773.787 285.975 L 415.337 -170.985 C 407.627 -180.815 393.417 -182.525 383.587 -174.825 L -73.373 183.625 C -83.203 191.335 -84.913 205.545 -77.213 215.375 Z" style="fill: rgb(210, 210, 210); paint-order: fill;"></path>
											<path class="st0" d="M 418.077 123.664 C 418.077 143.084 433.489 158.394 452.909 158.394 C 471.609 158.394 486.919 142.981 486.919 123.664 C 486.919 104.245 472.226 89.552 452.909 89.552 C 433.489 89.552 418.077 104.245 418.077 123.664 Z" style="fill: rgb(211, 11, 36); fill-opacity: 0.05;"></path>
											<path d="M 317.176 -138.964 C 381.395 -138.964 440.784 -121.599 492.981 -91.494 L 553.09 -138.964 C 486.302 -184.482 404.719 -211.197 317.176 -211.197 C 229.633 -211.197 148.153 -184.482 81.263 -138.964 L 141.474 -91.494 C 193.568 -121.599 253.06 -138.964 317.176 -138.964 Z" style="fill-opacity: 0.05;"></path>
											<path d="M 317.176 374.271 C 253.06 374.271 193.568 356.907 141.474 326.801 L 81.263 374.271 C 148.153 419.687 229.633 446.402 317.176 446.402 C 404.719 446.402 486.302 419.687 553.09 374.271 L 492.981 326.801 C 440.784 356.907 381.395 374.271 317.176 374.271 Z" style="fill-opacity: 0.05;"></path>
											<path d="M 60.507 117.602 C 60.507 53.486 77.872 -6.725 107.978 -58.203 L 60.507 -118.311 C 15.092 -51.421 -11.623 30.059 -11.623 117.602 C -11.623 205.145 15.092 286.009 60.507 353.516 L 107.978 292.688 C 77.872 241.313 60.507 181.821 60.507 117.602 Z" style="fill-opacity: 0.05;"></path>
											<path d="M 526.375 -58.1 C 556.481 -6.622 573.845 53.486 573.845 117.705 C 573.845 181.924 556.481 241.313 526.375 292.791 L 573.845 353.619 C 619.261 286.112 645.976 205.248 645.976 117.602 C 645.976 30.059 619.261 -51.524 573.743 -118.311 L 526.375 -58.1 Z" style="fill-opacity: 0.05;"></path>
											<path d="M 206.206 223.948 C 160.688 223.948 132.638 195.898 125.342 186.547 L 121.335 182.54 L 121.335 188.602 L 121.335 245.32 L 121.335 246.656 L 122.054 247.273 C 148.153 265.973 177.539 275.323 210.933 275.323 C 236.312 275.323 259.123 267.309 275.152 252.616 C 291.181 237.922 301.147 213.879 301.147 189.835 C 301.147 133.015 251.005 106.916 221.619 91.607 L 217.612 89.552 C 194.904 78.146 176.923 68.796 176.923 53.486 C 176.923 41.465 181.546 32.731 192.335 28.107 C 199.63 24.819 209.083 22.764 220.386 22.764 C 244.429 22.764 270.425 31.498 285.838 45.472 L 289.845 48.863 L 289.845 44.239 L 289.845 -4.67 L 289.845 -6.006 L 289.228 -6.622 C 285.221 -10.013 262.513 -26.659 217.714 -26.659 C 215.762 -26.659 212.988 -26.659 211.036 -26.659 C 158.941 -24.604 121.541 8.79 121.541 53.589 C 121.541 103.731 160.277 121.815 193.774 137.844 L 195.726 139.18 C 222.441 151.921 245.868 164.559 245.868 187.369 C 245.662 198.466 241.655 223.948 206.206 223.948 Z" style="fill-opacity: 0.05;"></path>
											<path d="M 513.017 48.143 L 513.017 44.136 L 513.017 -6.006 L 513.017 -6.622 L 512.298 -7.342 C 512.298 -8.061 484.864 -27.378 432.153 -27.378 C 382.731 -27.378 335.877 -9.294 333.822 -8.677 L 332.486 -7.958 L 332.486 -6.622 L 332.486 274.707 L 332.486 277.378 L 334.541 277.378 L 386.635 277.378 L 388.587 277.378 L 388.587 274.707 L 388.587 34.067 L 388.587 32.731 L 389.923 32.731 C 397.218 30.059 412.631 24.716 435.339 24.716 C 435.955 24.716 437.394 24.716 438.01 24.716 C 481.473 26.052 504.797 42.081 509.524 45.472 L 513.017 48.143 Z" style="fill-opacity: 0.05;"></path>
											</svg>

											<div class="row mb-5 p-relative z-index-1">
												<div class="col-lg-4 py-5 my-5">
													<div class="d-flex flex-column align-items-center py-4" style = "background-color: #5c5e61; opacity: 0.7;">
														<h3 class="position-relative text-color-light text-5 line-height-5 font-weight-medium px-4 mb-2 appear-animation" data-appear-animation="fadeInDownShorterPlus" data-plugin-options="{'minWindowWidth': 0}">
															<span class="position-absolute right-100pct top-50pct transform3dy-n50 opacity-3">
																<img src="img/slides/slide-title-border.png" class="w-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
															</span>
															peace of mind
															<span class="position-absolute left-100pct top-50pct transform3dy-n50 opacity-3">
																<img src="img/slides/slide-title-border.png" class="w-auto appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
															</span>
														</h3>
														<h4 class="text-color-light font-weight-bold text-11 mb-3 appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">End to end Visibility</h4>
														<p class="text-4 text-color-light font-weight-light opacity-8 text-center mb-0 px-4" data-plugin-animated-letters data-plugin-options="{'startDelay': 1000, 'minWindowWidth': 0, 'animationSpeed': 25}">Full tracking and tracing from the origin to warehouse to consumer's designated address by one waybill number</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Carousel Slide 4 -->
							<div class="owl-item position-relative overlay overlay-show overlay-op-2 pt-5" style="background-image: url(img/slides/corporate-4.png); background-size: cover; background-position: center;">
								<div class="container position-relative z-index-3 h-100">
									<div class="row justify-content-center align-items-center h-100">
										<div class="col-lg-6"></div>
										<div class="col-lg-6">
											<div class="d-flex flex-column align-items-center py-4" style = "background-color: #5c5e61; opacity: 0.9;">
												<h3 class="position-relative text-color-light text-5 line-height-5 font-weight-medium px-4 mb-2 appear-animation" data-appear-animation="fadeInDownShorterPlus" data-plugin-options="{'minWindowWidth': 0}">
													<span class="position-absolute right-100pct top-50pct transform3dy-n50 opacity-3">
														<img src="img/slides/slide-title-border.png" class="w-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
													</span>
													DOOR TO DOOR SERVICE
													<span class="position-absolute left-100pct top-50pct transform3dy-n50 opacity-3">
														<img src="img/slides/slide-title-border.png" class="w-auto appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
													</span>
												</h3>
												<h4 class="text-color-light font-weight-bold text-11 mb-3 appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">Distribution coverage</h4>
												<p class="text-4 text-color-light font-weight-light opacity-8 text-center mb-0 px-4" data-plugin-animated-letters data-plugin-options="{'startDelay': 1000, 'minWindowWidth': 0, 'animationSpeed': 25}">Available from Europe to broad network of 30+ provinces in Mainland China</p>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="owl-dots mb-5">
						<button role="button" class="owl-dot active"><span></span></button>
						<button role="button" class="owl-dot"><span></span></button>
						<button role="button" class="owl-dot"><span></span></button>
						<button role="button" class="owl-dot"><span></span></button>
					</div>
				</div>


				<section id="services" class="bg-primary border-0 m-0 appear-animation" data-appear-animation="fadeIn"  >
					<div class="container" style = "height: 68px;">
						<div class="row p-0" style = "height:100%; padding-right:0;">
	
							<div class="col d-inline-flex p-0"  >
								<a class="quicklink justify-content-center "   href="{{ url('/guide')}}">
										<div class="align-self-center "><i class="fa fa-info-circle " aria-hidden="true"></i></div>
										<span class="align-self-center d-none d-md-block">Guide</span>
								</a>
								<div class="outer">
									<div class="inner" ></div>
								</div>
							</div>
							
							<div class="col d-inline-flex p-0" >
								<a class="quicklink justify-content-center" href="" type="button" class="" data-bs-toggle="modal" data-bs-target="#freightInquiry" id="trigerModal">
										<span class="align-self-center "><i class="fa fa-calculator circle-icon" aria-hidden="true"></i></span>
										<span class="align-self-center d-none d-md-block">Quote</span>
								</a>
								<div class="outer  d-none d-md-block">
									<div class="inner" ></div>
								</div>
							</div>
	
							<div class="col d-inline-flex p-0" >
								<a class="quicklink justify-content-center"  href="{{url('/register')}}">
									<span class="align-self-center"><i class="fa fa-user" aria-hidden="true"></i></span>
									<span class="align-self-center d-none d-md-block">Register</span>
								</a>
								<div class="outer">
									<div class="inner" ></div>
								</div>
							</div>

							<div class="col d-inline-flex p-0">
								<a class="quicklink justify-content-center"  href="{{url('/login')}}">
									<span class="align-self-center"><i class="fa fa-th-large justify-content-center" aria-hidden="true"></i></span>
									<span class="align-self-center d-none d-md-block">Place Order</span>
								</a>
							</div>
						</div>
					</div>

				</section>


				<section id="strengh" class="section section-height-3 border-0 m-0 appear-animation" data-appear-animation="fadeIn" style = "background-color: #ffffff;">
                    <div class="container my-3">
                        <div class="row mb-3">
                            <div class="col text-center appear-animation" data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="200">
                                <h1 class="font-weight-bold mb-2">International Parcel Delivery</h1>
                                <p class="font-weight-light">Use SF's Strength and Find New Opportunities with SF Express</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 appear-animation" style="padding-left: 6rem;" data-appear-animation="fadeInLeftShorter"
                                data-appear-animation-delay="300">
                                <div class="feature-box-style-1">
                                    <div class="font-weight-light">
                                        <i class="icons icons-outline fas fa-handshake" aria-hidden="true"></i>
                                    </div>
                                    <div class="">
                                        <h4 class="font-weight-bold  text-6 mt-3 mb-2">Trust</h4>
                                        <p class="">Leverage logistics <br>partner's brand <br>to create trust</p>
                                    </div>
                                </div>
                                <div class="feature-box-style-2">
                                    <div class="">
                                    <i class="icons icons-outline fas fa-users" aria-hidden="true"></i>
                                    </div>
                                    <div class="">
                                        <h4 class="font-weight-bold text-6 mt-3 mb-2">Customer Service</h4>
                                        <p class="">Full tracking and tracing <br>Stable and convenient service <br>Enhance customer satisfaction</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 d-sm-none d-xs-none d-md-block appear-animation" data-appear-animation="fadeInUpShorter">
                                <div class="row h-100 py-3 align-items-center ">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img classs="align-self-center appear-animation"  data-appear-animation="rotateIn" src="frontend/img/section1-1.png" style="height:auto; max-width:80%; border:none; display:block;" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 appear-animation" style="padding-right: 6rem;"  data-appear-animation="fadeInRightShorter"
                                data-appear-animation-delay="300">
                                <div class="feature-box-style-1">
                                    <div class="" style = " float: right !important;display:block;">
                                        <i class="icons icons-outline fa fa-hand-holding-usd" aria-hidden="true"></i>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="">
                                        <h4 class="font-weight-bold text-6  mt-3 mb-2" style = "text-align:right;">Price</h4>
                                        <p class="" style = "text-align:right;">Logistics cost could be used <br>as promotion tool to <br>encourage
                                            purchase</p>
                                    </div>
                                </div>
                                <div class="feature-box-style-2">
                                    
                                    <div class=""  style = " float: right !important;display:block;">

                                    <i class='icons icons-outline fa fa-shipping-fast'></i>

                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="" style = " float: right !important; display: block;" >
                                        <h4 class="font-weight-bold text-6  mt-3 mb-2" style = "text-align:right;">Logistics</h4>
                                        <p class="" style = "text-align:right;">Quality transportation <br>Stability <br>Visibility and tracking
                                        <br>Smooth custom clearance</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

				<section id="announcement" class="section bg-tertiary section-height-3 border-0 m-0 appear-animation" data-appear-animation="fadeIn">
					<div class="container my-3">
						<div class="row">
							<div class="col text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
								<h2 class="font-weight-bold mb-4">Talents wanted!</h2>
								<p class="text-6 opacity-8 mb-5">SF International WEU region is looking for new members to join the team! </p>
                                <a href ="{{ url('/vacancies')}}" class="btn btn-primary btn-rounded font-weight-semibold px-5 btn-py-2 text-2 " >FIND OUT MORE</a>
                            </div>
						</div>
					</div>
				</section>


				<section id="contact" class="section bg-color-grey-scale-1 border-0 py-0 m-0">
					<div class="container-fluid">
						<div class="row">
                        <div class="col-lg-6 appear-animation p-0" data-appear-animation="fadeInRightShorter"
                            data-appear-animation-delay="200">
								<!-- Google Maps - Settings on footer -->
                                <div id="googlemaps" class="google-map h-100 m-0" style="min-height: 400px;"></div>
                        </div>
							<div class="col-md-6 p-5 my-5">

								<div class="px-4">
									<h2 class="font-weight-bold line-height-1 mb-2">Contact Us</h2>
									<p class="text-3 mb-4">Get in touch</p>
                                    @if(Session::has('success'))
                                        <div class="alert alert-success">
                                            {{Session::get('success')}}
                                        </div>
                                    @endif
                                    <form class="contact-form form-style-2 pe-xl-5" action="{{ route('contact.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="contact-form-success alert alert-success d-none mt-4">
                                        <strong>Success!</strong> Your message has been sent to us.
                                    </div>

                                    <div class="contact-form-error alert alert-danger d-none mt-4">
                                        <strong>Error!</strong> There was an error sending your message.
                                        <span class="mail-error-message text-1 d-block"></span>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-4">
                                            <input type="text" value="" data-msg-required="Please enter your name."
                                                maxlength="100" class="form-control" name="name" placeholder="Name"
                                                required>
                                        </div>
                                        <div class="form-group col-xl-8">
                                            <input type="email" value=""
                                                data-msg-required="Please enter your email address."
                                                data-msg-email="Please enter a valid email address." maxlength="100"
                                                class="form-control" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <input type="text" value="" data-msg-required="Please enter the subject."
                                                maxlength="100" class="form-control" name="subject"
                                                placeholder="Subject" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <textarea maxlength="5000" data-msg-required="Please enter your message."
                                                rows="4" class="form-control" name="message" placeholder="Message"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">

										<div class="form-group col-xl-4 float-left">
                                            <input type="text" value="" data-msg-required="Please enter captcha."
                                                maxlength="100" class="form-control" name="captcha" placeholder="Enter captcha"
                                                required>
                                        </div>
                                        <div class="form-group col-xl-4">
											<div class="captcha1" >
												<span class="refresh-captcha" id="refresh-captcha" >{!! captcha_img() !!}</span>
 
											</div>
											@if($errors->has('captcha'))
												<div class="invalid-feedback">
													{{ $errors->first('captcha') }}
												</div>
											@endif
                                        </div>
										
                                        <div class="form-group col-xl-4 float-right">
                                            <input type="submit" value="SUBMIT"
                                                class="btn btn-primary btn-rounded font-weight-semibold px-5 btn-py-2 text-2"
                                                data-loading-text="Loading..."  style="float:right">
                                        </div>
                                    </div>
                                </form>
								</div>

							</div>
						</div>
					</div>
				</section>
<div class="bg-primary " style="height:8px"></div>
				<section id="address" class="section bg-secondary  border-0 m-0">
					<div class="container">
						<div class="row justify-content-center text-center text-lg-start py-1">
							<div class="col-lg-auto appear-animation" data-appear-animation="fadeInRightShorter">
								<div class="feature-box feature-box-style-2 d-block d-lg-flex mb-4 mb-lg-0">
									<div class="feature-box-icon">
										<i class="icon-location-pin icons text-color-light"></i>
									</div>
									<div class="feature-box-info ps-1">
										<h3 class="font-weight-light text-color-light opacity-8 mb-3">ADDRESS</h3>
                                        <p class="text-color-light text-4 mb-0">
                                            286123 Bath Road<br>
                                            West Drayton,&nbsp&nbsp <br>
                                            United Kingdom
                                        </p>
										
									</div>
								</div>
							</div>
							<div class="col-lg-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
								<div class="feature-box feature-box-style-2 d-block d-lg-flex mb-4 mb-lg-0 px-xl-4 mx-lg-5">
									<div class="feature-box-icon">
										<i class="icon-call-out icons text-color-light"></i>
									</div>
									<div class="feature-box-info ps-1">
                                    <h3 class="font-weight-light text-color-light opacity-8 mb-3">CALL US NOW</h3>
                                    <p class="text-color-light text-5 mb-0">Coming soon</p>
									</div>
								</div>
							</div>
							<div class="col-lg-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
								<div class="feature-box feature-box-style-2 d-block d-lg-flex">
									<div class="feature-box-icon">
										<i class="icon-clock icons text-color-light"></i>
									</div>
									<div class="feature-box-info ps-1">
                                    <h3 class="font-weight-light text-color-light opacity-8 mb-3">Opening Hours</h3>
                                    <p class="text-color-light text-5 mb-0">MON - FRI: 9:00am - 6:00pm</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div> 

            <footer id="footer" class="mt-0">
                <div class="footer-copyright" style = "background-color: #222222;">
                    <div class="container">
                        <div class="row py-2">
                            <div class="col d-flex align-items-center justify-content-center">
                                <p  style ="color:#DC1E32"><strong>xxx Express (Europe) Co. Ltd</strong> - © Copyright 2021. All Rights Reserved.</p>
                                <a href="javascript:void(0)" class="js-lcc-settings-toggle">&nbsp&nbsp&nbsp&nbsp&nbspCookie
                                    @lang('cookie-consent::texts.alert_settings')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

		</div>
    
        <!-- Modal -->
        <div class="modal fade" id="freightInquiry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-slideout modal-lg  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Freight inquiry</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                style="color: #fff"></button>
                        </div>
                        <div class="modal-body">
                            <div style="margin:0 18px 0 18px">
                                <form action="form.php" method="POST" class="js-form-submit needs-validation "
                                    novalidate>
                                    <div class="form-group row">
                                        <label for="select" class="col-3 col-md-2 col-form-label">发件：</label>
                                        <div class="col-9 col-md-4">
                                            <select id="select" name="shipFrom" class="form-select">
                                                <option value="1">英国</option>
                                            </select>
                                        </div>

                                        <label for="select1" class="col-3 col-md-2 col-form-label">收件：</label>
                                        <div class="col-9 col-md-4">
                                            <select id="select1" name="shipTo" class="form-select">
                                                <option value="1">中国内地</option>
                                                <option value="2">中国台湾</option>
                                                <option value="3">中国香港</option>
                                                <option value="4">中国澳门</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-md-2 col-form-label" for="text">重量(kg)：</label>
                                        <div class="col-9 col-md-10 ">
                                            <div class="input-group align-items-center">
                                                <span id="range1Result" class="input-tag">0.1</span>
                                                <input name="parcelWeight" type="range" class="form-range" min="0.1"
                                                    max="20.0" step="0.1" value="0.1" id="range1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3 col-md-2 col-form-label" for="text">长(cm)：</label>
                                        <div class="col-9 col-md-10">
                                            <div class="input-group align-items-center">
                                                <span id="range2Result" class="input-tag">1</span>
                                                <input name="parcelLenght" type="range" class="form-range dimValue"
                                                    min="1" max="200" step="1" value="1" id="range2">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-md-2 col-form-label" for="text">宽(cm)：</label>
                                        <div class="col-9 col-md-10">
                                            <div class="input-group align-items-center">
                                                <span id="range3Result" class="input-tag">1</span>
                                                <input name="parcelWidth" type="range" class="form-range dimValue"
                                                    min="1" max="70" step="1" value="1" id="range3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-md-2 col-form-label" for="text">高(cm)：</label>
                                        <div class="col-9 col-md-10">
                                            <div class="input-group align-items-center">
                                                <span id="range4Result" class="input-tag">1</span>
                                                <input name="parcelHeight" type="range" class="form-range dimValue"
                                                    min="1" max="80" step="1" value="1" id="range4">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="text2" class="col-3 col-md-2 col-form-label">体积重量:</label>
                                        <div class="col-9 col-md-4">
                                            <div class="input-group">
                                                <!-- <input id="number" name="parcelWeight" type="text" class="form-control number" required="required" step="0.5" placeholder="0.00" autocomplete="off">  -->
                                                <input id="volWeight" name="volWeight" type="hidden"
                                                    class="form-control number">

                                                <div class="input-group-append">
                                                    <p class="col-form-label" id="volWeightP"
                                                        style="margin-left: 0.9rem;"></p>
                                                    <!-- <div class="input-group-text">kg</div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <label for="text2" class="col-3 col-md-2 col-form-label">预计费用:</label>
                                        <div class="col-9 col-md-4">
                                            <p class="col-form-label" id="result" style='height: 2.5em;'></p>
                                        </div>

                                    </div>

                                    <div class="form-group row" style="/*margin-top: 1em;*/">
                                        <div class="col-12 offset-md-6 col-md-6">
                                            <button name="submit" type="submit" class="btn btn-primary float-end"
                                                id="quoteInquiry">提交查询</button>
                                        </div>
                                    </div>
                                </form>

                            </div>


                        </div><!--  Modal Body End -->
                    </div>
                </div>
        </div>
		<!-- Vendor -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="vendor/jquery.validation/jquery.validate.min.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="vendor/lazysizes/lazysizes.min.js"></script>
		<script src="vendor/isotope/jquery.isotope.min.js"></script>
		<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="vendor/vide/jquery.vide.min.js"></script>
		<script src="vendor/vivus/vivus.min.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="frontend/js/theme.js"></script>



		<!-- Theme Custom -->
		<script src="frontend/js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="frontend/js/theme.init.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaxxxxxxxxxxxxxxxxxxxxxxxxxxodpMg"></script>
<script>


/*
        Map Settings

            Find the Latitude and Longitude of your address:
                - https://www.latlong.net/
                - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

        */

function initializeGoogleMaps() {
    // Map Markers
    
    var mapMarkers = [{
        address: "SF Express (Europe)",
        html: "<strong>SF Express (Europe) Office</strong><br>286 Bath Road<br><br><a href='#' onclick='mapCenterAt({latitude: 51.4814671, longitude: -0.4630174, zoom: 16}, event)'>[+] zoom here</a>",
        icon: {
            image: "https://sf-eu.test/img/pin1.PNG",
            iconsize: [26, 46],
            iconanchor: [12, 46]
        }
    }];

    // Map Initial Location
    var initLatitude = 51.4814671;
    var initLongitude = -0.4630174;

    // Map Extended Settings
    var mapSettings = {
        controls: {
            draggable: (($.browser.mobile) ? false : true),
            panControl: true,
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: true,
            streetViewControl: true,
            overviewMapControl: true
        },
        scrollwheel: false,
        markers: mapMarkers,
        latitude: initLatitude,
        longitude: initLongitude,
        zoom: 12
    };

    var map = $('#googlemaps').gMap(mapSettings),
        mapRef = $('#googlemaps').data('gMap.reference');

    // Styles from https://snazzymaps.com/
    var styles = [{
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [{
            "color": "#e9e9e9"
        }, {
            "lightness": 17
        }]
    }, {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [{
            "color": "#f5f5f5"
        }, {
            "lightness": 20
        }]
    }, {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [{
            "color": "#ffffff"
        }, {
            "lightness": 17
        }]
    }, {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [{
            "color": "#ffffff"
        }, {
            "lightness": 29
        }, {
            "weight": 0.2
        }]
    }, {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [{
            "color": "#ffffff"
        }, {
            "lightness": 18
        }]
    }, {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [{
            "color": "#ffffff"
        }, {
            "lightness": 16
        }]
    }, {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [{
            "color": "#f5f5f5"
        }, {
            "lightness": 21
        }]
    }, {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [{
            "color": "#dedede"
        }, {
            "lightness": 21
        }]
    }, {
        "elementType": "labels.text.stroke",
        "stylers": [{
            "visibility": "on"
        }, {
            "color": "#ffffff"
        }, {
            "lightness": 16
        }]
    }, {
        "elementType": "labels.text.fill",
        "stylers": [{
            "saturation": 36
        }, {
            "color": "#333333"
        }, {
            "lightness": 40
        }]
    }, {
        "elementType": "labels.icon",
        "stylers": [{
            "visibility": "off"
        }]
    }, {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [{
            "color": "#f2f2f2"
        }, {
            "lightness": 19
        }]
    }, {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [{
            "color": "#fefefe"
        }, {
            "lightness": 20
        }]
    }, {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [{
            "color": "#fefefe"
        }, {
            "lightness": 17
        }, {
            "weight": 1.2
        }]
    }];

    var styledMap = new google.maps.StyledMapType(styles, {
        name: 'Styled Map'
    });

    mapRef.mapTypes.set('map_style', styledMap);
    mapRef.setMapTypeId('map_style');
}

// Initialize Google Maps when element enter on browser view
//theme.fn.intObs('.google-map', 'initializeGoogleMaps()', {});

// Map text-center At
var mapCenterAt = function(options, e) {
    e.preventDefault();
    $('#googlemaps').gMap("centerAt", options);
}
</script>

<script>
function initMap() {
const myLatLng = { lat: 51.481525, lng:-0.462339 };
const map = new google.maps.Map(document.getElementById("googlemaps"), {
zoom: 6,
center: myLatLng,
});
var icon = {
url: "favicon.ico", // url
scaledSize: new google.maps.Size(24, 24), // scaled size
origin: new google.maps.Point(0,0), // origin
anchor: new google.maps.Point(0, 0) // anchor
};
const marker = new google.maps.Marker({
position: myLatLng,
map,
title: "SF Express <br> Click to zoom",
icon: icon // null = default icon
});



map.addListener("center_changed", () => {
// 3 seconds after the center of the map has changed, pan back to the marker.
window.setTimeout(() => {
  map.panTo(marker.getPosition());
}, 3000);
});
marker.addListener("click", () => {
map.setZoom(16);
map.setCenter(marker.getPosition());
});

}
initMap();


$('#refresh-captcha').click(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha1 span").html(data.captcha);
            }
        });
    });


</script>



<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        $("#result").html('Please wait......');
                        event.preventDefault();
                        var values = $(this).serialize();
                        $.ajax({
                            url: "freightcost.php",
                            type: "post",
                            data: values,
                            success: function(res) {
                                $("#result").html(res);
                                //alert('Form submitted successfully...')
                                console.log(res)
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr.responseText);
                            }
                        });

                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();


    $('#triggerBtn').on('click', function(e) {

        $(this).css('transform', 'translate(128px, 0px)');
    })
    $('#freightInquiry').on('hidden.bs.modal', function(e) {

        $('#triggerBtn').css('transform', 'translate(64px, 0px)');

    })

    $('.number').keypress(function(event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });




    function round(value, decimals) {
        return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
    }


    var $userAgent = '';
    if (/MSIE/i ['test'](navigator['userAgent']) == true || /rv/i ['test'](navigator['userAgent']) == true || /Edge/i [
            'test'
        ](navigator['userAgent']) == true) {
        $userAgent = 'ie';
    } else {
        $userAgent = 'other';
    }



    $('input[type="range"]').on('change input', function() {
        //alert(this.value);
        $(this).prev().html(this.value);
        $("#result").html('');
        calculateVolWeight();
    });

    function calculateVolWeight() {
        var sum = 1;
        $('.dimValue').each(function() {
            sum *= Number($(this).val());

        });
        $('#volWeight').val(round(sum / 5000, 2));
        $('#volWeightP').html(round(sum / 5000, 2) + " kg");
    }
    </script>

	</body>
</html>

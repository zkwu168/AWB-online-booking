<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ trans('panel.site_title') }}</title>

  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="../../../../global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
  <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
  <link href="../../../../assets/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../../../../assets/css/custom.css" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->
  
  @yield('css')
</head>

<body data-layout=horizontal>
  <header id="page-topbar">
    <!-- Main navbar -->
    <div class="navbar navbar-expand-lg navbar-dark navbar-static navbar-header">
      <div class="d-flex flex-1 d-lg-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
          <i class="icon-paragraph-justify3"></i>
          <span class="badge badge-mark border-warning m-1"></span>
        </button>
      </div>

      <div class="navbar-brand ">
        <img alt="SFEI" data-sticky-width="140" data-sticky-height="67" src="../../../../img/sf-logo-defauld-white.svg">
      </div>



      <ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">
        <li class="nav-item nav-item-dropdown-lg dropdown">
          <a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle" data-toggle="dropdown">
            <img src="../../../../global_assets/images/lang/{{strtoupper(app()->getLocale())}}.png" class="img-flag" alt="">
            <span class="d-none d-lg-inline-block ml-2">{{ strtoupper(app()->getLocale())=="EN" ? "English" : "简体中文" }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">

            <a class="dropdown-item english " href="{{ url()->current() }}?change_language=en ">
              <img src="../../../../global_assets/images/lang/EN.png" class="img-flag" alt="">English</a>

            <a class="dropdown-item zh-hans" href="{{ url()->current() }}?change_language=zh-hans ">
              <img src="../../../../global_assets/images/lang/ZH-HANS.png" class="img-flag" alt="">简体中文</a>
          </div>
        </li>

        <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
          <a href="#" class="navbar-nav-link navbar-nav-link-toggler d-inline-flex align-items-center h-100 dropdown-toggle" data-toggle="dropdown">
            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-pill" height="34" alt="">
            <span class="d-none d-lg-inline-block ml-2">{{ Auth::user()->name }} </span>
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('frontend.profile.index') }}" class="dropdown-item"><i class="icon-user-plus"></i> {{ __('My profile') }}</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
              <i class="icon-switch2"></i>{{ trans('global.logout') }}</a>
          </div>
        </li>
      </ul>
    </div>
    <!-- /main navbar -->

    <div class="container-fluid">
      <!-- Secondary navbar -->
      <div class="navbar navbar-expand-xl navbar-dark bg-indigo rounded" style="margin-top: 24px;margin-bottom: -16px;">
        <div class="d-xl-none">
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-demo-dark">
            <i class="icon-menu"></i>
          </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-demo-dark">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a href="/" class="navbar-nav-link">
              <i class="fas fa-home mr-1"></i>
              {{ trans('user_layout.main_menu.home') }}
              </a>
            </li>

            <li class="nav-item float-right">
              <a href="/shipments" class="navbar-nav-link"><i class="fas fa-list mr-1"></i>   {{ trans('user_layout.main_menu.order_list') }}</a>
            </li>

            <li class="nav-item float-right">
              <a href="/shipments/create" class="navbar-nav-link"><i class="fas fa-file-alt mr-1"></i>  {{ trans('user_layout.main_menu.create_order') }}</a>
            </li>
          </ul>

        </div>
      </div>
      <!-- /secondary navbar -->

    </div>
  </header>

  @yield('content')

  <!-- Footer -->
  <div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top footer">
    <div class="text-center d-lg-none w-100">
      <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
        <i class="icon-unfold mr-2"></i>
        Footer
      </button>
    </div>

    <div class="navbar-collapse collapse float-right" id="navbar-footer">
      <span class="float-right m-2">
        <p><strong>{{ trans('user_layout.footer.company') }}</strong> - © 2021. {{ trans('user_layout.footer.rights') }}</p>
      </span>
    </div>
  </div>

  <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
  </form>
  <!-- /footer -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

  @yield('scripts')

</body>

</html>
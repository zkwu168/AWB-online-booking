@extends('layouts.user')

@section('content')
<div class="container-fluid">

	<!-- Page header -->
	<div class="page-header" style="margin-top:150px">
		<div class="page-header-content header-elements-lg-inline">
			<div class="page-title d-flex">
				<h3><i class="icon-radio-checked mr-2"></i> <span class="font-weight-semibold">{{ __('user_layout.dashboard.title') }}</h3>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('user_layout.dashboard.logged_in') }}
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
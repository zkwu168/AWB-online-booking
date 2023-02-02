@extends('layouts.user')
@section('content')

<div class="container-fluid">

	<!-- Page header -->
	<div class="page-header" style="margin-top:150px">
		<div class="page-header-content header-elements-lg-inline">
			<div class="page-title d-flex">
				<h3><i class="icon-radio-checked mr-2"></i> <span class="font-weight-semibold">Edit Order</h3>
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
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.shipment.title_singular') }}
                </div>

                <div class="card-body">
                    Edit function inactivated, please try again later.
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
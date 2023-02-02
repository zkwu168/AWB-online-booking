@extends('layouts.user')
@section('content')
<div class="container-fluid">

	<!-- Page header -->
	<div class="page-header" style="margin-top:150px">
		<div class="page-header-content header-elements-lg-inline">
			<div class="page-title d-flex">
				<h3><i class="icon-radio-checked mr-2"></i> <span class="font-weight-semibold">Create Order</h3>
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
                    {{ trans('global.show') }} {{ trans('cruds.shipment.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.shipments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $shipment->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.reference_no_1') }}
                                    </th>
                                    <td>
                                        {{ $shipment->reference_no_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.mailno') }}
                                    </th>
                                    <td>
                                        {{ $shipment->mailno }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.is_gen_bill_no') }}
                                    </th>
                                    <td>
                                        {{ $shipment->is_gen_bill_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.j_email') }}
                                    </th>
                                    <td>
                                        {{ $shipment->j_email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.j_company') }}
                                    </th>
                                    <td>
                                        {{ $shipment->j_company }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.j_contact') }}
                                    </th>
                                    <td>
                                        {{ $shipment->j_contact }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.j_tel') }}
                                    </th>
                                    <td>
                                        {{ $shipment->j_tel }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.j_mobile') }}
                                    </th>
                                    <td>
                                        {{ $shipment->j_mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.j_area_code') }}
                                    </th>
                                    <td>
                                        {{ $shipment->j_area_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.j_country') }}
                                    </th>
                                    <td>
                                        {{ $shipment->j_country }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.j_province') }}
                                    </th>
                                    <td>
                                        {{ $shipment->j_province }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.j_city') }}
                                    </th>
                                    <td>
                                        {{ $shipment->j_city }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.j_county') }}
                                    </th>
                                    <td>
                                        {{ $shipment->j_county }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.j_address') }}
                                    </th>
                                    <td>
                                        {{ $shipment->j_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.j_post_code') }}
                                    </th>
                                    <td>
                                        {{ $shipment->j_post_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_custid') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_custid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_email') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_company') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_company }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_contact') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_contact }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_contact_cn') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_contact_cn }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_tel') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_tel }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_mobile') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_area_code') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_area_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_country') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_country }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_province') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_province }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_city') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_city }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_county') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_county }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_address') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.d_post_code') }}
                                    </th>
                                    <td>
                                        {{ $shipment->d_post_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.tax_pay_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Shipment::TAX_PAY_TYPE_SELECT[$shipment->tax_pay_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.ddp_remark') }}
                                    </th>
                                    <td>
                                        {{ $shipment->ddp_remark }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.cargo_length') }}
                                    </th>
                                    <td>
                                        {{ $shipment->cargo_length }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.cargo_width') }}
                                    </th>
                                    <td>
                                        {{ $shipment->cargo_width }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.cargo_height') }}
                                    </th>
                                    <td>
                                        {{ $shipment->cargo_height }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.cargo_total_weight') }}
                                    </th>
                                    <td>
                                        {{ $shipment->cargo_total_weight }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.express_type') }}
                                    </th>
                                    <td>
                                        {{ $shipment->express_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.parcel_quantity') }}
                                    </th>
                                    <td>
                                        {{ $shipment->parcel_quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.oneself_pickup_flg') }}
                                    </th>
                                    <td>
                                        {{ $shipment->oneself_pickup_flg }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.pay_method') }}
                                    </th>
                                    <td>
                                        {{ $shipment->pay_method }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.custid') }}
                                    </th>
                                    <td>
                                        {{ $shipment->custid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.thd_3_pay_area') }}
                                    </th>
                                    <td>
                                        {{ $shipment->thd_3_pay_area }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.trade_condition') }}
                                    </th>
                                    <td>
                                        {{ $shipment->trade_condition }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.express_reason') }}
                                    </th>
                                    <td>
                                        {{ $shipment->express_reason }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.express_reason_content') }}
                                    </th>
                                    <td>
                                        {{ $shipment->express_reason_content }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.buss_remark') }}
                                    </th>
                                    <td>
                                        {{ $shipment->buss_remark }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.custom_batch') }}
                                    </th>
                                    <td>
                                        {{ $shipment->custom_batch }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.harmonized_code') }}
                                    </th>
                                    <td>
                                        {{ $shipment->harmonized_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.aes_no') }}
                                    </th>
                                    <td>
                                        {{ $shipment->aes_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.receiver_type') }}
                                    </th>
                                    <td>
                                        {{ $shipment->receiver_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.order_cert_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Shipment::ORDER_CERT_TYPE_SELECT[$shipment->order_cert_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.order_cert_no') }}
                                    </th>
                                    <td>
                                        {{ $shipment->order_cert_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.realweightqty') }}
                                    </th>
                                    <td>
                                        {{ $shipment->realweightqty }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.volumeweightqty') }}
                                    </th>
                                    <td>
                                        {{ $shipment->volumeweightqty }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.meterageweightqty') }}
                                    </th>
                                    <td>
                                        {{ $shipment->meterageweightqty }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.currency') }}
                                    </th>
                                    <td>
                                        {{ $shipment->currency }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.is_baggage') }}
                                    </th>
                                    <td>
                                        {{ $shipment->is_baggage }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.sender_type') }}
                                    </th>
                                    <td>
                                        {{ $shipment->sender_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.export_customer_type') }}
                                    </th>
                                    <td>
                                        {{ $shipment->export_customer_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.is_under_call') }}
                                    </th>
                                    <td>
                                        {{ $shipment->is_under_call }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.import_customer_type') }}
                                    </th>
                                    <td>
                                        {{ $shipment->import_customer_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.estimated_freight') }}
                                    </th>
                                    <td>
                                        {{ $shipment->estimated_freight }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.actual_freight') }}
                                    </th>
                                    <td>
                                        {{ $shipment->actual_freight }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.paid_freight') }}
                                    </th>
                                    <td>
                                        {{ $shipment->paid_freight }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.outstanding_fee') }}
                                    </th>
                                    <td>
                                        {{ $shipment->outstanding_fee }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.tracking') }}
                                    </th>
                                    <td>
                                        {{ $shipment->tracking->sf_awb_url ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $shipment->status->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.pickup_type') }}
                                    </th>
                                    <td>
                                        {{ $shipment->pickup_type->service_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.local_service_provider') }}
                                    </th>
                                    <td>
                                        {{ $shipment->local_service_provider->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.shipments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
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
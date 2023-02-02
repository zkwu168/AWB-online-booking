@extends('layouts.frontend1')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.shipment.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.shipments.update", [$shipment->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="reference_no_1">{{ trans('cruds.shipment.fields.reference_no_1') }}</label>
                            <input class="form-control" type="text" name="reference_no_1" id="reference_no_1" value="{{ old('reference_no_1', $shipment->reference_no_1) }}">
                            @if($errors->has('reference_no_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('reference_no_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.reference_no_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mailno">{{ trans('cruds.shipment.fields.mailno') }}</label>
                            <input class="form-control" type="text" name="mailno" id="mailno" value="{{ old('mailno', $shipment->mailno) }}">
                            @if($errors->has('mailno'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mailno') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.mailno_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="is_gen_bill_no">{{ trans('cruds.shipment.fields.is_gen_bill_no') }}</label>
                            <input class="form-control" type="number" name="is_gen_bill_no" id="is_gen_bill_no" value="{{ old('is_gen_bill_no', $shipment->is_gen_bill_no) }}" step="1">
                            @if($errors->has('is_gen_bill_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_gen_bill_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.is_gen_bill_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="j_email">{{ trans('cruds.shipment.fields.j_email') }}</label>
                            <input class="form-control" type="text" name="j_email" id="j_email" value="{{ old('j_email', $shipment->j_email) }}">
                            @if($errors->has('j_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('j_email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.j_email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="j_company">{{ trans('cruds.shipment.fields.j_company') }}</label>
                            <input class="form-control" type="text" name="j_company" id="j_company" value="{{ old('j_company', $shipment->j_company) }}">
                            @if($errors->has('j_company'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('j_company') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.j_company_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="j_contact">{{ trans('cruds.shipment.fields.j_contact') }}</label>
                            <input class="form-control" type="text" name="j_contact" id="j_contact" value="{{ old('j_contact', $shipment->j_contact) }}">
                            @if($errors->has('j_contact'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('j_contact') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.j_contact_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="j_tel">{{ trans('cruds.shipment.fields.j_tel') }}</label>
                            <input class="form-control" type="text" name="j_tel" id="j_tel" value="{{ old('j_tel', $shipment->j_tel) }}">
                            @if($errors->has('j_tel'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('j_tel') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.j_tel_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="j_mobile">{{ trans('cruds.shipment.fields.j_mobile') }}</label>
                            <input class="form-control" type="text" name="j_mobile" id="j_mobile" value="{{ old('j_mobile', $shipment->j_mobile) }}">
                            @if($errors->has('j_mobile'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('j_mobile') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.j_mobile_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="j_area_code">{{ trans('cruds.shipment.fields.j_area_code') }}</label>
                            <input class="form-control" type="text" name="j_area_code" id="j_area_code" value="{{ old('j_area_code', $shipment->j_area_code) }}">
                            @if($errors->has('j_area_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('j_area_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.j_area_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="j_country">{{ trans('cruds.shipment.fields.j_country') }}</label>
                            <input class="form-control" type="text" name="j_country" id="j_country" value="{{ old('j_country', $shipment->j_country) }}" required>
                            @if($errors->has('j_country'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('j_country') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.j_country_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="j_province">{{ trans('cruds.shipment.fields.j_province') }}</label>
                            <input class="form-control" type="text" name="j_province" id="j_province" value="{{ old('j_province', $shipment->j_province) }}" required>
                            @if($errors->has('j_province'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('j_province') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.j_province_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="j_city">{{ trans('cruds.shipment.fields.j_city') }}</label>
                            <input class="form-control" type="text" name="j_city" id="j_city" value="{{ old('j_city', $shipment->j_city) }}" required>
                            @if($errors->has('j_city'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('j_city') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.j_city_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="j_county">{{ trans('cruds.shipment.fields.j_county') }}</label>
                            <input class="form-control" type="text" name="j_county" id="j_county" value="{{ old('j_county', $shipment->j_county) }}">
                            @if($errors->has('j_county'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('j_county') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.j_county_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="j_address">{{ trans('cruds.shipment.fields.j_address') }}</label>
                            <input class="form-control" type="text" name="j_address" id="j_address" value="{{ old('j_address', $shipment->j_address) }}">
                            @if($errors->has('j_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('j_address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.j_address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="j_post_code">{{ trans('cruds.shipment.fields.j_post_code') }}</label>
                            <input class="form-control" type="text" name="j_post_code" id="j_post_code" value="{{ old('j_post_code', $shipment->j_post_code) }}" required>
                            @if($errors->has('j_post_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('j_post_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.j_post_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="d_custid">{{ trans('cruds.shipment.fields.d_custid') }}</label>
                            <input class="form-control" type="text" name="d_custid" id="d_custid" value="{{ old('d_custid', $shipment->d_custid) }}">
                            @if($errors->has('d_custid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_custid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_custid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="d_email">{{ trans('cruds.shipment.fields.d_email') }}</label>
                            <input class="form-control" type="text" name="d_email" id="d_email" value="{{ old('d_email', $shipment->d_email) }}">
                            @if($errors->has('d_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="d_company">{{ trans('cruds.shipment.fields.d_company') }}</label>
                            <input class="form-control" type="text" name="d_company" id="d_company" value="{{ old('d_company', $shipment->d_company) }}">
                            @if($errors->has('d_company'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_company') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_company_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="d_contact">{{ trans('cruds.shipment.fields.d_contact') }}</label>
                            <input class="form-control" type="text" name="d_contact" id="d_contact" value="{{ old('d_contact', $shipment->d_contact) }}" required>
                            @if($errors->has('d_contact'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_contact') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_contact_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="d_contact_cn">{{ trans('cruds.shipment.fields.d_contact_cn') }}</label>
                            <input class="form-control" type="text" name="d_contact_cn" id="d_contact_cn" value="{{ old('d_contact_cn', $shipment->d_contact_cn) }}">
                            @if($errors->has('d_contact_cn'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_contact_cn') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_contact_cn_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="d_tel">{{ trans('cruds.shipment.fields.d_tel') }}</label>
                            <input class="form-control" type="text" name="d_tel" id="d_tel" value="{{ old('d_tel', $shipment->d_tel) }}" required>
                            @if($errors->has('d_tel'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_tel') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_tel_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="d_mobile">{{ trans('cruds.shipment.fields.d_mobile') }}</label>
                            <input class="form-control" type="text" name="d_mobile" id="d_mobile" value="{{ old('d_mobile', $shipment->d_mobile) }}">
                            @if($errors->has('d_mobile'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_mobile') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_mobile_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="d_area_code">{{ trans('cruds.shipment.fields.d_area_code') }}</label>
                            <input class="form-control" type="text" name="d_area_code" id="d_area_code" value="{{ old('d_area_code', $shipment->d_area_code) }}">
                            @if($errors->has('d_area_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_area_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_area_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="d_country">{{ trans('cruds.shipment.fields.d_country') }}</label>
                            <input class="form-control" type="text" name="d_country" id="d_country" value="{{ old('d_country', $shipment->d_country) }}" required>
                            @if($errors->has('d_country'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_country') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_country_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="d_province">{{ trans('cruds.shipment.fields.d_province') }}</label>
                            <input class="form-control" type="text" name="d_province" id="d_province" value="{{ old('d_province', $shipment->d_province) }}" required>
                            @if($errors->has('d_province'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_province') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_province_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="d_city">{{ trans('cruds.shipment.fields.d_city') }}</label>
                            <input class="form-control" type="text" name="d_city" id="d_city" value="{{ old('d_city', $shipment->d_city) }}" required>
                            @if($errors->has('d_city'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_city') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_city_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="d_county">{{ trans('cruds.shipment.fields.d_county') }}</label>
                            <input class="form-control" type="text" name="d_county" id="d_county" value="{{ old('d_county', $shipment->d_county) }}">
                            @if($errors->has('d_county'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_county') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_county_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="d_address">{{ trans('cruds.shipment.fields.d_address') }}</label>
                            <input class="form-control" type="text" name="d_address" id="d_address" value="{{ old('d_address', $shipment->d_address) }}" required>
                            @if($errors->has('d_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="d_post_code">{{ trans('cruds.shipment.fields.d_post_code') }}</label>
                            <input class="form-control" type="text" name="d_post_code" id="d_post_code" value="{{ old('d_post_code', $shipment->d_post_code) }}" required>
                            @if($errors->has('d_post_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('d_post_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.d_post_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.shipment.fields.tax_pay_type') }}</label>
                            <select class="form-control" name="tax_pay_type" id="tax_pay_type">
                                <option value disabled {{ old('tax_pay_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Shipment::TAX_PAY_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('tax_pay_type', $shipment->tax_pay_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tax_pay_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tax_pay_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.tax_pay_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ddp_remark">{{ trans('cruds.shipment.fields.ddp_remark') }}</label>
                            <input class="form-control" type="text" name="ddp_remark" id="ddp_remark" value="{{ old('ddp_remark', $shipment->ddp_remark) }}">
                            @if($errors->has('ddp_remark'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ddp_remark') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.ddp_remark_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="cargo_length">{{ trans('cruds.shipment.fields.cargo_length') }}</label>
                            <input class="form-control" type="number" name="cargo_length" id="cargo_length" value="{{ old('cargo_length', $shipment->cargo_length) }}" step="0.001">
                            @if($errors->has('cargo_length'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cargo_length') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.cargo_length_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="cargo_width">{{ trans('cruds.shipment.fields.cargo_width') }}</label>
                            <input class="form-control" type="number" name="cargo_width" id="cargo_width" value="{{ old('cargo_width', $shipment->cargo_width) }}" step="0.001">
                            @if($errors->has('cargo_width'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cargo_width') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.cargo_width_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="cargo_height">{{ trans('cruds.shipment.fields.cargo_height') }}</label>
                            <input class="form-control" type="number" name="cargo_height" id="cargo_height" value="{{ old('cargo_height', $shipment->cargo_height) }}" step="0.001">
                            @if($errors->has('cargo_height'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cargo_height') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.cargo_height_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="cargo_total_weight">{{ trans('cruds.shipment.fields.cargo_total_weight') }}</label>
                            <input class="form-control" type="number" name="cargo_total_weight" id="cargo_total_weight" value="{{ old('cargo_total_weight', $shipment->cargo_total_weight) }}" step="0.001">
                            @if($errors->has('cargo_total_weight'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cargo_total_weight') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.cargo_total_weight_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="express_type">{{ trans('cruds.shipment.fields.express_type') }}</label>
                            <input class="form-control" type="number" name="express_type" id="express_type" value="{{ old('express_type', $shipment->express_type) }}" step="1">
                            @if($errors->has('express_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('express_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.express_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="parcel_quantity">{{ trans('cruds.shipment.fields.parcel_quantity') }}</label>
                            <input class="form-control" type="number" name="parcel_quantity" id="parcel_quantity" value="{{ old('parcel_quantity', $shipment->parcel_quantity) }}" step="1">
                            @if($errors->has('parcel_quantity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('parcel_quantity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.parcel_quantity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="oneself_pickup_flg">{{ trans('cruds.shipment.fields.oneself_pickup_flg') }}</label>
                            <input class="form-control" type="number" name="oneself_pickup_flg" id="oneself_pickup_flg" value="{{ old('oneself_pickup_flg', $shipment->oneself_pickup_flg) }}" step="1">
                            @if($errors->has('oneself_pickup_flg'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('oneself_pickup_flg') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.oneself_pickup_flg_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pay_method">{{ trans('cruds.shipment.fields.pay_method') }}</label>
                            <input class="form-control" type="number" name="pay_method" id="pay_method" value="{{ old('pay_method', $shipment->pay_method) }}" step="1">
                            @if($errors->has('pay_method'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pay_method') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.pay_method_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="custid">{{ trans('cruds.shipment.fields.custid') }}</label>
                            <input class="form-control" type="text" name="custid" id="custid" value="{{ old('custid', $shipment->custid) }}">
                            @if($errors->has('custid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('custid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.custid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="thd_3_pay_area">{{ trans('cruds.shipment.fields.thd_3_pay_area') }}</label>
                            <input class="form-control" type="text" name="thd_3_pay_area" id="thd_3_pay_area" value="{{ old('thd_3_pay_area', $shipment->thd_3_pay_area) }}">
                            @if($errors->has('thd_3_pay_area'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('thd_3_pay_area') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.thd_3_pay_area_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="trade_condition">{{ trans('cruds.shipment.fields.trade_condition') }}</label>
                            <input class="form-control" type="text" name="trade_condition" id="trade_condition" value="{{ old('trade_condition', $shipment->trade_condition) }}">
                            @if($errors->has('trade_condition'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('trade_condition') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.trade_condition_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="express_reason">{{ trans('cruds.shipment.fields.express_reason') }}</label>
                            <input class="form-control" type="number" name="express_reason" id="express_reason" value="{{ old('express_reason', $shipment->express_reason) }}" step="1">
                            @if($errors->has('express_reason'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('express_reason') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.express_reason_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="express_reason_content">{{ trans('cruds.shipment.fields.express_reason_content') }}</label>
                            <input class="form-control" type="text" name="express_reason_content" id="express_reason_content" value="{{ old('express_reason_content', $shipment->express_reason_content) }}">
                            @if($errors->has('express_reason_content'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('express_reason_content') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.express_reason_content_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="buss_remark">{{ trans('cruds.shipment.fields.buss_remark') }}</label>
                            <input class="form-control" type="text" name="buss_remark" id="buss_remark" value="{{ old('buss_remark', $shipment->buss_remark) }}">
                            @if($errors->has('buss_remark'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('buss_remark') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.buss_remark_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="custom_batch">{{ trans('cruds.shipment.fields.custom_batch') }}</label>
                            <input class="form-control" type="text" name="custom_batch" id="custom_batch" value="{{ old('custom_batch', $shipment->custom_batch) }}">
                            @if($errors->has('custom_batch'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('custom_batch') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.custom_batch_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="harmonized_code">{{ trans('cruds.shipment.fields.harmonized_code') }}</label>
                            <input class="form-control" type="text" name="harmonized_code" id="harmonized_code" value="{{ old('harmonized_code', $shipment->harmonized_code) }}">
                            @if($errors->has('harmonized_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('harmonized_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.harmonized_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="aes_no">{{ trans('cruds.shipment.fields.aes_no') }}</label>
                            <input class="form-control" type="text" name="aes_no" id="aes_no" value="{{ old('aes_no', $shipment->aes_no) }}">
                            @if($errors->has('aes_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('aes_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.aes_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="receiver_type">{{ trans('cruds.shipment.fields.receiver_type') }}</label>
                            <input class="form-control" type="text" name="receiver_type" id="receiver_type" value="{{ old('receiver_type', $shipment->receiver_type) }}">
                            @if($errors->has('receiver_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('receiver_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.receiver_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.shipment.fields.order_cert_type') }}</label>
                            <select class="form-control" name="order_cert_type" id="order_cert_type">
                                <option value disabled {{ old('order_cert_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Shipment::ORDER_CERT_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('order_cert_type', $shipment->order_cert_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('order_cert_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order_cert_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.order_cert_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="order_cert_no">{{ trans('cruds.shipment.fields.order_cert_no') }}</label>
                            <input class="form-control" type="text" name="order_cert_no" id="order_cert_no" value="{{ old('order_cert_no', $shipment->order_cert_no) }}">
                            @if($errors->has('order_cert_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order_cert_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.order_cert_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="realweightqty">{{ trans('cruds.shipment.fields.realweightqty') }}</label>
                            <input class="form-control" type="number" name="realweightqty" id="realweightqty" value="{{ old('realweightqty', $shipment->realweightqty) }}" step="0.0001">
                            @if($errors->has('realweightqty'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('realweightqty') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.realweightqty_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="volumeweightqty">{{ trans('cruds.shipment.fields.volumeweightqty') }}</label>
                            <input class="form-control" type="number" name="volumeweightqty" id="volumeweightqty" value="{{ old('volumeweightqty', $shipment->volumeweightqty) }}" step="0.0001">
                            @if($errors->has('volumeweightqty'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('volumeweightqty') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.volumeweightqty_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="meterageweightqty">{{ trans('cruds.shipment.fields.meterageweightqty') }}</label>
                            <input class="form-control" type="number" name="meterageweightqty" id="meterageweightqty" value="{{ old('meterageweightqty', $shipment->meterageweightqty) }}" step="0.0001">
                            @if($errors->has('meterageweightqty'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('meterageweightqty') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.meterageweightqty_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="currency">{{ trans('cruds.shipment.fields.currency') }}</label>
                            <input class="form-control" type="text" name="currency" id="currency" value="{{ old('currency', $shipment->currency) }}" required>
                            @if($errors->has('currency'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('currency') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.currency_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="is_baggage">{{ trans('cruds.shipment.fields.is_baggage') }}</label>
                            <input class="form-control" type="text" name="is_baggage" id="is_baggage" value="{{ old('is_baggage', $shipment->is_baggage) }}">
                            @if($errors->has('is_baggage'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_baggage') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.is_baggage_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sender_type">{{ trans('cruds.shipment.fields.sender_type') }}</label>
                            <input class="form-control" type="text" name="sender_type" id="sender_type" value="{{ old('sender_type', $shipment->sender_type) }}">
                            @if($errors->has('sender_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sender_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.sender_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="export_customer_type">{{ trans('cruds.shipment.fields.export_customer_type') }}</label>
                            <input class="form-control" type="text" name="export_customer_type" id="export_customer_type" value="{{ old('export_customer_type', $shipment->export_customer_type) }}">
                            @if($errors->has('export_customer_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('export_customer_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.export_customer_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="is_under_call">{{ trans('cruds.shipment.fields.is_under_call') }}</label>
                            <input class="form-control" type="text" name="is_under_call" id="is_under_call" value="{{ old('is_under_call', $shipment->is_under_call) }}">
                            @if($errors->has('is_under_call'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_under_call') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.is_under_call_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="import_customer_type">{{ trans('cruds.shipment.fields.import_customer_type') }}</label>
                            <input class="form-control" type="text" name="import_customer_type" id="import_customer_type" value="{{ old('import_customer_type', $shipment->import_customer_type) }}">
                            @if($errors->has('import_customer_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('import_customer_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.import_customer_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="estimated_freight">{{ trans('cruds.shipment.fields.estimated_freight') }}</label>
                            <input class="form-control" type="number" name="estimated_freight" id="estimated_freight" value="{{ old('estimated_freight', $shipment->estimated_freight) }}" step="0.01">
                            @if($errors->has('estimated_freight'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('estimated_freight') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.estimated_freight_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="actual_freight">{{ trans('cruds.shipment.fields.actual_freight') }}</label>
                            <input class="form-control" type="number" name="actual_freight" id="actual_freight" value="{{ old('actual_freight', $shipment->actual_freight) }}" step="0.01">
                            @if($errors->has('actual_freight'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('actual_freight') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.actual_freight_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="paid_freight">{{ trans('cruds.shipment.fields.paid_freight') }}</label>
                            <input class="form-control" type="number" name="paid_freight" id="paid_freight" value="{{ old('paid_freight', $shipment->paid_freight) }}" step="0.01">
                            @if($errors->has('paid_freight'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paid_freight') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.paid_freight_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="outstanding_fee">{{ trans('cruds.shipment.fields.outstanding_fee') }}</label>
                            <input class="form-control" type="number" name="outstanding_fee" id="outstanding_fee" value="{{ old('outstanding_fee', $shipment->outstanding_fee) }}" step="0.01">
                            @if($errors->has('outstanding_fee'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('outstanding_fee') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.outstanding_fee_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tracking_id">{{ trans('cruds.shipment.fields.tracking') }}</label>
                            <select class="form-control select2" name="tracking_id" id="tracking_id">
                                @foreach($trackings as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('tracking_id') ? old('tracking_id') : $shipment->tracking->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tracking'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tracking') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.tracking_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status_id">{{ trans('cruds.shipment.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id">
                                @foreach($statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $shipment->status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pickup_type_id">{{ trans('cruds.shipment.fields.pickup_type') }}</label>
                            <select class="form-control select2" name="pickup_type_id" id="pickup_type_id">
                                @foreach($pickup_types as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('pickup_type_id') ? old('pickup_type_id') : $shipment->pickup_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pickup_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pickup_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.pickup_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="local_service_provider_id">{{ trans('cruds.shipment.fields.local_service_provider') }}</label>
                            <select class="form-control select2" name="local_service_provider_id" id="local_service_provider_id">
                                @foreach($local_service_providers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('local_service_provider_id') ? old('local_service_provider_id') : $shipment->local_service_provider->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('local_service_provider'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('local_service_provider') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.local_service_provider_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
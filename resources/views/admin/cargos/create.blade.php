@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.cargo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cargos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.cargo.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="count">{{ trans('cruds.cargo.fields.count') }}</label>
                <input class="form-control {{ $errors->has('count') ? 'is-invalid' : '' }}" type="number" name="count" id="count" value="{{ old('count', '') }}" step="1" required>
                @if($errors->has('count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.count_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="unit">{{ trans('cruds.cargo.fields.unit') }}</label>
                <input class="form-control {{ $errors->has('unit') ? 'is-invalid' : '' }}" type="text" name="unit" id="unit" value="{{ old('unit', 'pcs') }}" required>
                @if($errors->has('unit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.unit_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.cargo.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.0001" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="weight">{{ trans('cruds.cargo.fields.weight') }}</label>
                <input class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" type="number" name="weight" id="weight" value="{{ old('weight', '') }}" step="0.0001">
                @if($errors->has('weight'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weight') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_value">{{ trans('cruds.cargo.fields.total_value') }}</label>
                <input class="form-control {{ $errors->has('total_value') ? 'is-invalid' : '' }}" type="number" name="total_value" id="total_value" value="{{ old('total_value', '') }}" step="0.0001">
                @if($errors->has('total_value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.total_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="currency">{{ trans('cruds.cargo.fields.currency') }}</label>
                <input class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" type="text" name="currency" id="currency" value="{{ old('currency', '') }}">
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="source_area">{{ trans('cruds.cargo.fields.source_area') }}</label>
                <input class="form-control {{ $errors->has('source_area') ? 'is-invalid' : '' }}" type="text" name="source_area" id="source_area" value="{{ old('source_area', '') }}" required>
                @if($errors->has('source_area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('source_area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.source_area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_record_no">{{ trans('cruds.cargo.fields.product_record_no') }}</label>
                <input class="form-control {{ $errors->has('product_record_no') ? 'is-invalid' : '' }}" type="text" name="product_record_no" id="product_record_no" value="{{ old('product_record_no', '') }}">
                @if($errors->has('product_record_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_record_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.product_record_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="brand">{{ trans('cruds.cargo.fields.brand') }}</label>
                <input class="form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" type="text" name="brand" id="brand" value="{{ old('brand', '') }}">
                @if($errors->has('brand'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brand') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statebarcode">{{ trans('cruds.cargo.fields.statebarcode') }}</label>
                <input class="form-control {{ $errors->has('statebarcode') ? 'is-invalid' : '' }}" type="text" name="statebarcode" id="statebarcode" value="{{ old('statebarcode', '') }}">
                @if($errors->has('statebarcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('statebarcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.statebarcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="specifications">{{ trans('cruds.cargo.fields.specifications') }}</label>
                <input class="form-control {{ $errors->has('specifications') ? 'is-invalid' : '' }}" type="text" name="specifications" id="specifications" value="{{ old('specifications', '') }}">
                @if($errors->has('specifications'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specifications') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.specifications_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="goods_code">{{ trans('cruds.cargo.fields.goods_code') }}</label>
                <input class="form-control {{ $errors->has('goods_code') ? 'is-invalid' : '' }}" type="text" name="goods_code" id="goods_code" value="{{ old('goods_code', '') }}">
                @if($errors->has('goods_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('goods_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.goods_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="good_prepard_no">{{ trans('cruds.cargo.fields.good_prepard_no') }}</label>
                <input class="form-control {{ $errors->has('good_prepard_no') ? 'is-invalid' : '' }}" type="text" name="good_prepard_no" id="good_prepard_no" value="{{ old('good_prepard_no', '') }}">
                @if($errors->has('good_prepard_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('good_prepard_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.good_prepard_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hs_code">{{ trans('cruds.cargo.fields.hs_code') }}</label>
                <input class="form-control {{ $errors->has('hs_code') ? 'is-invalid' : '' }}" type="text" name="hs_code" id="hs_code" value="{{ old('hs_code', '') }}">
                @if($errors->has('hs_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hs_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.hs_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hts_code">{{ trans('cruds.cargo.fields.hts_code') }}</label>
                <input class="form-control {{ $errors->has('hts_code') ? 'is-invalid' : '' }}" type="text" name="hts_code" id="hts_code" value="{{ old('hts_code', '') }}">
                @if($errors->has('hts_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hts_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.hts_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hts_desc">{{ trans('cruds.cargo.fields.hts_desc') }}</label>
                <input class="form-control {{ $errors->has('hts_desc') ? 'is-invalid' : '' }}" type="text" name="hts_desc" id="hts_desc" value="{{ old('hts_desc', '') }}">
                @if($errors->has('hts_desc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hts_desc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.hts_desc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_no">{{ trans('cruds.cargo.fields.item_no') }}</label>
                <input class="form-control {{ $errors->has('item_no') ? 'is-invalid' : '' }}" type="number" name="item_no" id="item_no" value="{{ old('item_no', '') }}" step="1">
                @if($errors->has('item_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('item_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.item_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty_1">{{ trans('cruds.cargo.fields.qty_1') }}</label>
                <input class="form-control {{ $errors->has('qty_1') ? 'is-invalid' : '' }}" type="number" name="qty_1" id="qty_1" value="{{ old('qty_1', '') }}" step="0.00001">
                @if($errors->has('qty_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.qty_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_1">{{ trans('cruds.cargo.fields.unit_1') }}</label>
                <input class="form-control {{ $errors->has('unit_1') ? 'is-invalid' : '' }}" type="text" name="unit_1" id="unit_1" value="{{ old('unit_1', '') }}">
                @if($errors->has('unit_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.unit_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shipment_id">{{ trans('cruds.cargo.fields.shipment') }}</label>
                <select class="form-control select2 {{ $errors->has('shipment') ? 'is-invalid' : '' }}" name="shipment_id" id="shipment_id">
                    @foreach($shipments as $id => $entry)
                        <option value="{{ $id }}" {{ old('shipment_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('shipment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cargo.fields.shipment_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
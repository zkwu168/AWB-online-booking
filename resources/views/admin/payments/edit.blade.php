@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payments.update", [$payment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="shipment_id">{{ trans('cruds.payment.fields.shipment') }}</label>
                <select class="form-control select2 {{ $errors->has('shipment') ? 'is-invalid' : '' }}" name="shipment_id" id="shipment_id">
                    @foreach($shipments as $id => $entry)
                        <option value="{{ $id }}" {{ (old('shipment_id') ? old('shipment_id') : $payment->shipment->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('shipment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.shipment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.payment.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $payment->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $payment->amount) }}" step="0.01">
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_method">{{ trans('cruds.payment.fields.payment_method') }}</label>
                <input class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', $payment->payment_method) }}">
                @if($errors->has('payment_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_details">{{ trans('cruds.payment.fields.payment_details') }}</label>
                <input class="form-control {{ $errors->has('payment_details') ? 'is-invalid' : '' }}" type="text" name="payment_details" id="payment_details" value="{{ old('payment_details', $payment->payment_details) }}">
                @if($errors->has('payment_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_details_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_date">{{ trans('cruds.payment.fields.payment_date') }}</label>
                <input class="form-control datetime {{ $errors->has('payment_date') ? 'is-invalid' : '' }}" type="text" name="payment_date" id="payment_date" value="{{ old('payment_date', $payment->payment_date) }}">
                @if($errors->has('payment_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transaction">{{ trans('cruds.payment.fields.transaction') }}</label>
                <input class="form-control {{ $errors->has('transaction') ? 'is-invalid' : '' }}" type="text" name="transaction" id="transaction" value="{{ old('transaction', $payment->transaction) }}">
                @if($errors->has('transaction'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transaction') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.transaction_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="refund_amount">{{ trans('cruds.payment.fields.refund_amount') }}</label>
                <input class="form-control {{ $errors->has('refund_amount') ? 'is-invalid' : '' }}" type="number" name="refund_amount" id="refund_amount" value="{{ old('refund_amount', $payment->refund_amount) }}" step="0.01">
                @if($errors->has('refund_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('refund_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.refund_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="refund_note">{{ trans('cruds.payment.fields.refund_note') }}</label>
                <input class="form-control {{ $errors->has('refund_note') ? 'is-invalid' : '' }}" type="text" name="refund_note" id="refund_note" value="{{ old('refund_note', $payment->refund_note) }}">
                @if($errors->has('refund_note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('refund_note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.refund_note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pay_by_url">{{ trans('cruds.payment.fields.pay_by_url') }}</label>
                <input class="form-control {{ $errors->has('pay_by_url') ? 'is-invalid' : '' }}" type="text" name="pay_by_url" id="pay_by_url" value="{{ old('pay_by_url', $payment->pay_by_url) }}">
                @if($errors->has('pay_by_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pay_by_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.pay_by_url_helper') }}</span>
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
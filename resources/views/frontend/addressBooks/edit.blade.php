@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.addressBook.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.address-books.update", [$addressBook->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="company">{{ trans('cruds.addressBook.fields.company') }}</label>
                            <input class="form-control" type="text" name="company" id="company" value="{{ old('company', $addressBook->company) }}">
                            @if($errors->has('company'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('company') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addressBook.fields.company_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="contact">{{ trans('cruds.addressBook.fields.contact') }}</label>
                            <input class="form-control" type="text" name="contact" id="contact" value="{{ old('contact', $addressBook->contact) }}">
                            @if($errors->has('contact'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contact') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addressBook.fields.contact_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="country">{{ trans('cruds.addressBook.fields.country') }}</label>
                            <input class="form-control" type="text" name="country" id="country" value="{{ old('country', $addressBook->country) }}">
                            @if($errors->has('country'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('country') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addressBook.fields.country_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="province">{{ trans('cruds.addressBook.fields.province') }}</label>
                            <input class="form-control" type="text" name="province" id="province" value="{{ old('province', $addressBook->province) }}">
                            @if($errors->has('province'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('province') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addressBook.fields.province_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="city">{{ trans('cruds.addressBook.fields.city') }}</label>
                            <input class="form-control" type="text" name="city" id="city" value="{{ old('city', $addressBook->city) }}">
                            @if($errors->has('city'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('city') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addressBook.fields.city_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="county">{{ trans('cruds.addressBook.fields.county') }}</label>
                            <input class="form-control" type="text" name="county" id="county" value="{{ old('county', $addressBook->county) }}">
                            @if($errors->has('county'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('county') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addressBook.fields.county_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.addressBook.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $addressBook->address) }}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addressBook.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="post_code">{{ trans('cruds.addressBook.fields.post_code') }}</label>
                            <input class="form-control" type="text" name="post_code" id="post_code" value="{{ old('post_code', $addressBook->post_code) }}">
                            @if($errors->has('post_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('post_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addressBook.fields.post_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mobile">{{ trans('cruds.addressBook.fields.mobile') }}</label>
                            <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile', $addressBook->mobile) }}">
                            @if($errors->has('mobile'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mobile') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addressBook.fields.mobile_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ trans('cruds.addressBook.fields.email') }}</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ old('email', $addressBook->email) }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addressBook.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_shipper" value="0">
                                <input type="checkbox" name="is_shipper" id="is_shipper" value="1" {{ $addressBook->is_shipper || old('is_shipper', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_shipper">{{ trans('cruds.addressBook.fields.is_shipper') }}</label>
                            </div>
                            @if($errors->has('is_shipper'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_shipper') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addressBook.fields.is_shipper_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_receiver" value="0">
                                <input type="checkbox" name="is_receiver" id="is_receiver" value="1" {{ $addressBook->is_receiver || old('is_receiver', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_receiver">{{ trans('cruds.addressBook.fields.is_receiver') }}</label>
                            </div>
                            @if($errors->has('is_receiver'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_receiver') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addressBook.fields.is_receiver_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.addressBook.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $addressBook->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addressBook.fields.user_helper') }}</span>
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
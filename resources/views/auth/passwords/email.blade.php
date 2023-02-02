@extends('layouts.frontend')
@section('content')
@section('content')
<div class="row" style="background-color: #a7aaac; height:100vh">
    <div class="container d-flex align-items-center justify-content-center ">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="card mx-4">

                <div class="card-body p-2" style="text-align:center">
                    <div class="my-3 pb-2" style="text-align:left">
                        <i class="fas fa-key text-primary text-6"
                            style="  background-color: white;
                            border-radius: 50%; border: 3px solid; height:3.5rem;width:3.5rem; line-height: 50px; 	padding: 0 0.4em;"></i>
                        <span class="text-muted text-6 ms-2">{{ trans('global.reset_password') }}</span>
                    </div>

                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}"
                                value="{{ old('email') }}">

                            @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>
                        <div class="input-group flex-nowrap">

                            <input id="captcha" name="captcha" type="text" aria-label="Captcha"
                                aria-describedby="user-captcha"
                                class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" required
                                placeholder="{{ trans('global.enter_captcha') }}">
                            <div class="captcha">
                                <span class="refresh-captcha" id="refresh-captcha">{!! captcha_img() !!}</span>
                            </div>
                        </div>
                        @if($errors->has('captcha'))
                        <div class="invalid-feedback">
                            {{ $errors->first('captcha') }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-flat btn-block">
                                    {{ trans('global.send_password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
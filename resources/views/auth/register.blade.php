@extends('layouts.frontend')
@section('content')

<div class="row" style="background-color: #a7aaac; height:100vh">
    <div class="container d-flex align-items-center justify-content-center ">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="card mx-4">
                <div class="card-body p-3" style="text-align:center">
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        @if(request()->has('team'))
                        <input type="hidden" name="team" id="team" value="{{ request()->query('team') }}">
                        @endif

                        <div class="my-3 pb-2" style="text-align:left"> 
                            <i class="fas fa-user-plus text-primary text-6" style="  background-color: white;
                            border-radius: 50%; border: 3px solid; height:3.5rem;width:3.5rem; line-height: 50px; 	padding: 0 0.4em;"></i>
                            <span class="text-muted text-6 ms-2" >{{ trans('global.register') }}</span>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <input id="email" name="email" type="email" aria-label="Email" aria-describedby="user-email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                                autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}"
                                value="{{ old('email', null) }}">
                        </div>
                        @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                        @endif

                        <div class="input-group flex-nowrap mb-3">
                            <input id="email" name="name" type="text" aria-label="Name" aria-describedby="user-name"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus
                                placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                        </div>
                        @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                        @endif

                        <div class="input-group flex-nowrap">
                            <input id="password" name="password" aria-label="Password" aria-describedby="user-pass"
                            type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            required placeholder="{{ trans('global.login_password') }}">
                        </div>
                        @if($errors->has('password'))
                        <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                        </div>
                        @endif

                        <div class="input-group flex-nowrap">
                            <input id="password" name="password_confirmation" aria-label="Password_confirmation" aria-describedby="user-pass-confirm"
                            type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                            required placeholder="{{ trans('global.login_password_confirmation') }}">
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
                                <button type="submit" class="btn btn-primary btn-flat btn-block mt-4" style = "width:100%;">
                                    {{ trans('global.register') }}
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
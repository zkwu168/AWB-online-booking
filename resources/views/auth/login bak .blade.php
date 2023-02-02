@extends('layouts.frontend')
@section('content')
<div class="row" style = "background-color: #a7aaac; height:100vh">
    <div class="container d-flex align-items-center justify-content-center vh-100" >
    <div class="col-md-6">
        <div class="card mx-4">
        
            <div class="card-body p-4" style = "text-align:center">
            <div class="divider m-5">
            <i class="fas fa-user-lock text-primary text-6"></i>
</div>


                @if(session('message'))
                    <div class="alert alert-info" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="user-email"><i class="fa fa-user"></i></span>
                        <input id="email" name="email" type="text" aria-label="Email" aria-describedby="user-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="user-pass"><i class="fa fa-key "></i></span>
                        <input id="password" name="password" aria-label="Password" aria-describedby="user-pass"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>


                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="user-captcha"><i class="fa fa-shield-alt"></i></span>
                        <input id="captcha" name="captcha" type="text" aria-label="Captcha" aria-describedby="uuser-captcha" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.enter_captcha') }}">
                        <div class="captcha">
                            <span class="refresh-captcha" id="refresh-captcha">{!! captcha_img() !!}</span>
                        </div>
                        @if($errors->has('captcha'))
                            <div class="invalid-feedback">
                                {{ $errors->first('captcha') }}
                            </div>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-primary mb-3 float-right" style = "width:100%">
                            {{ trans('global.login') }}
                    </button>

                    <div class="" style = "width:100%">
                        <div class="form-check checkbox float-start">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                            <label class="form-check-label" for="remember" style="vertical-align: middle;">
                               {{ trans('global.remember_me') }}
                            </label>
                        </div>

                        <div class="float-end">
                            @if(Route::has('password.request'))
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                    {{ trans('global.forgot_password') }}
                                </a><br>
                            @endif

                        </div>
                    </div>         
                    
                    
                    <div class = "clearfix"></div>

                    <div class="divider m-3">
								<i class="fas fa-chevron-down"></i>
							</div>
                    <div class="row">
                        <div class="" style = "text-align:center">
                            <a class="btn btn-link px-0" href="{{ route('register') }}">
                                {{ trans('global.register') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection


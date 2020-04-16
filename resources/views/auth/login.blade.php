@extends('frontends.layouts.app')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 offset-xs-0 mb-50">
                    <form action="" method="post">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">{{ __('auth.login') }}</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>Email Address*</label>
                                    <input id="email" name="email" class="mb-0 form-control @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autofocus>
                                    @error('email')
                                    <label class="control-label invalid-feedback" for="email" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </label>
                                    @enderror
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Password</label>
                                    <input id="password" name="password" class="mb-0 form-control @error('password') is-invalid @enderror" type="password" placeholder="{{ __('Password') }}" required>
                                    @error('password')
                                    <label class="control-label invalid-feedback" for="password" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </label>
                                    @enderror
                                </div>
                                <div class="col-md-7">

                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                        <input type="checkbox" name="remember" id="remember_me" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember_me">{{ __('Remember Me') }}</label>
                                    </div>

                                </div>
                                @if (Route::has('password.request'))
                                    <div class="col-md-5 mt-10 mb-20 text-left text-md-right">
                                        <a href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}</a>
                                    </div>
                                @endif
                                <div class="col-md-12 text-center">
                                    <button class="register-button mt-0">{{ __('auth.login') }}</button>
{{--                                    <div class="social-auth-links text-center mb-3">--}}
{{--                                        <p>- OR -</p>--}}
{{--                                        <a href="#" class="btn btn-block btn-primary">--}}
{{--                                            <i class="fa fa-facebook mr-2"></i> Sign in using Facebook--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="btn btn-block btn-danger">--}}
{{--                                            <i class="fa fa-google-plus mr-2"></i> Sign in using Google+--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="col-md-12 text-right mt-3">
                                    <a href="{{ route('register') }}" class="d-inline">Register a new membership</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

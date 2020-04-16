@extends('frontends.layouts.app')

@section('content')

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 offset-xs-0 mb-50">
                    <div class="loginForm">
                        <div class="login-form">
                            <h4 class="login-title">{{ __('Confirm Password') }}</h4>
                            <p class="login-box-msg">{{ __('Please confirm your password before continuing.') }}</p>
                            <form action="{{ route('password.confirm') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password" placeholder="{{ __('Password') }}">
                                    <span class="fa fa-lock form-control-feedback"></span>
                                    @error('password')
                                    <label class="control-label invalid-feedback" for="password" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </label>
                                    @enderror
                                </div>
                                <!-- /.col -->
                                <div class="form-group row mb-0">
                                    <button type="submit" class="register-button mt-0 w-auto">
                                        {{ __('Confirm Password') }}
                                    </button>
                                    <div class="clearfix"></div>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

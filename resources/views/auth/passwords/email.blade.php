@extends('frontends.layouts.app')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 offset-xs-0 mb-50">
                    <div class="login-form">
                        <h4 class="login-title">{{ __('auth.forgot_password') }}</h4>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p class="login-box-msg">{{ __('auth.forgot_password_msg') }}</p>
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}"
                                       required autocomplete="email" autofocus>
                                @error('email')
                                <label class="control-label invalid-feedback" for="email" role="alert">
                                    <strong>{{ $message }}</strong>
                                </label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                        class="register-button mt-0 w-auto">{{ __('auth.send_password') }}</button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        <p class="mt-3 mb-1">
                            <a href="{{ route('login') }}">{{ __('auth.login') }}</a>
                        </p>
                        <p class="mb-0 d-block">
                            <a href="{{ route('register') }}" class="text-center">{{ __('auth.register_message') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

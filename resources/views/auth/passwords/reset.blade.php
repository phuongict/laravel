@extends('frontends.layouts.app')

@section('content')
    <section id="register">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 offset-xs-0 mb-50">
                    <div class="registerForm">
                        <div class="login-form">
                            <p class="login-box-msg">{{ __('auth.reset_password_msg') }}</p>
                            <form action="{{ route('password.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('auth.mail_address') }}"
                                           required autocomplete="email">
                                    @error('email')
                                    <label class="control-label invalid-feedback" for="email" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password" placeholder="{{ __('Password') }}">
                                    @error('password')
                                    <label class="control-label invalid-feedback" for="password" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group has-feedback">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('auth.password_confirm') }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                            class="register-button mt-0 w-auto">{{ __('auth.reset_password') }}</button>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                            <p class="mt-3 mb-1">
                                <a href="{{ route('login') }}">{{ __('auth.login') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

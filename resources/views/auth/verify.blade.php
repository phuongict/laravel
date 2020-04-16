@extends('frontends.layouts.app')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 offset-xs-0 mb-50">
                    <div class="loginForm">
                        <div class="login-form">
                            <h4 class="login-title">{{ __('Verify Your Email Address') }}</h4>
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif
                            <p class="login-box-msg">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                            <p class="login-box-msg">{{ __('If you did not receive the email') }},</p>
                            <form action="" method="post">
                                @csrf
                                <button type="submit" class="register-button mt-0 w-auto">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

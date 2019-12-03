@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="hold-transition login-page">
            <div class="login-box">
                <div class="login-logo">
                    {{--            <a href="#">Logo</a>--}}
                </div>
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-header">{{ __('auth.forgot_password') }}</div>
                    <div class="card-body login-card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p class="login-box-msg">{{ __('auth.forgot_password_msg') }}</p>

                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                       placeholder="{{ __('E-Mail Address') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit"
                                            class="btn btn-primary btn-block">{{ __('auth.send_password') }}</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                        <p class="mt-3 mb-1">
                            <a href="{{ route('login') }}">{{ __('auth.login') }}</a>
                        </p>
                        <p class="mb-0">
                            <a href="{{ route('register') }}" class="text-center">{{ __('auth.register_message') }}</a>
                        </p>
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection

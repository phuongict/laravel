@extends('frontends.layouts.app')

@section('content')
    <section id="register">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 offset-xs-0 mb-50">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">{{ __('auth.register') }}</h4>

                            <div class="row">
                                <div class="col-md-12 mb-20">
                                    <label>Last Name</label>
                                    <input class="mb-0 form-control @error('name') is-invalid @enderror" type="text"
                                           id="name" name="name" value="{{ old('name') }}"
                                           placeholder="{{ __('auth.full_name') }}" required>
                                    @error('name')
                                    <label class="control-label invalid-feedback" for="name" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </label>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label>Email Address*</label>
                                    <input class="mb-0 form-control @error('email') is-invalid @enderror" type="email"
                                           id="email" name="email" value="{{ old('email') }}"
                                           placeholder="{{ __('auth.mail_address') }}" required>
                                    @error('email')
                                    <label class="control-label invalid-feedback" for="email" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </label>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label>Password</label>
                                    <input class="mb-0 form-control @error('password') is-invalid @enderror"
                                           type="password" id="password" name="password"
                                           placeholder="{{ __('Password') }}" required>
                                    @error('password')
                                    <label class="control-label invalid-feedback" for="password" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </label>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label>Confirm Password</label>
                                    <input class="mb-0 form-control" id="password-confirm" name="password_confirmation"
                                           type="password" placeholder="{{ __('auth.password_confirm') }}" required>
                                </div>
                                <div class="col-12">
                                    <div class="icheck-primary">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="agreeTerms"
                                                   name="terms" value="agree">
                                            <label class="custom-control-label" for="agreeTerms">{{ __('auth.agree') }}
                                                <a href="#" style="color: #007bff;">{{ __('auth.terms') }}</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="register-button mt-0">{{ __('auth.register') }}</button>
                                    {{--                                    <div class="social-auth-links text-center">--}}
                                    {{--                                        <p>- OR -</p>--}}
                                    {{--                                        <a href="#" class="btn btn-block btn-primary">--}}
                                    {{--                                            <i class="fa fa-facebook mr-2"></i>--}}
                                    {{--                                            Sign up using Facebook--}}
                                    {{--                                        </a>--}}
                                    {{--                                        <a href="#" class="btn btn-block btn-danger">--}}
                                    {{--                                            <i class="fa fa-google-plus mr-2"></i>--}}
                                    {{--                                            Sign up using Google+--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </div>--}}
                                </div>
                                <div class="col-12 text-right mt-3">
                                    <a href="{{ route('login') }}"
                                       class="text-center d-inline text-center pt-5 pd-5">{{ __('auth.has_account') }}</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

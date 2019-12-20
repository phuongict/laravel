@extends('backends.layouts.app')
@section('_title', $_title)
@section('page_name', $_title)
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $_title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.user.save-change-password-user', ['id' => request()->route()->id]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6 offset-3">
                        <div class="form-group">
                            <label for="your_password">{{ __('user.input_your_password') }}</label>
                            <input type="password" name="your_password" value="{{ old('your_password') }}"
                                   class="form-control @error('your_password') is-invalid @enderror" id="your_password"
                                   placeholder="{{ __('user.input_your_password') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('user.password') }}</label>
                            <input type="password" name="password" value="{{ old('password') }}"
                                   class="form-control @error('password') is-invalid @enderror" id="password"
                                   placeholder="{{ __('user.password') }}">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">{{ __('user.password_confirm') }}</label>
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                                   class="form-control @error('password') is-invalid @enderror"
                                   id="password_confirmation" placeholder="{{ __('user.password_confirm') }}">
                        </div>
                        <div class="form-group">
                            <button id="btnSave" class="btn btn-success"><i
                                    class="fa fa-save"></i> {{ __('user.save') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection

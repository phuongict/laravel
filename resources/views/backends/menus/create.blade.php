@extends('backends.layouts.app')
@section('_title', $_title)
@section('page_name', $_title)
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $_title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.menu.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">{{ __('all.name') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   class="form-control @error('name') is-invalid @enderror" id="name"
                                   placeholder="{{ __('user.name') }}">
                        </div>
                        <div class="form-group">
                            @foreach(config('app.menu_type') as $key => $value)
                                <div class="form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="type_{{ $key }}" name="type" value="{{ $key }}" {{ old('type')==$key?'checked':'' }}>
                                        <label class="custom-control-label" for="type_{{ $key }}">{{ $value }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="value">Value</label>
                            <input type="text" name="value" value="{{ old('value') }}"
                                   class="form-control @error('value') is-invalid @enderror" id="value"
                                   placeholder="input route name or link">
                        </div>

                        <div class="form-group">
                            <label for="order">{{ __('menu.order') }}</label>
                            <input type="text" name="order" value="{{ old('order') }}"
                                   class="form-control @error('order') is-invalid @enderror" id="order"
                                   placeholder="{{ __('menu.order') }}">
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon (css class)</label>
                            <input type="text" name="icon" value="{{ old('icon') }}"
                                   class="form-control @error('icon') is-invalid @enderror" id="icon"
                                   placeholder="Icon">
                        </div>
                        <div class="form-group">
                            @foreach(config('app.menu_location') as $key => $value)
                                <div class="form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="location_{{ $key }}" name="location" value="{{ $key }}" {{ old('location')==$key?'checked':'' }}>
                                        <label class="custom-control-label" for="location_{{ $key }}">{{ $value }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="parent">Parent</label>
                            <select name="parent" id="parent" class="form-control select2" data-placeholder="{{ __('menu.choose_parent') }}">
                                <option value="0">== {{ __('menu.no_parent') }} ==</option>
                                {!! $listMenu !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="permission_id">Permission</label>
                            <select name="permission_id" id="permission_id" class="form-control select2" data-placeholder="{{ __('menu.choose_permission') }}">
                                <option value="0">== {{ __('menu.no_permission') }} ==</option>
                                {!! $listPermission !!}
                            </select>
                        </div>




                        <div class="form-group">
                            <button id="btnSave" class="btn btn-success"><i
                                    class="fa fa-save"></i> {{ __('all.save') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection

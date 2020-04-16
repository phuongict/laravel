@extends('backends.layouts.app')
@section('_title', $_title)
@section('page_name', $_title)
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $_title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.user.update', ['id' => request()->route()->id]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="form-group">
                            <label for="name">{{ __('user.name') }}</label>
                            <input type="text" name="name" value="{{ old('name')??$objItem->name }}"
                                   class="form-control @error('name') is-invalid @enderror" id="name"
                                   placeholder="{{ __('user.name') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email')??$objItem->email }}"
                                   class="form-control @error('email') is-invalid @enderror" id="email"
                                   placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="roles">{{ __('user.roles') }}</label>
                            <select name="roles[]" id="roles" class="form-control select2" data-placeholder="{{ __('user.choose_roles') }}" multiple>
                                @foreach($listRoles as $role)
                                    <option value="{{ $role->id }}" @if(is_array(old('roles')) && !empty(old('roles')) && in_array($role->id, old('roles'))) selected @elseif( $objItem->roles->contains($role) ) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
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

@extends('backends.layouts.app')
@section('_title', $_title)
@section('page_name', $_title)
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $_title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.permission.update', ['id' => request()->route()->id]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="form-group">
                            <label for="name">{{ __('all.name') }}</label>
                            <input type="text" name="name" value="{{ old('name')??$objItem->name }}"
                                   class="form-control @error('name') is-invalid @enderror" id="name"
                                   placeholder="{{ __('permission.name') }}">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug')??$objItem->slug }}"
                                   class="form-control @error('slug') is-invalid @enderror" id="slug"
                                   placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label for="parent">Parent</label>
                            <select name="parent" id="parent" class="form-control select2" data-placeholder="{{ __('permission.choose_permission_parent') }}">
                                <option value="0">== {{ __('permission.no_parent') }} ==</option>
                                {!! $listPermission !!}
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

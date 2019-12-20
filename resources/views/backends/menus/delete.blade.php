@extends('backends.layouts.app')
@section('_title', $_title)
@section('page_name', $_title)
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $_title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.menu.destroy', ['id' => request()->route()->id]) }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $objItem->id }}">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-danger">
                            <h6>{{ __('all.wh_delete', ['name' => 'menu', 'del_name' => $objItem->name]) }}</h6>
                        </div>
                        <div class="form-group text-right">
                            <a id="btnCancel" href="{{ route('backend.menu.index') }}" class="btn btn-default btn-sm"><i
                                    class="fa fa-times"></i> {{ __('all.cancel') }}</a>
                            <button id="btnDelete" class="btn btn-danger btn-sm"><i
                                    class="fa fa-save"></i> {{ __('all.delete') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection

@extends('backends.layouts.app')
@section('_title', $_title)
@section('page_name', $_title)
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-3 col-sm-4 ">
                        <div class="form-group">
                            <input type="number" value="{{ old('id') }}" placeholder="ID" name="id" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 ">
                        <div class="form-group">
                            <input type="text" placeholder="name" value="{{ old('name') }}" name="name" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 text-center">
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i> {{ __('all.search') }}</button>
                            <a class="btn btn-default btn-sm" href="{{  url()->current() }}"> {{ __('all.clear') }}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $_title }}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#ID</th>
                        <th>City/Province code</th>
                        <th>Name</th>
                        <th>English Name</th>
                        <th>Level</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($lists) && $lists->count() > 0)
                        @foreach($lists as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->city_province_code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->english_name }}</td>
                                <td>{{ $item->level }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $lists->appends(request()->input())->links() }}
        </div>
    </div>
@endsection

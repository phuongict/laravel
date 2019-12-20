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
                            <input type="number" placeholder="ID" name="id" value="{{ old('id') }}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 ">
                        <div class="form-group">
                            <input type="text" placeholder="name" name="name" value="{{ old('name') }}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 ">
                        <div class="form-group">
                            @foreach(config('app.menu_location') as $key => $value)
                                <div class="form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="location_{{ $key }}" name="location" value="{{ $key }}" {{ is_numeric(old('location'))&&old('location')==$key?'checked':'' }}>
                                        <label class="custom-control-label" for="location_{{ $key }}">{{ $value }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 text-center">
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i> {{ __('all.search') }}</button>
                            <a class="btn btn-default btn-sm" href="{{  url()->current() }}"> {{ __('all.clear') }}</a>
                            <a class="btn btn-info btn-sm" href="{{  route('backend.menu.create') }}"> {{ __('all.add_new') }}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $_title }}</h3>
            <div class="card-tools">
                <a class="btn btn-success btn-sm" href="{{ route('backend.menu.sort-menu') }}"><i class="fa fa-sort"></i> {{ __('menu.sort_menu') }}</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#ID</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Type</th>
                    <th>Parent</th>
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Permission</th>
                    <th>Create at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($lists) && $lists->count() > 0)
                    @foreach($lists as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->value }}</td>
                            <td>
                                {{ config('app.menu_type')[$item->type] }}
                            </td>
                            <td>{{ $item->parent_name }}</td>
                            <td>{{ $item->order }}</td>
                            <td>{{ $item->icon }}</td>
                            <td>{{ config('app.menu_status')[$item->status] }}</td>
                            <td>{{ config('app.menu_location')[$item->location] }}</td>
                            <td>{{ $item->permission->name }}</td>
                            <td>
                                {{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}
                            </td>
                            <td>
                                <a href="{{ route('backend.menu.edit', ['id' => $item->id]) }}"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('backend.menu.delete', ['id' => $item->id]) }}"><i class="fa fa-trash" style="color:red;"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $lists->appends(request()->input())->links() }}
        </div>
    </div>
@endsection

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
{{--                            <a class="btn btn-info btn-sm" href="{{  route('backend.order.create') }}"> {{ __('all.add_new') }}</a>--}}
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
                        <th>Customer name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City/Province</th>
                        <th>District</th>
                        <th>Village</th>
                        <th>Address</th>
{{--                        <th>Payment</th>--}}
{{--                        <th>Ship</th>--}}
{{--                        <th>Note</th>--}}
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($lists) && $lists->count() > 0)
                        @foreach($lists as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->first_name.' '.$item->last_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->cityProvince->name }}</td>
                                <td>{{ $item->district->name }}</td>
                                <td>{{ $item->village->name }}</td>
                                <td>{{ $item->address }}</td>
{{--                                <td>{{ $item->payment }}</td>--}}
{{--                                <td>{{ $item->ship }}</td>--}}
{{--                                <td>{{ $item->note }}</td>--}}
                                <td>
                                    <select @change="$refs.order_index.changeStatus(JSON.stringify({{ $item->id }}), $event)" style="min-width: 130px;" class="custom-select" >
                                        @foreach(config('app.order_status') as $key=>$value)
                                            <option value="{{ $key }}" @if($key == $item->status) selected @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    {{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}
                                </td>
                                <td>
                                    <a href="{{ route('backend.order.order-detail', ['id' => $item->id]) }}" title="Detail"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('backend.order.edit', ['id' => $item->id]) }}"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('backend.order.delete', ['id' => $item->id]) }}"><i class="fa fa-trash" style="color: red;"></i></a>
                                </td>
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
    <order-index ref="order_index"></order-index>
@endsection

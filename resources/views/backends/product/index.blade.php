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
                            <input type="text" value="{{ old('product_code') }}" placeholder="Code" name="product_code"
                                   class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 ">
                        <div class="form-group">
                            <input type="text" placeholder="name" value="{{ old('name') }}" name="name"
                                   class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 text-center">
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i> {{ __('all.search') }}
                            </button>
                            <a class="btn btn-default btn-sm" href="{{  url()->current() }}"> {{ __('all.clear') }}</a>
                            <a class="btn btn-info btn-sm"
                               href="{{  route('backend.product.create') }}"> {{ __('all.add_new') }}</a>
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
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
{{--                        <th style="width: 10px">#ID</th>--}}
                        <th style="width: 10px">Code</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($lists) && $lists->count() > 0)
                        @foreach($lists as $item)
                            <tr>
{{--                                <td>{{ $item->id }}</td>--}}
                                <td>{{ $item->product_code }}</td>
                                <td><img src="{{ asset('/storage/'.$item->image) }}" alt="" style="max-width: 50px;"
                                         class="img-fluid"></td>
                                <td><strong>{{ $item->name }}</strong></td>
                                <td>{{ $item->productCategory->name }}</td>
                                <td>
                                    <span style="text-decoration-line: line-through;">{{ number_format($item->price) }}</span>
                                     <strong class="text-danger">{{ number_format(($item->price - (($item->price*$item->discount)/100)) )}}</strong>
                                </td>
                                <td>{{ $item->discount }}%</td>
                                <td>
                                    <button type="button" class="btn btn-link changeFeature" @click="$refs.product_index.changeFeature(JSON.stringify({{ $item }}))">
                                        <i class="fa fa-star"
                                           style="color:{{ $item->featured == 1?'#ffc107':'silver' }};"></i>
                                    </button>
                                </td>
                                <td>
                                    <select @change="$refs.product_index.changeStatus(JSON.stringify({{ $item->id }}), $event)" class="custom-select" >
                                        @foreach(config('app.product_status') as $key=>$value)
                                            <option value="{{ $key }}" @if($key === $item->status) selected @endif>{{ $value }}</option>
                                            @endforeach
                                    </select>
                                </td>
                                <td>
                                    {{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}
                                </td>
                                <td>
                                    <a href="{{ route('backend.product.edit', ['id' => $item->id]) }}"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ route('backend.product.delete', ['id' => $item->id]) }}"><i
                                            class="fa fa-trash" style="color: red;"></i></a>
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
    <product-index ref="product_index"></product-index>
@endsection

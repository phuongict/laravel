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
                            <input type="number" value="{{ old('id') }}" placeholder="ID" name="id"
                                   class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 ">
                        <div class="form-group">
                            <input type="text" placeholder="title" value="{{ old('title') }}" name="title"
                                   class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 text-center">
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i> {{ __('all.search') }}
                            </button>
                            <a class="btn btn-default btn-sm" href="{{  url()->current() }}"> {{ __('all.clear') }}</a>
                            <a class="btn btn-info btn-sm"
                               href="{{  route('backend.post.create') }}"> {{ __('all.add_new') }}</a>
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
                        <th>Image</th>
                        <th>Title</th>
                        <th>Short content</th>
                        <th>Category</th>
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
                                <td>{{ $item->id }}</td>
                                <td><img src="{{ asset('/storage/'.$item->image) }}" alt="" style="max-width: 50px;"
                                         class="img-fluid"></td>
                                <td><strong>{{ $item->title }}</strong></td>
                                <td>{{ mb_strlen($item->short_content)>75?mb_substr($item->short_content, 0, 75).'...':$item->short_content }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-link changeFeature" @click="$refs.post_index.changeFeature(JSON.stringify({{ $item }}))">
                                        <i class="fa fa-star"
                                           style="color:{{ $item->featured == 1?'#ffc107':'silver' }};"></i>
                                    </button>
                                </td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" @click="$refs.post_index.changeStatus(JSON.stringify({{ $item }}))" id="changeStatus_{{ $item->id }}" {{ $item->status==1?'checked':'' }}>
                                        <label class="custom-control-label" for="changeStatus_{{ $item->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    {{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}
                                </td>
                                <td>
                                    <a href="{{ route('backend.post.edit', ['id' => $item->id]) }}"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ route('backend.post.delete', ['id' => $item->id]) }}"><i
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
    <post-index ref="post_index"></post-index>
@endsection

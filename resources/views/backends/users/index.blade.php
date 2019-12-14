@extends('backends.layouts.app')
@section('_title', $_title)
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-2 col-sm-3 ">
                        <input type="number" placeholder="ID" name="id" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-3 ">
                        <input type="text" placeholder="name" name="name" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-3 ">
                        <input type="text" placeholder="email" name="email" class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-3 ">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i> {{ __('all.search') }}</button>
                        <a class="btn btn-default btn-sm" href="{{  url()->current() }}"> {{ __('all.clear') }}</a>
                        <a class="btn btn-info btn-sm" href="{{  route('backend.user.create') }}"> {{ __('all.add_new') }}</a>
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
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Blocked</th>
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
                            <td>{{ $item->email }}</td>
                            <td>
                                {{ implode(',', $item->roles->map(function($item) { return $item->name; })->toArray()) }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-default btn-sm" v-on:click="$refs.user_index.changeStatus(JSON.stringify({{ $item }}))">
                                    @if($item->blocked)
                                        <i class="fa fa-lock" style="color: red;"></i> {{ __('user.blocked') }}
                                    @else
                                        <i class="fa fa-unlock" style="color: green;"></i> {{ __('user.open') }}
                                    @endif
                                </button>
                            </td>
                            <td>
                                {{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}
                            </td>
                            <td>
                                <a href="{{ route('backend.user.edit', ['id' => $item->id]) }}"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $lists->appends($requestParams)->links() }}
        </div>
    </div>
    <user-index ref="user_index"></user-index>
@endsection

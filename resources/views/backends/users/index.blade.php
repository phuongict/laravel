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
                    <div class="col-md-3 col-sm-4 ">
                        <div class="form-group">
                            <input type="text" placeholder="email" value="{{ old('email') }}" name="email" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 text-center">
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i> {{ __('all.search') }}</button>
                            <a class="btn btn-default btn-sm" href="{{  url()->current() }}"> {{ __('all.clear') }}</a>
                            <a class="btn btn-info btn-sm" href="{{  route('backend.user.create') }}"> {{ __('all.add_new') }}</a>
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
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
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
                                {{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}
                            </td>
                            <td>
                                <div class="action-grid">
                                    <a href="{{ route('backend.user.edit', ['id' => $item->id]) }}"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-link" style="padding: 0;" v-on:click="$refs.user_index.changeStatus(JSON.stringify({{ $item }}))">
                                        @if($item->blocked)
                                            <i class="fa fa-lock" style="color: red;"></i>
                                        @else
                                            <i class="fa fa-unlock" style="color: green;"></i>
                                        @endif
                                    </button>
                                    <a href="{{ route('backend.user.edit-permission', ['id' => $item->id]) }}"><i class="fa fa-tasks" style="color: orangered;"></i></a>
                                    <a href="{{ route('backend.user.show', ['id' => $item->id]) }}"><i class="fa fa-user"></i></a>
                                    <a href="{{ route('backend.user.change-password-user', ['id' => $item->id]) }}"><i class="fa fa-key"></i></a>
                                </div>
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
    <user-index ref="user_index"></user-index>
@endsection

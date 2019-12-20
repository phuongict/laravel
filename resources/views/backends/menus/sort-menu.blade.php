@extends('backends.layouts.app')
@section('_title', $_title)
@section('page_name', $_title)
@section('content')
    <sort-menu title="{{ $_title }}" :menu_location="JSON.parse('{{ json_encode(config('app.menu_location')) }}')"></sort-menu>
@endsection
@section('script')
    <script src="{{ asset('/plugins/jquery-nestable/jquery.nestable.js') }}"></script>
@endsection

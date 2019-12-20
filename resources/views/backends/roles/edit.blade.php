@extends('backends.layouts.app')
@section('_title', $_title)
@section('page_name', $_title)
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/adminlte/plugins/jquery-ui/jquery-ui.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/plugins/jquery-tree/jquery.tree.min.css') }}">
    <style>
        .custom-control-label::before, .custom-control-label::after {
            top: 0;
            left: -1.5rem;
        }

        .ui-widget.ui-widget-content {
            padding: 1rem;
        }

        .daredevel-tree li {
            border-left: 1px dashed #000000;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $_title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.role.update', ['id' => request()->route('id')]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="sticky-top p-2 bg-white mb-1"
                         style="box-shadow: 0 1px 0 0 rgba(0,0,0,0.16), 0 2px 0px 0 rgba(0,0,0,0.12);">
                        <button class="btn btn-info btn-sm" id="checkAll"><i class="fa fa-check"></i> Check all</button>
                        <button type="submit" id="btnSave" class="btn btn-success btn-sm"><i
                                class="fa fa-save"></i> {{ __('all.save') }}</button>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">{{ __('all.name') }}</label>
                            <input type="text" name="name" value="{{ old('name')??$objItem->name }}"
                                   class="form-control @error('name') is-invalid @enderror" id="name"
                                   placeholder="{{ __('user.name') }}">
                        </div>
                        <div class="form-group">
                            <div class="permission-tree">
                                {!! $tree !!}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('/vendor/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/plugins/jquery-tree/jquery.tree.min.js') }}"></script>
    <script>
        $(function () {
            $('.permission-tree').tree({
                onCheck: {
                    node: 'expand'
                },
                onUncheck: {
                    node: 'collapse'
                }
            });
            let checkAll = false;
            let check = $('input[name="permissions[]"]').length;
            let checked = $('input[name="permissions[]"]:checked').length;
            if (check === checked) {
                checkAll = true;
                $('#checkAll').removeClass('btn-info');
                $('#checkAll').addClass('btn-warning');
                $('#checkAll').html('<i class="fa fa-times"></i> Uncheck all');
            }

            $('#checkAll').click(function (e) {
                e.preventDefault();
                if (checkAll === false) {
                    checkAll = true;
                    $(this).removeClass('btn-info');
                    $(this).addClass('btn-warning');
                    $(this).html('<i class="fa fa-times"></i> Uncheck all');
                    $('.permission-tree').tree('checkAll');
                } else {
                    checkAll = false;
                    $(this).removeClass('btn-warning');
                    $(this).addClass('btn-info');
                    $(this).html('<i class="fa fa-check"></i> Check all');
                    $('.permission-tree').tree('uncheckAll');
                }
            });
        });
    </script>
@endsection

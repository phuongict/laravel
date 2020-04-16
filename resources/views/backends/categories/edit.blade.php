@extends('backends.layouts.app')
@section('_title', $_title)
@section('page_name', $_title)
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $_title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.category.update', ['id' => request()->route('id')]) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">{{ __('all.name') }}</label>
                            <input type="text" name="name" value="{{ old('name')??$objItem->name }}"
                                   class="form-control @error('name') is-invalid @enderror" id="name"
                                   placeholder="{{ __('user.name') }}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug')??$objItem->slug }}"
                                   class="form-control @error('slug') is-invalid @enderror" id="slug"
                                   placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('category.description') }}</label>
                            <textarea name="description" id="description" placeholder="{{ __('category.description') }}"
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description')??$objItem->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords">{{ __('category.keywords') }}</label>
                            <input type="text" name="keywords" value="{{ old('keywords')??$objItem->keywords }}"
                                   class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                                   placeholder="{{ __('category.keywords') }}">
                        </div>
                        <div class="form-group">
                            <label for="image">{{ __('category.image') }}</label><br/>
                            <img id="image_upload_preview" src="{{ Storage::url($objItem->image) }}" alt="your image"
                                 style="max-width: 200px;margin-bottom: 20px;" class="img-fluid"/>
                            <input type="file" name="image" accept="image/*"
                                   class="form-control-file @error('image') is-invalid @enderror" id="image"
                                   placeholder="{{ __('category.image') }}">
                        </div>
                        <div class="form-group">
                            <button id="btnSave" class="btn btn-success"><i
                                    class="fa fa-save"></i> {{ __('all.save') }}</button>
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
    <script>
        $(function () {
            $("#image").change(function () {
                readURL(this, '#image_upload_preview');
            });

            $('#name').keyup(function () {
                let slug = removeAccents($(this).val());
                $('#slug').val(slug);
            });
        });
    </script>

@endsection

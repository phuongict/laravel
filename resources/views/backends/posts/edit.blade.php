@extends('backends.layouts.app')
@section('_title', $_title)
@section('page_name', $_title)
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $_title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.post.update', ['id' => request()->route('id')]) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="title">{{ __('all.title') }}</label>
                            <input type="text" name="title" value="{{ old('title')??$objItem->title }}"
                                   class="form-control @error('title') is-invalid @enderror" id="title"
                                   placeholder="{{ __('all.title') }}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug')??$objItem->slug }}"
                                   class="form-control @error('slug') is-invalid @enderror" id="slug"
                                   placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label for="content">{{ __('post.content') }}</label>
                            <textarea name="content" id="content" rows="5" placeholder="{{ __('post.content') }}"
                                      class="form-control textarea @error('content') is-invalid @enderror">{{ old('content')??$objItem->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="short_content">{{ __('post.short_content') }}</label>
                            <textarea name="short_content" id="short_content"
                                      placeholder="{{ __('post.short_content') }}"
                                      class="form-control @error('short_content') is-invalid @enderror">{{ old('short_content')??$objItem->short_content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('post.description') }}</label>
                            <textarea name="description" id="description" placeholder="{{ __('post.description') }}"
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description')??$objItem->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords">{{ __('post.keywords') }}</label>
                            <input type="text" name="keywords" value="{{ old('keywords')??$objItem->keywords }}"
                                   class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                                   placeholder="{{ __('post.keywords') }}">
                        </div>
                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="category_id">{{ __('category.category') }}</label>
                            <select name="category_id" id="category_id" class="form-control select2"
                                    data-placeholder="{{ __('post.choose_category') }}">
                                <option value="">{{ __('post.choose_category') }}</option>
                                @foreach($listCategory as $category)
                                    <option value="{{ $category->id }}"
                                            @if(old('category_id') && $category->id == old('category_id')) selected
                                            @elseif($objItem->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">{{ __('post.image') }}</label><br/>
                            <img id="image_upload_preview" src="{{ Storage::url($objItem->image) }}" alt="your image"
                                 style="max-width: 200px;margin-bottom: 20px;" class="img-fluid"/>
                            <input type="file" name="image" accept="image/*"
                                   class="form-control-file @error('image') is-invalid @enderror" id="image"
                                   placeholder="{{ __('post.image') }}">
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

            $('#title').keyup(function () {
                let slug = removeAccents($(this).val());
                $('#slug').val(slug);
            });
        });
        $(function () {
            $('.textarea').summernote({
                height: 250,
            })
        })
    </script>

@endsection

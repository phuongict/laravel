@extends('backends.layouts.app')
@section('_title', $_title)
@section('page_name', $_title)
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $_title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.product.update', ['id' => request()->route('id')]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="product_code">{{ __('product.product_code') }}</label>
                            <input type="text" name="product_code" value="{{ old('product_code')??$objItem->product_code }}"
                                   class="form-control @error('product_code') is-invalid @enderror" id="product_code"
                                   placeholder="{{ __('product.product_code') }}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="name">{{ __('all.name') }}</label>
                            <input type="text" name="name" value="{{ old('name')??$objItem->name }}"
                                   class="form-control @error('name') is-invalid @enderror" id="name"
                                   placeholder="{{ __('all.name') }}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug')??$objItem->slug }}"
                                   class="form-control @error('slug') is-invalid @enderror" id="slug"
                                   placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label for="product_description">{{ __('product.product_description') }}</label>
                            <textarea name="product_description" id="product_description" rows="5" placeholder="{{ __('product.product_description') }}"
                                      class="form-control textarea @error('product_description') is-invalid @enderror">{{ old('product_description')??$objItem->product_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_info">{{ __('product.product_info') }}</label>
                            <textarea name="product_info" id="product_info" placeholder="{{ __('product.product_info') }}"
                                      class="form-control @error('product_info') is-invalid @enderror">{{ old('product_info')??$objItem->product_info }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="unit_id">{{ __('product.unit') }}</label>
                            <select name="unit_id" id="unit_id" class="form-control select2" data-placeholder="{{ __('product.choose_unit') }}">
                                <option value="">{{ __('product.choose_unit') }}</option>
                                @foreach($listUnit as $unit)
                                    <option value="{{ $unit->id }}" @if(old('unit_id') && $unit->id == old('unit_id')) selected @elseif($objItem->unit_id == $unit->id) selected  @endif>{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">{{ __('product.price') }}</label>
                            <input type="text" name="price" value="{{ old('price')??$objItem->price }}"
                                   class="form-control @error('price') is-invalid @enderror" id="price"
                                   placeholder="{{ __('product.price') }}" autocomplete="off">
                            <span class="text-danger" id="price_real">{{ $objItem->price && $objItem->discount? $objItem->price - (($objItem->price*$objItem->discount)/100):'' }}</span>
                        </div>
                        <div class="form-group">
                            <label for="discount">{{ __('product.discount') }}</label>
                            <input type="number" name="discount" value="{{ old('discount')?old('discount'):($objItem->discount??0) }}"
                                   class="form-control @error('discount') is-invalid @enderror" id="discount"
                                   placeholder="{{ __('product.discount') }} (%)" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4">

                        <div class="form-group">
                            <label for="product_category_id">{{ __('product_category.product_category') }}</label>
                            <select name="product_category_id" id="product_category_id" class="form-control select2" data-placeholder="{{ __('product.choose_category') }}">
                                <option value="">{{ __('product.choose_category') }}</option>
                                @foreach($listCategory as $category)
                                    <option value="{{ $category->id }}" @if(old('product_category_id') && $category->id == old('product_category_id')) selected @elseif($objItem->product_category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('product.description') }}</label>
                            <textarea name="description" id="description" rows="5" placeholder="{{ __('product.description') }}"
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description')??$objItem->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords">{{ __('product.keywords') }}</label>
                            <input type="text" name="keywords" value="{{ old('keywords')??$objItem->keywords }}"
                                   class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                                   placeholder="{{ __('product.keywords') }}">
                        </div>
                        <div class="form-group">
                            <label for="gallery">{{ __('product.gallery') }}</label><br/>
                            <div id="gallery_upload_preview">
                                @if($objItem->gallery != null)
                                    @foreach(unserialize($objItem->gallery) as $image)
                                        <img src="{{ Storage::url($image) }}" title="" class="img-fluid w-100">
                                        @endforeach
                                    @else
                                <img src="http://placehold.it/100x100" alt="your image"
                                     style="max-width: 200px;margin-bottom: 20px;" class="img-fluid"/>
                                    @endif
                            </div>
                            <input type="file" name="gallery[]" accept="image/*"
                                   class="form-control-file @error('gallery') is-invalid @enderror" id="gallery"
                                   placeholder="{{ __('product.gallery') }}" multiple>
                        </div>
                        <div class="form-group">
                            <label for="image">{{ __('product.image') }}</label><br/>
                            <img id="image_upload_preview" src="{{ Storage::url($objItem->image) }}" alt=""
                                 style="max-width: 200px;margin-bottom: 20px;" class="img-fluid"/>
                            <input type="file" name="image" accept="image/*"
                                   class="form-control-file @error('image') is-invalid @enderror" id="image"
                                   placeholder="{{ __('product.image') }}" multiple>
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
    <script src="{{ asset('/plugins/mask-money/jquery.maskMoney.min.js') }}"></script>
    <script>
        $(function () {
            $("#image").change(function () {
                readURL(this, '#image_upload_preview');
            });
            $("#gallery").change(function () {
                readMultipleImage(this, $('#gallery_upload_preview'));
            });
            $('#name').keyup(function () {
                let slug = removeAccents($(this).val());
                $('#slug').val(slug);
            });
            $('#product_code').keyup(function(){
                $(this).val($(this).val().toUpperCase());
            });
            $('#discount').keyup(function(){
                let value = $(this).val();
                if(value < 0 || value > 100){
                    toastr.options = {
                        "positionClass": "toast-bottom-right"
                    };
                    toastr.error('Discount must be between 0 and 100');
                    $(this).focus();
                    if(!$(this).hasClass('is-invalid'))
                        $(this).addClass('is-invalid');
                }
                else{
                    if($(this).hasClass('is-invalid'))
                        $(this).removeClass('is-invalid');
                    const _price = $('#price');
                    let currentPrice = _price.val().replace(/,/g, '');
                    if(currentPrice === '')
                    {
                        let newElement = document.createElement('span');
                        newElement.className = 'error invalid-feedback';
                        newElement.innerText = 'Price is require!';
                        $(newElement).insertAfter('#price');
                        _price.focus();
                        if(!_price.hasClass('is-invalid'))
                            _price.addClass('is-invalid');
                    }
                    else
                    {
                        if(_price.hasClass('is-invalid'))
                            _price.removeClass('is-invalid');
                        let total_price = formatNumber((currentPrice-(currentPrice*value/100)));
                        $('#price_real').text(total_price);
                    }
                }
            });

            $('#price').keyup(function(){
                $('#price + span.error').remove();
                let discount = $('#discount').val();
                if(discount >= 0 && discount <= 100){
                    let price = $(this).val().replace(/,/g, '');
                    let total_price = formatNumber((price-(price*discount/100)));
                    $('#price_real').text(total_price);
                }

            });
        });
        $(function () {
            $('.textarea').summernote({
                height: 250,
            });
            $("#price").maskMoney({
                precision:0
            });
        })
    </script>

@endsection

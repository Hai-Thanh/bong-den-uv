@extends('admin.layouts.admin')

@section('title', 'Thêm danh mục')

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script src="{{ asset('admins/products/add.js') }}"></script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endsection


@section('content')
<div class="main-content-container container-fluid px-4">
@include('admin.partials.title-content', ['name'=>'Thêm danh mục'])


<form action="{{ route('store_cate') }} " class="add-new-post" method="POST">
    @csrf

        <div class="form-group col-md-6">
            <label for="iputName" class="text-muted d-block mb-2">Tên danh mục</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">@</span>
                </div>
                <input type="text" name="name" id="iputName" class="form-control" placeholder="Nhập tên danh mục" > 
            </div>
            @error('name')
               <span  style="color: red; font-size:17px">{{ $message }}</span>
            @enderror

        </div>
     
        <div class="form-group col-md-6">
            <label for="inputState" class="text-muted d-block mb-2">Chọn menu cha</label>
            <select name="parent_id" id="inputState" class="form-control">
              <option value="0" >Danh mục cha</option>
                {!! $htmlOption !!}
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="image_path" class="text-muted d-block mb-2">Ảnh danh mục</label>
            <div class="input-group">
                <span class="input-group-btn">
                  <a id="lfm" data-input="image_path" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                  </a>
                </span>
                <input id="image_path" value="{{ old('image_path') }}" class="form-control" type="text" name="image_path">
              </div>

            @error('image_path')
              <span  style="color: red; font-size:17px">{{ $message }}</span>
           @enderror
            <div   id="holder">
            <img  src=" {{ old('image_path') }}"  style="margin-top:15px;max-height:100px;">
            </div>
        </div>


        &nbsp;&nbsp;&nbsp;    
        <button type="submit" class="mb-2 btn btn-success mr-2">Thêm</button>
        <a href="{{ route('categories') }}" class="mb-2 btn btn-danger mr-2">Hủy</a>
</form>
</div>

@endsection
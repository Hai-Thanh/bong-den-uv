@extends('admin.layouts.admin')

@section('title', 'Thêm slideshow')

@section('content')
<div class="main-content-container container-fluid px-4">
@include('admin.partials.title-content', ['name'=>'Thêm slideshow'])


<form action="{{route('slider.store')}}" enctype="multipart/form-data" class="add-new-post" method="POST">
    @csrf

        <div class="form-group col-md-6">
            <label for="iputName" class="text-muted d-block mb-2">Tên slider</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">@</span>
                </div>
                <input type="text" name="name"  class="form-control" placeholder="Nhập tên" > 
            @error('name')
                <span  style="color: red; font-size:17px">{{ $message }}</span>
             @enderror
         

            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="iputName" class="text-muted d-block mb-2">Mô tả</label>
            <div class="input-group mb-6">
               <textarea class="form-control" name="descripiton"  cols="90" rows="10"></textarea>
            </div>
        @error('descripiton')
            <span  style="color: red; font-size:17px">{{ $message }}</span>
         @enderror

        </div>

    

        <div class="form-group col-md-6">
            <label for="image_path" class="text-muted d-block mb-2">Ảnh chi tiết sản phẩm</label>
            <div class="input-group mb-3">
                <input type="file"  name="image_path" id="image_path">
            @error('image_path')
                <span  style="color: red; font-size:17px">{{ $message }}</span>
             @enderror
            </div>
        </div>
     
        &nbsp;&nbsp;&nbsp;      
        <button type="submit" class="mb-2 btn btn-success mr-2">Thêm</button>
        <a href="{{ route('slider') }}" class="mb-2 btn btn-danger mr-2">Hủy</a>
</form>
</div>

@endsection
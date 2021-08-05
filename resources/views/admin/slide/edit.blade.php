@extends('admin.layouts.admin')

@section('title', 'Sửa Slider')

@section('content')
    <div class="main-content-container container-fluid px-4">
        @include('admin.partials.title-content', ['name'=>'Thêm Slider'])

        <form action="{{ route('slider.update', ['id' => $slide->id]) }}" enctype="multipart/form-data" class="add-new-post"
            method="POST">
            @csrf

            <div class="form-group col-md-6">
                <label for="iputName" class="text-muted d-block mb-2">Tên slider</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" value="{{ $slide->name }}" name="name" class="form-control" placeholder="Nhập tên">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="iputName" class="text-muted d-block mb-2">Mô tả</label>
                <div class="input-group mb-6">
                    <textarea class="form-control" name="descripiton" cols="90"
                        rows="10"> {{ $slide->descripiton }}</textarea>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="image_path" class="text-muted d-block mb-2">Ảnh chi tiết sản phẩm</label>
                <div class="input-group mb-3">
                    <input type="file" name="image_path" id="image_path">
                </div>
                <img src="{{ $slide->image_path }}" width="200" height="200" alt="">
            </div>

            &nbsp;&nbsp;&nbsp;
            <button type="submit" class="mb-2 btn btn-success mr-2">Sửa</button>
            <a href="{{ route('slider') }}" class="mb-2 btn btn-danger mr-2">Hủy</a>
        </form>
    </div>

@endsection

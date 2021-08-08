@extends('admin.layouts.admin')

@section('title', 'Thông tin slide show')

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('admins/main.js') }}"></script>

@endsection
@section('content')

<div class="main-content-container container-fluid px-4">

@include('admin.partials.title-content', ['name'=>'Slide show'])
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Danh mục</h6>
          @can('add slider')
            <a class="nav-link " href="{{ route('slider.add') }}">
              <i class="material-icons">note_add</i>
              <span>Add New Slider</span>
            </a>
          @endcan
        </div>
        <div class="card-body p-0 pb-3 text-center">
          <table class="table mb-0">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0">#</th>
                <th scope="col" class="border-0">Tên</th>
                <th scope="col" class="border-0">Mô tả</th> 
                <th scope="col" class="border-0">Ảnh slider</th> 
                <th scope="col" class="border-0">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($sliders as  $slider)
                <tr>
                  <td>{{ $slider->id }}</td>
                  <td>{{ $slider->name }}</td>
                  <td>{{ $slider->descripiton }}</td>
                  <td><img src="{{$slider->image_path  }}" alt="{{$slider->image_name }}" width="230" height="230" ></td>
                  <td>
                    @can('edit slider')
                    <a href="{{ route('slider.edit', ['id' =>$slider->id]) }}" class="mb-2 btn btn-info mr-2 ">Sửa</a>
                   @endcan
                   
                   @can('delete slider')
                   <a href="" data-url="{{ route('slider.delete', ['id' =>$slider->id]) }}" class="mb-2 btn btn-danger mr-2 action_delete">Xóa</a>
                    @endcan
                  </td>
                </tr>
              
              @endforeach
     
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
 @endsection


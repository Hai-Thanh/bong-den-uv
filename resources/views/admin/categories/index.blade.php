@extends('admin.layouts.admin')

@section('title', 'Danh mục')


@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('admins/main.js') }}"></script>

@endsection
@section('content')

<div class="main-content-container container-fluid px-4">

@include('admin.partials.title-content', ['name'=>'Danh mục sản phẩm'])
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Danh mục   {{ $schoolname }}</h6>
          @can('add categories')
          <a class="nav-link " href="{{ route('add_cate') }}">
            <i class="material-icons">note_add</i>
            <span>Add New Category</span>
          </a>
        @endcan
        </div>
        <div class="card-body p-0 pb-3 text-center">
          <table class="table mb-0">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0">#</th>
                <th scope="col" class="border-0">Name</th>
                <th scope="col" class="border-0">Ảnh</th>
                <th scope="col" class="border-0">Slug</th> 
                <th scope="col" class="border-0">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($categories as  $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td><img src="{{ $category->image_path }}" width="250px" height="250px" alt=""></td>
                  <td>{{ $category->slug }}</td>
                  

                  <td>
                    @can('edit categories')
                      <a href="{{ url("admin/categories/edit/$category->id") }}" class="mb-2 btn btn-info mr-2 ">Sửa</a>
                    @endcan
                    

                    @can('delete categories')
                      <a href="" data-url="{{ url("admin/categories/delete/$category->id") }}" class="mb-2 btn btn-danger mr-2 action_delete">Xóa</a>
                    @endcan

                  </td>
                </tr>
              
              @endforeach
     
            </tbody>
          </table>

        {{ $categories ->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
 @endsection


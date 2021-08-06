@extends('admin.layouts.admin')

@section('title', 'Danh sách bài viết')


@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('admins/main.js') }}"></script>

@endsection
@section('content')

<div class="main-content-container container-fluid px-4">

@include('admin.partials.title-content', ['name'=>'Danh sách bài viết'])
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Bài viết</h6>
          <a class="nav-link " href="{{ route('posts.add') }}">
            <i class="material-icons">note_add</i>
            <span>Add New Posts</span>
          </a>

        </div>
        <div class="card-body p-0 pb-3 text-center">
          <table class="table mb-0">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0">#</th>
                <th scope="col" class="border-0">Tiêu đề</th>
                <th scope="col" class="border-0">Nội dung</th>
                <th scope="col" class="border-0">Người đăng bài</th> 
                <th scope="col" class="border-0">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $k =>  $post)
              <tr>
              
                <td>{{ $k +1 }}</td>
                <td>{{$post->title }}</td>
                <td><img src="{{ $post->image_path}}" width="250px" height="250px" alt=""></td>
                <td>{{ $post->userPost->name }}</td>
                <td>
                  <a href="{{ route('posts.edit', [$post->id]) }}" class="mb-2 btn btn-info mr-2 ">Sửa</a>
                  <a href="" data-url="{{ route('posts.delete', ['id' =>$post->id]) }}" class="mb-2 btn btn-danger mr-2 action_delete">Xóa</a>
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


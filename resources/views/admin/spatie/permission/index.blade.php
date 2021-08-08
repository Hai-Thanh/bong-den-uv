@extends('admin.layouts.admin')

@section('title', 'Thông tin permission')
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/main.js') }}"></script>

@endsection
@section('content')
    <div class="main-content-container container-fluid px-4">

        @include('admin.partials.title-content', ['name'=>'Danh sách Permission'])
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Permission</h6>
                        @can('add permissions')
                            <a class="nav-link " href="{{ route('permission.add') }}">
                                <i class="material-icons">note_add</i>
                                <span>Add Permission</span>
                            </a>
                        @endcan
                    </div>
                    <br>
                
                    <div class="card-body p-0 pb-3 text-center">

                        <table class="table mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0">ID</th>
                                    <th scope="col" class="border-0">Tên quyền</th>
                                    <th scope="col" class="border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permission as  $permiss)
                                <tr>
                                    <td>{{ $permiss->id }}</td>
                                    <td>{{ $permiss->name }}</td>
                                    <td>

                                        @can('edit permissions')
                                           <a href="{{ route('permission.edit', [$permiss->id]) }}" class="mb-2 btn btn-info mr-2 ">Sửa</a>
                                        @endcan
                                        @can('delete permissions')
                                          <a href="" data-url="{{ route('permission.delete', ['id' =>$permiss->id]) }}" class="mb-2 btn btn-danger mr-2 action_delete">Xóa</a>
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

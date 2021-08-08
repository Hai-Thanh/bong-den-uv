@extends('admin.layouts.admin')

@section('title', 'Thông tin thành viên')
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/main.js') }}"></script>

   


@endsection
@section('content')
    <div class="main-content-container container-fluid px-4">

        @include('admin.partials.title-content', ['name'=>'Danh sách khách hàng'])
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Khách hàng</h6>
                        @can('add customer')
                            <a class="nav-link " href="{{ route('customers.add') }}">
                                <i class="material-icons">note_add</i>
                                <span>Add New Customer</span>
                            </a>
                        @endcan
                    </div>
                    <br>
              
                    <div class="card-body p-0 pb-3 text-center">

                        <table class="table mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0">#</th>
                                    <th scope="col" class="border-0">Tên thành viên</th>
                                    <th scope="col" class="border-0">Email</th>
                                    <th scope="col" class="border-0">Ảnh</th>
                                    <th scope="col" class="border-0">Số điện thoại</th>
                                    <th scope="col" class="border-0">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $key => $customer)
                                    <tr>
                                        <td>{{ $key+1  }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td><img src="{{ $customer->avatar }}" width="230px" height="230px" alt=""></td>
                                        <td>{{ $customer->phone_number }}</td>
                                        <td>
                                            @can('edit customer')
                                            <a href="{{ route('customers.edit', [$customer->id]) }}" class="mb-2 btn btn-info mr-2 ">Sửa</a>
                                            @endcan
                                            @can('delete customer')
                                            <a href="" data-url="{{ route('customers.delete', ['id' =>$customer->id]) }}" class="mb-2 btn btn-danger mr-2 action_delete">Xóa</a>
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

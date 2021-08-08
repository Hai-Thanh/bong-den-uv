@extends('admin.layouts.admin')

@section('title', 'Thông tin thành viên')
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#clear-search").on("click", function(e) {
                e.preventDefault();
                $("input[name='user_name']").val("");
                $("select[name='name_sort']").val('');
                $("form[name='search_product']").trigger("submit");
                // trigger kích hoạt sự kiện được chỉ định là các dữ liệu ở các ô input đã đc xóa và submit đi nó sẽ trống

            });
        })
    </script>


@endsection
@section('content')
    <div class="main-content-container container-fluid px-4">

        @include('admin.partials.title-content', ['name'=>'Danh sách thành viên'])
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Thành viên</h6>
                        @can('view user')
                        <a class="nav-link " href="{{ route('users.add') }}">
                            <i class="material-icons">note_add</i>
                            <span>Add New User</span>
                        </a>
                        @endcan
                    </div>
                    <br>
                    <form name="search_product" method="get" action="">
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <div class="col mb-4">
                                <input type="text" class="form-control" name="user_name" placeholder="Tên sản phẩm"
                                    value="{{ $keyword }}">
                            </div>

                            <div class="col mb-4">
                                <select name="name_sort" class="form-control ">
                                    <option>Sắp xếp...</option>

                                    <option {{ $name_sort == '0' ? 'selected' : '' }}  value="0">Tên alphabet tăng dần</option>
                                    <option {{ $name_sort == '1' ? 'selected' : '' }}   value="1">Tên alphabet giảm dần</option>

                                </select>
                            </div>
                            <div class="col mb-4">
                                <button type="submit" class="mb-2 btn btn-outline-success mr-2">Success</button>
                                <a href="#" id="clear-search" class="mb-2 btn btn-outline-secondary mr-2">Secondary</a>
                                <input type="hidden" name="page" value="1">
                            </div>
                        </div>

                    </form>
                    <div class="card-body p-0 pb-3 text-center">

                        <table class="table mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0">#</th>
                                    <th scope="col" class="border-0">Tên thành viên</th>
                                    <th scope="col" class="border-0">Email</th>
                                    <th scope="col" class="border-0">Ảnh</th>
                                    <th scope="col" class="border-0">Quyền try cập</th>
                                    <th scope="col" class="border-0">Số điện thoại</th>
                                    <th scope="col" class="border-0">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ ($users->currentPage() - 1) * 20 + $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><img src="{{ $user->avatar }}" width="230px" height="230px" alt=""></td>
                                        <td>
                                            @foreach ($user->roles as  $role)
                                                 <label > * {{ $role->name }}</label><br>
                                            @endforeach   
                                        </td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>
                                            @if ($user->id != Auth::id())
                                                @can('edit user')
                                                <a href="{{ route('users.edit', [$user->id]) }}" class="mb-2 btn btn-info mr-2 ">Sửa</a>
                                                @endcan
                                                @can('delete user')
                                                <a href="" data-url="{{ route('delete.user', ['id' =>$user->id]) }}" class="mb-2 btn btn-danger mr-2 action_delete">Xóa</a>
                                                @endcan
                                            @else
                                              <a href="{{ route('user.change.password', ['id'=>Auth::id()]) }}" class="mb-2 btn btn-info mr-2 ">Đổi mật khẩu</a>
                                            @endif
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

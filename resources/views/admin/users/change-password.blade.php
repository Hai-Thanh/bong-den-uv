@extends('admin.layouts.admin')

@section('title', 'Trang đổi mật khẩu')

 
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('admins/products/add.js') }}"></script>
@endsection

@section('content')
    <div class="main-content-container container-fluid px-4">
        @include('admin.partials.title-content', ['name'=>'Trang đổi mật khẩu'])

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif
        <div class="row">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Thông tin thành viên</h6>
                        <a class="nav-link " href="{{ route('users.add') }}">
                            <i class="material-icons">note_add</i>
                            <span>Thêm thành viên</span>
                        </a>
                    </div>


                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-small mb-4 pt-3">
                                <div class="card-header border-bottom text-center">
                                    <div class="mb-3 mx-auto">
                                        <div id="holder">
                                            <img class="rounded-circle" src="{{  $user->avatar }}" 
                                                width="110">
                                        </div>
                                    </div>
                                    <h4 class="mb-0"></h4>
                                    <span class="text-muted d-block mb-2">Project Manager</span>
                                    
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-4">
                                        <div class="progress-wrapper">
                                            <strong class="text-muted d-block mb-2">Workload</strong>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="78"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
                                                    <span class="progress-value">78%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item p-4">
                                         <br>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Account Details</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <div class="row">
                                            <div class="col">
                                                <form action="{{ route('password.post', ['id' =>$user->id]) }}"  class="add-new-post" method="POST">
                                                   @csrf
                                                   

                                                   <div class="form-row">
                                                        <div class="form-group col-md-8">
                                                            <label for="fePassword">Mật khẩu cũ</label>
                                                            <input type="password" class="form-control" value="" 
                                                            name="password_old" placeholder="Mật khẩu cũ">
                                                        </div>
                                                    </div>
                                                    @error('password_old')
                                                        <span  style="color: red; font-size:17px">{{ $message }}</span>
                                                    @enderror
                                            

                                                    <div class="form-row">
                                                        <div class="form-group col-md-8">
                                                            <label for="fePassword">Nhập mật khẩu mới</label>
                                                            <input type="password" class="form-control" value="" 
                                                               name="password_new" placeholder="Nhập mật khẩu mới">
                                                        </div>
                                                    </div>
                                                    @error('password_new')
                                                        <span  style="color: red; font-size:17px">{{ $message }}</span>
                                                    @enderror
                                                 
                                                    <div class="form-row">
                                                        <div class="form-group col-md-8">
                                                            <label for="fePassword">Nhập xác nhận nhập mật khẩu</label>
                                                            <input type="password" class="form-control" value="" 
                                                               name="password_confim" placeholder="Nhập xác nhận nhập mật khẩu">
                                                        </div>
                                                    </div>
                                                    @error('password_confim')
                                                        <span  style="color: red; font-size:17px">{{ $message }}</span>
                                                    @enderror
                                                 <div>
                                                    <button type="submit" class="btn btn-accent">Update Account</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

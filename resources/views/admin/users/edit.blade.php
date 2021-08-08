@extends('admin.layouts.admin')

@section('title', 'Trang thông tin sửa thành viên')

 
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('admins/products/add.js') }}"></script>
@endsection


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection



@section('content')
    <div class="main-content-container container-fluid px-4">
        @include('admin.partials.title-content', ['name'=>'Trang thông tin sửa thành viên'])

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
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
                                            <img class="rounded-circle" src="{{ $user->avatar }}" 
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
                                                <form action="{{ route('users.update' , ['id' => $user->id]) }}" enctype="multipart/form-data" class="add-new-post" method="POST">
                                                   @csrf
                                                   
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="name">Tên thành viên</label>
                                                            <input type="text" class="form-control" name="name" id="name"
                                                                placeholder="Tên thành viên"  value="{{  $user->name }}">
                                                            @error('name')
                                                                <span  style="color: red; font-size:17px">{{ $message }}</span>
                                                            @enderror
 
                                                            </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="feEmailAddress">Email</label>
                                                            <input type="email" class="form-control" id="feEmailAddress"
                                                             name="email"   placeholder="Email" value="{{ $user->email }}">
                                                        @error('email')
                                                             <span  style="color: red; font-size:17px">{{ $message }}</span>
                                                         @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="phone_number">Số điện thoại</label>
                                                            <input type="text" class="form-control" id="phone_number"
                                                                placeholder="" name="phone_number" value="{{ $user->phone_number }}">
                                                            @error('phone_number')
                                                                <span  style="color: red; font-size:17px">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="fePassword">Password</label>
                                                            <input type="password" class="form-control" value="" id="fePassword"
                                                               name="password"  placeholder="Password">
                                                          @error('password')
                                                               <span  style="color: red; font-size:17px">{{ $message }}</span>
                                                           @enderror   
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label  class="text-muted d-block mb-2">Ảnh thành viên</label>
                                                            <div class="input-group">
                                                                <span class="input-group-btn">
                                                                <a id="lfm" data-input="avatar" data-preview="holder" class="btn btn-primary">
                                                                    <i class="fa fa-picture-o"></i> Choose
                                                                </a>
                                                                </span>
                                                                <input  value="{{ $user->avatar }}" id="avatar" class="form-control" type="text" name="avatar">
                                                            @error('avatar')
                                                                <span  style="color: red; font-size:17px">{{ $message }}</span>
                                                            @enderror 
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label  class="text-muted d-block mb-2">Chọn quyền cho người dùng</label>
                                                            <select  name="role[]" class="form-control tags_select2"  multiple="multiple">
                                                                @foreach ($role as   $roleItem)
                                                                   <option   

                                                                        @foreach ($user->roles  as  $rolesUse)
                                                                                {{ $roleItem->id ==  $rolesUse->pivot->role_id ? "selected" : ""}}  
                                                                        @endforeach
                                                                        
                                                                     value="{{ $roleItem->id }}"  >{{ $roleItem->name }}</option>
                                                                @endforeach
                                                        
                                                            </select>
                                                        </div>

                                                    </div>  
                                                    <button type="submit" class="btn btn-accent">Update Account</button>
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

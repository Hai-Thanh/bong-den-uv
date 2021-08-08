@extends('admin.layouts.admin')

@section('title', 'Trang thêm khách hàng')

 
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('admins/products/add.js') }}"></script>
@endsection



@section('content')
    <div class="main-content-container container-fluid px-4">
        @include('admin.partials.title-content', ['name'=>'Trang thêm khách hàng'])

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Thông tin khách hàng</h6>
                        <a class="nav-link " href="{{ route('customers.add') }}">
                            <i class="material-icons">note_add</i>
                            <span>Thêm khách hàng</span>
                        </a>
                    </div>


                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-small mb-4 pt-3">
                                <div class="card-header border-bottom text-center">
                                    <div class="mb-3 mx-auto">
                                        <div id="holder">
                                            <img class="rounded-circle" src="{{ old('avatar') }}" 
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
                                                <form action="{{ route('customers.store') }}" enctype="multipart/form-data" class="add-new-post" method="POST">
                                                   @csrf
                                                   
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="name">Tên khách hàng</label>
                                                            <input type="text" class="form-control" name="name" id="name"
                                                                placeholder="Tên khách hàng"  value="{{ old('name') }}">
                                                           
                                                        </div>
                                                    
                                                        <div class="form-group col-md-6">
                                                            <label for="feEmailAddress">Email</label>
                                                            <input type="email" class="form-control" id="feEmailAddress"
                                                             name="email"   placeholder="Email" value="{{ old('email') }}">
                                                          
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="phone_number">Số điện thoại</label>
                                                            <input type="text" class="form-control" id="phone_number"
                                                                placeholder="Email" name="phone_number" value="{{ old('phone_number') }}">
                                                            </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="fePassword">Password</label>
                                                            <input type="password" class="form-control" value="" id="fePassword"
                                                               name="password" placeholder="Password">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label  class="text-muted d-block mb-2">Ảnh khách hàng</label>
                                                            <div class="input-group">
                                                                <span class="input-group-btn">
                                                                <a id="lfm" data-input="avatar" data-preview="holder" class="btn btn-primary">
                                                                    <i class="fa fa-picture-o"></i> Choose
                                                                </a>
                                                                </span>
                                                                <input  value="{{ old('avatar') }}" id="avatar" class="form-control" type="text" name="avatar">
                                                            </div>
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

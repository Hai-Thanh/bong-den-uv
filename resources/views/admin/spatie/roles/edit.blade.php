@extends('admin.layouts.admin')

@section('title', 'Sửa role')

@section('js')
    <script src="{{ asset('admins/products/add.js') }}"></script>
@endsection


@section('content')
<div class="main-content-container container-fluid px-4">
@include('admin.partials.title-content', ['name'=>'Sửa role'])

<form action="{{ route('role.update', ['id' =>$role->id]) }} " class="add-new-post" method="POST">
    @csrf
        <div class="form-group col-md-6">
            <label for="iputName" class="text-muted d-block mb-2">Tên role</label>
            <div class="input-group mb-3">
                <input type="text" value="{{ $role->name }}" name="name" id="iputName" class="form-control" placeholder="Nhập tên role" > 
            </div>
        </div>
        <label> Chọn quyền </label>
        <div class="row">
            @foreach ($permission as  $perm)
                <div class="col-3">
                        <input 
                            @foreach ($role->permissions as  $pemission)
                                {{ $perm->id == $pemission->pivot->permission_id ? "checked" : "" }}
                            @endforeach
                        
                        type="checkbox"  
                        name="permission[]" value="{{ $perm->id }}">  <span>{{ $perm->name }}</span>
                 
                </div>  
             @endforeach
        </div>
        <br><br>
        &nbsp;&nbsp;&nbsp;    
        <button type="submit" class="mb-2 btn btn-success mr-2">Sửa</button>
        <a href="{{ route('role') }}" class="mb-2 btn btn-danger mr-2">Hủy</a>
</form>
</div>

@endsection
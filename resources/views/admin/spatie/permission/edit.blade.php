@extends('admin.layouts.admin')

@section('title', 'Sửa permission')

@section('js')
    <script src="{{ asset('admins/products/add.js') }}"></script>
@endsection


@section('content')
<div class="main-content-container container-fluid px-4">
@include('admin.partials.title-content', ['name'=>'Sửa permission'])


<form action="{{ route('permission.update', ['id' =>$permission->id]) }} " class="add-new-post" method="POST">
    @csrf
        <div class="form-group col-md-6">
            <label for="iputName" class="text-muted d-block mb-2">Tên permission</label>
            <div class="input-group mb-3">
            
                <input type="text" value="{{ $permission->name }}" name="name" id="iputName" class="form-control" placeholder="Nhập tên permission" > 
            </div>
        </div>

        &nbsp;&nbsp;&nbsp;    
        <button type="submit" class="mb-2 btn btn-success mr-2">Sửa</button>
        <a href="{{ route('permission') }}" class="mb-2 btn btn-danger mr-2">Hủy</a>
</form>
</div>

@endsection
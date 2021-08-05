@extends('admin.layouts.admin')

@section('title', 'Sửa setting')

@section('content')
<div class="main-content-container container-fluid px-4">
@include('admin.partials.title-content', ['name'=>'Sửa setting'])


<form action="{{route('setting.update', ['id' =>$setting->id])}}" class="add-new-post" method="POST">
    @csrf

        <div class="form-group col-md-6">
            <label for="iputName" class="text-muted d-block mb-2">Config Key</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">@</span>
                </div>
                <input type="text" name="config_key" value="{{ $setting->config_key }}"  class="form-control" placeholder="Config Key" > 
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="iputName" class="text-muted d-block mb-2">Config Value</label>
            <div class="input-group mb-6">
               <textarea class="form-control" name="config_value"  cols="90" rows="10">{{ $setting->config_value }}</textarea>
            </div>
        </div>
        &nbsp;&nbsp;&nbsp;      
        <button type="submit" class="mb-2 btn btn-success mr-2">Sửa</button>
        <a href="{{ route('setting') }}" class="mb-2 btn btn-danger mr-2">Hủy</a>
</form>
</div>

@endsection
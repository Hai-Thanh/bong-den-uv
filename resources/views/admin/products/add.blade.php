@extends('admin.layouts.admin')

@section('title', 'Thêm sản phẩm')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('content')
    <div class="main-content-container container-fluid px-4">
        @include('admin.partials.title-content', ['name'=>'Thêm sản phẩm'])

        <form action="{{ route('store') }}" class="add-new-post" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="iputName" class="text-muted d-block mb-2">Tên sản phẩm</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" name="name" {{ old('name') }}  id="iputName" class="form-control" placeholder="Nhập tên danh mục">
                    </div>

                    @error('name')
                        <span  style="color: red; font-size:17px">{{ $message }}</span>
                    @enderror


                </div>

                <div class="form-group col-md-6">
                    <label for="inputState" class="text-muted d-block mb-2">Chọn danh mục</label>
                    <select name="category_id" id="inputState" class="form-control category_id">
                        {!! $htmlOption !!}
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="price" class="text-muted d-block mb-2">Giá sản phẩm</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" name="price" id="price"  value="{{ old('price') }}"  class="form-control" placeholder="Nhập tên danh mục">
                    </div>
                    @error('price')
                        <span  style="color: red; font-size:17px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    
                    <label for="image_path" class="text-muted d-block mb-2">Ảnh sản phẩm</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                          <a id="lfm" data-input="image_path" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                          </a>
                        </span>
                        <input id="image_path" value="{{ old('image_path') }}" class="form-control" type="text" name="image_path">
                      </div>

                    @error('image_path')
                        <span  style="color: red; font-size:17px">{{ $message }}</span>
                    @enderror
                    <div   id="holder">
                    <img  src=" {{ old('image_path') }}"  style="margin-top:15px;max-height:100px;">
                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tags_select2" class="text-muted d-block mb-2">Nhập tags sản phẩm</label>
                    <select name="tags[]" class="form-control tags_select2" multiple="multiple">
                    </select>
                </div>

                <div class="form-group col-md-6">
                    {{-- <label for="image_path_gallery" class="text-muted d-block mb-2">Ảnh chi tiết sản phẩm</label>
                    <div class="input-group mb-3">
                        <input type="file" multiple="multiple" name="image_path_gallery[]" id="image_path_gallery">
                    </div> --}}
                        <table class="table table-stripped">
                            <thead>
                                <th>File</th>
                                <th>Thumbnail</th>
                                <th>
                                    <button class="btn btn-success add-img" type="button">Thêm ảnh</button>
                                </th>
                            </thead>
                            <tbody id="gallery">
                                
                            </tbody>
                        </table>    
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="quantity" class="text-muted d-block mb-2">Số lượng sản phẩm</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" name="quantity" id="quantity" class="form-control"
                            placeholder="Số lượng danh mục">
                    </div>
                    @error('quantity')
                        <span  style="color: red; font-size:17px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="inputState" class="text-muted d-block mb-2">Trạng thái đơn hàng</label>
                    <select name="status" id="inputState" class="form-control">
                        <option  {{ old('status') == 0 ? "selected" : ""  }} value="0">Còn hàng</option>
                        <option {{ old('status') == 1 ? "selected" : ""  }} value="1">Hết hàng</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputState" class="text-muted d-block mb-2">Mô tả sản phẩm</label>
                    <textarea class="form-control tinymce_editor_init" name="content" cols="30" rows="10">{{ old('content') }}</textarea>
                </div>

                @error('content')
                    <span  style="color: red; font-size:17px">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <button type="submit" class="mb-2 btn btn-success mr-2">Thêm</button>
            <a href="{{ route('products') }}" class="mb-2 btn btn-danger mr-2">Hủy</a>
        </form>
    </div>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script src="{{ asset('admins/products/add.js') }}"></script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('.add-img').click(function(){
                var rowId = Date.now();
                $('#gallery').append(`
                    <tr id="${rowId}">
                        <td>
                            <div class="form-group">
                                <input row_id="${rowId}" type="file" name="image_path_gallery[]" class="form-control" onchange="loadFile(event, ${rowId})">
                            </div>
                        </td>
                        <td>
                            <img row_id="${rowId}" src="" width="80">
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="removeImg(this)">Xóa</button>
                        </td>
                    </tr>
                `);
            })
        })
        function loadFile(event, el_rowId) {
            var reader = new FileReader();
            var output = document.querySelector(`img[row_id="${el_rowId}"]`);
            reader.onload = function(){
                output.src = reader.result;
            };
            if(event.target.files[0] == undefined){
                output.src = "";
                return false;
            }else {
                reader.readAsDataURL(event.target.files[0]);
            }
        };
        function removeImg(el){
            $(el).parent().parent().remove();
        }
    </script>






@endsection



@extends('admin.layouts.admin')

@section('title', 'Sản phẩm')
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#clear-search").on("click", function(e) {
                e.preventDefault();
                $("input[name='product_name']").val("");
                $("input[name='product_price']").val('');
                $("select[name='product_sort']").val('');
                $("select[name='category_id']").val('');
                $("form[name='search_product']").trigger("submit");
                // trigger kích hoạt sự kiện được chỉ định là các dữ liệu ở các ô input đã đc xóa và submit đi nó sẽ trống

            });
        })
    </script>
@endsection
@section('content')
    <div class="main-content-container container-fluid px-4">

        @include('admin.partials.title-content', ['name'=>'Danh sách sản phẩm'])
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Tên danh mục sản phẩm: {{ count($category->products) }}</h6>
                        <h6 class="m-0">Tổng số sản phẩm trong danh mục: {{ count($category->products) }}</h6>
                    </div>
                    <br>
                
                    <div class="card-body p-0 pb-3 text-center">

                        <table class="table mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0">#</th>
                                    <th scope="col" class="border-0">Tên</th>
                                    <th scope="col" class="border-0">Danh mục</th>
                                    <th scope="col" class="border-0">Hình ảnh</th>
                                    <th scope="col" class="border-0">Gía</th>
                                    <th scope="col" class="border-0">Trạng thái</th> 
                                
                                    <th scope="col" class="border-0">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index =1;
                                @endphp
                                @foreach ($category->products as   $product)
                                <tr>
                                    <td>{{ $index ++}}</td>
                                    <td>{{ $product->name }}</td>
                                    {{-- <td>{{ optional($product->category)->name }}</td> --}}
                                    <td> <a href="{{ route('category.detail', ['id' =>$product->category_id]) }}"> {{ $product->category->name }}</a> </td>
                                    <td>
                                        <img width="200" height="200"
                                            src="{{ asset("$product->image_path") }}" alt="Lỗi">
                                    </td>
                                    <td>{{ $product->price }}</td>

                                    <td> 
                                        @if ($product->status == 0) 
                                            {{ "Đang mở bán" }}
                                        @else
                                        {{ "Đã hết hàng" }}     
                                        @endif
                                   </td>
                                   <td></td>
                                    <td>
                                        <a href="{{ url("admin/products/edit/$product->id") }}"
                                            class="mb-2 btn btn-info mr-2 ">Sửa</a>
                                        <a href="" data-url="{{ url("admin/products/delete/$product->id") }}"
                                            class="mb-2 btn btn-danger mr-2 action_delete">Xóa</a>
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

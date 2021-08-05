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
                        <h6 class="m-0">Sản phẩm</h6>
                    @hasanyrole('editor|admin')
                        <a class="nav-link " href="{{ route('add') }}">
                            <i class="material-icons">note_add</i>
                            <span>Add New Product</span>
                        </a>
                    @endhasanyrole
                    </div>
                    <br>
                    <form name="search_product" method="get" action="{{ htmlspecialchars($_SERVER['REQUEST_URI']) }}">
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <div class="col mb-4">
                                <select name="category_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($categories as $category)
                                        <option {{ $category_id == $category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col mb-4">
                                <input type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm"
                                    value="{{ $searchKeyword }}">
                            </div>
                            <div class="col mb-4">
                                <input type="number" name="product_price" class="form-control" placeholder="giá sản phẩm"
                                    value="{{ $productPrice }}">
                            </div>

                            <div class="col mb-4">
                                <select name="product_sort" class="form-control ">
                                    <option>Sắp xếp...</option>
                                    <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Giá tăng dần
                                    </option>
                                    <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Giá giảm
                                        dần</option>
                                    <option value="1" {{ $sort == '1' ? 'selected' : '' }}>Trạng thái active</option>
                                    <option value="0" {{ $sort == '0' ? 'selected' : '' }}> Trạng thái inactive</option>
                                    <option value="quantity_desc" {{ $sort == 'quantity_desc' ? 'selected' : '' }}>Số
                                        lượng giảm dần</option>
                                    <option value="quantity_asc" {{ $sort == 'quantity_asc' ? 'selected' : '' }}>Số
                                        lượng tăng dần</option>
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
                                    <th scope="col" class="border-0">Tên</th>
                                    <th scope="col" class="border-0">Danh mục</th>
                                    <th scope="col" class="border-0">Hình ảnh</th>
                                    <th scope="col" class="border-0">Gía</th>
                                    <th scope="col" class="border-0">Trạng thái</th> 
                                    <th scope="col" class="border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($products) && !empty($products))

                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{(($products->currentPage()-1)*20) + $loop->iteration}}</td>
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
                                @endif
                            </tbody>
                        </table>
                    {{ $products->links() }}    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

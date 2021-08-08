@extends('frontend.layouts.main')
@section('content')
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Thông tin đơn hàng chi tiết</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('shop') }}">Shop</a></li>
                                    <li><a href="">My account</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <h3 style="text-align: center">Những sản phẩm đặt mua trong đơn hàng</h3>
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">#</th>
                                            <th class="product_thumb">Ảnh</th>
                                            <th class="product_name">Tên sản phẩm</th>
                                            <th class="product-price">giá</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        @foreach ($orders->productOrder as $key => $product)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><img height="200px" width="200px" src="{{ $product->image_path }}" alt=""></td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->price }}</td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->
  
<br><br>

@endsection

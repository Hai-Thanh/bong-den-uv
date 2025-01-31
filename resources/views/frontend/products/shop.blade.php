@extends('frontend.layouts.main')
@section('content')
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Shop </h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="{{ route("shop") }}">Shop</a></li>
                                <li class="active" aria-current="page">Shop </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- ...:::: Start Shop Section:::... -->
<div class="shop-section">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            @include('frontend.home.components.sidebar')
            <div class="col-lg-9">
                <!-- Start Shop Product Sorting Section -->
                <div class="shop-sort-section">
                    <div class="container">
                        <div class="row">
                            <!-- Start Sort Wrapper Box -->
                            <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column" data-aos="fade-up"  data-aos-delay="0">
                                <!-- Start Sort tab Button -->
                                <div class="sort-tablist d-flex align-items-center">
                                    <ul class="tablist nav sort-tab-btn">
                                        <li><a class="nav-link active" data-bs-toggle="tab" href="#layout-3-grid"><img src="{{ asset('shop-hono/assets/images/icons/bkg_grid.png') }}" alt=""></a></li>
                                        <li><a class="nav-link" data-bs-toggle="tab" href="#layout-list"><img src="{{ asset('shop-hono/assets/images/icons/bkg_list.png') }}" alt=""></a></li>
                                    </ul>

                                    <!-- Start Page Amount -->
                                    <div class="page-amount ml-2">
                                        <span>Showing 1–9 of 21 results</span>
                                    </div> <!-- End Page Amount -->
                                </div> <!-- End Sort tab Button -->

                                <!-- Start Sort Select Option -->
                                <div class="sort-select-list d-flex align-items-center">
                                    <label class="mr-2">Sort By:</label>
                                    <form action="#">
                                        <fieldset>
                                            <select name="speed" id="speed">
                                                <option>Sort by average rating</option>
                                                <option>Sort by popularity</option>
                                                <option selected="selected">Sort by newness</option>
                                                <option>Sort by price: low to high</option>
                                                <option>Sort by price: high to low</option>
                                                <option>Product Name: Z</option>
                                            </select>
                                        </fieldset>
                                    </form>
                                </div> <!-- End Sort Select Option -->

                                

                            </div> <!-- Start Sort Wrapper Box -->
                        </div>
                    </div>
                </div> <!-- End Section Content -->

                <!-- Start Tab Wrapper -->
                <div class="sort-product-tab-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content tab-animate-zoom">
                                    <!-- Start Grid View Product -->
                                    <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                        <div class="row">
                                     @foreach ($products  as  $product)
                                         
                                  
                                            <div class="col-xl-4 col-sm-6 col-12">
                                                <!-- Start Product Default Single Item -->
                                                <div class="product-default-single-item product-color--golden" data-aos="fade-up"  data-aos-delay="0">
                                                    <div class="image-box">
                                                        <a href="{{ route('products.detail', ['id'=>$product->id]) }}" class="image-link">
                                                            <img src="{{ $product->image_path }}" alt="">
                                                            <img src="{{ $product->image_path }}" alt="">
                                                        </a>
                                                        <div class="action-link">
                                                            <div class="action-link-left">
                                                                <a href="#" data-bs-toggle="modal" data-url="{{ route('add-to-cart' , ['id' =>$product->id]) }}" class="add-cart" data-bs-target="#modalAddcart">Add to Cart</a>
                                                            </div>
                                                            <div class="action-link-right">
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-magnifier"></i></a>
                                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="content-left">
                                                            <h6 class="title"><a href="{{ route('products.detail', ['id'=>$product->id]) }}">{{ $product->name }}</a></h6>
                                                            <ul class="review-star">
                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                <li class="empty"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="content-right">
                                                            <span class="price">${{ $product->price }}</span>
                                                        </div>
            
                                                    </div>
                                                </div>
                                                <!-- End Product Default Single Item -->
                                            </div>
                                    @endforeach
                                        </div>
                                    </div> <!-- End Grid View Product -->
                                    <!-- Start List View Product -->
                                    <div class="tab-pane sort-layout-single" id="layout-list">
                                        <div class="row">

                                            @foreach ($products as  $product)
                                            <div class="col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <div class="product-list-single product-color--golden">
                                                    <a href="{{ route('products.detail', ['id'=>$product->id]) }}" class="product-list-img-link">
                                                        <img class="img-fluid" src="{{ $product->image_path }}" alt="">
                                                        <img class="img-fluid" src="{{ $product->image_path }}" alt="">
                                                    </a>
                                                    <div class="product-list-content">
                                                        <h5 class="product-list-link"><a href="{{ route('products.detail', ['id'=>$product->id]) }}">{{ $product->name }}</a></h5>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                        <span class="product-list-price"> ${{ $product->price }}</span>
                                                        <p>{!!  $product->content !!}</p>
                                                        <div class="product-action-icon-link-list">
                                                            <a href="#" data-bs-toggle="modal"  data-url="{{ route('add-to-cart' , ['id' =>$product->id]) }}" data-bs-target="#modalAddcart" class="add-cart">Add to cart</a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.html" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                            <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Defautlt Single -->
                                            </div>
                                            @endforeach
                                        </div>
                                    </div> <!-- End List View Product -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
               
                <!-- Start Pagination -->
                <div  class="page-pagination text-center">
                    <a  href="active"> {{ $products->links() }}</a>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection


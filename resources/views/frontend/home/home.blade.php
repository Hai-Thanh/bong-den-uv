@extends('frontend.layouts.main')
@section('content')
    <!-- Start Hero Slider Section-->
    <div class="hero-slider-section">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="hero-single-slider-item swiper-slide">
                        <!-- Hero Slider Image -->
                        <div class="hero-slider-bg">
                            <img src="{{ $slider->image_path }}" alt="">
                        </div>
                        <!-- Hero Slider Content -->
                        <div class="hero-slider-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="hero-slider-content">
                                            <h4 class="subtitle">{{ $slider->name }}</h4>
                                            <h2 class="title">{!! $slider->descripiton !!}</h2>
                                            <a href="product-details-default.html"
                                                class="btn btn-lg btn-outline-golden">shop now </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination active-color-golden"></div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev d-none d-lg-block"></div>
            <div class="swiper-button-next d-none d-lg-block"></div>
        </div>
    </div>
    <!-- End Hero Slider Section-->

    <!-- Start Service Section -->
    <div class="service-promo-section section-top-gap-100">
        <div class="service-wrapper">
            <div class="container">
                <div class="row">
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img src="{{ asset('shop-hono/') }}/assets/images/icons/service-promo-1.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">FREE SHIPPING</h6>
                                <p>Get 10% cash back, free shipping, free returns, and more at 1000+ top retailers!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="image">
                                <img src="{{ asset('shop-hono/') }}/assets/images/icons/service-promo-2.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">30 DAYS MONEY BACK</h6>
                                <p>100% satisfaction guaranteed, or get your money back within 30 days!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="image">
                                <img src="{{ asset('shop-hono/') }}/assets/images/icons/service-promo-3.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">SAFE PAYMENT</h6>
                                <p>Pay with the world’s most popular and secure payment methods.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="600">
                            <div class="image">
                                <img src="{{ asset('shop-hono/') }}/assets/images/icons/service-promo-4.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">LOYALTY CUSTOMER</h6>
                                <p>Card for the other 30% of their purchases at a rate of 1% cash back.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Section -->

    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100 section-fluid">
        <div class="banner-wrapper">
            <div class="container-fluid">
                <div class="row mb-n6">

                    <div class="col-lg-6 col-12 mb-6">
                        <!-- Start Banner Single Item -->
                        <div class="banner-single-item banner-style-1 banner-animation img-responsive" data-aos="fade-up"
                            data-aos-delay="0">
                            <div class="image">
                                <img src="{{ asset('shop-hono/assets/images/banner/banner-style-1-img-1.jpg') }}" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title">Mini rechargeable
                                    Table Lamp - E216</h4>
                                <h5 class="sub-title">We design your home</h5>
                                <a href="product-details-default.html"
                                    class="btn btn-lg btn-outline-golden icon-space-left"><span
                                        class="d-flex align-items-center">discover now <i
                                            class="ion-ios-arrow-thin-right"></i></span></a>
                            </div>
                        </div>
                        <!-- End Banner Single Item -->
                    </div>

                    <div class="col-lg-6 col-12 mb-6">
                        <div class="row mb-n6">
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <div class="image">
                                        <img src="{{ asset('shop-hono/') }}/assets/images/banner/banner-style-2-img-1.jpg"
                                            alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Kitchen <br>
                                            utensils</h4>
                                        <a href="product-details-default.html" class="link-text"><span>Shop now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <div class="image">
                                        <img src="{{ asset('shop-hono/') }}/assets/images/banner/banner-style-2-img-2.jpg"
                                            alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Sofas and <br>
                                            Armchairs</h4>
                                        <a href="product-details-default.html" class="link-text"><span>Shop now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <div class="image">
                                        <img src="{{ asset('shop-hono/') }}/assets/images/banner/banner-style-2-img-3.jpg"
                                            alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Chair & Bar<br>
                                            stools</h4>
                                        <a href="product-details-default.html" class="link-text"><span>Shop now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <div class="image">
                                        <img src="{{ asset('shop-hono/') }}/assets/images/banner/banner-style-2-img-4.jpg"
                                            alt="">
                                    </div>
                                    <div class="content">
                                        <h4>Interior <br>
                                            lighting</h4>
                                        <a href="product-details-default.html"><span>Shop now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">THE NEW ARRIVALS</h3>
                                <p>Preorder now to receive exclusive deals & gifts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-2rows default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-2row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    @foreach ($productsnew as  $productnew)
                                        <div class="product-default-single-item product-color--golden swiper-slide">
                                            <div class="image-box">
                                                <a href="{{  route('products.detail' , ['id' =>$productnew->id]) }}" class="image-link">
                                                    <img src="{{ $productnew->image_path }}"
                                                        alt="">
                                                    <img src="{{ $productnew->image_path }}"
                                                        alt="">
                                                </a>
                                            
                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                        <a href="#" class="add-cart" data-url="{{ route('add-to-cart' , ['id' =>$productnew->id]) }}" data-bs-toggle="modal" data-bs-target="#modalAddcart">Add to
                                                            Cart</a>
                                                    </div>
                                                    <div class="action-link-right">
                                                        <a  href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i
                                                                class="icon-magnifier"></i></a>
                                                        <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                        <a href="compare.html"><i class="icon-shuffle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h6 class="title"><a href="{{  route('products.detail' , ['id' =>$productnew->id]) }}">{{ $productnew->name }}</a></h6>
                                                        
                                                    <ul class="review-star">
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="content-right">
                                                    <span class="price">${{ $productnew->price }}</span>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <!-- Start Banner Single Item -->
                    <div class="banner-single-item banner-style-3 banner-animation img-responsive" data-aos="fade-up"
                        data-aos-delay="0">
                        <div class="image">
                            <img class="img-fluid"
                                src="{{ asset('shop-hono/') }}/assets/images/banner/banner-style-3-img-1.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3 class="title">Modern Furniture
                                Basic Collection</h3>
                            <h5 class="sub-title">We design your home more beautiful</h5>
                            <a href="product-details-default.html"
                                class="btn btn-lg btn-outline-golden icon-space-left"><span
                                    class="d-flex align-items-center">discover now <i
                                        class="ion-ios-arrow-thin-right"></i></span></a>
                        </div>
                    </div>
                    <!-- End Banner Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid section-inner-bg">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">BEST SELLERS</h3>
                                <p>Add our best sellers to your weekly lineup.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                          
                            <div class="swiper-container product-default-slider-4grid-1row">
                             
                                <div class="swiper-wrapper">

                                    @foreach ($productbestsellers as  $sellers)
                                    <div class="product-default-single-item product-color--golden swiper-slide">
                                        <div class="image-box">
                                            <a href="{{  route('products.detail' , ['id' =>$sellers->id]) }}" class="image-link">
                                                <img src="{{ $sellers->image_path }}"
                                                    alt="">
                                                <img src="{{ $sellers->image_path }}"
                                                    alt="">
                                            </a>
                                            <div class="action-link">
                                                <div class="action-link-left">
                                                    <a href="#" class="add-cart" data-url="{{ route('add-to-cart' , ['id' =>$sellers->id]) }}" data-id="{{ $sellers->id }}" data-bs-toggle="modal" data-bs-target="#modalAddcart">Add to
                                                        Cart</a>
                                                </div>
                                                <div class="action-link-right">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i
                                                            class="icon-magnifier"></i></a>
                                                    <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                    <a href="compare.html"><i class="icon-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="content-left">
                                                <h6 class="title"><a href="{{ url("product-detail/$sellers->id") }}">{{ $sellers->name  }}</a></h6>
                                                    
                                                <ul class="review-star">
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="content-right">
                                                <span class="price">${{ $sellers->price  }}</span>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                               
                                </div>
                            </div>
                            
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Banner Section -->
    <div class="banner-section">
        <div class="banner-wrapper clearfix">
         @foreach ($categories as $cate)
            <div class="banner-single-item banner-style-4 banner-animation banner-color--golden float-left img-responsive"
                data-aos="fade-up" data-aos-delay="0">
                <div class="image">
                    <img class="img-fluid" src="{{ $cate->image_path }}"
                        alt="">
                </div>
                <a href = '{{ route('products.categories', ['id' =>$cate->id]) }}' class="content">
                    <div class="inner">
                        <h4 class="title">{{ $cate->name }}</h4>
                        <h6 class="sub-title">{{ $cate->products->count() }} products</h6>
                    </div>
                    <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                </a>
            </div>
            @endforeach
            <!-- End Banner Single Item -->
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Blog Slider Section -->
    <div class="blog-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">THE LATEST BLOGS</h3>
                                <p>Present posts in a best way to highlight interesting moments of your blog.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="blog-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-default-slider default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container blog-slider">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                   
                                    @foreach ($posts as  $post)
                                    <div class="blog-default-single-item blog-color--golden swiper-slide">
                                        <div class="image-box">
                                            <a href="{{ route('posts.detail', ['id' => $post->id]) }}" class="image-link">
                                                <img class="img-fluid"
                                                    src="{{ $post->image_path }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="{{ route('posts.detail', ['id' => $post->id]) }}">{{ $post->title }}</a></h6>
                                            <p>{{ $post->description }}</p>
                                            <div class="inner">
                                                <a href="{{ route('posts.detail', ['id' => $post->id]) }} "
                                                    class="read-more-btn icon-space-left">Read More <span><i
                                                            class="ion-ios-arrow-thin-right"></i></span></a>
                                                <div class="post-meta">
                                                    <a href="#" class="date">{{ $post->created_at }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Slider Section -->

    <!-- Start Instagramr Section -->
    <div class="instagram-section section-top-gap-100 section-inner-bg">
        <div class="instagram-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="instagram-box">
                            <div id="instagramFeed" class="instagram-grid clearfix">
                                <a href="https://www.instagram.com/p/CCFOZKDDS6S/" target="_blank"
                                    class="instagram-image-link float-left banner-animation"><img
                                        src="{{ asset('shop-hono/') }}/assets/images/instagram/instagram-1.jpg"
                                        alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOYDNjWF5/" target="_blank"
                                    class="instagram-image-link float-left banner-animation"><img
                                        src="{{ asset('shop-hono/') }}/assets/images/instagram/instagram-2.jpg"
                                        alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOXH6D-zQ/" target="_blank"
                                    class="instagram-image-link float-left banner-animation"><img
                                        src="{{ asset('shop-hono/') }}/assets/images/instagram/instagram-3.jpg"
                                        alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOVcrDDOo/" target="_blank"
                                    class="instagram-image-link float-left banner-animation"><img
                                        src="{{ asset('shop-hono/') }}/assets/images/instagram/instagram-4.jpg"
                                        alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOUajjABP/" target="_blank"
                                    class="instagram-image-link float-left banner-animation"><img
                                        src="{{ asset('shop-hono/') }}/assets/images/instagram/instagram-5.jpg"
                                        alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOS2MDmjj/" target="_blank"
                                    class="instagram-image-link float-left banner-animation"><img
                                        src="{{ asset('shop-hono/') }}/assets/images/instagram/instagram-6.jpg"
                                        alt=""></a>
                            </div>
                            <div class="instagram-link">
                                <h5><a href="https://www.instagram.com/myfurniturecom/" target="_blank"
                                        rel="noopener noreferrer">HONOTEMPLATE</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagramr Section -->
@endsection

@section('js')
@endsection

<header class="header-section d-none d-xl-block">
    <div class="header-wrapper">
        <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Start Header Logo -->
                        <div class="header-logo">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img
                                        src="{{ asset('shop-hono/assets/images/logo/logo_black.png') }}" alt=""></a>
                            </div>
                        </div>
                        <!-- End Header Logo -->

                        <!-- Start Header Main Menu -->
                        <div class="main-menu menu-color--black menu-hover-color--golden">
                            <nav>
                                <ul>
                                    <li class="has-dropdown">
                                        <a class="active main-menu-link" href="{{ route('home') }}">Home </a>
                                        <!-- Sub Menu -->
                                    </li>
                                    <li class="has-dropdown has-megaitem">
                                        <a href="{{ route('shop') }}">Shop </a>
                                        <!-- Mega Menu -->
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="{{ route('posts.list') }}">Blog </a>
                                        <!-- Sub Menu -->
                                    </li>
                                    <li>
                                        <a href="{{ route('aboutus') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}">Contact Us</a>
                                    </li>
                                 
                                    
                                    @php
                                        $customer_login=  session('customer_login', false);
                                    @endphp

                                    @if ($customer_login != false)
                                        <li class="has-dropdown">
                                            <a href="{{ route('my.account', ['id' => $customer_login['id']]) }}">My account </a>
                                            <!-- Sub Menu -->
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('login.customers') }}">Login customers</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="{{ route('register') }}">Register </a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <!-- End Header Main Menu Start -->

                        <!-- Start Header Action Link -->
                        <ul class="header-action-link action-color--black action-hover-color--golden">
                            <li>
                                <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                    <i class="icon-heart"></i>
                                    <span class="item-count">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                    <i class="icon-bag"></i>
                                    <span class="item-count">

                                        @if (session()->get('cart'))
                                            {{ count(session()->get('cart')) }}
                                        @else
                                            0
                                        @endif

                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Header Action Link -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>



<!-- Start Offcanvas Addcart Section -->
<div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->

    <!-- Start  Offcanvas Addcart Wrapper -->
    <div class="offcanvas-add-cart-wrapper">
        <h4 class="offcanvas-title">Shopping Cart</h4>
        <ul class="offcanvas-cart">
            @php
                $total = 0;
                $quantity = 0;
            @endphp
            @if (session()->get('cart') == null)
                <h3>Giỏ hàng trống</h3>
            @else
                @foreach (session()->get('cart') as $id => $carts)
                    @php
                        $total += $carts['price'] * $carts['quantity'];
                        $quantity += $carts['quantity'];
                        
                    @endphp
                    <li class="offcanvas-cart-item-single">
                        <div class="offcanvas-cart-item-block">
                            <a href="{{ route('products.detail', ['id' => $id]) }}"
                                class="offcanvas-cart-item-image-link">
                                <img src="{{ $carts['image_path'] }}" alt="" class="offcanvas-cart-image">
                            </a>
                            <div class="offcanvas-cart-item-content">
                                <a href="{{ route('products.detail', ['id' => $id]) }}"
                                    class="offcanvas-cart-item-link">{{ $carts['name'] }}</a>
                                <div class="offcanvas-cart-item-details">
                                    <span class="offcanvas-cart-item-details-quantity">{{ $carts['quantity'] }} x
                                    </span>
                                    <span class="offcanvas-cart-item-details-price">${{ $carts['price'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="offcanvas-cart-item-delete text-right">
                            <a href="#" class="offcanvas-cart-item-delete delete-cart"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
        <div class="offcanvas-cart-total-price">
            <span class="offcanvas-cart-total-price-text">Subtotal:</span>
            <span class="offcanvas-cart-total-price-value">${{ $total }}</span>
            <span class="offcanvas-cart-total-price-value">{{ $quantity }}</span>
        </div>
        <ul class="offcanvas-cart-action-button">
            <li><a href="{{ route('carts') }}" class="btn btn-block btn-golden">View Cart</a></li>
            <li><a href="{{ route('checkout') }}" class=" btn btn-block btn-golden mt-5">Checkout</a></li>
        </ul>
    </div> <!-- End  Offcanvas Addcart Wrapper -->

</div> <!-- End  Offcanvas Addcart Section -->

<!-- Start Offcanvas Mobile Menu Section -->
<div id="offcanvas-wishlish" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- ENd Offcanvas Header -->

    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div class="offcanvas-wishlist-wrapper">
        <h4 class="offcanvas-title">Wishlist</h4>
        <ul class="offcanvas-wishlist">
            <li class="offcanvas-wishlist-item-single">
                <div class="offcanvas-wishlist-item-block">
                    <a href="#" class="offcanvas-wishlist-item-image-link">
                        <img src="{{ asset('shop-hono/') }}/assets/images/product/default/home-1/default-1.jpg"
                            alt="" class="offcanvas-wishlist-image">
                    </a>
                    <div class="offcanvas-wishlist-item-content">
                        <a href="#" class="offcanvas-wishlist-item-link">Car Wheel</a>
                        <div class="offcanvas-wishlist-item-details">
                            <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                            <span class="offcanvas-wishlist-item-details-price">$49.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-wishlist-item-delete text-right">
                    <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
            <li class="offcanvas-wishlist-item-single">
                <div class="offcanvas-wishlist-item-block">
                    <a href="#" class="offcanvas-wishlist-item-image-link">
                        <img src="{{ asset('shop-hono/') }}/assets/images/product/default/home-2/default-1.jpg"
                            alt="" class="offcanvas-wishlist-image">
                    </a>
                    <div class="offcanvas-wishlist-item-content">
                        <a href="#" class="offcanvas-wishlist-item-link">Car Vails</a>
                        <div class="offcanvas-wishlist-item-details">
                            <span class="offcanvas-wishlist-item-details-quantity">3 x </span>
                            <span class="offcanvas-wishlist-item-details-price">$500.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-wishlist-item-delete text-right">
                    <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
            <li class="offcanvas-wishlist-item-single">
                <div class="offcanvas-wishlist-item-block">
                    <a href="#" class="offcanvas-wishlist-item-image-link">
                        <img src="{{ asset('shop-hono/') }}/assets/images/product/default/home-3/default-1.jpg"
                            alt="" class="offcanvas-wishlist-image">
                    </a>
                    <div class="offcanvas-wishlist-item-content">
                        <a href="#" class="offcanvas-wishlist-item-link">Shock Absorber</a>
                        <div class="offcanvas-wishlist-item-details">
                            <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                            <span class="offcanvas-wishlist-item-details-price">$350.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-wishlist-item-delete text-right">
                    <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
        </ul>
        <ul class="offcanvas-wishlist-action-button">
            <li><a href="#" class="btn btn-block btn-golden">View wishlist</a></li>
        </ul>
    </div> <!-- End Offcanvas Mobile Menu Wrapper -->

</div> <!-- End Offcanvas Mobile Menu Section -->

<!-- Start Offcanvas Search Bar Section -->
<div id="search" class="search-modal">
    <button type="button" class="close">×</button>
    <form method="get" action="{{ htmlspecialchars($_SERVER['REQUEST_URI']) }}">
        <input type="search" name="search_products" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-lg btn-golden">Search</button>
    </form>
</div>
<!-- End Offcanvas Search Bar Section -->

<!-- Offcanvas Overlay -->
<div class="offcanvas-overlay"></div>




<!-- material-scrolltop button -->
<button class="material-scrolltop" type="button"></button>

<!-- Start Modal Add cart -->
<div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-right">
                            <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="modal-add-cart-product-img">
                                        <img class="img-fluid"
                                            src="{{ asset('shop-hono/') }}/assets/images/product/default/home-1/default-1.jpg"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="modal-add-cart-info"><i class="fa fa-check-square"></i>Added to cart
                                        successfully!</div>
                                    <div class="modal-add-cart-product-cart-buttons">
                                        <a href="{{ route('carts') }}">View Cart</a>
                                        <a href="{{ route('checkout') }}">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 modal-border">
                            <ul class="modal-add-cart-product-shipping-info">

                                @if (session()->get('cart') == null)
                                    <h3>giỏ hàng trống</h3>
                                @else
                                    <li> <strong><i class="icon-shopping-cart"></i> There Are {{ $quantity }} Items
                                            In Your Cart.</strong></li>
                                    <li> <strong>TOTAL PRICE: </strong> <span>$ {{ $total }}</span></li>
                                    <li class="modal-continue-button"><a href="#" data-bs-dismiss="modal">CONTINUE
                                            SHOPPING</a></li>

                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Modal Add cart -->

<!-- Start Modal Quickview cart -->
<div class="modal fade" id="modalQuickview" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-right">
                            <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-details-gallery-area mb-7">
                                <!-- Start Large Image -->
                                <div class="product-large-image modal-product-image-large swiper-container">
                                    <div class="swiper-wrapper">

                                        <div class="product-image-large-image swiper-slide img-responsive">
                                            <img src="{{ asset('shop-hono/assets/images/product/default/home-1/default-6.jpg') }}"
                                                alt="">
                                        </div>

                                    </div>
                                </div>
                                <!-- Start Thumbnail Image -->
                                <div
                                    class="product-image-thumb modal-product-image-thumb swiper-container pos-relative mt-5">
                                    <div class="swiper-wrapper">
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid"
                                                src="{{ asset('shop-hono/') }}/assets/images/product/default/home-1/default-1.jpg"
                                                alt="">
                                        </div>
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid"
                                                src="{{ asset('shop-hono/') }}/assets/images/product/default/home-1/default-2.jpg"
                                                alt="">
                                        </div>
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid"
                                                src="{{ asset('shop-hono/') }}/assets/images/product/default/home-1/default-3.jpg"
                                                alt="">
                                        </div>
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid"
                                                src="{{ asset('shop-hono/') }}/assets/images/product/default/home-1/default-4.jpg"
                                                alt="">
                                        </div>
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid"
                                                src="{{ asset('shop-hono/') }}/assets/images/product/default/home-1/default-5.jpg"
                                                alt="">
                                        </div>
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid"
                                                src="{{ asset('shop-hono/assets/images/product/default/home-1/default-6.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <!-- Add Arrows -->
                                    <div class="gallery-thumb-arrow swiper-button-next"></div>
                                    <div class="gallery-thumb-arrow swiper-button-prev"></div>
                                </div>
                                <!-- End Thumbnail Image -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="modal-product-details-content-area">
                                <!-- Start  Product Details Text Area-->
                                <div class="product-details-text">
                                    <h4 class="title">Nonstick Dishwasher PFOA</h4>
                                    <div class="price"><del>$70.00</del>$80.00</div>
                                </div> <!-- End  Product Details Text Area-->
                                <!-- Start Product Variable Area -->
                                <div class="product-details-variable">

                                    <div class="d-flex align-items-center flex-wrap">
                                        <div class="variable-single-item ">
                                            <span>Quantity</span>
                                            <div class="product-variable-quantity">
                                                <input min="1" max="100" value="1" type="number">
                                            </div>
                                        </div>

                                        <div class="product-add-to-cart-btn">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">Add To
                                                Cart</a>
                                        </div>
                                    </div>
                                </div> <!-- End Product Variable Area -->
                                <div class="modal-product-about-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum
                                        ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui
                                        nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel recusandae</p>
                                </div>
                                <!-- Start  Product Details Social Area-->
                                <div class="modal-product-details-social">
                                    <span class="title">SHARE THIS PRODUCT</span>
                                    <ul>
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>

                                </div> <!-- End  Product Details Social Area-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->
    
    <div class="mobile-contact-info">
        <div class="logo">
            <a href="index.html"><img src="assets/images/logo/logo_white.png" alt=""></a>
        </div>

        <address class="address">
            <span>Address: {{ getConfigValueFormSettingTable('address') }}</span>
            <span>Call Us: {{ getConfigValueFormSettingTable('phone_contact') }}</span>
            <span>Email: {{ getConfigValueFormSettingTable('email') }}</span>
        </address>

        <ul class="social-link">
            <li><a href="{{ getConfigValueFormSettingTable('facebook_link') }}"><i class="fa fa-facebook"></i></a>
            </li>
            <li><a href="{{ getConfigValueFormSettingTable('link_twitter') }}"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{ getConfigValueFormSettingTable('link_instagram') }}"><i class="fa fa-instagram"></i></a>
            </li>
            <li><a href="{{ getConfigValueFormSettingTable('facebook_link') }}"><i class="fa fa-linkedin"></i></a>
            </li>
        </ul>

        <ul class="user-link">
            <li><a href="#">Wishlist</a></li>
            <li><a href="{{ route('carts') }}">Cart</a></li>
            <li><a href="{{ route('checkout') }}">Checkout</a></li>
        </ul>
    </div>
</div>

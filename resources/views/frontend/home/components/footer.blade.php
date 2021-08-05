<footer class="footer-section footer-bg">
    <div class="footer-wrapper">
    <!-- Start Footer Top -->
    <div class="footer-top">
    <div class="container">
        <div class="row mb-n6">
            <div class="col-lg-3 col-sm-6 mb-6">
                <!-- Start Footer Single Item -->
                <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up"  data-aos-delay="0">
                    <h5 class="title">INFORMATION</h5>
                    <ul class="footer-nav">
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="contact-us.html">Contact</a></li>
                        <li><a href="#">Returns</a></li>
                    </ul>
                </div>
                <!-- End Footer Single Item -->
            </div>
            <div class="col-lg-3 col-sm-6 mb-6">
                <!-- Start Footer Single Item -->
                <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up"  data-aos-delay="200">
                    <h5 class="title">MY ACCOUNT</h5>
                    <ul class="footer-nav"> 
                        <li><a href="my-account">My account</a></li>
                        <li><a href="wishlist">Wishlist</a></li>
                        <li><a href="privacy-policy">Privacy Policy</a></li>
                        <li><a href="faq">Frequently Questions</a></li>
                        <li><a href="#">Order History</a></li>
                    </ul>
                </div>
                <!-- End Footer Single Item -->
            </div>
            <div class="col-lg-3 col-sm-6 mb-6">
                <!-- Start Footer Single Item -->
                <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up"  data-aos-delay="400">
                    <h5 class="title">CATEGORIES</h5>
                    <ul class="footer-nav">
                        @foreach ($categories as  $cate)
                            
                        <li><a href="{{  route('products.categories', ['id'=>$cate->id]) }}">{{ $cate->name }}</a></li>

                        @endforeach
                    </ul>
                </div>
                <!-- End Footer Single Item -->
            </div>
            <div class="col-lg-3 col-sm-6 mb-6">
                <!-- Start Footer Single Item -->
                <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up"  data-aos-delay="600">
                    <h5 class="title">ABOUT US</h5>
                    <div class="footer-about">
                        <p>We are a team of designers and developers that create high quality Magento, Prestashop, Opencart.</p>
                        
                        <address class="address">
                            <span>Address: 4710-4890 Breckinridge St, Fayettevill</span> 
                            <span>Email: yourmail@mail.com</span>    
                        </address>
                    </div>
                </div>
                <!-- End Footer Single Item -->
            </div>
        </div>
    </div>
    </div>
    <!-- End Footer Top -->

    <!-- Start Footer Center -->
    <div class="footer-center">
        <div class="container">
            <div class="row mb-n6">
                <div class="col-xl-3 col-lg-4 col-md-6 mb-6">
                    <div class="footer-social" data-aos="fade-up"  data-aos-delay="0">
                        <h4 class="title">FOLLOW US</h4>
                        <ul class="footer-social-link">
                            <li><a href="{{ getConfigValueFormSettingTable('facebook_link') }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ getConfigValueFormSettingTable('facebook_link') }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ getConfigValueFormSettingTable('link_instagram') }}"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{ getConfigValueFormSettingTable('link_twitter') }}"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-6 mb-6">
                    <div class="footer-newsletter" data-aos="fade-up"  data-aos-delay="200">
                        <h4 class="title">DON'T MISS OUT ON THE LATEST</h4>
                        <div class="form-newsletter">
                            <form action="#" method="post">
                                <div class="form-fild-newsletter-single-item input-color--golden">
                                    <input type="email" placeholder="Your email address..." required>
                                    <button type="submit">SUBSCRIBE!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer Center -->

    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row justify-content-between align-items-center align-items-center flex-column flex-md-row mb-n6">
                <div class="col-auto mb-6">
                    <div class="footer-copyright" >
                        <p> COPYRIGHT &copy; <a href="https://hasthemes.com/" target="_blank">HasThemes</a>. ALL RIGHTS RESERVED.</p>
                    </div>
                </div>
                <div class="col-auto mb-6">
                    <div class="footer-payment">
                        <div class="image">
                            <img src="{{ asset("shop-hono/") }}/assets/images/company-logo/payment.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer Bottom -->
    </div>
</footer>
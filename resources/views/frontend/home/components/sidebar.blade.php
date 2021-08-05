<div class="col-lg-3">
    <div class="siderbar-section" data-aos="fade-up"  data-aos-delay="0">

        <div class="sidebar-single-widget" >
            <h6 class="sidebar-title">CATEGORIES</h6>
            <div class="sidebar-content">
                <ul class="sidebar-menu">
                    @foreach ($categories as $cate )
                         <li ><a href="{{ route('products.categories' , ['id'=>$cate->id]) }}">{{ $cate->name }}</a></li>   
                   @endforeach
                </ul>
            </div>
        </div> 

        <div class="sidebar-single-widget">
            <h6 class="sidebar-title">FILTER BY PRICE</h6>
            <div class="sidebar-content">
                <div id="slider-range"></div>
                <div class="filter-type-price">
                    <label for="amount">Price range:</label>
                    <input type="text" id="amount">
                </div>
            </div>
        </div> <!-- End Single Sidebar Widget -->

  
        <!-- Start Single Sidebar Widget -->
        <div class="sidebar-single-widget">
            <h6 class="sidebar-title">Tag products</h6>
            <div class="sidebar-content">
                <div class="tag-link">

                   
                   @foreach ($tagsName as  $tags)
                        <a href="{{ route('products.tag' , ['id' =>$tags->id]) }}">{{ $tags->name }}</a>
                   @endforeach
                </div>
            </div>
        </div> <!-- End Single Sidebar Widget -->

        <!-- Start Single Sidebar Widget -->
        <div class="sidebar-single-widget">
            <div class="sidebar-content">
                <a href="" class="sidebar-banner img-hover-zoom">
                    <img class="img-fluid" src="{{ asset('shop-hono/assets/images/banner/side-banner.jpg') }}" alt="">
                </a>
            </div>
        </div> <!-- End Single Sidebar Widget -->

    </div> <!-- End Sidebar Area -->
</div>
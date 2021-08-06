@extends('frontend.layouts.main')
@section('content')
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Bài viết </h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="{{ route("shop") }}">Shop</a></li>
                                <li class="active" aria-current="page">Bài viết </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-wrapper">
                    <div class="row mb-n6">
                        @foreach ($posts as $post)
                            
                     
                        <div class="col-xl-4 col-md-6 col-12 mb-6">
                            <!-- Start Product Default Single Item -->
                            <div class="blog-list blog-grid-single-item blog-color--golden aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                                <div class="image-box">
                                    <a href="{{ route('posts.detail', ['id'=>$post->id]) }}" class="image-link">
                                        <img class="img-fluid" src="{{ $post->image_path }}" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <ul class="post-meta">
                                       <li>POSTED BY : <a href="#" class="author">{{ $post->userPost->name }}</a></li> 
                                       <li>ON : <a href="#" class="date">{{ $post->created_at }}</a></li> 
                                    </ul>
                                    <h6 class="title"><a href="{{ route('posts.detail', ['id'=>$post->id]) }}"> {{ $post->title }}</a></h6>
                                   <p>{{ $post->description }}</p>
                                    <a href="#" class="read-more-btn icon-space-left">Read More <span class="icon"><i class="ion-ios-arrow-thin-right"></i></span></a>
                                </div>
                            </div>
                            <!-- End Product Default Single Item -->
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Start Pagination -->
                <div class="page-pagination text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                    <ul>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                    </ul>
                </div> <!-- End Pagination -->
            </div>
        </div>
    </div>
</div>
<br> 
@endsection


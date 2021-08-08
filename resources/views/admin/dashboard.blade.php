@extends('admin.layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title">Website Overview</h3>
            </div>
        </div>
        <!-- End Page Header -->
        <!-- Small Stats Blocks -->
        <div class="row">
            <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                    <div class="card-body p-0 d-flex">
                        <div class="d-flex flex-column m-auto">
                            <div class="stats-small__data text-center">
                                <a href="{{ route('categories') }}">
                                    <span class="stats-small__label text-uppercase">Danh mục</span>
                                    <h6 class="stats-small__value count my-3">{{ $categories->count() }}</h6>
                                </a>
                            </div>
                        </div>
                        <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                    <div class="card-body p-0 d-flex">
                        <div class="d-flex flex-column m-auto">
                            <div class="stats-small__data text-center">
                                <a href="{{ route('products') }}">
                                    <span class="stats-small__label text-uppercase">Sản phẩm</span>
                                    <h6 class="stats-small__value count my-3">{{ $products->count() }}</h6>
                                </a>
                            </div>

                        </div>
                        <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                    <div class="card-body p-0 d-flex">
                        <div class="d-flex flex-column m-auto">
                            <div class="stats-small__data text-center">
                                <a href="{{ route('slider') }}">
                                    <span class="stats-small__label text-uppercase">Slide show</span>
                                    <h6 class="stats-small__value count my-3">{{ $slider->count() }}</h6>
                                </a>
                            </div>

                        </div>
                        <canvas height="120" class="blog-overview-stats-small-3"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                    <div class="card-body p-0 d-flex">
                        <div class="d-flex flex-column m-auto">
                            <div class="stats-small__data text-center">

                                <a href="{{ route('users') }}">
                                    <span class="stats-small__label text-uppercase">Thành viên</span>
                                    <h6 class="stats-small__value count my-3">{{ $users->count() }}</h6>
                                </a>
                            </div>

                        </div>
                        <canvas height="120" class="blog-overview-stats-small-4"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg col-md-4 col-sm-12 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                    <div class="card-body p-0 d-flex">
                        <div class="d-flex flex-column m-auto">
                            <div class="stats-small__data text-center">
                                <a href="{{ route('orders') }}">
                                    <span class="stats-small__label text-uppercase">Đơn hàng</span>
                                    <h6 class="stats-small__value count my-3">{{ $orders->count() }}</h6>
                                </a>
                            </div>

                        </div>
                        <canvas height="120" class="blog-overview-stats-small-5"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg col-md-4 col-sm-12 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                    <div class="card-body p-0 d-flex">
                        <div class="d-flex flex-column m-auto">
                            <div class="stats-small__data text-center">
                                <a href="{{ route('customers') }}">
                                    <span class="stats-small__label text-uppercase">Khách hàng</span>
                                    <h6 class="stats-small__value count my-3">{{ $customers->count() }}</h6>
                                </a>
                            </div>

                        </div>
                        <canvas height="120" class="blog-overview-stats-small-5"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('frontend.layouts.main')

@section('title', 'Đăng kí tài khoản')
@section('content')
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Register</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="route('shop')">Shop</a></li>
                                    <li class="active" aria-current="page">Register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="customer-login">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form" data-aos="fade-up" data-aos-delay="0">

                        <h3>Register</h3>
                        <form action="{{ route('postregister') }}" method="POST">
                            @csrf
                            <div class="default-form-box">
                                <label>Họ và tên <span>*</span></label>
                                <input type="text" value="{{ old('name') }}" name="name">

                                @error('name')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="default-form-box">
                                <label>Email <span>*</span></label>
                                <input type="text" value="{{ old('email') }}" name="email">
                                @error('email')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="default-form-box">
                                <label>Số điện thoại <span>*</span></label>
                                <input type="text" value="{{ old('phone_number') }}" name="phone_number">
                                @error('phone_number')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="default-form-box">
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="password">
                                @error('password')
                                     <p style="color: red">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover mb-4" type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection

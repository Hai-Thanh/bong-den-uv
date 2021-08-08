@extends('frontend.layouts.main')

@section('title' , 'Đăng nhập khách hàng')
@section('content')
<div class="breadcrumb-section breadcrumb-bg-color--golden">
  <div class="breadcrumb-wrapper">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <h3 class="breadcrumb-title">Login customers</h3>
                  <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                      <nav aria-label="breadcrumb">
                          <ul>
                              <li><a href="index.html">Home</a></li>
                              <li><a href="route('shop')">Shop</a></li>
                              <li class="active" aria-current="page">Login customers</li>
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
              <div class="account_form" data-aos="fade-up"  data-aos-delay="0">
                  <h3>Login customers</h3>
                @if (session('msg'))
                  <div class="alert alert-success">
                      {{ session('msg') }}
                  </div>
                @endif
                  <form action="{{ route('postlogin.customers') }}" method="POST">
                    @csrf
                      <div class="default-form-box">
                          <label>Username or email <span>*</span></label>
                          <input type="text" value="{{ old('email') }}" name="email" >

                      </div>
                      <div class="default-form-box">
                          <label>Passwords <span>*</span></label>
                          <input type="password" name="password">
                    
                      </div>
                      <div class="login_submit">
                      <label class="checkbox-default mb-4" for="offer">
                          <input type="checkbox" name="remember_me" id="offer">
                          <span>Remember me</span>
                      </label>
                          <button class="btn btn-md btn-black-default-hover mb-4" type="submit">login</button>
                      </div>
                  </form>
              </div>
          </div>

      </div>
  </div>
</div>

<br> <br>

@endsection






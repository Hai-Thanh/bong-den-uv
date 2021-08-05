@extends('frontend.layouts.main')

@section('title', 'Thông tin cá nhân')
@section('content')

    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">My Account</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('shop') }}">Shop</a></li>
                                    <li class="active" aria-current="page">My Account</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Account Dashboard Section:::... -->
    <div class="account-dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#dashboard" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover active">Dashboard</a></li>
                            <li> <a href="#orders" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Đơn hàng</a></li>
                            <li><a href="#downloads" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Đổi mật khẩu</a></li>
                            @if (Auth::check())
                            <li><a href="{{ route('dashboard') }}"  
                                        class="nav-link btn btn-block btn-md btn-black-default-hover">Quản trị viên</a></li>
                            @endif
                            <li><a href="{{ route('logout') }}"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                        <div class="tab-pane fade show active" id="dashboard">
                            <h3>Hồ sơ của bạn </h4>
                            @if (Auth::check())
                            <div style="margin-left:15px" class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <div class="default-form-box mb-20">
                                            <label>Ảnh của bạn:</label>
                                            <img  width="200px" height="200px" src="{{ Auth::user()->avatar }}" alt="">
                                        </div>
                                            <div class="default-form-box mb-20">
                                                <label>Họ tên của bạn: {{ Auth::user()->name }}</label>
                                               
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Email của bạn: {{ Auth::user()->email }}</label>
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Số điện thoại:  {{ Auth::user()->phone_number }}</label>
                                            </div>
                                    </div>
                                     
                                </div>
                            </div>
                            @endif


                        </div>
                        <div class="tab-pane fade" id="orders">
                            <h4>Orders</h4>
                            <h6>Bạn đã đặt : {{ $orders->count() }} đơn hàng.</h6>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Đơn hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Trạng thái</th>
                                            <th>Số sản phẩm</th>
                                            <th>Tổng tiền</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orders as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                @if ($order->order_status == 0)
                                                Đang chờ xác nhận
                                                @elseif ($order->order_status == 1)
                                                Đã xác nhận
                                                @elseif ($order->order_status == 2)
                                                Đang vận chuyển
                                                @elseif ($order->order_status == 3)
                                                Hoàn tất
                                                @elseif ($order->order_status == 4)
                                                Đơn hủy
                                                @elseif ($order->order_status == 5)
                                                Đã hoàn tiền ( hủy đơn )
                                                @endif
                                            
                                            </td>
                                            <td>{{ $order->total_product }} </td>
                                            <td>{{ $order->total_price }} </td>
                                            <td><a href="{{ route('order.detail.product' , ['id' =>$order->id]) }}" class="view">view</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="downloads">
                            <h4>Đổi mật khẩu</h4>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    
                        @if (session('danger'))
                            <div class="alert alert-danger">
                                {{ session('danger') }}
                            </div>
                        @endif
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="{{ route('changepassword', ['id'=>$user->id]) }}" method="POST">
                                            @csrf
                                            <div class="default-form-box mb-20">
                                                <label>Mật khẩu cũ </label>
                                                <input type="password" value="{{ old('password_old') }}" name="password_old">
                                                @error('password_old')
                                                        <span  style="color: red; font-size:17px">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Mật khẩu mới</label>
                                                <input type="password"  value="{{ old('password_new') }}" name="password_new">
                                                @error('password_new')
                                                        <span  style="color: red; font-size:17px">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Xác nhận mật khẩu</label>
                                                <input type="password" value="{{ old('password_confim') }}" name="password_confim">
                                                @error('password_new')
                                                        <span  style="color: red; font-size:17px">{{ $message }}</span>
                                                @enderror
                                            </div>
                                 
                                            <div class="save_button mt-3">
                                                <button class="btn btn-md btn-black-default-hover"
                                                    type="submit">Đổi mật khẩu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        
                        </div>
                        <div class="tab-pane" id="address">
                            <p>The following addresses will be used on the checkout page by default.</p>
                            <h5 class="billing-address">Billing address</h5>
                            <a href="#" class="view">Edit</a>
                            <p><strong>Bobby Jackson</strong></p>
                            <address>
                                House #15<br>
                                Road #1<br>
                                Block #C <br>
                                Banasree <br>
                                Dhaka <br>
                                1212
                            </address>
                            <p>Bangladesh</p>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

@endsection

@extends('frontend.layouts.main')
@section('content')

<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Checkout</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="{{ route('shop') }}">Shop</a></li>
                                <li class="active" aria-current="page">Checkout</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Checkout Section:::... -->
<div class="checkout-section">
    <div class="container">
        <!-- Start User Details Checkout Form -->
        <div class="checkout_form" data-aos="fade-up"  data-aos-delay="400">
        <form action="{{ route('postcheckout') }}" method="POST" >
             <div class="row">
       
                <div class="col-lg-6 col-md-6">
                
                        @csrf
                        <h3>Billing Details</h3>

                        @if (Auth::check())

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="default-form-box">
                                        <label>Nhập họ và tên khách hàng<span>*</span></label>
                                        <input type="text" value="{{ Auth::user()->name }}" name="customer_name">
                                    </div>
                                </div>
                            
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Email <span>*</span> </label>
                                        <input value="{{ Auth::user()->email }}" type="text" name="customer_email">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Nhập số điện thoại <span>*</span> </label>
                                        <input value="{{ Auth::user()->phone_number }}" type="text" name="customer_phone">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Nhập địa chỉ của bạn <span>*</span></label>
                                        <input name="customer_address" type="text">
                                    </div>
                                </div>
                        
                                <div class="col-12 mt-3">
                                    <div class="order-notes">
                                        <label for="order_note">Ghi chú</label>
                                        <textarea id="order_note"  name="order_note" ></textarea>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (session()->get('cart') != null)
                            <div class="payment_method">
                                <div class="order_button pt-3">
                                    <button class="btn btn-md btn-black-default-hover" type="submit">Proceed to PayPal</button>
                                </div>
                            </div>
                        @endif
                        <br><br>

                </div>
                <div class="col-lg-6 col-md-6">
                        <h3>Your order</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Image</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalmonney = 0;
                                        $total_product = 0;

                                    @endphp
                                    @if (session()->get('cart'))
                                        @foreach (session()->get('cart') as $key => $carts )
                                            <tr>
                                                <td> {{ $carts['name'] }} <strong> ×  {{ $carts['quantity'] }}</strong></td>
                                                <td> <img src="{{ $carts['image_path'] }}" width="50px" alt=""></td>
                                                <td> ${{  $total= $carts['quantity'] * $carts['price'] }}</td>
                                            </tr>
                                            {{ $totalmonney += $total }}
                                            {{  $total_product += $carts['quantity']  }}
                                        
                                        @endforeach
                                    @else
                                            <h3>Giỏ hàng trống, muốn thanh toán thì thêm sản phẩm vào !</h3>

                                    @endif
                                </tbody>
                                
                                <tfoot>
                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <th></th>
                                        <th>  ${{ $totalmonney }}</th>
                                    </tr>
                                    
                                </tfoot>
                                <input type="hidden"   name="total_product" value="{{ $total_product }}">
                                <input type="hidden"   name="total_price" value="{{ $totalmonney }}">
                            </table>
                        </div>
                </div>
           
            </div>
        </form>
        </div>  
    </div>
</div> 

@endsection
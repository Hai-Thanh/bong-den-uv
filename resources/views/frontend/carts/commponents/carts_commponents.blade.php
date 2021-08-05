<div class="update_cart_url" data-url="{{ route('update.cart') }}">
    <div class="cart-section urlDelete " data-url="{{ route('delete.cart') }}" >
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper"  data-aos="fade-up"  data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                    
                                    @php
                                    $total= 0;
                                    $quantity = 0;
                                    @endphp
                                    @if ($carts == null)
                                        <h3>Giỏ hàng trống</h3>
                                    @else
                                        @foreach ($carts  as $id =>  $cart)
                                            @php
                                                $total += $cart['price'] * $cart['quantity'] ;
                                                $quantity += $cart['quantity'];
                                            @endphp 
                                                <tr>
                                                    <td class="product_remove ">
                                                        <a class="delete-cart" data-id="{{ $id }}" href="#"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                    <td class="product_thumb"><a href="{{ route('products.detail' , ['id' =>$id]) }}"><img src="{{ $cart['image_path'] }}" alt=""></a></td>
                                                    <td class="product_name"><a href="{{ route('products.detail' , ['id' =>$id]) }}">{{ $cart['name'] }}</a></td>
                                                    <td class="product-price">${{ $cart['price'] }}</td>
                                                    <td class="product_quantity"><label>Quantity</label> <input class="quantity" min="1" max="100" value="{{ $cart['quantity'] }}" type="number"> 
                                                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;  &ensp;
                                                        <a  data-id="{{ $id }}" class="cart_update"><i style="font-size: 20px" class="icon-bag"></i></a>
                                                    
                                                    </td>
                                                    <td class="product_total">${{   $cart['price'] * $cart['quantity']  }}</td>
                                                </tr> 

                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->
        <div class="coupon_area"  >
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left"  data-aos="fade-up"  data-aos-delay="200">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">
                                <p>Enter your coupon code if you have one.</p>
                                <input class="mb-2" placeholder="Coupon code" type="text">
                                <button type="submit" class="btn btn-md btn-golden">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right"  data-aos="fade-up"  data-aos-delay="400">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal ">
                                    <p>Quantity product</p>
                                    <p class="cart_amount"><span>Quantity product :</span> {{ $quantity }}</p>
                                </div>
                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">${{ $total }}</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="{{ route('checkout') }}" class="btn btn-md btn-golden">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div> 
</div>
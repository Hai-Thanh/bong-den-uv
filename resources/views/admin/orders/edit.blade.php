@extends('admin.layouts.admin')

@section('title', 'Sửa đơn hàng')

@section('content')
    <div class="main-content-container container-fluid px-4">
        @include('admin.partials.title-content', ['name'=>'Sửa đơn hàng'])

        <form action="{{ route('orders.update', ['id' =>$order->id]) }}" class="add-new-post" method="POST">
            @csrf

            <div class="form-group col-md-12">
                <label for="iputName" class="text-muted d-block mb-2">Tên khách hàng</label>
                <div class="input-group mb-3">
                    <input type="text" name="customer_name" value="{{ $order->customer_name }}" class="form-control" placeholder="Nhập tên khách hàng">
                </div>
            @error('customer_name')
                <span style="color: red; font-size:17px">{{ $message }}</span>
            @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="iputName" class="text-muted d-block mb-2">Email khách hàng</label>
                <div class="input-group mb-3">
                    <input type="email" name="customer_email"  value="{{ $order->customer_email }}" class="form-control" placeholder="Nhập tên email khách hàng">
                </div>
                @error('customer_email')
                <span style="color: red; font-size:17px">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="iputName" class="text-muted d-block mb-2">Số điện thoại khách hàng</label>
                <div class="input-group mb-3">
                    <input type="text" name="customer_phone" class="form-control"  value="{{ $order->customer_phone }}"
                        placeholder="Nhập tên số điện thoại khách hàng">
                </div>
                @error('customer_phone')
                <span style="color: red; font-size:17px">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="iputName" class="text-muted d-block mb-2">Nhập địa chỉ khách hàng</label>
                <div class="input-group mb-3">
                    <input type="text" name="customer_address" class="form-control" value="{{ $order->customer_address }}"
                        placeholder="Nhập địa chỉ khách hàng">
                </div>
                @error('customer_address')
                    <span style="color: red; font-size:17px">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="order_status">Trạng thái đơn hàng:</label>
                <select name="order_status" class="form-control" style="width: 350px">
                <option value="0" {{ $order->order_status == 0 ? 'selected' : '' }}>Đang chờ xác nhận</option>
                <option value="1" {{ $order->order_status == 1 ? 'selected' : '' }}>Đã xác nhận</option>
                <option value="2" {{ $order->order_status == 2 ? 'selected' : '' }}>Đang vận chuyển</option>
                <option value="3" {{ $order->order_status == 3 ? 'selected' : '' }}>Hoàn tất</option>
                <option value="4" {{ $order->order_status == 4 ? 'selected' : '' }}>Đơn hủy</option>
                <option value="5" {{ $order->order_status == 5 ? 'selected' : '' }}>Đã hoàn tiền ( hủy đơn )</option>
                </select>
            </div>


            <div class="form-group col-md-12">

                <label for="customer_phone">Sản phẩm trong đơn hàng:</label>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th>Id sản phẩm</th>
                            <th>ảnh đại diện</th>
                            <th>tên sản phẩm</th>
                            <th>số lượng</th>
                            <th>giá tiền</th>
                            <th>tổng giá</th>
                        </tr>

                    </thead>
                    <tbody id="list-cart-product">
                        @foreach ($productInOrders as $productInOrder)
                        <tr id="tr-{{ $productInOrder->id }}">
                            <td> {{ $productInOrder->id }} </td>
                            <td>
                                <img src="{{ $productInOrder->image_path }}"  width="250px" height="250px">
                            </td>
                            <td>{{ $productInOrder->name }}</td>
                            <td>
                                {{ $productInOrder->quantity }}
                            </td>
                            <td class="product_price">
                                {{ $productInOrder->product_price }}
                            </td>
                            <td class="product_price_total">
                                {{ $productInOrder->product_price * $productInOrder->quantity }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="font-weight: bold">Tổng tiền thanh toán: <strong id="payment-price">{{ $order->total_price }}</strong></div>

            </div>

            <div class="form-group col-md-12">
                <label for="iputName" class="text-muted d-block mb-2">Ghi chú</label>
                <div class="input-group mb-6">
                    <textarea class="form-control" name="order_note" cols="90" rows="5">{{ $order->order_note }}</textarea>
                </div>
            </div>

            &nbsp;&nbsp;&nbsp;
            <button type="submit" class="mb-2 btn btn-success mr-2">Sửa</button>
            <a href="{{ route('orders') }}" class="mb-2 btn btn-danger mr-2">Hủy</a>
        </form>
    </div>

@endsection
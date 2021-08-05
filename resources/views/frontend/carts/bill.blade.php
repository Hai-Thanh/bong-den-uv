@extends('frontend.layouts.main')
@section('content')

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <br>
        <div class="col-md-12">


            <div class="invoice">
                <div class="invoice-header">
                    <h4 style="text-align: center; color: #e2345c;">Đặt hàng thành công. Bạn nên check điện thoại và email
                        để nhận hàng ! </h4>
                    <div class="invoice-to">
                        <small>Người đặt hàng :</small>
                        <address class="m-t-5 m-b-5">
                            <strong class="text-inverse">{{ $orders->customer_name }}</strong><br>
                            Address : {{ $orders->customer_address }}<br>
                            Phone: {{ $orders->customer_phone }}<br>
                            Email: {{ $orders->customer_email }}
                        </address>
                    </div>
                    <div class="invoice-date">
                        <small>Thời gian đặt hàng:</small>
                        <div class="date text-inverse m-t-5">{{ $orders->created_at }}</div>
                    </div>
                </div>
                <!-- end invoice-header -->
                <!-- begin invoice-content -->
                <div class="invoice-content">
                    <!-- begin table-responsive -->
                    <div class="table-responsive">
                        <table class="table table-invoice">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Tên sản phẩm</th>
                                    <th class="text-center">Gía</th>
                                    <th class="text-center">Ảnh sản phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">LINE TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="text-center">{{ $product->name }}</td>
                                        <td>${{ $product->price }}</td>
                                        <td><img src="{{ $product->image_path }}" width="200px" height="200px"></td>
                                        <td class="text-center">{{ $list_qty[$key++] }}</td>

                                        <td class="text-center">${{ $product->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                    <!-- begin invoice-price -->
                    <div class="invoice-price">
                        <div class="invoice-price-left">
                            <small>Tổng tiền</small> <span class="f-w-600">${{ $orders->total_price }}</span>
                        </div>
                        <div class="invoice-price-right">
                            <a href="{{ route('home') }}">Mua hàng tiếp</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .invoice-company {
            font-size: 20px
        }

        .invoice-header {
            margin: 0 -20px;
            background: #f0f3f4;
            padding: 20px
        }

        .invoice-date,
        .invoice-from,
        .invoice-to {
            display: table-cell;
            width: 1%
        }

        .invoice-from,
        .invoice-to {
            padding-right: 20px
        }

        .invoice-date .date,
        .invoice-from strong,
        .invoice-to strong {
            font-size: 16px;
            font-weight: 600
        }

        .invoice-date {
            text-align: right;
            padding-left: 20px
        }

        .invoice-price {
            background: #f0f3f4;
            display: table;
            width: 100%
        }

        .invoice-price .invoice-price-left,
        .invoice-price .invoice-price-right {
            display: table-cell;
            padding: 20px;
            font-size: 20px;
            font-weight: 600;
            width: 75%;
            position: relative;
            vertical-align: middle
        }

        .invoice-price .invoice-price-left .sub-price {
            display: table-cell;
            vertical-align: middle;
            padding: 0 20px
        }

        .invoice-price small {
            font-size: 12px;
            font-weight: 400;
            display: block
        }

        .invoice-price .invoice-price-row {
            display: table;
            float: left
        }

        .invoice-price .invoice-price-right {
            width: 25%;
            background: #2d353c;
            color: #fff;
            font-size: 28px;
            text-align: right;
            vertical-align: bottom;
            font-weight: 300
        }

        .invoice-price .invoice-price-right small {
            display: block;
            opacity: .6;
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 12px
        }

        .invoice-footer {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            font-size: 10px
        }

        .invoice-note {
            color: #999;
            margin-top: 80px;
            font-size: 85%
        }

        .invoice>div:not(.invoice-footer) {
            margin-bottom: 20px
        }

        .btn.btn-white,
        .btn.btn-white.disabled,
        .btn.btn-white.disabled:focus,
        .btn.btn-white.disabled:hover,
        .btn.btn-white[disabled],
        .btn.btn-white[disabled]:focus,
        .btn.btn-white[disabled]:hover {
            color: #2d353c;
            background: #fff;
            border-color: #d9dfe3;
        }

    </style>
@endsection

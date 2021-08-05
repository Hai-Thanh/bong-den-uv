@extends('admin.layouts.admin')

@section('title', 'Sản phẩm')
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/main.js') }}"></script>


@endsection
@section('content')
    <div class="main-content-container container-fluid px-4">

        @include('admin.partials.title-content', ['name'=>'Danh sách thành viên'])
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Thành viên</h6>

                        <a class="nav-link " href="{{ route('orders.add') }}">
                            <i class="material-icons">note_add</i>
                            <span>Add Order</span>
                        </a>
                    </div>
               
                    <div class="card-body p-0 pb-3 text-center">

                        <table class="table mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0">#</th>
                                    <th scope="col" class="border-0">Tên khách hàng</th>
                                    <th scope="col" class="border-0">Số điện thoại </th>
                                    <th scope="col" class="border-0">Email</th>
                                    <th scope="col" class="border-0">Trạng thái đơn hàng</th>
                                    <th scope="col" class="border-0">Tổng tiền</th>
                                    <th scope="col" class="border-0">Tổng số sản phẩm</th>
                                    <th scope="col" class="border-0">Tên sản sản phẩm</th>
                                    <th scope="col" class="border-0">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key =>  $order)
                                <tr>
                                    <td>{{  $key+1  }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->customer_phone }}</td>
                                    <td>{{ $order->customer_email }}</td>
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
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->total_product }}</td>
                                    <td>
                                        @foreach ($order->productOrder as  $product)
                                             {{ '-'. $product->name  }} <br>
                                        @endforeach
                                     </td>
                                    <td>
                                        <a href="{{ route('orders.edit',['id' => $order->id]) }}" class="mb-2 btn btn-info mr-2 ">Sửa</a>
                                        <a href="" data-url="{{ route('orders.delete', ['id' =>$order->id]) }}" class="mb-2 btn btn-danger mr-2 action_delete">Xóa</a>
                                    </td>

                                </tr>
                                @endforeach
                               
                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

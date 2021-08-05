@extends('admin.layouts.admin')

@section('title', 'Thêm đơn hàng')



@section('content')
    <div class="main-content-container container-fluid px-4">
        @include('admin.partials.title-content', ['name'=>'Thêm đơn hàng'])

        <form action="{{ route('orders.store') }}" class="add-new-post" method="POST">
            @csrf

            <div class="form-group col-md-12">
                <label for="iputName" class="text-muted d-block mb-2">Tên khách hàng</label>
                <div class="input-group mb-3">
                    <input type="text" name="customer_name" class="form-control" placeholder="Nhập tên khách hàng">
                </div>
                @error('customer_name')
                    <span style="color: red; font-size:17px">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="iputName" class="text-muted d-block mb-2">Email khách hàng</label>
                <div class="input-group mb-3">
                    <input type="email" name="customer_email" class="form-control" placeholder="Nhập tên email khách hàng">
                </div>
                @error('customer_email')
                    <span style="color: red; font-size:17px">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="iputName" class="text-muted d-block mb-2">Số điện thoại khách hàng</label>
                <div class="input-group mb-3">
                    <input type="text" name="customer_phone" class="form-control"
                        placeholder="Nhập tên số điện thoại khách hàng">
                </div>
                @error('customer_phone')
                    <span style="color: red; font-size:17px">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="iputName" class="text-muted d-block mb-2">Nhập địa chỉ khách hàng</label>
                <div class="input-group mb-3">
                    <input type="text" name="customer_address" class="form-control" placeholder="Nhập địa chỉ khách hàng">
                </div>
                @error('customer_address')
                    <span style="color: red; font-size:17px">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="order_status">Trạng thái đơn hàng:</label>
                <select name="order_status" class="form-control" style="width: 350px">
                    <option value="0" {{ old('order_status', '') == 0 ? 'selected' : '' }}>Đang chờ xác nhận</option>
                    <option value="1" {{ old('order_status', '') == 1 ? 'selected' : '' }}>Đã xác nhận</option>
                    <option value="2" {{ old('order_status', '') == 2 ? 'selected' : '' }}>Đang vận chuyển</option>
                    <option value="3" {{ old('order_status', '') == 3 ? 'selected' : '' }}>Hoàn tất</option>
                    <option value="4" {{ old('order_status', '') == 4 ? 'selected' : '' }}>Đơn hủy</option>
                    <option value="5" {{ old('order_status', '') == 5 ? 'selected' : '' }}>Đã hoàn tiền ( hủy đơn )
                    </option>
                </select>
            </div>

            <div class="form-group col-md-12">

                <label for="search_product">Tìm kiếm sản phẩm để thêm vào trong đơn hàng mới:</label>
                <select name="search_product" id="search_product" class="form-control" style="width: 250px">
                    <option value="">Search ...</option>

                </select>

                <a href="#" id="addtocart" class="btn btn-info" style="margin: 10px 0">Thêm sản phẩm này vào đơn hàng</a>
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
                            <th>xóa</th>
                        </tr>
                    </thead>
                    <tbody id="list-cart-product">
                    </tbody>
                </table>
                <div style="font-weight: bold">Tổng tiền thanh toán: <strong id="payment-price">0</strong></div>

            </div>

            <div class="form-group col-md-12">
                <label for="iputName" class="text-muted d-block mb-2">Ghi chú</label>
                <div class="input-group mb-6">
                    <textarea class="form-control" name="order_note" cols="90" rows="5"></textarea>
                </div>
            </div>


            &nbsp;&nbsp;&nbsp;
            <button type="submit" class="mb-2 btn btn-success mr-2">Thêm</button>
            <a href="{{ route('orders') }}" class="mb-2 btn btn-danger mr-2">Hủy</a>
        </form>
    </div>

@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateCart() {
                var total = 0;
                $("input[name='quantity[]").each(function(index, value) {
                    var t = $(this);
                    var tr = t.closest("tr");
                    var quantity = t.val();
                    var price = tr.find("td.product_price").text();
                    price = parseFloat(price);
                    var tt = quantity * price;
                    tr.find("td.product_price_total").text(tt);
                    total += tt;

                });
                $("#payment-price").text(total);
            }


            $('#search_product').select2({
                placeholder: 'Tìm 1 sản phẩm',
                ajax: {
                    type: 'POST',
                    data: function(params) {

                        query = {
                            search: params.term,
                            _token: "{{ csrf_token() }}"
                        };
                        return query;
                    },
                    url: "{{ route('searchProduct') }}",
                    processResults: function(data) {
                        return data;
                    }
                }
            });

            $("#addtocart").on('click', function(e) {
                e.preventDefault();
                let id = $("#search_product").val();
                id = parseInt(id);
                if (id > 0) {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('ajaxSingleProduct') }}",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}"
                        }
                    }).done(function(product) {
                        checkTr =
                            $("tbody#list-cart-product").find(`#tr-${product.id}`).length;
                        checkTr = parseInt(checkTr);

                        if (product.id !== "undefined" && product.quantity > 0 && checkTr < 1) {

                            var html = /*html*/ `
                                  <tr id="tr-${product.id}">
                                      <td>
                                       ${product.id} <input type="hidden" name="product_ids[]" class="form-control" style="width: 150px" value="${product.id}">
                                      </td>
                                      <td>
                                          <img src="${product.image_path}" style="width: 100px; height: auto;">
                                      </td>
                                      <td>
                                          ${product.name}
                                      </td>
                                      <td>
                                           <input type="number" name="quantity[]" class="form-control" style="width: 150px" value="1">
                                      </td>
                                      <td class="product_price">
                                            ${product.price}
                                      </td>
                                      <td class="product_price_total">
                                           ${product.price}
                                      </td>
                                      <td>
                                           <a href="#" class="btn btn-danger removeCart">Xóa</a>
                                      </td>
                                      </tr>
                                      `;
                            $("tbody#list-cart-product").append(html);
                            updateCart();



                        } else {
                            alert(
                                "Thêm sản phẩm không thành công do đã có sản phẩm trong giỏ hàng hoặc lỗi hệ thống");
                        }
                    });
                } else {
                    alert("Chọn sản phẩm trước khi thêm giỏ hàng");
                }

            });
            $("body").on("click", "a.removeCart", function(e) {
                e.preventDefault();
                $(this).closest("tr").remove();
                updateCart();
            });

            $("body").on("change", "input[name='quantity[]']", function() {
                var quantity = $(this).val();
                quantity = parseInt(quantity);
                if (quantity > 0 && quantity < 100) {
                    updateCart();
                } else {
                    $(this).val(1);
                    alert("Chỉ được mua số lượng tối đa là 99 sản phẩm !");
                    updateCart();
                }
            })




        });
    </script>


@endsection

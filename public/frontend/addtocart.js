


function deleteCart(e) {
    e.preventDefault();
    let urlDelete = $('.urlDelete').data('url');
    let id = $(this).data('id'); 

    $.ajax({
        type: "GET",
        url: urlDelete,
        data: { id: id },
        success: function (data) {
            if (data.code == 200) {
                $('.cart_compomments').html(data.cartComponents);
            }
        },
        error: function () {

        }
    })
}

$('.add-cart').on('click', function (e) {
    e.preventDefault();
    let urlCart = $(this).data('url');
    $.ajax({
        type: "GET",
        url: urlCart,
        dataType: 'json',
        success: function (data) {
            location.reload();
        },
        error: function () {

        }
    })

});

$('.cart_update').on('click', function (e) {
    e.preventDefault();
    let urlUpdate = $('.update_cart_url').data('url');
    let id = $(this).data('id');
    let quantity = $(this).parents('tr').find('input.quantity').val();
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Cập nhật giỏ hàng thành công',
        showConfirmButton: false,
        timer: 1500
    }).then((result) => {
        $.ajax({
            type: "GET",
            url: urlUpdate,
            data: { id: id, quantity: quantity },
            success: function (data) {
                $('.cart_compomments').html(data.cartComponents);
                if(data.cartComponents){
                    setTimeout(function(){  location.reload(); }, 3000);
                }
            },
            error: function () {
                alert("Lỗi hãy liên hệ với admin");
            }
        });
    });


});

$('.add-cart-detail').on('click', function () {
    let urlCart = $(this).data('url');
    let id = $(this).data('id');
    let quantity = $('.quantity_input').val();
    $.ajax({
        type: "GET",
        url: urlCart,
        data: { id: id, quantity: quantity },
        success: function (data) {
            if(data.code ==200){
                setTimeout(function(){  location.reload(); }, 3000);
            }
        },
        error: function () {


        }
    });
});

$(function () {
    $(document).on('click', '.delete-cart', deleteCart);
});

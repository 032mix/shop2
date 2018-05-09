function addToCart(name, price) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var qtty = parseInt($('#add_qtty').val());
    $.post("/addToCart/" + name + "/" + qtty, function () {
        $('#total_price').text((parseFloat($('#total_price').text()) + (price * qtty)).toFixed(2));
        $('#total_qtty').text(parseInt($('#total_qtty').text()) + qtty);
    });
}

function removeFromCart(name, price, qtty, id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post("/removeFromCart/" + name, function () {
        $('.rem' + id).fadeOut('slow', function () {
            $('#checkout_total_price').text((parseFloat($('#checkout_total_price').text()) - (price * qtty)).toFixed(2));
            $('#checkout_total_qtty').text(parseInt($('#checkout_total_qtty').text()) - qtty);
            $('.rem' + id).remove();
            if (parseInt($('#checkout_total_qtty').text()) == 0) {
                $('#checkout_button').remove();
            }
        });
    });
}

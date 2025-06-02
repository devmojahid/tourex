"use strict";

// Add To WishList Cart
function addToWishlist(productId, element, type = 'product') {
    $.ajax({
        url: $(element).data('url'), // Get URL from data attribute
        type: "POST",
        data: {
            item_id: productId,
            type: type,
            _token: document.querySelector('meta[name="csrf-token"]').content
        },
        success: function (response) {
            $(element).toggleClass('active');
            toastr.success(response.message);

            // Remove the product card from wishlist view
            $("#wishlist-item-" + productId).fadeOut(300, function () {
                $(this).remove();
                // Check if wishlist is empty after removal
                if ($("#wishlist-container").children().length === 0) {
                    location.reload(); // Reload to show the "not found" message
                }
            });
        },
        error: function (xhr) {
            toastr.error(xhr.responseJSON.message);
        }
    });
}


function addToCart(productId, element) {

    var quantity = $('input[name="quantity"]').val() || 1;

    $.ajax({
        url: $(element).data('url'),
        type: 'POST',
        data: {
            product_id: productId,
            quantity: quantity,
            _token: document.querySelector('meta[name="csrf-token"]').content
        },
        beforeSend: function () {
            $(element).attr("disabled", true);
        },
        complete: function () {
            $(element).attr("disabled", false);
        },
        success: function (response) {
            if (response.success) {
                $('.cart-count').text(response.totalCartItem);
                toastr.success(response.message);
            } else {
                toastr.error(response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX error:", xhr.responseText);
        }
    });
}




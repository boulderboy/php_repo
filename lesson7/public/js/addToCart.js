"use strict";



function renderItem(imgSrc, title, price, id, quantity) {
    var $blockOfGood = $('<div />');
    $blockOfGood.addClass('hidden-prod');
    $blockOfGood.data('id');
    var $prodImg = $(`<img src="${imgSrc}">`);
    var $prodRating = $('<div />');
    $prodRating.addClass('hidden-prod-rating');
    var $title = $('<h5 />');
    $title.text(title);
    var $stars = $('<img src="img/stars.png">');
    var $quantity = $('<span />');
    $quantity.addClass('hidden-cart-price');
    $quantity.text(`${quantity} x ${price}$ = ${quantity*price}$`);
    var $deleteProd = $('<i />',{
        class: "fas fa-times-circle remove",
        'data-id': id,
        'data-quantity': quantity,
    });
    $prodRating.append($title, $stars, $quantity);
    $blockOfGood.append($prodImg, $prodRating, $deleteProd);
    $('#cart-block').append($blockOfGood);
}

    function cartRender(allGoods, id) {
        $('#cart-block').empty();
        console.log(allGoods);
        var totalPrice = null;
        for(var good in allGoods){
            var imgSrc = 'img/minis-for-cart/cat-' + allGoods[good].id + '.jpg';
            renderItem(imgSrc, allGoods[good].name, allGoods[good].price, allGoods[good].id, allGoods[good].quantity);
            totalPrice += allGoods[good].price * allGoods[good].quantity;
        }
        var $totalBlock = $('<div />');
            $totalBlock.addClass('hidden-total');
            var $totalText = $('<h4>total</h4>');
            var $totalPrice = $(`<h4>${totalPrice}$</h4>`);
            $totalBlock.append($totalText, $totalPrice);
            $('#cart-block').append($totalBlock);

            var $checkoutBtn = $('<a href="?checkout=true" class="hidden-checkout">checkout</a>');
            var $goToCartBtn = $('<a href="cart.html" class="hidden-goto">go to cart</a>');
            $('#cart-block').append($checkoutBtn, $goToCartBtn);
        // allGoods.forEach(function (good) {
        //     renderItem('img/minis-for-cart/cat-'+good.id + '.jpg', good.name, good.price, good.id, good.quantity)
        // })
    }

//     $.ajax({
//         url: 'cart',
//         type: 'GET',
//         success: function (cart) {
//             if (cart.length === 0) {
//                 $('#cart-block').empty();
//                 $('#cart-block').append($('<span>Your cart is empty</span>'));
//             } else {
//                 var totalPrice = null;
//                 $('#cart-block').empty();
//                 cart.forEach(function (product) {
//                     renderItem(product.imgForCartSrc, product.title, product.price, product.id, product.quantity);
//                     totalPrice += +product.price * product.quantity;
//                 });
//
//             var $totalBlock = $('<div />');
//             $totalBlock.addClass('hidden-total');
//             var $totalText = $('<h4>total</h4>');
//             var $totalPrice = $(`<h4>${totalPrice}$</h4>`);
//             $totalBlock.append($totalText, $totalPrice);
//             $('#cart-block').append($totalBlock);
//
//             var $checkoutBtn = $('<a href="checkout.html" class="hidden-checkout">checkout</a>');
//             var $goToCartBtn = $('<a href="cart.html" class="hidden-goto">go to cart</a>');
//             $('#cart-block').append($checkoutBtn, $goToCartBtn);
//             }
//         }
//
//     })
// }

(function ($) {
    $(document).ready(function () {
        //cartRender();
        $('.catalog-product-block').on('click', '.add-to-cart', function (event) {
            event.preventDefault();
            var prodId = $(this).data('id');
            if($('.remove[data-id='+prodId+']').data('quantity')) {
                var prodQuantity = $('.remove[data-id=' + prodId + ']').data('quantity');
            }
            var product = `id=${prodId}&quantity=${prodQuantity}&action=add`;

            $.ajax({
                url:'/php/cartRender.php',
                type: 'POST',
                data: product,
                success: function (goods) {
                    var allGoods = JSON.parse(goods);

                    cartRender(allGoods);
                }
            })
            // if($('#cart-block .remove[data-id = ' + product.id + ']').length){
            //     var productDataList = $('#cart-block .remove[data-id = ' + product.id + ']').data();
            //     $.ajax({
            //         url: 'http://localhost/cart/' + product.id,
            //         type: 'PATCH',
            //         data: {"quantity": +productDataList.quantity + 1},
            //         success: function () {
            //             cartRender()
            //         }
            //     })
            // }   else {
            //     $.ajax({
            //         url: 'http://localhost/cart',
            //         type: 'POST',
            //         data: product,
            //         success: function () {
            //             console.log('ok');
            //         }
            //     });
            // }
            //
            // cartRender();
        });
        $('#cart-block').on('click', '.remove', function (event) {
            var productId = $(this).data('id');
            var deleteData = `id=${productId}&action=delete`
            $.ajax({
                url: 'php/cartRender.php',
                type: 'POST',
                data: deleteData,
                success: function (goods) {
                    var allGoods = JSON.parse(goods);
                    cartRender(allGoods);
                }
            })
        })
    })
})(jQuery);

// $(this).data('imgForCartSrc'), $(this).data('title'), $(this).data('price')
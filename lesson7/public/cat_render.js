"use strict";
var catalogBlock = document.querySelector(".catalog-product-block");
jQuery.ajax({
   url: "php/catalog-render.php",
   type: "GET",
   success: function (rendererBlock) {
       catalogBlock.innerHTML = rendererBlock;
   }
});


// var $container = document.querySelector('.catalog-product-block');
//
//
// var xhr = new XMLHttpRequest();
//
// xhr.open('GET', 'http://localhost:3001/goods');
// xhr.send();
//
//
// xhr.onreadystatechange = function () {
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//             var goods = JSON.parse(xhr.responseText);
//             goods.forEach(function (card) {
//                 var hoverBlock = document.createElement('div');
//                 hoverBlock.classList.add('product-hover');
//                 var link = document.createElement('a');
//                 link.classList.add('products__card');
//                 link.href = card.href;
//                 var image = document.createElement('img');
//                 image.src = card.img_src + '.jpg';
//                 var prodText = document.createElement('div');
//                 prodText.classList.add('products__text');
//                 var prodTitle = document.createElement('p');
//                 prodTitle.innerHTML = card.title;
//                 var prodPrice = document.createElement('span');
//                 prodPrice.innerHTML = '$' + card.price;
//                 var prodHover = document.createElement('div');
//                 prodHover.classList.add('add-flex');
//                 var cartLink = document.createElement('a');
//                 cartLink.href = '#';
//                 cartLink.classList.add('add-to-cart');
//                 cartLink.textContent = 'add to cart';
//                 cartLink.dataset.price = card.price;
//                 cartLink.dataset.title = card.title;
//                 cartLink.dataset.id = card.id;
//                 cartLink.dataset.quantity = 1;
//                 cartLink.dataset.imgForCartSrc = card.imgForCartSrc;
//                 // var cartIcon = document.createElement('i');
//                 // cartIcon.classList.add('fas fa-shopping-cart');
//
//                 // cartLink.appendChild(cartIcon);
//                 prodText.appendChild(prodTitle);
//                 prodText.appendChild(prodPrice);
//                 link.appendChild(image);
//                 link.appendChild(prodText);
//                 prodHover.appendChild(cartLink);
//                 hoverBlock.appendChild(link);
//                 hoverBlock.appendChild(prodHover);
//                 $container.appendChild(hoverBlock);
//
//             })
//         }
//     }
// };
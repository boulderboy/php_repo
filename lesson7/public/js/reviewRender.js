"use strict";

function renderReview(review) {
    var $reviewContainer = $('<div />');
    $reviewContainer.attr('id', review.id);
    $reviewContainer.addClass('review-container');
    var $userAndTime = $('<div />');
    $userAndTime.addClass('user-time');
    var $user = $('<p />');
    var $date = $('<div />');
    $user.text(review.user);
    $date.text(review.data);
    $userAndTime.append($user, $date);
    var $productInfo = $('<div />');
    $productInfo.addClass('product-info');
    var $ratingFromUser = $('<div />').addClass('rating-from-user');
    for (var i = 0; i < 5; i++) {
        if (i < review.rating) {
            $ratingFromUser.append($('<i class="fas fa-star"></i>'));
        } else {
            $ratingFromUser.append($('<i class="far fa-star"></i>'));
        }
    }
    var $colorAndSize = $(`<p class="review-color">color: <span id="review-color">${review.color}</span></p>
				<p>Size: ${review.size}</p>`);

    var $reviewText = $('<div />').addClass('review-text').append(`<p>${review.text}</p>`);
    var $reviewRating = $('<div />');
    $reviewRating.append(`<i class="fas fa-thumbs-up"></i><span id="review-thumb-up">${review.useful}</span>` +
        `<i class="fas fa-thumbs-down"></i><span id="review-thumb-down">${review.unuseful}</span>`);
    $reviewText.append($reviewRating);

    $productInfo.append($ratingFromUser, $colorAndSize);

    $reviewContainer.append($userAndTime, $productInfo, $reviewText);
    $('#reviews').append($reviewContainer);
}

function renderAllReviews() {
    $.ajax({
        url: 'http://localhost:4000/reviews',
        type: 'GET',
        success: function (reviews) {
            reviews.forEach(function (review) {
                renderReview(review);
            })
        }

    });
}

(function ($) {

    renderAllReviews();
    var idCounter = 0;
    $.ajax({
        url: 'http://localhost:4000/reviews',
        type: 'GET',
        success: function (reviews) {
            idCounter = reviews[reviews.length - 1].id;
        }

    });
    var rating = 0;
    $('#send-review').on('click', function (event) {
        event.preventDefault();
        var review = {};
        idCounter++;
        review.id = idCounter;
        review.user = $('#review-user-name').val();
        review.rating = rating;
        review.color = $('#review-color').val();
        review.size = $('#review-size').val();
        review.useful = 0;
        review.unuseful = 0;
        review.text = $('#review-text').val();
        $.ajax({
            url: 'http://localhost:4000/reviews',
            type: 'POST',
            data: review,
            success: function () {
                $('#review-user-name').val('');
                $('#review-color').val('Choose color');
                $('#review-size').val('Choose size');
                $('#review-text').val('');
                renderAllReviews();
            }
        })

    });

    $('#stars-block').on('click', 'i',function (event) {
      $('.rating-star').each(function (i, elem) {
          if(elem.dataset.rating <= event.currentTarget.dataset.rating){
              elem.classList.remove('far');
              elem.classList.add('golden-star', 'fas');
          } else {
              elem.classList.remove('golden-star', 'fas');
              elem.classList.add('far');
          }
          rating = event.currentTarget.dataset.rating;
      })
    });
})(jQuery);


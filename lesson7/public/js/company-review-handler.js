"use strict";

jQuery('#confirm').on("click", function (event) {
    event.preventDefault();
    var data = new FormData(review);
    var userName = data.get("user-name");
    var reviewText = data.get("review-text");
    var formData = `userName=${userName}&reviewText=${reviewText}`;
    var formBlock = jQuery("#form-block");
    console.log(formData);
    jQuery.ajax({
        url:"php/add_review.php",
        type: "POST",
        data: formData,
        success: function () {
            formBlock.html("<p class='review-sended''>Review send to moderation! Thank you!</p>")
        }
    })
});
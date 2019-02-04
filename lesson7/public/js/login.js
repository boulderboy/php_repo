"use strict";

(function ($) {
    $('#login-btn').on('click', function (event) {
        event.preventDefault();
        var userLogin = $('#user-login').val();
        var userPassword = $('#user-password').val();
        var data = `userName=${userLogin}&userPassword=${userPassword}`;
        $.ajax({
            url:'php/login.php',
            type: 'POST',
            data: data,
            success: function (success) {
                console.log(success);
                console.log(JSON.parse(success));
                if(JSON.parse(success).auth == true){
                    location.reload();
                } else {
                    $(".login-block").append("<p>Incorrect</p>");
                }
                renderError();
            }
        })
    });
    $('#logout-btn').on('click', function (event) {
        console.log(150);
        $.ajax({
            url: 'php/logout.php',
            type: 'POST',
            data: 'logout',
            success: function (a) {
                location.reload();
            }
        })
    })
})(jQuery);

function renderError() {
    jQuery('#user-login').addClass('invalid');
    jQuery('#user-password').addClass('invalid');

}
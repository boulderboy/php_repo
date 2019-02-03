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
                if(JSON.parse(success).auth){
                    $(".login-block").empty();
                    $(".login-block").html(`<span>Hello, ${JSON.parse(success).login}</span>`)
                } else {
                    $(".login-block").html("<p>Incorrect</p>");
                }
                renderError();
            }
        })
    });
    $('#logout-btn').on('click', function (event) {
        console.log(150);
        $.ajax({
            url: 'php/login.php',
            type: 'GET',
            data: 'logout',
            success: function (a) {
                a.log;
                //location.reload();
            }
        })
    })
})(jQuery);

function renderError() {
    jQuery('#user-login').addClass('invalid');
    jQuery('#user-password').addClass('invalid');

}
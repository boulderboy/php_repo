"use strict";

// (function ($) {
//     $('#register').on('click', function (event) {
//         event.preventDefault();
//         var errors = 0;
//         $('.register-input').each(function (input) {
//             if($(this).val().length === 0){
//                 errors++;
//                 $(this).addClass('shake').addClass('invalid');
    //             }   else{
    //                 $(this).removeClass('invalid');
//                 if($(this).id = 'login'){
//                     $.ajax({
//                         url: 'http://localhost:3000/users',
//                         type: 'GET',
//                         success:function (users) {
//                             var usedLogin = 0;
//                             users.forEach(function (user) {
//                                 if(user.login === $('#login').val()){
//                                     event.preventDefault();
//                                     errors++;
//                                     usedLogin++;
//                                     if(!$('#login').parent().parent().find('.form-warning').length){
//                                         $('#login').parent().parent().append($('<p class="form-warning">This login already used</p>'));}
//                                     $('#login').addClass('invalid');
//                                     return;
//                                 } else if(usedLogin === 0){
//                                     $('#login').removeClass('invalid');
//                                     $('#login').parent().parent().find('.form-warning').remove();
//                                 }
//                             });
//
//                         }
//                     });
//                 }
//
//             }
//             $('.shake').effect('shake', 'fast', '200');
//             $('.shake').removeClass('shake');
//
//         });
//
//         setTimeout(function (){  if(errors === 0){
//             var user = {};
//             user.name = $('#name').val();
//             user.login = $('#login').val();
//             user.email = $('#email').val();
//             user.password = $('#password').val();
//             user.id = 100;
//             $.ajax({
//                 url:'http://localhost:3000/users',
//                 type: 'POST',
//                 data: user,
//                 success: function () {
//                     $('.register-input').each(function (id, element) {
//                         element.value = '';
//                     });
//                 }
//             });

//         }}, 100);
//
//
//     })
// })(jQuery);

var validator = {
    initValidaion() {
        jQuery('#register').on('click', function (event) {
            event.preventDefault();
            validator.validate();
        })
    },
    validate() {
        if(this.isFieldsEmpty()){
            return false;
        }
        this.putUserIfCorrectLogin()
    },

    putUserIfCorrectLogin() {
        var usedLogin = 0;
        jQuery.ajax({
            url: 'http://localhost:3000/users',
            type: 'GET',
            success:function (users) {
                users.forEach(function (user) {
                    if(user.login === jQuery('#login').val()){
                        usedLogin++;
                        if(!jQuery('#login').parent().parent().find('.form-warning').length){
                            jQuery('#login').parent().parent()
                                .append(jQuery('<p class="form-warning">This login already used</p>'));}
                        jQuery('#login').addClass('invalid');
                    } else if(usedLogin === 0){
                        jQuery('#login').removeClass('invalid');
                        jQuery('#login').parent().parent().find('.form-warning').remove();
                    }

                });
                if(usedLogin === 0){
                    var user = {};
                    user.name = jQuery('#name').val();
                    user.login = jQuery('#login').val();
                    user.email = jQuery('#email').val();
                    user.password = jQuery('#password').val();
                    user.id = 100;
                    $.ajax({
                        url:'http://localhost:3000/users',
                        type: 'POST',
                        data: user,
                        success: function () {
                            $('.register-input').each(function (id, element) {
                                element.value = '';
                            });
                        }
                    });
                }
            }
        });

        return usedLogin;
    },

    isFieldsEmpty() {
        var emptyFieldsCount = 0;
        jQuery('.register-input').each(function (id, input) {
                if ($(this).val().length === 0) {
                    $(this).addClass('shake').addClass('invalid');
                    emptyFieldsCount++;
                } else{
                 $(this).removeClass('invalid');}
            jQuery('.shake').effect('shake', 'fast', '200');
            jQuery('.shake').removeClass('shake');
        });
        return emptyFieldsCount;
    },
    getInputContent() {
        const inputContent = [];
        jQuery('.register-input').each(function (id, input){
            inputContent.push(input.value);
        });
        return inputContent;
        }
};

validator.initValidaion();

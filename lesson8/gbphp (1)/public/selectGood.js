"use strict";
$(document).ready(function () {
    // $('#submitGoodSearch').on('click', function (event) {
    //     event.preventDefault();
    //     var data = `id=${$('#goodId').val()}`;
    //     $.ajax({
    //         url:'?page=goodsAdministration&func=getGood',
    //         type: 'POST',
    //         data: data,
    //         success: function (data) {
    //             $('#piecemaker').html(data);
    //         }
    //     })
    // });

    if($('#pageCheck').data('page') === 'goodInfo') {

        $(document).on('change keyup',':input', function (){
            $('#submitChanges').prop("disabled", false).on('click', function (event) {
                event.preventDefault();
                var data = `id=${$('#goodId').html()}` +
                            `&name=${$('#goodName').val()}` +
                            `&info=${$('#goodInfo').val()}` +
                            `&price=${$('#goodPrice').val()}`;
                $.ajax({
                    url: '?page=goodsAdministration&func=editGood',
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        $('#submitChanges').prop("disabled", true);
                        if(!$('p').is('#saved')){
                        $('#actions').append(`<p id="saved">${data}</p>`);}
                        console.log(data);
                    }
                })
            });
        });
    }
});
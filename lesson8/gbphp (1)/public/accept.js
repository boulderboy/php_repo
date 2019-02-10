$(document).ready(function () {
    function refresh () {
        $.ajax({
            url: '?page=orders&func=ajaxRefresh',
            type: 'POST',
            success: function (data) {
                $('#piecemaker').html(data);
            }
        })
    }

    if($('#pageCheck').data('page') === 'orders'){
        setInterval(refresh, 5000);
    }



});

function accept(id) {
    var data = `id=${id}`;
    $.ajax({
        url: '?page=orders&func=acceptOrder',
        type: 'POST',
        data: data,
        success: function (data) {
            $('#acception').html(data).attr('onclick', '');
            $('#decline').html('Отклонить').attr('onclick', `decline(${id})`);

        }
    })
}

function decline(id) {
    var data = `id=${id}`;
    $.ajax({
        url: '?page=orders&func=declineOrder',
        type: 'POST',
        data: data,
        success: function (data) {
            $('#decline').html(data).attr('onclick', '');
            $('#acception').html('Одобрить').attr('onclick', `accept(${id})`);
        }
    })
}
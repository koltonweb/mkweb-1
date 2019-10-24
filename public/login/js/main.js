$(function () {
    "use strict";


    $('#new-mess').css('cursor', 'pointer');
    $('#new-mess').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "/mklogadmin/private/",
            data: {
                application: 'view'
            },
            dataType: "html",
            success: function (response) {
                $('.message').html(response);
            }
        });
    });


    $('.message').on('click', '.del-mess', function (e) {
        e.preventDefault();
        let messId = $(this).next().val();
        $.ajax({
            type: "GET",
            url: "/mklogadmin/private/",
            data: {
                application: 'del',
                id: messId
            },
            dataType: "html",
            success: function (response) {
                $('.message').html(response);
            }
        });
    });

    setInterval(() => {
        $.ajax({
            type: "GET",
            url: "/mklogadmin/private/",
            data: {
                application: 'view'
            },
            dataType: "html",
            success: function (response) {
                $('.message').html(response);
            }
        }); 
    }, (1000 * 60 * 10) );

});
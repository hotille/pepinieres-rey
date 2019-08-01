$(".btn-success").click(function () {
    $('.media-body').css({ opacity: 0 });
    $(this).parent().find('.media-body').css({ opacity: 0.7 });
});


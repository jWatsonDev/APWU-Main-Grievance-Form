$("#change-email, .create-account").click(function() {
    $(".overlay").fadeIn();
    $(".registration-form").fadeIn("slow");
    $('html, body').css({
        overflow: 'hidden',
        height: '100%'
    });
});

$("#change-email, .create-account").click(function() {
    $(".overlay").fadeIn();
    $(".update-email-form").fadeIn("slow");
    $('html, body').css({
        overflow: 'hidden',
        height: '100%'
    });
});

$("#add-comment").click(function() {
    $(".overlay").fadeIn();
    $(".comment-form").fadeIn("slow");
    $('html, body').css({
        overflow: 'hidden',
        height: '100%'
    });
});


$('.overlay').on('click', function(event) {
    $(".overlay, .registration-form, .update-email-form, .comment-form").fadeOut("slow");
    $('html, body').css({
        overflow: 'auto',
        height: 'auto'
    });
});

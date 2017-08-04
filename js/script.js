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


function viewComments() {
    $(".overlay").fadeIn();
    $(".view-related-comments").fadeIn("slow");
    $('html, body').css({
        overflow: 'hidden',
        height: '100%'
    });
}

function createComment() {
    $(".overlay").fadeIn();
    $(".comment-form").fadeIn("slow");
    $('html, body').css({
        overflow: 'hidden',
        height: '100%'
    });
}


$('.overlay').on('click', function(event) {
    $(".overlay, .registration-form, .update-email-form, .comment-form, .view-related-comments").fadeOut("slow");
    $('html, body').css({
        overflow: 'auto',
        height: 'auto'
    });
});

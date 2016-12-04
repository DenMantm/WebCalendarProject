$("#featThree").click(function() {
    $('html,body').animate({
        scrollTop: $("#scrollToMe").offset().top},
        'slow');
});

$("#videoDiv").click(function() {
    $('html,body').animate({
        scrollTop: $("#nasaVid").offset().top},
        'slow');
});
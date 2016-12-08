// scroll to each section by targeting id's

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

$("#m-miniNav").click(function() {
    $('html,body').animate({
        scrollTop: $("#feature-three").offset().top},
        'slow');
});




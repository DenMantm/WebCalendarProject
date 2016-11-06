/*global $*/
/*global ko*/

$(function() {
    var myVieModel = {
    firstName: ko.observable("John")
    };

ko.applyBindings(myVieModel);
});

var setElementHeight = function () {
    var height = $(window).height();
    $('.dragscroll').css('min-height', (height-100));
};

$(window).resize(function () {
    setElementHeight();
});

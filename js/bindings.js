/*global $*/
/*global ko*/

$(function() {
    var myVieModel = {
    firstName: ko.observable("John")
    };

ko.applyBindings(myVieModel);
});

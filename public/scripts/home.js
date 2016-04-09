$(function () {

    $(".subscribe-form > input").focus(function () {

        $(".input-underscore").css("width", 354);

    }).focusout(function () {
        $(".input-underscore").css("width", 0);
    })

})
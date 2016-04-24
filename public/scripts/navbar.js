$(function () {
    
    var uo = window.underscore_offset;

    var underscore = $(".navbar-underscore"),
        elem = window.underscore_element;

    underscore.css("margin-left", uo[elem]);
    underscore.css("width", uo[elem + 1] - uo[elem]);
    
    $(".navbar-button").hover(function () {
        
        underscore.addClass("navbar-underscore-slide");
        var id = $(this).attr("id");
        underscore.css("margin-left", uo[id]);
        underscore.css("width", $(this)[0].getBoundingClientRect().width);

    }, function () {
        
        underscore.css("margin-left", uo[elem]);
        underscore.css("width", uo[elem + 1] - uo[elem]);
        
    });
    

});
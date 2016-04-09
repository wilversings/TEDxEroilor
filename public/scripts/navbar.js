$(function () {
    
    var underscore_offset = {
        0: 0,
        1: 0,
        2: 0,
        3: 0,
        4: 0,
        5: 0
    };

    for (var i = 1; i <= 5; ++i) {
        underscore_offset[i] = underscore_offset[i - 1] + $("#" + (i - 1)).outerWidth() + 6;
    }

    $(".navbar-button").hover(function () {
        
        var underscore = $(".navbar-underscore");
        var id = $(this).attr("id");
        underscore.css("margin-left", underscore_offset[id]);
        underscore.css("width", $(this).outerWidth());

    })

})
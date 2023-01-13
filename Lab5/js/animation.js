$(document).ready(function(){
    $("img.photos").on({
    "mouseover": function() {
        $(this).animate({
            width: "250px",
            height: "250px"
        }, 600);
    },
    "mouseout": function(){
        $(this).animate({
            width: "180px",
            height: "180px"
        }, 600);
    }
});
});

$(document).ready(function(){
    $("img.posters").on({
    "mouseover": function() {
        $(this).animate({
            width: "300px",
            height: "500px"
        }, 600);
    },
    "mouseout": function(){
        $(this).animate({
            width: "200px",
            height: "300px"
        }, 600);
    }
});
});


// games-tab
$(".games-tab").on("mouseover",function(){
    // $("#games").addClass("z-9999");
    // $("#games").css("height","249px");
    $(".games-tab").css("background-color", "red");
    // $("#games").css("opacity","1");
    // $("#games").css("pointer-event","auto");
});

$(".games-tab").on("mouseout",function(){
    // $("#games").removeClass("z-9999");
    // $("#games").css("height","0px");
    $(".games-tab").css("background-color", "#2C2F33");
    // $("#games").css("opacity","0");
    // $("#games").css("pointer-event","none");
});

// $("#games").on("mouseover",function(){
//     $("#games").addClass("z-9999");
//     $("#games").css("height","249px");
//     $(".games-tab").css("background-color", "red");
//     $("#games").css("opacity","1");
//     $("#games").css("pointer-event","auto");
// });

// $("#games").on("mouseout",function(){
//     $("#games").removeClass("z-9999");
//     $("#games").css("height","0px");
//     $(".games-tab").css("background-color", "#2C2F33");
//     $("#games").css("opacity","0");
//     $("#games").css("pointer-event","none");
// });

// products-tab
// $(".products-tab").on("mouseover",function(){
//     $("#products").addClass("z-9999");
//     $("#products").css("height","249px");
//     $(".products-tab").css("background-color", "#0377F2");
//     $("#products").css("opacity","1");
//     $("#products").css("pointer-event","auto");
// });

// $(".products-tab").on("mouseout",function(){
//     $("#products").removeClass("z-9999");
//     $("#products").css("height","0px");
//     $(".products-tab").css("background-color", "#2C2F33");
//     $("#products").css("opacity","0");
//     $("#products").css("pointer-event","none");
// });

// $("#products").on("mouseover",function(){
//     $("#products").addClass("z-9999");
//     $("#products").css("height","249px");
//     $(".products-tab").css("background-color", "#0377F2");
//     $("#products").css("opacity","1");
//     $("#products").css("pointer-event","auto");
// });

// $("#products").on("mouseout",function(){
//     $("#products").removeClass("z-9999");
//     $("#products").css("height","0px");
//     $(".products-tab").css("background-color", "#2C2F33");
//     $("#products").css("opacity","0");
//     $("#products").css("pointer-event","none");
// });

// nav-side-button

$("#nav-side-open").click(function(){
    $(".nav-side-bar").css("width","150px")
    $("#nav-side-open").css("display","none")
    $("#nav-side-close").css("display","block")
    $("main").css("opacity",".5")
})

$("#nav-side-close").click(function(){
    $(".nav-side-bar").css("width","50px")
    $("#nav-side-close").css("display","none")
    $("#nav-side-open").css("display","block")
    $("main").css("opacity","1")
})

// live-search
$("#search").focus(function(){
    $("#search-box").css("background-color","white")
    $("#search-box").css("display","block")
})

// $('.search-item').on("mouseover",function(){
//     $("#search-box").css("display","block")
// })



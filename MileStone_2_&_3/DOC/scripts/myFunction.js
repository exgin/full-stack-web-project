/* Customers first and last name
Current Date
My Function List */
function tyAlert()  {
    alert("Thank you for your interest in our services.  We will contact you soon.");
}


// Savant demo video open in new browser window
function demo() {
    window.open("/media/Savant-Large-Black.mp4", "_blank", "width=610, height=360");
}

$(function () {
    "use strict";
    
    $(".popup img").click(function () {
        var $src = $(this).attr("src");
        $(".show").fadeIn();
        $(".img-show img").attr("src", $src);
    });
    
    $("span, .overlay").click(function () {
        $(".show").fadeOut();
    });
    
});


  

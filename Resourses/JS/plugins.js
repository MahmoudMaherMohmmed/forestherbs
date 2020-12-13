// Loading Screen
$(window).load(function () {
    $(".loading-overlay .loader, .loading-overlay img").fadeOut(2000, function () {
        $(this).parent().fadeOut(2000)
    });
    $("body").css("overflow", "auto");
    $(this).remove();
});
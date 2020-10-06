$(".inner-switch").on("click", function() {


    if ($("body").hasClass("dark")) {
        $("body").removeClass("dark");
        $(".inner-switch").text("OFF");
        $(".desligado").val("");

    } else {
        $("body").addClass("dark");
        $(".inner-switch").text("ON");
        $(".desligado").val("dark");


    }
});
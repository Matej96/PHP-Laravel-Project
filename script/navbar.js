/* Navbar Script */

$(document).ready(function () {
    $(".woman-section").hover(() => {
        $("#womanSection").addClass("active");
    });

    $(".woman-section").mouseleave(() => {
        $("#womanSection").removeClass("active");
    });

    $(".man-section").hover(() => {
        $("#manSection").addClass("active");
    });

    $(".man-section").mouseleave(() => {
        $("#manSection").removeClass("active");
    });

    $(".kids-section").hover(() => {
        $("#kidsSection").addClass("active");
    });

    $(".kids-section").mouseleave(() => {
        $("#kidsSection").removeClass("active");
    });

});

/* Navbar Script End */

/* Login/Registration PopUp Script */


$('.signup').hide();
$('#signin, #signup').on(
    'click',
    function () {
        $('.signin, .signup').toggle()
    }
)


/* Login/Registration PopUp Script End*/
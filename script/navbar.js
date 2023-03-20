/* Navbar Script */

$(document).ready(function () {
    $(".woman-section").click(() => {
        if($("#manSection").hasClass("active")){
            $("#manSection").removeClass("active");
        }else if ($("#kidsSection").hasClass("active")){
            $("#kidsSection").removeClass("active");
        }
        
        if($("#womanSection").hasClass("active")){
            $("#womanSection").removeClass("active");
        }else{
            $("#womanSection").addClass("active");
        }
    });

    $(".man-section").click(() => {
        if($("#womanSection").hasClass("active")){
            $("#womanSection").removeClass("active");
        }else if ($("#kidsSection").hasClass("active")){
            $("#kidsSection").removeClass("active");
        }

        if($("#manSection").hasClass("active")){
            $("#manSection").removeClass("active");
        }else{
            $("#manSection").addClass("active");
        }
    });

    $(".kids-section").click(() => {
        if($("#womanSection").hasClass("active")){
            $("#womanSection").removeClass("active");
        }else if ($("#manSection").hasClass("active")){
            $("#manSection").removeClass("active");
        }
        
        if($("#kidsSection").hasClass("active")){
            $("#kidsSection").removeClass("active");
        }else{
            $("#kidsSection").addClass("active");
        }
    });

    document.querySelector(".navbar-toggler").addEventListener("click", () => {
        if($("#kidsSection").hasClass("active")){
            $("#kidsSection").removeClass("active");
        }else if ($("#manSection").hasClass("active")){
            $("#manSection").removeClass("active");
        } else if($("#womanSection").hasClass("active")){
            $("#womanSection").removeClass("active");
        }
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
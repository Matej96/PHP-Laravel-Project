/* Navbar Script */
$(document).ready(function () {
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

function clickWoman(){
    if(window.innerWidth <= 576){
        if($("#manSection").hasClass("active")){
            $("#manSection").removeClass("active");
        }else if ($("#kidsSection").hasClass("active")){
            $("#kidsSection").removeClass("active");
        }
        
        if($("#womanSection").hasClass("active")){
            console.log('active');
            $("#womanSection").removeClass("active");
        }else{
            console.log('not active');
            $("#womanSection").addClass("active");
        }
    }
}

function clickMan(){
    if(window.innerWidth <= 576){
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
    }
}

function clickKids(){
    if(window.innerWidth <= 576){
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
    }
}


function hoverWoman(){
    if(window.innerWidth > 576){
        $("#womanSection").addClass("active");
    }
}

function hoverMan(){
    if(window.innerWidth > 576){
        $("#manSection").addClass("active");   
    } 
}

function hoverKids(){
    if(window.innerWidth > 576){
        $("#kidsSection").addClass("active");
    }
}

function mouseleaveWoman(){
    if(window.innerWidth > 576){
        $("#womanSection").removeClass("active");
    }
}

function mouseleaveMan(){
    if(window.innerWidth > 576){
        $("#manSection").removeClass("active");
    }
}

function mouseleaveKids(){
    if(window.innerWidth > 576){
        $("#kidsSection").removeClass("active");
    }
}
$(".woman-section").click(clickWoman);
$(".man-section").click(clickMan);
$(".kids-section").click(clickKids);
$(".woman-section").hover(hoverWoman);
$(".man-section").hover(hoverMan);
$(".kids-section").hover(hoverKids);
$(".woman-section").mouseleave(mouseleaveWoman);
$(".man-section").mouseleave(mouseleaveMan);
$(".kids-section").mouseleave(mouseleaveKids);


/* Navbar Script End */

/* Login/Registration PopUp Script */


$('.signup').hide();
$('#signin, #signup').on(
    'click',
    function () {
        $('.signin, .signup').toggle();
    }
)
function showPopup() {
    document.getElementById("login").style.display = "block";
}
/* Login/Registration PopUp Script End*/
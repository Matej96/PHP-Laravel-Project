$(document).ready(function() {
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

var swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });
  
$(document).ready(function(){
    $('.count').prop('disabled', true);
       $(document).on('click','.plus',function(){
        $('.count').val(parseInt($('.count').val()) + 1 );
    });
    $(document).on('click','.minus',function(){
        $('.count').val(parseInt($('.count').val()) - 1 );
            if ($('.count').val() == 0) {
                $('.count').val(1);
            }
        });
 });
    
    
    
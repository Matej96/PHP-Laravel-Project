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

$('.slick_slide').slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
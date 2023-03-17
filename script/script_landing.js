/* Carousel - Jednotlivé Produktu (Populárne, Akcie, Novinky) Script */

var swiper = new Swiper(".card_slider", {
    spaceBetween: 30,
    Infinity: true,
    speed: 1000,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        992: {
            slidesPerView: 3,
        },
    },

});

/* Carousel - End Script */
/* Carousel - Fotky produktu */

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

/* Carousel End */

/* Counter - Počet produktov */

document.addEventListener('DOMContentLoaded', function() {
    const minusButton = document.querySelector('.minus');
    const plusButton = document.querySelector('.plus');
    const qtyInput = document.getElementById('quantity');

    minusButton.addEventListener('click', function() {
        let newVal = parseInt(qtyInput.value) - 1;
        if (newVal < 1) {
            newVal = 1;
        }
        qtyInput.value = newVal;
    });

    plusButton.addEventListener('click', function() {
        let newVal = parseInt(qtyInput.value) + 1;
        qtyInput.value = newVal;
    });
});

/* Counter End */

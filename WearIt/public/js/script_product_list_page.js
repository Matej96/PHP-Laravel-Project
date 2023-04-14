/* JavaScript pre Product_List_Page */

/* Swiper slúži ako pagination pre všetký produkty */
var swiper = new Swiper(".mySwiper", {

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
    },
});
/* Konice Swiper */

/* Táto časť slúži na rozrolovanie/zatvorenie bocného sidebaru */
const unrollHeaders = document.querySelectorAll('.unroll-header');
let activeUnrollContainer = null;

for (let i = 0; i < unrollHeaders.length; i++) {
    unrollHeaders[i].addEventListener('click', function () {
        const unrollContainer = this.parentNode;
        const unrollContent = this.nextElementSibling;
        const isActive = unrollContainer.classList.contains('show');

        // Opätovné kliknutie na aktivný kontainer ho zavrie
        if (isActive && activeUnrollContainer) {
            activeUnrollContainer.classList.remove('show');
            activeUnrollContainer.querySelector('.unroll-content').classList.remove('show');
            activeUnrollContainer = null;
        } else {
            // Zatvor aktivný container a otvor novo otvorený
            if (activeUnrollContainer) {
                activeUnrollContainer.classList.remove('show');
                activeUnrollContainer.querySelector('.unroll-content').classList.remove('show');
            }
            unrollContainer.classList.add('show');
            unrollContent.classList.add('show');
            activeUnrollContainer = unrollContainer;
        }
    });
}
/* Koniec Scriptu pre sidebar */

/* Script pre dropdown - Cena */
var dropdown = document.querySelector('.dropdown');
var dropdownMenu = document.querySelector('.dropdown-menu');
dropdown.addEventListener('click', function (event) {
    event.stopPropagation();
    dropdown.classList.toggle('show');
    dropdownMenu.classList.toggle('show');
});

// Prevencia predtým aby sa nezavrel dropdown keď sa klikne na inputs
var inputs = document.querySelectorAll('.form-control');
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('click', function (event) {
        event.stopPropagation();
    });
}

// Schovanie dropdownu ak sa klikne mimo
document.addEventListener('click', function (event) {
    if (!dropdown.contains(event.target)) {
        dropdown.classList.remove('show');
        dropdownMenu.classList.remove('show');
    }
});
/* KOniec Scriptu pre dropdown */

/* Koniec Javascriptu Product_List_Page */
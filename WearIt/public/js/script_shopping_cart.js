/* Javascipt pre Shopping_Card - Javascript slúži na zmenu hodnoty v counter */

$(document).ready(function () {
    $(document).on('click', '.plus', function () {
        // Nájdite najbližší input s triedou .count
        var countInput = $(this).closest('.counter_div').find('.count');
        countInput.val(parseInt(countInput.val()) + 1);
    });
    $(document).on('click', '.minus', function () {
        // Nájdite najbližší input s triedou .count
        var countInput = $(this).closest('.counter_div').find('.count');
        countInput.val(parseInt(countInput.val()) - 1);
        if (countInput.val() == 0) {
            countInput.val(1);
        }
    });
});

/*Koniec Scriptu*/

/* Javascipt pre Shopping_Card - Javascript slúži na vymazanie a posunutie produktov v obsah_container */

// Slúži na nájdenie všetkých buttonov remove_button
// const deleteButtons = document.querySelectorAll('.remove_button');
//
// // Prejde všetkými buttonmi remove_button a pridá click event handler
// deleteButtons.forEach(button => {
//     button.addEventListener('click', (event) => {
//
//         // Oznam či naozaj chce vymazať daný produkt
//         const confirmDelete = confirm('Naozaj chcete vymazať tento produkt?');
//
//         // Ak chce vymazať
//         if (confirmDelete) {
//
//             // Pomocná premená na uchovanie parent elementu buttona
//             const card = event.target.closest('.card_container');
//
//             // Pomocná premená na uchovanie parent elementu card
//             const cardContainer = card.parentNode;
//
//             // Vymazanie produktu (card)
//             card.remove();
//
//             // Tento cyklus slúži na posunutie ostatných produktov (card).
//             const remainingCards = cardContainer.querySelectorAll('.card_container');
//             remainingCards.forEach((card, index) => {
//                 card.style.order = index;
//             });
//         }
//     });
// });

/* Koniec scriptu */

/* Javascipt pre Admin_main_Page - Javascript slúži na vymazanie a posunutie produktov v admin_section */

// Slúži na najdenie všetkých button remove_button
const deleteButtons = document.querySelectorAll('.remove_button');

// Prejde všetkými buttonami remove_button a pridá click event handler
deleteButtons.forEach(button => {
    button.addEventListener('click', (event) => {

        // Oznam či naozaj chce vymazať daný produkt
        const confirmDelete = confirm('Naozaj chcete vymazať tento produkt?');

        // Ak chce vymazať
        if (confirmDelete) {

            // Pomocná premená na uchovanie parent elementu buttona remove_button (čo je card element)
            const card = event.target.closest('.card');

            // Pomocná premená na uchovanie parent elementu card (čo je element row card_row)
            const cardRow = card.parentNode;

            // Vymazanie produktu (card)
            card.remove();

            // Tento cyklús slúži na posunutie ostatných produktov (card).
            const remainingCards = cardRow.querySelectorAll('.card');
            remainingCards.forEach((card, index) => {
                card.style.order = index;
            });
        }
    });
});

/* Koniec scriptu */
/* Script slúži na zakrytie/zobrazenie sekcie "Dodacie údaje" */

var checkBox = document.getElementById("fakturacne_check");
var text = document.getElementById("dodacie");

checkBox.addEventListener('change', function () {
    if (checkBox.checked == true) {
        text.style.display = "none";
    } else {
        text.style.display = "flex";
    }
})

/* Koniec Scriptu */
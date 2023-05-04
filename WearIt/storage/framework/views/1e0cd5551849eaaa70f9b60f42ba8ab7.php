<script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    // Skontrolujte, či sú zobrazené chybové hlášky
    document.addEventListener("DOMContentLoaded", function() {
        <?php if($errors->any()): ?>
            document.getElementById("login").style.opacity = "1";
            document.getElementById("login").style.visibility = "visible";
            document.querySelectorAll('.close').forEach(item => {

                item.addEventListener('click', event => {
                    document.getElementById("login").style.opacity = "0";
                    document.getElementById("login").style.visibility = "hidden";
                })

            })
        <?php endif; ?>
    });

    var open_element = document.getElementsByClassName("login_a");

    // Pridajte onClick metódu pre každý element
    for (var i = 0; i < open_element.length; i++) {

        open_element[i].addEventListener("click", function() {
            document.getElementById("login").style.opacity = "1";
            document.getElementById("login").style.visibility = "visible";
        });
    }

    var close_element = document.getElementsByClassName("close");

    for (var i = 0; i < close_element.length; i++) {
        close_element[i].addEventListener("click", function() {
            document.getElementById("login").style.opacity = "0";
            document.getElementById("login").style.visibility = "hidden";
        });
    }
</script>

<?php /**PATH C:\Users\matej\OneDrive\Počítač\Škola\6. semester\WTECH\WTECH\WearIt\resources\views/layout/partials/scripts.blade.php ENDPATH**/ ?>
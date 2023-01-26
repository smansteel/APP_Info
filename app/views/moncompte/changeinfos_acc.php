<?php
$css = "/css/";
?>

<link rel="stylesheet" href="<?= $css ?>moncompte.css">
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<div class="flex">

    <div class="center">
        <form action="/moncompte/doeditacc" method="post" class="form">
            <div>
                <div class="form-edit">
                    <input type="text" name="name" id="name" class="form_field" placeholder="Nom" required>
                </div>
                <div class="form-edit">
                    <input type="text" name="prenom" id="prenom" class="form_field" placeholder="Prénom" required>
                </div>
                <div class="form-edit">
                    <input type="email" name="email" id="email" class="form_field" placeholder="email" required>
                </div>
                <input type="submit" name="submit" value="Changer vos informations" class="submit_button">
            </div>
        </form>
    </div>
</div>
<script>
    window.onload = function() {
        window.addEventListener('scroll', function(e) {
            if (window.pageYOffset > 100) {
                document.querySelector("header").classList.add('is-scrolling');
            } else {
                document.querySelector("header").classList.remove('is-scrolling');
            }
        });

        const menu_btn = document.querySelector('.toggle');
        const mobile_menu = document.querySelector('.mobile-nav');

        menu_btn.addEventListener('click', function() {
            menu_btn.classList.toggle('is-active');
            mobile_menu.classList.toggle('is-active');
        });
    }
</script>
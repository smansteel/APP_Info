<?php
$root = "";
?>
<?php $image_folder = $root . "/images" ?>
<?php $css = $root . "/css/" ?>
<?php $js = $root . "/js/";
$error = $data["error"]; ?>

<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="with=device-wdith, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $css ?>login.css">
    <link rel="stylesheet" href="<?= $js ?>app_v2.js">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

</head>

<body>

    <div class="box" style="background-image: url(<?= $image_folder ?>/blurry_lr.jpg);    background-size: cover; background-position: center;">
        <div class="flex-content" id="content">
            <div class="bg-image">
                <img src="<?= $image_folder ?>/captair.png" class="logo">
                <div class="text">
                    Le lien de vérification a expiré<br> Nous vous invitons à réessayer la procédure ou à nous contacter a l'adresse mail : <a href="mailto:contact@captair.paris">contact@captair.paris</a>
                </div>
                <br>
                <a class="newacc" href="<?= $root ?>/login/" class="newacc">Se Connecter</a><br>
            </div>

        </div>

    </div>


</body>
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
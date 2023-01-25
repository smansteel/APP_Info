<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$public_root = "/";
$image_folder = $public_root . "images/" ?>
<?php $css = $public_root . "css/" ?>
<?php $js = $public_root . "js/";
$root = "";
?>



<link rel="stylesheet" href="<?= $css ?>header2.css">
<!-- Font Awesome logos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?= $js ?>app_v2.js">



<div class="header">
    <nav>
        <a href="/">
            <img class="logo-header" src="<?= $image_folder ?>air_Q_full_turquoise_v3.svg" />
        </a>

        <ul class="menu">
            <li><a href="<?= $root ?>/">A Propos</a></li>
            <li><a href="<?= $root ?>/donnees/">Données</a></li>
            <li><a href="<?= $root ?>/faq/">FAQ</a></li>


            <?php

            if (isset($_SESSION["id"])) {
            ?> <li>
                    <button class="btn">
                        <a href="<?= $root ?>/moncompte/">Mon Compte</a>
                    </button>
                </li>
                <li>
                    <button class="btn">
                        <a href="<?= $root ?>/auth/logout">Se déconnecter</a>
                    </button>
                </li>
            <?php
            } else {
            ?> <li>
                    <button class="btn">
                        <a href="<?= $root ?>/login/">Connexion</a>
                    </button>
                </li>
                <li>

                    <button class="btn">
                        <a href="<?= $root ?>/login/inscription/">S'inscrire</a>
                    </button>
                </li>
            <?php
            }

            ?>

            </li>
        </ul>
        <button class="toggle ">
            <div class="bar"></div>
</div>

</nav>
<nav class="mobile-nav">
    <li><a href="<?= $root ?>/">A Propos</a></li>
    <li><a href="<?= $root ?>/donnees/">Données</a></li>
    <li><a href="<?= $root ?>/faq/">FAQ</a></li>
    <li><a href="<?= $root ?>/login">Connexion</a></li>
    <li><a href="<?= $root ?>/login/inscription">S'inscrire</a></li>
</nav>
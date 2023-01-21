<?php
$root = "";
?>
<?php $image_folder = $root . "/images" ?>
<?php $css = $root . "/css/" ?>
<?php $js = $root . "/js/"; ?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<link rel="stylesheet" href="<?= $css ?>login.css">

<body>
    <div class="box" style="background-image: url(<?= $image_folder ?>/blurry_lr.jpg);">
        <div class="bg-image">
            <img src="<?= $image_folder ?>/captair.png" class="logo">
            <div class="text">
                Votre adresse mail est vérifiée, nous vous invitons a vous connecter.<br> Bienvenue chez nous !
            </div>
            <br>
            <a class="newacc" href="<?= $root ?>/login/" class="newacc">Retour à la page de connexion</a><br>
        </div>


    </div>




</body>

</html>
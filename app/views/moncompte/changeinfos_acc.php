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
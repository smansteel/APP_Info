<?php
$css = "/css/";
?>

<link rel="stylesheet" href="<?= $css ?>moncompte.css">
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<div class="flex">

    <div class="center">
        <form action="/moncompte/doaddcapteur" method="post" class="form">
            <div>
                <div class="form-edit">
                    <input type="text" name="name" id="name" class="form_field" placeholder="Nom du capteur (optionnel)">
                </div>
                <div class="form-edit">
                    <input type="text" name="id" id="id" class="form_field" placeholder="Numéro de série du capteur" required>
                </div>
                <input type="submit" name="submit" value="Ajouter ce capteur à mon compte" class="submit_button">
            </div>
        </form>
    </div>
</div>
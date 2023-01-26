<?php
$css = "/css/";
?>

<link rel="stylesheet" href="<?= $css ?>moncompte.css">
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<div class="flex">

    <div class="center">
        <form action="/moncompte/doeditcapteur" method="post" class="form">
            <div>
                <div class="form-edit">
                    <input type="text" name="name" id="name" class="form_field" placeholder="Nom du capteur" required>
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $data["id"] ?>" />
                <input type="submit" name="submit" value="Changer le nom du capteur" class="submit_button">
            </div>
        </form>
    </div>
</div>
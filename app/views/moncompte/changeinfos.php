<div class="flex-edit">
    <form action="changeinfos.php" method="post" class="form">
        <div class="form-edit">
            <input type="email" name="email" id="email" class="form_field" placeholder="Adresse email" required>
        </div>
        <div class="form-edit">
            <input type="text" name="nom" id="nom" class="form_field" placeholder="Nom" required>
        </div>
        <div class="form-edit">
            <input type="text" name="prenom" id="prenom" class="form_field" placeholder="Prénom" required>
        </div>

        <div class="form-example">
            <input type="submit" value="Enregistrer" class="submit_button">
        </div>
    </form>
    <form action="/login/forgor" method="post" class="form">
        <div>
            <input type="hidden" name="email" id="email" value="<?php echo $data["id"] ?>" />
            <input type="submit" value="Changer de mot de passe" class="submit_button">
        </div>
    </form>
</div>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$root = "";
?>
<?php $image_folder = $root . "/images" ?>
<?php $css = $root . "/css/" ?>
<?php $js = $root . "/js/"; ?>

<link rel="stylesheet" href="<?= $css ?>login.css">
<?php
if (isset($_SESSION["prenom"])) {
    echo "<script type = 'text/javascript'>";
    echo "alert('Vous êtes connecté a un compte, vous ne pouvez par réinitialiser votre mot de passe, vous allez être redirigé sur votre page mon compte');  ";
    echo "window.location = '/moncompte.php';";
    echo "</script>  ";
    //header("Location: /moncompte.php");
}
?>

<body>
    <div class="box" style="background-image: url(<?= $image_folder ?>/blurry_lr.jpg);">


        <div class="bg-image">

            <img src="<?= $image_folder ?>/captair.png" class="logo">

            <div class="error">

                <?php
                if (isset($data["confirmation"])) {
                    if ($data["confirmation"] == "email") {
                        echo 'Email de vérification envoyé, <br> pensez à verifier vos spams :)';
                    }
                }
                if (isset($_SESSION["id"])) {
                    header("Location: /moncompte.php");
                } ?>

            </div>


            <form action="<?= $root ?>/auth/forgor/" method="post" class="form">

                <div class="form-connect">
                    <input type="email" name="email" id="email" class="form_field" placeholder="Adresse email" required>
                </div>

                <div class="form-example">
                    <input type="submit" name="submit" value="Vérifier mon email" class="submit_button">
                </div>
            </form>
            <br>
            <a class="newacc" href="/login.php" class="newacc">Retour</a><br>



        </div>
    </div>

</body>
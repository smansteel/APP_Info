<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$root = "";
?>
<?php $image_folder = $root . "/images" ?>
<?php $css = $root . "/css/" ?>
<?php $js = $root . "/js/"; ?>

<link rel="stylesheet" href="<?= $css ?>login.css">
<?php
if (isset($_SESSION["id"])) {
    echo "<script type = 'text/javascript'>";
    echo "alert('Vous êtes connecté a un compte, vous ne pouvez par réinitialiser votre mot de passe, vous allez être redirigé sur votre page mon compte');  ";
    echo "window.location = '/moncompte/';";
    echo "</script>  ";
    header("Location: /moncompte.php");
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
                    header("Location: /moncompte/");
                    exit();
                } ?>

            </div>


            <form action="<?= $root ?>/auth/forgor/" method="post" class="form">

                <div class="form-connect">
                    <input type="email" name="email" id="email" class="form_field" placeholder="Adresse email" required>
                </div>

                <div class="form-example">
                    <input type="submit" name="submit" value="Envoyer un lien de réinitialisation" class="submit_button">
                </div>
            </form>
            <br>
            <a class="newacc" href="/login/" class="newacc">Retour</a><br>



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
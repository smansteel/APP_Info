<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
// add method to collect passwd and confirmation and send the form (POST) to changepasswd.php




?>
<link rel="stylesheet" href="login.css">
<?php
include("header.php");
if (isset($_SESSION["prenom"])) {
    echo "<script type = 'text/javascript'>";
    echo "alert('Vous êtes connecté a un compte, vous ne pouvez par réinitialiser votre mot de passe, vous allez être redirigé sur votre page mon compte');  ";
    echo "window.location = '/moncompte.php';";
    echo "</script>  ";
    //header("Location: /moncompte.php");
}
?>

<body>
    <div class="box">


        <div class="bg-image">

            <img src="sources/captair.png" class="logo">

            <div class="error">

                <?php
                if (isset($_GET["confirmation"])) {
                    if ($_GET["confirmation"] == "email") {
                        echo 'Email de vérification envoyé, <br> pensez à verifier vos spams :)';
                    }
                }
                if (isset($_SESSION["id"])) {
                    header("Location: /moncompte.php");
                } ?>

            </div>


            <form action="changepasswd.php" method="post" class="form">

                <div class="form-connect">
                    <input type="email" name="email" id="email" class="form_field" placeholder="Adresse email" required>
                </div>

                <div class="form-example">
                    <input type="submit" value="Vérifier mon email" class="submit_button">
                </div>
            </form>
            <br>
            <a class="newacc" href="/login.php" class="newacc">Retour</a><br>



        </div>
    </div>
    <div class="flex-content" id="footer">
        <?php include("footer.php"); ?>
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
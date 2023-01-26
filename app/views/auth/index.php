<head>
    <?php
    $root = "";
    ?>
    <?php $image_folder = $root . "/images/" ?>
    <?php $css = $root . "/css/" ?>
    <?php $js = $root . "/js/";
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="with=device-wdith, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= $css ?>login.css">
    <link rel="stylesheet" href="<?= $js ?>app_v2.js">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <title>Accueil - AirQ</title>
</head>


<body>
    <div class="box" style="background-image: url(<?= $image_folder ?>blurry_lr.jpg);">
        <div class="container">
            <div class="flex-content" id="content">
                <div class="bg-image">

                    <img src="<?= $image_folder ?>captair.png" class="logo">

                    <div class="error">
                        <?php
                        if (isset($data["error"])) {
                            if ($data["error"] == "noacc") {
                                echo 'Non existing account, please create one <a href="/login/inscription/">here</a>';
                            }
                            if ($data["error"] == "badcred") {
                                echo 'Bad credentials reset you password <a href="/login/forgor/">here</a>';
                            }
                            if ($data["error"] == "acc_exists") {
                                echo 'Un compte avec cet email là existe déja, <br>sinon réinitialiser le mot de passe <a href="/login/forgor/">ici</a>';
                            }
                            if ($data["error"] == "verif") {
                                echo 'Veuillez vérifier votre email pour pouvoir vous connecter';
                            }
                        }
                        ?>

                    </div>
                    <div class="confirmation">
                        <?php
                        if (isset($data["confirmation"])) {
                            if ($data["confirmation"] == "passwd") {
                                echo "Votre mot de passe vient d'être changé, <br>nous vous invitons à vous connecter pour s'assurer que tout marche ! ";
                            }
                        }
                        ?>

                    </div>

                    <form action="<?= $root ?>/auth/login/" method="post" class="form">
                        <div class="form-connect">
                            <input type="email" name="email" id="email" class="form_field" placeholder="Adresse email" required>
                        </div>
                        <div class="form-example">
                            <input type="password" name="password" id="password" class="form_field" placeholder="Mot de passe" required>
                        </div>
                        <div class="form-example">
                            <input type="submit" value="Connexion" class="submit_button">
                        </div>
                    </form>
                    <a class="newacc" href="<?= $root ?>/login/inscription" class="newacc">Créer mon compte</a>
                    <a href="<?= $root ?>/login/forgor" class="fgtpsswd">Mot de passe oublié</a>



                </div>
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
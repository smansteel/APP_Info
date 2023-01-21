<?php
$root = "";
?>
<?php $image_folder = $root . "/images" ?>
<?php $css = $root . "/css/" ?>
<?php $js = $root . "/js/";
$error = $data["error"]; ?>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= $css ?>newacc.css">
<script src="https://code.jquery.com/jquery-2.0.3.min.js"></script>

<body>
    <div class="box" style="background-image: url(<?= $image_folder ?>/blurry_lr.jpg);    background-size: cover; background-position: center;">

        <div class=" flex-content" id="content">

            <div class="bg-image">

                <img src="<?= $image_folder ?>/captair.png" class="logo">

                <div class="error">
                    <?php
                    if (isset($error)) {
                        if ($error == "passwd_nomatch") {
                            echo 'Les 2 mots de passe ne correspondent pas <br>';
                        } else if ($error == "passwd_str") {
                            echo "Le mot de passe est trop faible, veillez à ce qu'il ai au moins 6 caractères <br>";
                        }
                    }

                    ?>
                </div>



                <form action="<?= $root ?>/auth/inscription/" method="post" class="form">
                    <div class="form-connect">
                        <input type="nom" name="nom" id="nom" class="form_field" placeholder="Nom" required>
                    </div>
                    <div class="form-connect">
                        <input type="prenom" name="prenom" id="prenom" class="form_field" placeholder="Prénom" required>
                    </div>

                    <div class="form-connect">
                        <input type="email" name="email" id="email" class="form_field" placeholder="Adresse email" required autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                    </div>
                    <div for="Entreemdp">
                        <input type="password" id="Entreemdp" class="form_field" name="Entreemdp" placeholder="Mot de passe:" required>
                    </div>

                    <div for="confirmEntreemdp">
                        <input type="password" id="confirmEntreemdp" class="form_field" name="confirmEntreemdp" placeholder="Confirmer le mot de passe:" required>
                    </div>
                    <div style="margin:auto">
                        <div class="alertbox">
                            <p id="PasswordInputStrength">
                            </p>
                            <p id="PasswordInputStrengthText">
                            </p>
                        </div>
                    </div>

                    <div class="enregistrement">
                        <input type="submit" value="S'enregistrer" name="submit" class="submit_button">
                    </div>

                </form>
                <a class="newacc" href="<?= $root ?>/login/" class="newacc">Retour</a><br>


                </menu>
            </div>


            <script>
                $(document).ready(function() {

                    $('#Entreemdp, #confirmEntreemdp').on('keyup', function(e) {

                        if ($('#Entreemdp').val() != '' && $('#confirmEntreemdp').val() != '' && $('#Entreemdp').val() != $('#confirmEntreemdp').val()) {
                            $('#PasswordInputStrengthText').removeClass().addClass('alert').html('Les mots de passe ne correspondent pas');
                            $('#PasswordInputStrength').removeClass().addClass('alert').html('');

                            return false;
                        }


                        // Doit avoir des lettres majuscules, des chiffres et des lettres minuscules.
                        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");

                        // Doit comporter soit des lettres majuscules et minuscules, soit des minuscules et des chiffres.
                        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");

                        // Doit comporter au moins 6 caractères
                        var okRegex = new RegExp("(?=.{6,}).*", "g");

                        if (okRegex.test($(this).val()) === false) {
                            // Si ok regex ne correspond pas au PasswordInput
                            $('#PasswordInputStrengthText').removeClass().addClass('alert').html('Le mot de passe doit comporter au moins 6 caractères.');
                            $('#PasswordInputStrength').removeClass().addClass('alert').html('<div class="barre"> <div class="couleur1"></div> </div>');
                        } else if (strongRegex.test($(this).val())) {
                            // Si reg ex correspond à PasswordInput fort
                            $('#PasswordInputStrength').removeClass().addClass('alert').html('<div class="barre"> <div class="couleur4"></div> </div>');
                            $('#PasswordInputStrengthText').removeClass().addClass('alert').html('');

                        } else if (mediumRegex.test($(this).val())) {
                            // Si medium PasswordInput correspond au reg ex
                            $('#PasswordInputStrength').removeClass().addClass('alert').html('<div class="barre"> <div class="couleur3"></div> </div>');
                            $('#PasswordInputStrengthText').removeClass().addClass('alert').html('');

                        } else {
                            // Si le mot depasse est ok

                            $('#PasswordInputStrengthText').removeClass().addClass('alert').html('Rendez votre mot de passe plus fort en ajoutant des majuscules, des chiffres et des caractères spéciaux !');
                            $('#PasswordInputStrength').removeClass().addClass('alert').html('<div class="barre"> <div class="couleur2"></div> </div>');
                        }

                        return true;
                    });

                });
            </script>


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
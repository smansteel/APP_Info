<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="login.css">
<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

<body>

  <div class="background"></div>

  <div class="bg-image">

    <img src="sources/captair.png" class="logo">
    <div class="error">
    <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "email") {
        echo 'Un compte avec cet email existe déjà,<br> <a href="/resetpassword.php">changez le ici</a>';
      }
    }

    ?>
    </div>


    <form action="confirmation.php" method="post" class="form">
      <div class="form-connect">
        <input type="nom" name="nom" id="nom" class="form_field" placeholder="Nom" required>
      </div>
      <div class="form-connect">
        <input type="prenom" name="prenom" id="prenom" class="form_field" placeholder="Prénom" required>
      </div>

      <div class="form-connect">
        <input type="email" name="email" id="email" class="form_field" placeholder="Adresse email" required autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
      </div>
      <div class="form-example">
        <input type="password" name="password" id="password" class="form_field" placeholder="Mot de passe" required autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
      </div>
      <div class="form-example">
        <input type="password" name="password-confirm" id="password-confirm" class="form_field" placeholder="Confirmez le mot de passe" required autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
        <div class="barre" id="PasswordInputStrength"></div>
      </div>
      
      <div class="form-example">
      
      <br><br>
      </div>
      <script>

        $(document).ready(function () {

            $('#password, #password-confirm').on('keyup', function (e) {

              var passwordval = $("#password").val();
              var passwordconfirm = $("#password-confirm").val();

                if (passwordval != '' && passwordconfirm != '' && passwordval != passwordconfirm) {
                    $('#PasswordInputStrength').removeClass().html('Les mots de passe ne correspondent pas');

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
                    $('#PasswordInputStrength').removeClass().html('<div class="inline-container"><div class="barre"> <p class="couleur1"></p> </div><div class="password-comments">   <br> Le mot de passe doit comporter au moins 6 caractères. </div> </div>  ');
                }

                else if (strongRegex.test($(this).val())) {
                    // Si reg ex correspond à PasswordInput fort
                    $('#PasswordInputStrength').removeClass().html('<div class="barre"> <div class="couleur4"></div> </div> <button1> <img src="valide.png"></button1>');
                }

                else if (mediumRegex.test($(this).val())) {
                    // Si medium PasswordInput correspond au reg ex
                    $('#PasswordInputStrength').removeClass().html('<div class="barre"> <div class="couleur3"></div> </div> <img src="valide.png">');
                }

                else {
                    // Si le mot depasse est ok
                    $('#PasswordInputStrength').removeClass().html('<div class="barre"> <div class="couleur2"></div> <p class="password-comments">Rendez votre mot de passe plus fort en ajoutant des majuscules, des chiffres et des caractères spéciaux !</p> </div> ');
                }

                return true;
            });

        });

    </script>
      <div class="form-example">
        <input type="submit" value="S'enregistrer" class="submit_button">
      </div>
      <br>
    </form>
    <a class="newacc" href="/login.php" class="newacc">Retour</a><br>


  </div>
  </div>

</body>
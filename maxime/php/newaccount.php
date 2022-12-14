<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="newacc.css">
<script src="https://code.jquery.com/jquery-2.0.3.min.js"></script>

<body>
  <div class="box">
    <div class="flex-content">
      <?php include("header.php"); ?>
    </div>
    <div class="flex-content" id="content">
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


          <input type="submit" value="S'enregistrer" class="submit_button">

          <br>
        </form>
        <a class="newacc" href="/login.php" class="newacc">Retour</a><br>


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
    <div class="flex-content" id="footer">
      <?php include("footer.php"); ?>
    </div>
  </div>
</body>
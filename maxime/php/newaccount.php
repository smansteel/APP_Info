<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  menu {
    font-family: 'Nunito Sans', sans-serif;
    margin-left: 25%;
    margin-right: 25%;
    margin-top: 10%;
    font-size: 1.2rem;
    background-color: white;
    background-size: 1.5em;
    position: relative;
    color: grey;
    border-radius: 20px;
    padding-top: 20px;
    padding-bottom: 10px;
  }


  input {
    font-size: 1.2rem;
    border-radius: 7px;
    margin-left: 30%;
    background-color: var(--grey2);
  }

  .barre {
    margin-left: 30%;
    width: 200px;
    border: 0.2px solid rgb(197, 197, 197);
    border-radius: 20px;
  }

  .couleur1 {
    width: 25%;
    height: 8px;
    background: red;
    border-radius: 20px;
  }

  .couleur2 {
    width: 50%;
    height: 8px;
    background: rgb(255, 128, 2);
    border-radius: 20px;
  }

  .couleur3 {
    width: 75%;
    height: 8px;
    background: rgb(106, 248, 67);
    border-radius: 20px;
  }

  .couleur4 {
    width: 100%;
    height: 8px;
    background: rgb(7, 159, 7);
    border-radius: 20px;
  }

  .box {
    display: flex;
    flex-direction: column;
    height: 100%;
  }


  #content {
    height: 100%;
  }

  .form_field {
    font-family: "Noto Sans", sans-serif;
    border: none;
    color: #77797c;
    padding: 10px;
    border-radius: 10px;
    padding-left: 20px;
    border-color: white;
    background-color: #edf2f7;
    margin-bottom: 10px;
    height: 40px;
    width: 320px;
  }

  .bg-image {
    font-weight: bold;
    border: 3px solid #f1f1f1;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    width: 50%;
    padding: 20px;
    text-align: center;
    width: fit-content;
    border-radius: 10px;
    border: none;
    background-color: #ffffff;
  }

  .logo {
    width: 80%;
  }

  @media (max-width:480px) {
    #content {
      font-size: 180px;
    }
  }

  body {
    font-family: "Noto Sans", sans-serif;
    background-color: rgb(255, 255, 255);
    /* Fallback color */
    background-image: url("sources/blurry_bg.png");
  }

  .form {
    width: 20%;
  }

  .submit_button {
    padding: 10px;
    width: 350px;
    font-family: "Noto Sans", sans-serif;
    font-weight: bold;
    border: none;
    color: white;
    background-color: #00c4b3;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 30px;
    padding-right: 30px;
    border-radius: 10px;
    transition: background-color 250ms ease-in-out;
    transition: color 250ms ease-in-out;
  }

  .submit_button:hover {
    background-color: #03ad9f;
    color: rgb(200, 200, 200);
    cursor: pointer;
  }
</style>
<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

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
          <div for="Entréemdp">
            <p></p> <input type="password" id="Entréemdp" class="form_field" name="Entréemdp" placeholder="Mot de passe:" required>
          </div>
          </p>
          <p>
          <div for="confirmEntréemdp">
            <p></p><input type="password" id="confirmEntréemdp" class="form_field" name="confirmEntréemdp" placeholder="Confirmer le mot de passe:" required>
          </div>
          </p>
          <p>
          <div class="" id="PasswordInputStrength">
          </div>
          <div class="form-example">


            <div class="" id="PasswordInputStrength">
            </div>

          </div>
          <div class="form-example">
            <input type="submit" value="S'enregistrer" class="submit_button">
          </div>
          <br>
        </form>
        <a class="newacc" href="/login.php" class="newacc">Retour</a><br>


        </menu>
      </div>


      <script>
        $(document).ready(function() {

          $('#Entréemdp, #confirmEntréemdp').on('keyup', function(e) {

            if ($('#Entréemdp').val() != '' && $('#confirmEntréemdp').val() != '' && $('#Entréemdp').val() != $('#confirmEntréemdp').val()) {
              $('#PasswordInputStrength').removeClass().addClass('alert alert-error').html('Les mots de passe ne correspondent pas');

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
              $('#PasswordInputStrength').removeClass().addClass('alert alert-error').html('<div class="barre"> <div class="couleur1"></div> </div>' + 'Le mot de passe doit comporter au moins 6 caractères.');
            } else if (strongRegex.test($(this).val())) {
              // Si reg ex correspond à PasswordInput fort
              $('#PasswordInputStrength').removeClass().addClass('alert alert-success').html('<div class="barre"> <div class="couleur4"></div> </div>');
            } else if (mediumRegex.test($(this).val())) {
              // Si medium PasswordInput correspond au reg ex
              $('#PasswordInputStrength').removeClass().addClass('alert alert-info').html('<div class="barre"> <div class="couleur3"></div> </div>');
            } else {
              // Si le mot depasse est ok
              $('#PasswordInputStrength').removeClass().addClass('alert alert-error').html('<div class="barre"> <div class="couleur2"></div> </div>' + 'Rendez votre mot de passe plus fort en ajoutant des majuscules, des chiffres et des caractères spéciaux !');
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
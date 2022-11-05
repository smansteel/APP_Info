<body>

  <link rel="stylesheet" href="login.css">

  <div class="background"></div>
  <div class="bg-image">

    <img src="sources/captair.png" class="logo">

    <div class="error">

      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "noacc") {
          echo 'Non existing account, please create one <a href="/createaccount.php">here</a>';
        }
        if ($_GET["error"] == "badcred") {
          echo 'Bad credentials reset you password <a href="/resetpassword.php">here</a>';
        }
      }
      session_start();
      if (isset($_SESSION["id"])) {
        header("Location: /moncompte.php");
      } ?>

    </div>


    <form action="userlogin.php" method="post" class="form">

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
    <br>
    <a class="newacc" href="/newaccount.php" class="newacc">Créer mon compte</a><br>
    <br>
    <a href="/resetpassword.php" class="fgtpsswd">Mot de passe oublié</a>


  </div>
  </div>

</body>
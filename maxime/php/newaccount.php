<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="login.css">

<body>

  <div class="background"></div>

  <div class="bg-image">

    <img src="sources/captair.png" class="logo">

    <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "noacc") {
        echo 'Non existing account, please create one <a href="/createaccount.php">here</a>';
      }
    }

    ?>


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
        <input type="submit" value="S'enregistrer" class="submit_button">
      </div>
    </form>
    <a class="newacc" href="/login.php" class="newacc">Retour</a><br>


  </div>
  </div>

</body>
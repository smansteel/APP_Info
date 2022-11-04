<link rel="stylesheet" href="login.css">

<body>
<div class="background"></div>
<div class="bg-image">

<img src="sources/captair.png" class="logo">
<form action="userlogin.php" method="post" class="form">

  <div class="form-connect">
    <input type="email" name="email" id="email" class="form_field" placeholder="Adresse email"required>
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


</div></div>

</body>
<body><?php
if (isset($_GET["error"])){
  if($_GET["error"] == "noacc"){
    echo 'Non existing account, please create one <a href="/createaccount.php">here</a>';
  }
  if($_GET["error"] == "badcred"){
    echo 'Bad credentials reset you password <a href="/resetpassword.php">here</a>';
  }
  // add session material
}
?>

<form action="userlogin.php" method="post" class="form-example">
  <div class="form-connect">
    <label for="email">Entrez votre adresse mail: </label>
    <input type="email" name="email" id="email" required>
  </div>
  <div class="form-example">
    <label for="password">Entrez votre mot de passe </label>
    <input type="password" name="password" id="password" required>
  </div>
  <div class="form-example">
    <input type="submit" value="Se connecter">
  </div>
</form>
<body>
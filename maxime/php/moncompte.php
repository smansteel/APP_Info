<link rel="stylesheet" href="login.css">
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
session_start();
if (!isset($_SESSION["prenom"])) {
   header("Location: /login.php");
}
?>

<body>Bienvenue <?php
                  echo $_SESSION["prenom"] ?>, dans cette rubrique vous pouvez, modifier les paramètres de votre comptes et gérer votre capteur.
   <div class="changeinfos">
      <div class="flex-name">
         <div>Adresse mail : <?php echo $_SESSION["email"]; ?></div>
         <div>Nom : <?php echo $_SESSION["nom"]; ?></div>
         <div>Prénom : <?php echo $_SESSION["prenom"]; ?></div>
      </div>

      <div class="flex-edit">
         <form action="changeinfos.php" method="post" class="form">
            <div class="form-edit">
               <input type="email" name="email" id="email" class="form_field" placeholder="Adresse email" required>
            </div>
            <div class="form-edit">
               <input type="text" name="Nom" id="nom" class="form_field" placeholder="Nom" required>
            </div>
            <div class="form-edit">
               <input type="text" name="Prénom" id="Prenom" class="form_field" placeholder="Prénom" required>
            </div>
            <div class="form-example">
               <input type="submit" value="Changer de mot de passe" class="submit_button">
            </div>
            <p></p>
            <div class="form-example">
               <input type="submit" value="Enregistrer" class="submit_button">
            </div>
         </form>
      </div>
   </div>
   <a href=/logout.php>Logout ?<a>
</body>

</html>
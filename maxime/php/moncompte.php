<link rel="stylesheet" href="login.css">
<html>
   
   <body>Bienvenue <?php  session_start(); echo $_SESSION["prenom"] ?>, dans cette rubrique vous pouvez, modifier les paramètres de votre comptes et gérer votre capteur. 
   <div class="changeinfos" >
      <div class="flex-name">
         <div>Adresse mail : <?php echo $_SESSION["email"];?></div>
         <div>Nom : <?php echo $_SESSION["nom"];?></div>
         <div>Prénom : <?php echo $_SESSION["prenom"];?></div>
      </div>

      <div class="flex-edit">
         <form action="changeinfos.php" method="post" class="form">
            <div class="form-edit">
               <input type="email" name="email" id="email" class="form_field" placeholder="Adresse email"required>
            </div>
            <div class="form-edit">
              <input type="text" name="Nom" id="nom" class="form_field" placeholder="Nom" required>
            </div>
            <div class="form-edit">
               <input type="text" name="Prénom" id="Prenom" class="form_field" placeholder="Prénom" required>
            </div>
            <div class="form-example">
                <input type="submit" value="Enregistrer" class="submit_button">
            </div>
         </form>
      </div>
   </div>
   <a href=/logout.php>Logout ?<a>
</body> 

</html>
<link rel="stylesheet" href="../css/moncompte.css">
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<body>







   <div style="margin: 35px;  margin-left:80px;">
      <p>Mon capteur :</p>
   </div>
   <div style="margin: 15px; margin-left:140px;">
      <p>Derni&egravere synchronisation du capetur depuis l&rsquo;appli mobile : &nbsp&nbsp&nbsp&nbsp&nbsp Hier <?php ?></p>
      <p>D&eacutesactiver les capteurs &agrave la prochaine connexion :</p>
   </div>
   <div>
      <button class="button button2">activer</button>
   </div>

   <div style="margin: 30px;  margin-left:80px;">
      <p>Contacter l&rsquo;&eacutequipe Captair :</p>
   </div>
   <div style="margin: 15px; margin-left:140px;">
      <p>Pour toute requ&ecirc;te concernant l&rsquo;application web ou le capteur nous vous invitons &agrave nous contacter par mail &agrave l&rsquo;adresse suivante : support@captair.paris</p>
   </div>


   Bienvenue <?php
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
               <input type="text" name="nom" id="nom" class="form_field" placeholder="Nom" required>
            </div>
            <div class="form-edit">
               <input type="text" name="prenom" id="prenom" class="form_field" placeholder="Prénom" required>
            </div>

            <div class="form-example">
               <input type="submit" value="Enregistrer" class="submit_button">
            </div>
         </form>
         <form action="/login/forgor" method="post" class="form">
            <div>
               <input type="hidden" name="email" id="email" value="<?php echo $_SESSION["email"] ?>" />
               <input type="submit" value="Changer de mot de passe" class="submit_button">
            </div>
         </form>
      </div>

   </div>
   <a href=/logout />Logout ?<a>
</body>


</html>
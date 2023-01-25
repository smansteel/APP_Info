<?php
$css = "/css/";
?>

<link rel="stylesheet" href="<?= $css ?>moncompte.css">
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<body>
   <div class="flex">
      <?php

      $name = $data["user"]["nom"];
      $email = $data["user"]["email"];
      $prenom = $data["user"]["prenom"];
      $creation = $data["user"]["creation"];
      $verified = $data["user"]["verified"];
      $admin = $data["user"]["admin"];








      foreach ($data["capteurs"] as $capteur) {

      ?>
         <div style="margin: 35px;  margin-left:80px;">
            <p>Capteur : <?php
                           if (!isset($capteur["name"]) || $capteur["name"] == "") {
                              echo $capteur["id"];
                           } else {
                              echo $capteur["name"];
                           } ?></p>
         </div>
         <div style="margin: 15px; margin-left:140px;">
            <p>Derni&egravere synchronisation du capteur : &nbsp&nbsp&nbsp&nbsp&nbsp Hier <?php ?></p>
            <p>D&eacutesactiver les capteurs &agrave la prochaine connexion :</p>
         </div>
         <div>
            <button class="button button2">Activer</button>
         </div>
         <div style="margin: 15px; margin-left:140px;">
            <p>Changer les informations de ce capteur:</p>
         </div>
         <div>
            <button class="button button2">Changer</button>
         </div>
         <div style="margin: 15px; margin-left:140px;">
            <p>Supprimer ce capteur et toutes les informations associées:</p>
         </div>
         <div>
            <button class="button button2">Supprimer</button>
         </div>


      <?php



      }
      ?>








      <div style="margin: 30px;  margin-left:80px;">
         <p>Contacter l&rsquo;&eacutequipe Captair :</p>
      </div>
      <div style="margin: 15px; margin-left:140px;">
         <p>Pour toute requ&ecirc;te concernant l&rsquo;application web ou le capteur nous vous invitons &agrave nous contacter par mail &agrave l&rsquo;adresse suivante : support@captair.paris</p>



         <?php echo $prenom ?>, dans cette rubrique vous pouvez, modifier les paramètres de votre comptes et gérer votre capteur.
      </div>
      <div class="changeinfos">
         <div class="flex-name">
            <div>Adresse mail : <?php echo $email; ?></div>

            <div>Nom : <?php echo $name; ?></div>
            <div>Prénom : <?php echo $prenom; ?></div>
         </div>

      </div>
   </div>
</body>


</html>
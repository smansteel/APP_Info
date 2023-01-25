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





      ?>

      <div class="big-fb">
         <div class="Titre">Mes Capteurs</div>



         <?php
         foreach ($data["capteurs"] as  $capteur) {

         ?><div class="mid-mid-fb">
               <div class="diagram">
                  <div class="ajout_text">
                     Recap des données du capteur sur les dernières 24h
                  </div>
                  <div class="results">

                     <?php
                     if (!empty(end($data["airq"][$capteur["id_sql"]]))) {
                        foreach (end($data["airq"][$capteur["id_sql"]]) as $key => $donnee) {
                           $score = (int) $donnee; ?>
                           <div class='nano-fb'>
                              <?php
                              if ($score >= 0) {
                                 echo "<score class='red result_text'>$score</score>";
                              } else if ($score >= 50) {
                                 echo "<score class='yellow result_text'> $score</score>";
                              } else if ($score >= 75) {
                                 echo "<score class='green result_text'> $score</score>";
                              }
                              if ($key == "air") {
                                 echo "<div> Indice de qualité de l'air</div>";
                              } else if ($key == "db") {
                                 echo "<div> Indice de qualité sonore</div>";
                              } else if ($key == "cardiac") {
                                 echo "<div> Indice de qualité votre rythme cardiaque</div>";
                              } else
                              ?>
                           </div>
                     <?php
                     }
                  } else {
                     echo "<score class=' result_text_empty'>Pas d'infos récentes à afficher, n'oubliez pas de porter votre bracelet ;)</score>";
                  } ?>
                  </div>

               </div>

               <div class="mid-fb">
                  <div class="mini-fb">
                     Capteur :
                     <?php if (!isset($capteur["name"]) || $capteur["name"] == "") {
                        echo $capteur["id"];
                     } else {
                        echo $capteur["name"];
                     } ?>
                  </div>
                  <div class="mini-fb">
                     Dernière synchronisation du capteur&nbsp: Hier
                  </div>
                  <div class="mini-fb">
                     Désactiver les capteurs à la prochaine connexion&nbsp:
                  </div>
                  <div class="mini-fb">
                     <form action="/moncompte/togglecapteur" method="POST">
                        <input type="hidden" name="id" value="<?= $capteur["id_sql"] ?>">
                        <button type="submit" class="button">Activer</button>
                     </form>
                  </div>
                  <div class="mini-fb">
                     Changer les informations de ce capteur&nbsp:
                  </div>
                  <div class="mini-fb">
                     <form action="/moncompte/editcapteur" method="POST">
                        <input type="hidden" name="id" value="<?= $capteur["id_sql"] ?>">
                        <button type="submit" class="button">Changer</button>
                     </form>
                  </div>
                  <div class="mini-fb">
                     Supprimer ce capteur et toutes les informations associées&nbsp:
                  </div>
                  <div class="mini-fb">
                     <form action="/moncompte/editcapteur" method="POST">
                        <input type="hidden" name="id" value="<?= $capteur["id_sql"] ?>">
                        <button type="submit" class="button">Supprimer</button>
                     </form>
                  </div>

               </div>
            </div>

         <?php } ?>
         <div class="mid-mid-fb">
            <div class="mid_2-fb">
               <div class="mini-fb">
                  Ajouter un nouveau capteur&nbsp:
               </div>
               <div class="mini-fb">
                  <form action="/moncompte/addcapteur" method="POST">
                     <button type="submit" class="button">Ajouter</button>
                  </form>
               </div>
            </div>

         </div>





         <div class="Titre">Mon Compte</div>
         <div class="mid-mid-fb">
            <div class="mid_2-fb">
               <div class="mini-fb">
                  Modifier mes informations personnelles&nbsp:
               </div>
               <div class="mini-fb">
                  <form action="/moncompte/edit" method="POST">
                     <button type="submit" class="button">Modifier</button>
                  </form>
               </div>
            </div>

         </div>
         <div class="mid-mid-fb">
            <div class="mid_2-fb">
               <div class="mini-fb">
                  Supprimer mon compte (cette action est irréversible)&nbsp:
               </div>
               <div class="mini-fb">
                  <form action="/moncompte/delete" method="POST">
                     <button type="submit" class="button">Supprimer</button>
                  </form>
               </div>
            </div>

         </div>

      </div>
</body>


</html>
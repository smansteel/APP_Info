<?php
$css = "/css/";
?>

<link rel="stylesheet" href="<?= $css ?>moncompte.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>




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
         <?php
         if (isset($data["param"]) && $data["param"] == "email_duplicate") {
            echo "<p class='red'>La modification de l'email n'a pas pu etre effectuée, un compte avec cet email existe deja.</p>";
         }
         if ($admin >= 1) {
         ?>
            <div class="Titre">Interface Administrateur</div>
            <div class="mid-mid-fb">
               <div class="mid_2-fb">
                  <div class="mini-fb result_text">
                     Gérer le site&nbsp:
                  </div>
                  <div class="mini-fb">
                     <form action="/admin/">
                        <button type="submit" name="submit" class="button">Accéder</button>
                     </form>
                  </div>

               </div>
            </div>
         <?php
         }
         ?>

         <div class="fb-dir Titre"><div class="fb">Mes Capteurs</div><div class="fb"><button href="#" class="button" onclick="refreshPage()">Rafraichir</button></div></div>



         <script>
         function refreshPage() {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "/moncompte/updateDB", true);
            xhr.onload = (e) => {
               if (xhr.readyState === 4) {
               if (xhr.status === 200) {
                  console.log(xhr.responseText);
                  location.reload(); // Reload the page
               } else {
                  console.error(xhr.statusText);
               }
               }
            };
            xhr.onerror = (e) => {
               console.error(xhr.statusText);
            };
            xhr.send(null);
         }
         </script>



         <?php
         //var_dump($data["capteurs"]);
         foreach ($data["capteurs"] as  $capteur) {
         ?><div class="mid-mid-fb">
               <div class="diagram">
                  <div class="ajout_text">
                     Recap des données du capteur sur les dernières 24h
                  </div>
                  <div class="results">
                     <?php if (isset($capteur["data"])): ?>
                           <table>
                              <tr>
                                 <th>Nom</th>
                                 <th>Moyenne</th>
                              </tr>
                              <?php foreach ($capteur["data"] as $category => $average): ?>
                                 <tr>
                                    <td><?php if($category == "tmp"){
                                       echo "Temperature";
                                    } else if($category == "ISO"){
                                       echo "Isobutylène";
                                    } else if ($category == "hum"){
                                       echo "Humidité";
                                    } else if ($category == "mic"){
                                       echo "Microphone";
                                    } else if ($category == "hrt"){
                                       echo "Rythme cardiaque (bpm)";
                                    }else{
                                    echo $category;}
                                     ?></td>
                                    <td>
                                 <?php if($category == "tmp" || $category == "hum" ){
                                       echo "Défaut capteur";
                                    } else if ($category == "ISO" || $category == "mic"){
                                       echo $average/100;
                                    } else if ($category == "CO2"){
                                       echo $average/10;
                                    } else if ($category == "hrt"){
                                       echo $average/100;
                                    }else{
                                    echo $category;}?></td>
                                 </tr>
                              <?php endforeach; ?>
                              </table>
                              <?php else: ?>
                                 <score class=' result_text_empty'>Pas d'infos récentes à afficher, n'oubliez pas de porter votre bracelet ;)</score>
                              <?php endif; ?>
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
                     <?php if (isset($capteur["status"]) && $capteur["status"] == 1) {
                        echo "Désactiver le capteur à la prochaine connexion&nbsp:";
                     } else {
                        echo "Activer le capteur à la prochaine connexion&nbsp:";
                     } ?>

                  </div>
                  <div class="mini-fb">
                     <form action="/moncompte/togglecapteur" method="POST">
                        <input type="hidden" name="id" value="<?= $capteur["id_sql"] ?>">
                        <input type="hidden" name="status" value="<?= $capteur["status"] ?>">
                        <button type="submit" name="submit" class="button">
                           <?php if (isset($capteur["status"]) && $capteur["status"] == 1) {
                           ?><input type="hidden" name="status" value="<?= $capteur["status"] ?> ">
                           <?php
                              echo "Désactiver";
                           } else {
                              echo "Activer";
                           } ?></button>
                     </form>
                  </div>
                  <div class="mini-fb">
                     Changer les informations de ce capteur&nbsp:
                  </div>
                  <div class="mini-fb">
                     <form action="/moncompte/editcapteur" method="POST">
                        <input type="hidden" name="id" value="<?= $capteur["id_sql"] ?>">
                        <button type="submit" name="submit" class="button">Changer</button>
                     </form>
                  </div>
                  <div class="mini-fb">
                     Supprimer ce capteur et toutes les informations associées&nbsp:
                  </div>
                  <div class="mini-fb">
                     <form action="/moncompte/delcapteur" method="POST">
                        <input type="hidden" name="id" value="<?= $capteur["id_sql"] ?>">
                        <button type="submit" name="submit" class="button">Supprimer</button>
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
                     <button type="submit" name="submit" class="button">Ajouter</button>
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
                     <button type="submit" name="submit" class="button">Modifier</button>
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
                     <button type="submit" name="submit" class="button">Supprimer</button>
                  </form>
               </div>
            </div>

         </div>

      </div>
</body>


</html>
<script>
   window.onload = function() {
      window.addEventListener('scroll', function(e) {
         if (window.pageYOffset > 100) {
            document.querySelector("header").classList.add('is-scrolling');
         } else {
            document.querySelector("header").classList.remove('is-scrolling');
         }
      });

      const menu_btn = document.querySelector('.toggle');
      const mobile_menu = document.querySelector('.mobile-nav');

      menu_btn.addEventListener('click', function() {
         menu_btn.classList.toggle('is-active');
         mobile_menu.classList.toggle('is-active');
      });
   }
</script>
<head>
  <?php
  $root = "";
  ?>
  <?php $image_folder = $root . "/images/" ?>
  <?php $css = $root . "/css/" ?>
  <?php $js = $root . "/js/";
  ?>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="with=device-wdith, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= $css ?>donnees.css">
  <link rel="stylesheet" href="<?= $js ?>app_v2.js">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <title>Données - AirQ</title>
</head>

<body>



  <?php
  $megarray = $data['megarray'];

  function make_svg_V2($colors)
  {
    static $line_ran = 1;
    $line_ran++;
    $rect_id = "rect" . $line_ran;

    $id_grad = "grad" . $line_ran;
    $stopname = $line_ran * 1000;

    $station_size = 250 * (sizeof($colors) - 1); ?>
    <svg width="<?php echo $station_size + 150; ?>" height="30" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <linearGradient id="<?php echo $id_grad ?>" x1="0" x2="1" y1="0" y2="0">
          <?php
          $lencol = sizeof($colors) - 1;
          for ($x = 0; $x <= $lencol; $x++) {

            echo "<stop class=\"stop" . ($stopname + $x) . "\" offset=\"" . ((100 / ($lencol)) * $x) .  "%\" />";
          }
          ?>

        </linearGradient>
        <style>
          #<?php echo $rect_id ?> {
            fill: url(#<?php echo $id_grad ?>);
          }

          <?php
          $lencol = sizeof($colors) - 1;
          for ($x = 0; $x <= $lencol; $x++) {
            echo ".stop" . ($stopname + $x)  . " { stop-color: " . $colors[$x] . "; } \n";
          }
          ?>
        </style>
      </defs>

      <rect id="<?php echo $rect_id ?>" x="128" y="10" rx="4" ry="4" width="<?php echo $station_size; ?>" height="8" />

      <?php for ($i = 0; $i < sizeof($colors); $i++) {
        $color = $colors[$i];
      ?>
        <circle cx="<?php echo 125 + $i * 250; ?>" cy="13" r="8" stroke="black" stroke-width="5" fill="<?php echo $color; ?>" />
      <?php
      } ?>

    </svg>

  <?php
  }



  function make_svg_V2_vert($colors)
  {
    static $line_ran_vert = 1;
    $line_ran_vert++;
    $rect_id = "rect_vert" . $line_ran_vert;

    $id_grad = "grad_vert" . $line_ran_vert;
    $stopname = ($line_ran_vert * 1111);
    $station_space = 125;
    $station_size = $station_space * (sizeof($colors) - 1);
  ?><svg width="30" height="<?php echo $station_size + 70; ?>" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <linearGradient id="<?php echo $id_grad ?>" x1="0" x2="0" y1="0" y2="1">
          <?php
          $lencol = sizeof($colors) - 1;
          for ($x = 0; $x <= $lencol; $x++) {

            echo "<stop class=\"stop" . ($stopname + $x) . "\" offset=\"" . (100 / ($lencol)) * $x .  "%\" />";
          }
          ?>

        </linearGradient>
        <style>
          #<?php echo $rect_id ?> {
            fill: url(#<?php echo $id_grad ?>);
          }

          <?php
          $lencol = sizeof($colors) - 1;
          for ($x = 0; $x <= $lencol; $x++) {
            echo ".stop" . ($stopname + $x)  . " { stop-color: " . $colors[$x] . "; } \n";
          }
          ?>
        </style>
      </defs>

      <rect id="<?php echo $rect_id ?>" x="10" y="58" rx="4" ry="4" height="<?php echo $station_size; ?>" width="8" />

      <?php for ($i = 0; $i < sizeof($colors); $i++) {
        $color = $colors[$i];
      ?>
        <circle cy="<?php echo 50 + $i * $station_space; ?>" cx="13" r="8" stroke="black" stroke-width="5" fill="<?php echo $color; ?>" />
      <?php
      } ?>

    </svg>

  <?php
  }

  function display_line($lineinfo, $stations_name, $sta_airq)
  {

    $lighthex =  $lineinfo[2];
    $logo = $lineinfo[0];

  ?>

    <?php

    $ligne = $stations_name;
    $stations = $ligne;
    ?>
    <div class="ligne1" style="background-color: #<?php echo $lighthex ?>;">
      <div><img src="<?php echo $logo ?>" height="30"></div><br>

      <?php
      $sta_colors = $sta_airq;
      //var_dump($sta_airq);
      ?>


      <div class="hz_line">
        <?php make_svg_V2($sta_colors); ?>
      </div>
      <div class="vert_line_fb">
        <div class="vert_line">
          <?php make_svg_V2_vert($sta_colors); ?>
        </div>


        <div class="fb_stations">
          <?php
          foreach ($stations as $station) {
          ?>
            <div class="fb_station_ct">

              <?php echo mb_convert_case($station, MB_CASE_TITLE, "UTF-8") . " "; ?>

            </div>

          <?php
          }
          ?>
        </div><?php


              ?>
      </div>
    </div>
  <?php
  }
  ?>
  <div class="fb_fb ">
    <div class="legende">

      <div class="welcome rveal-1">Bienvenue sur notre page données</div>
      <div class="color-legend reveal-2 ">Notre page "Données" présente l'ensemble des lignes du métro parisien et associe une
        couleur à chaque station en fonction de sa situation. Plus la couleur tend vers le rouge, plus la ligne ou l'endroit
        ciblé est inconfortable, il peut s'agir d'une station à forte affluence, bruyante ou polluée. À l'inverse, plus la couleur
        tend vers le vert, plus la station sera considérée comme agréable et bénéfique à votre confort. Il est important de noter que ces
         informations sont fournies à partir des données de nos clients. En possédant un capteur, vous participez à l'amélioration
        de notre service mais vous pourrez également avoir accès à vos données personelles.

        <div class="color-bar reveal-3"></div>
        <div class="color-label">
          <span class="green">Bien</span>
          <span class="yellow">Moyen</span>
          <span class="red">Mauvais</span>
        </div>
      </div>
    </div>


    <div class="fb_lignes reveal-3">
      <?php

      foreach ($megarray as $ligne) {
        $stations = $ligne[0];
        $stations_name = $stations[0];
        $stations_id = $stations[1];
        $ligne_info = $ligne[1][0];
        $airq = $ligne[2];
        display_line($ligne_info, $stations_name, $airq);
      }

      ?>
    </div>
  </div>

  </div>
  <span id="insertHere"></span>

  </div>

</body>
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
  const ratio = .1
  const options = {
    root: null,
    rootMargin: '0px',
    threshold: ratio
  }
  const handleIntersect = function(entries, observer) {
    entries.forEach(function(entry) {
      if (entry.intersectionRatio > ratio) {
        entry.target.classList.add('reveal-visible')
        observer.unobserve(entry.target)
      }
    })
  }

  const observer = new IntersectionObserver(handleIntersect, options)
  document.querySelectorAll('[class*="reveal-"]').forEach(function(r) {
    observer.observe(r)
  })
</script>
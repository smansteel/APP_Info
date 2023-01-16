<?php $image_folder = "../../../public/images/" ?>
<?php $css = "../../../public/css/" ?>
<?php $js = "../../../public/js/" ?>

<link rel="stylesheet" href="<?= $css ?>donnees.css">


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
  <div class="fb_fb">
    <div class="fb_lignes">
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
<link rel="stylesheet" href="donnees.css">

<body>
  <?php
  require("db_connect.php");
  include("header.php");

  function get_station($ligne)
  {
    $conn = OpenCon();
    $rarray = [];
    $order_array = [];
    $hasy = false;
    $rarray_w_branch = [];
    $stmt4 = mysqli_prepare($conn, "SELECT nom, branche FROM stations WHERE ligne=? ORDER BY ordre");
    mysqli_stmt_bind_param($stmt4, "s", $ligne);
    mysqli_stmt_execute($stmt4);
    mysqli_stmt_bind_result($stmt4, $nom, $branch);
    while (mysqli_stmt_fetch($stmt4)) {
      array_push($rarray, $nom);
      array_push($rarray_w_branch, [$nom, $branch]);
      if ($branch != "") {
        $hasy = true;
      }
    }
    mysqli_stmt_close($stmt4);
    if ($hasy) {
      return [$rarray_w_branch, $hasy];
    } else {
      return [$rarray, $hasy];
    }
  }

    function get_station_id($ligne)
  {
    $conn = OpenCon();
    $rarray = [];
    $stmt5 = mysqli_prepare($conn, "SELECT id FROM stations WHERE ligne=? ");
    mysqli_stmt_bind_param($stmt5, "s", $ligne);
    mysqli_stmt_execute($stmt5);
    mysqli_stmt_bind_result($stmt5, $id);
    while (mysqli_stmt_fetch($stmt5)) {
      array_push($rarray, $id);  
    }
    mysqli_stmt_close($stmt5);
    return $rarray;
  }




  function get_airq_for_id($station_id)
  {
    $conn = OpenCon();
    $stmt6 = mysqli_prepare($conn, "SELECT airq FROM captair.air_quality WHERE station=? ORDER BY time ASC");
    mysqli_stmt_bind_param($stmt6, "s", $station_id);
    mysqli_stmt_execute($stmt6);
    mysqli_stmt_bind_result($stmt6, $airq);
    $rarray = $airq;
    mysqli_stmt_close($stmt6);
    return $rarray;

    
  }


  function get_line_logo($ligne){
    $conn = OpenCon();
    $stmt4 = mysqli_prepare($conn, "SELECT lien_logo, hex_color, light_hex FROM metro_line WHERE id=?");
    mysqli_stmt_bind_param($stmt4, "s", $ligne);
    mysqli_stmt_execute($stmt4);
    mysqli_stmt_bind_result($stmt4, $logolink, $hex_code, $light_hex);
    while (mysqli_stmt_fetch($stmt4)) {
      $rarray = [$logolink, $hex_code, $light_hex];
    }
    }
   

  function make_svg_V2($colors)
  {
    static $line_ran = 1;
    $line_ran++;
    $rect_id = "rect" . $line_ran;

    $id_grad = "grad" . $line_ran;
    $stopname = $line_ran * 1000;

    $station_size = 250 * (sizeof($colors) - 1);
  ?><svg width="<?php echo $station_size + 150; ?>" height="30" version="1.1" xmlns="http://www.w3.org/2000/svg">
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

  function make_svg_parra($colors, $colors1)
  {
    static $line_ran = 1;
    $line_ran++;
    $rect_id = "rect" . $line_ran . "_3";
    $rect_id2 = "rect" . $line_ran . "_2";
    $id_grad = "grad" . $line_ran . "_3";
    $id_grad2 = "grad" . $line_ran . "_2";
    $stopname = ($line_ran * 1000);

    $station_size = 250 * (sizeof($colors) - 1);
  ?><svg width="<?php echo $station_size + 150; ?>" height="300" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <linearGradient id="<?php echo $id_grad ?>" x1="0" x2="1" y1="0" y2="0">
          <?php
          $lencol = sizeof($colors) - 1;
          for ($x = 0; $x <= $lencol; $x++) {

            echo "<stop class=\"stop" . $stopname + $x . "\" offset=\"" . (100 / ($lencol)) * $x .  "%\" />";
          }
          ?>

        </linearGradient>
        <linearGradient id="<?php echo $id_grad2 ?>" x1="0" x2="1" y1="0" y2="0">
          <?php
          $lencol = sizeof($colors1) - 1;
          for ($x = 0; $x <= $lencol; $x++) {

            echo "<stop class=\"stop" . $stopname + $x . "_2" . "\" offset=\"" . (100 / ($lencol)) * $x .  "%\" />";
          }
          ?>

        </linearGradient>


        <style>
          #<?php echo $rect_id ?> {
            fill: url(#<?php echo $id_grad ?>);
          }

          #<?php echo $rect_id2 ?> {
            fill: url(#<?php echo $id_grad2 ?>);
          }

          <?php
          $lencol = sizeof($colors) - 1;
          for ($x = 0; $x <= $lencol; $x++) {
            echo ".stop" . $stopname + $x  . " { stop-color: " . $colors[$x] . "; } \n";
          }

          $lencol = sizeof($colors1) - 1;
          for ($x = 0; $x <= $lencol; $x++) {
            echo ".stop" . $stopname + $x . "_2"  . " { stop-color: " . $colors1[$x] . "; } \n";
          }
          ?>
        </style>
      </defs>

      <rect id="<?php echo $rect_id ?>" x="128" y="10" rx="4" ry="4" width="<?php echo $station_size; ?>" height="8" />
      <rect id="<?php echo $rect_id2 ?>" x="128" y="103" rx="4" ry="4" width="<?php echo $station_size; ?>" height="8" />
      <?php for ($i = 0; $i < sizeof($colors); $i++) {
        $color = $colors[$i];
      ?>
        <circle cx="<?php echo 125 + $i * 250; ?>" cy="13" r="8" stroke="black" stroke-width="5" fill="<?php echo $color; ?>" />
      <?php
      } ?>
      <?php for ($i = 0; $i < sizeof($colors1); $i++) {
        $color = $colors1[$i];
      ?>
        <circle cx="<?php echo 125 + $i * 250; ?>" cy="107" r="8" stroke="black" stroke-width="5" fill="<?php echo $color; ?>" />
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


  function make_svg_Y($startcol, $varcol, $endcol, $sens)
  {
    // $sens : true : 1 a gauche, 2 a droite
    // $sens : false : 2 a gauche, 1 a droite
    static $line_ran_vert = 1;
    $line_ran_vert++;
    $rect_id = "rect_y_" . $line_ran_vert * 1211 . "_";


    $id_grad = "grad_vert" . $line_ran_vert * 1111 . "_";
    $id_grad2 = $id_grad . "2";
    $id_grad3 = $id_grad . "3";
    $id_grad4 = $id_grad . "4";
    $id_grad = $id_grad . "0";
    $stop = $id_grad . "_stop_";
    $stopname = ($line_ran_vert * 1111);
    $station_space = 125;

    if ($sens) {



    ?><svg height="300" width="300" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <defs>

          <!-- lowergradient -->
          <linearGradient id="<?php echo $id_grad ?>" x1="0" x2="0" y1="0" y2="1">
            <stop class="<?php echo $stop ?>" offset="0%" />
            <stop class="<?php echo $stop . "1" ?>" offset="100%" />
            <!-- uppergradient -->
            <linearGradient id="<?php echo $id_grad2 ?>" x1="0" x2="0" y1="0" y2="1">
              <stop class="<?php echo $stop . "2" ?>" offset="0%" />
              <stop class="<?php echo $stop . "3" ?>" offset="100%" />



            </linearGradient>
            <style>
              #<?php echo $rect_id ?> {
                fill: url(#<?php echo $id_grad ?>);
                transform-origin: center;
                transform: rotate(-60deg);
              }

              <style>#<?php echo $rect_id . "_1" ?> {
                fill: url(#<?php echo $id_grad2 ?>);
                transform-origin: center;
                transform: rotate(-120deg);
              }

              #<?php echo $rect_id . "_2" ?> {
                fill: <?php echo $startcol ?>;
              }

              #<?php echo $rect_id . "_3" ?> {
                fill: <?php echo $varcol ?>;
              }

              #<?php echo $rect_id . "_4" ?> {
                fill: <?php echo $endcol ?>;
              }

              .<?php echo $stop ?> {
                stop-color: <?php echo $startcol ?>
              }

              .<?php echo $stop . "1" ?> {
                stop-color: <?php echo $varcol ?>
              }

              .<?php echo $stop . "2" ?> {
                stop-color: <?php echo $startcol ?>
              }

              .<?php echo $stop . "3" ?> {
                stop-color: <?php echo $endcol ?>
              }
            </style>
        </defs>
        <rect id="<?php echo $rect_id . "_3" ?>" x="231" y="190.5" rx="4" ry="4" height="8" width="100" />
        <rect id="<?php echo $rect_id . "_4" ?>" x="231" y="97.9" rx="4" ry="4" height="8" width="100" />
        <rect id="<?php echo $rect_id ?>" x="150" y="150" rx="4" ry="4" height="100" width="8" />
        <rect id="<?php echo $rect_id . "_1" ?>" x="145" y="152" rx="4" ry="4" height="100" width="8" />
        <rect id="<?php echo $rect_id . "_2" ?>" x="100" y="144" rx="4" ry="4" height="8" width="60" />
        <circle cx="96" cy="148" r="8" stroke="black" stroke-width="5" fill="<?php echo $startcol; ?>" />



      </svg>

    <?php
    } else {


    ?><svg height="300" width="300" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <defs>

          <!-- lowergradient -->
          <linearGradient id="<?php echo $id_grad ?>" x1="0" x2="0" y1="0" y2="1">
            <stop class="<?php echo $stop ?>" offset="0%" />
            <stop class="<?php echo $stop . "1" ?>" offset="100%" />
            <!-- uppergradient -->
            <linearGradient id="<?php echo $id_grad2 ?>" x1="0" x2="0" y1="0" y2="1">
              <stop class="<?php echo $stop . "2" ?>" offset="0%" />
              <stop class="<?php echo $stop . "3" ?>" offset="100%" />



            </linearGradient>
            <style>
              #<?php echo $rect_id ?> {
                fill: url(#<?php echo $id_grad . "_02" ?>);
                transform-origin: center;
                transform: rotate(-120deg);
              }

              <style>#<?php echo $rect_id . "_12" ?> {
                fill: url(#<?php echo $id_grad2 ?>);
                transform-origin: center;
                transform: rotate(-160deg);
              }

              #<?php echo $rect_id . "_22" ?> {
                fill: <?php echo $startcol ?>;
              }

              #<?php echo $rect_id . "_32" ?> {
                fill: <?php echo $varcol ?>;
              }

              #<?php echo $rect_id . "_42" ?> {
                fill: <?php echo $endcol ?>;
              }

              .<?php echo $stop ?> {
                stop-color: <?php echo $startcol ?>
              }

              .<?php echo $stop . "1" ?> {
                stop-color: <?php echo $varcol ?>
              }

              .<?php echo $stop . "2" ?> {
                stop-color: <?php echo $startcol ?>
              }

              .<?php echo $stop . "3" ?> {
                stop-color: <?php echo $endcol ?>
              }
            </style>
        </defs>
        <rect id="<?php echo $rect_id . "_3" ?>" x="231" y="190.5" rx="4" ry="4" height="8" width="100" />
        <rect id="<?php echo $rect_id . "_4" ?>" x="231" y="97.9" rx="4" ry="4" height="8" width="100" />
        <rect id="<?php echo $rect_id ?>" x="150" y="150" rx="4" ry="4" height="100" width="8" />
        <rect id="<?php echo $rect_id . "_1" ?>" x="145" y="152" rx="4" ry="4" height="100" width="8" />
        <rect id="<?php echo $rect_id . "_2" ?>" x="100" y="144" rx="4" ry="4" height="8" width="60" />
        <circle cx="96" cy="148" r="8" stroke="black" stroke-width="5" fill="<?php echo $startcol; ?>" />



      </svg>

  <?php

    }
  }


  ?>

  <?php
  function display_line($line)
  {
    $lineinfo = get_line_logo($line);
    $lighthex =  $lineinfo[2];
    $logo = $lineinfo[0];

  ?>

    <?php
    $colors = ["green", "red", "yellow"];
    $sta_colors = [];
    $ligne = get_station($line);
    $ligne_id = get_station_id($line);
    $stations = $ligne[0];
    $hasy = $ligne[1];
    if (!$hasy) {
    ?>
      <div class="ligne1" style="background-color: #<?php echo $lighthex ?>;">
        <div><img src="<?php echo $logo ?>" height="30"></div><br>

        <?php
        $lensta = sizeof($stations) - 1;
        for ($x = 0; $x <= $lensta; $x++) {
          array_push($sta_colors, $colors[array_rand($colors)]);
        } ?>


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

              } else {

                ?>
          <div class="ligne2" style="background-color: #<?php echo $lighthex ?>;">
            <div><img src="<?php echo $logo ?>" height="30"></div><br>
            <div style="display : inline; overflow-x : scroll;overflow-y : none; height : 100%">
              <div style="display : inline;z-index: 20;">
                <?php
                make_svg_V2(["green", "yellow", "yellow"]);
                ?>
              </div>
              <div style="display : inline; position:relative; top : 135px; left : -125px; z-index: 10;">
                <?php
                make_svg_Y("green", "yellow", "blue", true);
                ?></div>
              <div style="display : inline; position:relative; top : 222px; left : -250px; z-index: 10;">
                <?php
                make_svg_parra(["blue", "yellow", "green"], ["yellow", "yellow", "green"])
                ?></div>

            </div>
          <?php
              }
          ?>
          </div>
        </div>
      <?php
    }
      ?>
      <div class="fb_fb">
        <div class="fb_lignes">
          <?php
          display_line("1");
          display_line("2");
          display_line("3");
          display_line("3bis");
          display_line("4");
          display_line("5");
          display_line("6");
          //display_line("7");
          display_line("7bis");
          //display_line("8");
          display_line("9");
          //display_line("10");
          display_line("11");
          display_line("12");
          //display_line("13");
          display_line("14");

          ?>
        </div>
      </div>





      </div>
      <span id="insertHere"></span>

      <footer>
        <?php
        include("footer.php")
        ?>
      </footer>
</body>
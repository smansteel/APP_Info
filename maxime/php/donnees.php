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
    //fetch from db if an account with this email exists
    $stmt4 = mysqli_prepare($conn, "SELECT nom, branche FROM stations WHERE ligne=? ORDER BY ordre");
    mysqli_stmt_bind_param($stmt4, "s", $ligne);
    mysqli_stmt_execute($stmt4);
    mysqli_stmt_bind_result($stmt4, $nom, $branch);
    while (mysqli_stmt_fetch($stmt4)) {
      array_push($rarray, $nom);
      array_push($rarray_w_branch, [$nom, $branch]);
      if($branch != ""){
        $hasy = true;
      }
    }
    mysqli_stmt_close($stmt4);
    if ($hasy){
      return [$rarray_w_branch, $hasy];
    }
    else{
      return [$rarray, $hasy];
    }
    
  }


  function get_line_logo($ligne)
  {
    $conn = OpenCon();
    $stmt4 = mysqli_prepare($conn, "SELECT lien_logo, hex_color, light_hex FROM metro_line WHERE id=?");
    mysqli_stmt_bind_param($stmt4, "s", $ligne);
    mysqli_stmt_execute($stmt4);
    mysqli_stmt_bind_result($stmt4, $logolink, $hex_code, $light_hex);
    while (mysqli_stmt_fetch($stmt4)) {
      $rarray = [$logolink, $hex_code, $light_hex];
    }
    mysqli_stmt_close($stmt4);
    return $rarray;
  }

  function make_svg_V2($colors)
  {
    static $line_ran = 1;
    $line_ran++;
    $rect_id = "rect" . $line_ran;

    $id_grad = "grad" . $line_ran;
    $stopname = ($line_ran * 1000);

    $station_size = 250 * (sizeof($colors) - 1);
  ?><svg width="<?php echo $station_size + 150; ?>" height="30" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <linearGradient id="<?php echo $id_grad ?>" x1="0" x2="1" y1="0" y2="0">
          <?php
          $lencol = sizeof($colors) - 1;
          for ($x = 0; $x <= $lencol; $x++) {

            echo "<stop class=\"stop" . $stopname + $x . "\" offset=\"" . (100 / ($lencol)) * $x .  "%\" />";
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
            echo ".stop" . $stopname + $x  . " { stop-color: " . $colors[$x] . "; } \n";
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

            echo "<stop class=\"stop" . $stopname + $x . "\" offset=\"" . (100 / ($lencol)) * $x .  "%\" />";
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
            echo ".stop" . $stopname + $x  . " { stop-color: " . $colors[$x] . "; } \n";
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


  function make_svg_Y($colors)
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

            echo "<stop class=\"stop" . $stopname + $x . "\" offset=\"" . (100 / ($lencol)) * $x .  "%\" />";
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
            echo ".stop" . $stopname + $x  . " { stop-color: " . $colors[$x] . "; } \n";
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


  ?>

  <?php
  function display_line($line)
  {
    $lineinfo = get_line_logo($line);
    $lighthex =  $lineinfo[2];
    $logo = $lineinfo[0];

  ?>
    <div class="ligne1" style="background-color: #<?php echo $lighthex ?>;">
      <div><img src="<?php echo $logo ?>" height="30"></div><br>

      <?php
      $colors = ["green", "red", "yellow"];
      $sta_colors = [];
      $ligne= get_station($line);
      $stations = $ligne[0];
      $hasy = $ligne[1];
      if(!$hasy){
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
        
    }
    else{

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
      display_line("7");
      display_line("7bis");
      display_line("8");
      display_line("9");
      //display_line("10");
      display_line("11");
      display_line("12");
      display_line("13");
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
<link rel="stylesheet" href="donnees.css">

<body>
  <?php
  require("db_connect.php");
  include("header.php")
  ?>

  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>

  <?php
  function get_station($ligne)
  {
    $conn = OpenCon();
    $rarray = [];
    $order_array = [];
    //fetch from db if an account with this email exists
    $stmt4 = mysqli_prepare($conn, "SELECT nom FROM stations WHERE ligne=? ORDER BY ordre");
    mysqli_stmt_bind_param($stmt4, "s", $ligne);
    mysqli_stmt_execute($stmt4);
    mysqli_stmt_bind_result($stmt4, $nom);
    while (mysqli_stmt_fetch($stmt4)) {
      array_push($rarray, $nom);
    }
    mysqli_stmt_close($stmt4);
    return $rarray;
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
    $id = rand();
    $id_grad = rand();
    $station_size = 250 * (sizeof($colors) - 1);
  ?><svg width="<?php echo $station_size + 129; ?>" height="30" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <linearGradient id="<?php echo $id_grad ?>" x1="0" x2="1" y1="0" y2="0">
          <?php
          $lencol = sizeof($colors) - 1;
          for ($x = 0; $x <= $lencol; $x++) {
            echo "<stop class=\" stop" . $x . "\" offset=\"" . (100 / ($lencol)) * $x .  "%\" />";
          }
          ?>

        </linearGradient>
        <style>
          #<?php echo $id ?> {
            fill: url(#<?php echo $id_grad ?>);
          }

          <?php
          $lencol = sizeof($colors) - 1;
          for ($x = 0; $x <= $lencol; $x++) {
            echo ".stop" . $x . " { stop-color: " . $colors[$x] . "; } \n";
          }
          ?>
        </style>
      </defs>

      <rect id="<?php echo $id ?>" x="128" y="10" rx="4" ry="4" width="<?php echo $station_size; ?>" height="8" />
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
  ?>
    <svg width="20" height="1004" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <linearGradient id="Gradient2" x1="0" x2="0" y1="0" y2="1">
          <?php
          $lencol = sizeof($colors) - 1;
          for ($x = 0; $x <= $lencol; $x++) {
            echo "<stop class=\" stop" . $x . "\" offset=\"" . (100 / ($lencol)) * $x .  "%\" />";
          }

          ?>

        </linearGradient>
        <style>
          <![CDATA[
          #rect2 {
            fill: url(#Gradient2);
          }

          <?php
          $lencol = sizeof($colors) - 1;
          for ($x = 0; $x <= $lencol; $x++) {
            echo ".stop" . $x . " { stop-color: " . $colors[$x] . "; } \n";
          }
          ?>
          ]]>
        </style>
      </defs>

      <rect id="rect2" x="0" y="0" rx="4" ry="4" width="8" height="1000" />

    </svg>

  <?php
  }




  ?>
  <br> <br> <br> <br><br><br>
  <?php
  function display_line($line)
  {
    $lineinfo = get_line_logo($line);
    $lighthex =  $lineinfo[2];
    $logo = $lineinfo[0];

  ?>
    <div class="ligne1" style="background-color: #<?php echo $lighthex ?>;">
      <div><img src="<?php echo $logo ?>" height="30"></div><br>


      <div class="hz_line">
        <div class="fb_stations">
          <?php
          $colors = ["green", "red", "yellow"];
          $sta_colors = [];
          $stations = get_station($line);
          $lensta = sizeof($stations) - 1;
          foreach ($stations as $station) {
          ?>
            <div class="fb_station_ct">
              <?php
              echo mb_convert_case($station, MB_CASE_TITLE, "UTF-8") . " ";
              ?>
            </div>
          <?php
          }

          for ($x = 0; $x <= $lensta; $x++) {
            array_push($sta_colors, $colors[array_rand($colors)]);
          } ?>
        </div>
        <br>
        <?php
        make_svg_V2($sta_colors);
        ?>
      </div>
      <div class="vert_line">
        <?php
        make_svg_V2_vert($sta_colors);
        ?> </div>
    </div>
  <?php
    //print_r(get_station("7bis"));
  }
  ?>
  <div class="fb_lignes">
    <?php
    display_line("1");
    display_line("2");
    display_line("3");
    display_line("7bis");
    display_line("12");
    display_line("13");
    display_line("14");

    ?>
  </div>





  </div>
  <span id="insertHere"></span>

  <footer>
    <?php
    include("footer.php")
    ?>
  </footer>
</body>
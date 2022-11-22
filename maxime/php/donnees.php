<link rel="stylesheet" href="donnees.css">
<body>
<?php
require("db_connect.php");
include("header.php")
?>

<br> <br> <br> <br><br><br>
<div class="metrol_line"><div> Titre </div>

<?php 
function get_station($ligne){
    $conn = OpenCon();
    $rarray= [];
    //fetch from db if an account with this email exists
    $stmt4 = mysqli_prepare($conn, "SELECT nom, ordre FROM stations WHERE ligne=?");
    mysqli_stmt_bind_param($stmt4, "i", $ligne);
    mysqli_stmt_execute($stmt4);
    mysqli_stmt_bind_result($stmt4, $nom, $ordre);
    while (mysqli_stmt_fetch($stmt4)) {
      array_push($rarray, [$nom, $ordre] );
    }
    mysqli_stmt_close($stmt4);
    return $rarray;
  }


function make_svg_V2($colors){
?>
<svg width="1004" height="20" version="1.1" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="Gradient1">
      <?php
      $lencol = sizeof($colors)-1;
      for($x = 0; $x <= $lencol; $x++){
        echo "<stop class=\" stop" . $x . "\" offset=\"" . (100/($lencol))*$x .  "%\" />";
      }
      
      ?>

    </linearGradient>
    <style>
      <![CDATA[
              #rect1 { fill: url(#Gradient1); }
              <?php
                    $lencol = sizeof($colors)-1;
                    for($x = 0; $x <= $lencol; $x++){
                      echo ".stop".$x." { stop-color: ".$colors[$x]."; } \n";
                    }
              ?>
            ]]>
    </style>
  </defs>

  <rect id="rect1" x="0" y="0" rx="4" ry="4" width="1000" height="8" />
  
</svg>

<?php
}

$colors = ["red", "blue"];

make_svg_V2($colors);

print_r(get_station(2));

?>






</div>

<footer>
<?php
include("footer.php")
?>
</footer>
</body>

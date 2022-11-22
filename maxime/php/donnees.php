<link rel="stylesheet" href="donnees.css">
<body>
<?php
require("db_connect.php");
include("header.php")
?>
<br><br><br><br><br>


<?php     
if(!isset($_GET['r']))     
{     
echo "<script language=\"JavaScript\">     
<!--      
document.location=\"".$_SERVER["PHP_SELF"]."?width=\"+$(window).width();+\";     
//-->     
</script>";     
}     
else {         
// Code to be displayed if resolutoin is detected     
     if(isset($_GET['width'])) {     
               $screensize = intval($_GET['width']);
     }     
     else {     
      $screensize = 1200;   
     }     
}     
?>
<?php 
function get_station($ligne){
    $conn = OpenCon();
    $rarray= [];
    $order_array= [];
    //fetch from db if an account with this email exists
    $stmt4 = mysqli_prepare($conn, "SELECT nom, ordre FROM stations WHERE ligne=?");
    mysqli_stmt_bind_param($stmt4, "s", $ligne);
    mysqli_stmt_execute($stmt4);
    mysqli_stmt_bind_result($stmt4, $nom, $ordre);
    while (mysqli_stmt_fetch($stmt4)) {
      array_push($rarray, [$nom, $ordre] );
      array_push($order_array, $ordre);
    }
    mysqli_stmt_close($stmt4);
    $rarray_ordered = [];
    $lencol = sizeof($rarray);
    for($x = 1; $x <= $lencol; $x++){
      array_push($rarray_ordered , $rarray[array_search($x, $order_array)]);

    }

    return $rarray_ordered;
  }


  function get_line_logo($ligne){
    $conn = OpenCon();
  
    //fetch from db if an account with this email exists
    $stmt4 = mysqli_prepare($conn, "SELECT lien_logo, hex_color, light_hex FROM metro_line WHERE id=?");
    mysqli_stmt_bind_param($stmt4, "s", $ligne);
    mysqli_stmt_execute($stmt4);
    mysqli_stmt_bind_result($stmt4, $logolink, $hex_code, $light_hex);
    while (mysqli_stmt_fetch($stmt4)) {
      $rarray= [$logolink, $hex_code, $light_hex];
      //print_r($rarray);
    }
    mysqli_stmt_close($stmt4);
    return $rarray;
  }

function make_svg_V2($colors){
?>
<svg width="<?php $screensize-100 ?>" height="30" version="1.1" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="Gradient1"x1="0" x2="1" y1="0" y2="0">
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

  <rect id="rect1" x="3" y="10" rx="4" ry="4" width="<?php $screensize-200 ?>" height="8" />
  <circle cx="11" cy="13" r="8" stroke="black" stroke-width="5" fill="black" />
</svg>

<?php
}
function make_svg_V2_vert($colors){
  ?>
  <svg width="20" height="1004" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <defs>
      <linearGradient id="Gradient2" x1="0" x2="0" y1="0" y2="1">
        <?php
        $lencol = sizeof($colors)-1;
        for($x = 0; $x <= $lencol; $x++){
          echo "<stop class=\" stop" . $x . "\" offset=\"" . (100/($lencol))*$x .  "%\" />";
        }
        
        ?>
  
      </linearGradient>
      <style>
        <![CDATA[
                #rect2 { fill: url(#Gradient2); }
                <?php
                      $lencol = sizeof($colors)-1;
                      for($x = 0; $x <= $lencol; $x++){
                        echo ".stop".$x." { stop-color: ".$colors[$x]."; } \n";
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
  function display_line($line){
    $lineinfo = get_line_logo($line);
    $lighthex =  $lineinfo[2];
    $logo = $lineinfo[0];
  
    ?>
    <div class="ligne1" style ="background-color: #<?php echo $lighthex ?>;"><div><img src="<?php echo $logo ?>" height="20"></div><br>


    <div class="hz_line">
    <?php
    $colors = ["green", "red", "yellow"];
    $sta_colors =[];
    $stations = get_station($line);
    $lensta = sizeof($stations)-1;

    for($x = 0; $x <= $lensta; $x++){
    array_push($sta_colors, $colors[array_rand($colors)]);
    }
    make_svg_V2($sta_colors);
    ?> </div>
    <div class="vert_line">
    <?php
    make_svg_V2_vert($sta_colors);
    ?> </div>
    </div>
    <?php
    //print_r(get_station("7bis"));
}


display_line("12");

?>






</div>

<footer>
<?php
include("footer.php")
?>
</footer>
</body>

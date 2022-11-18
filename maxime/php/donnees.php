<link rel="stylesheet" href="donnees.css">
<body>
<?php
require("db_connect.php");
include("header.php")
?>

<br> <br> <br> <br><br><br>
<div><div> Titre </div>


<?php 

function make_svg_line($color1, $color2, $color3, $color4){?> 
<svg height="100" width="400">
<defs>
  <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
    <stop offset="0%" style="stop-color:<?php $color1 ?>;stop-opacity:1" />
    <stop offset="33%" style="stop-color:<?php $color2 ?>;stop-opacity:1" />
    <stop offset="66%" style="stop-color:<?php $color3 ?>;stop-opacity:1" />
    <stop offset="100%" style="stop-color:<?php $color4 ?>;stop-opacity:1" />
  </linearGradient>
</defs>
<line x="0" y="0" x2="200" y2="200" fill="url(#grad1)" style="stroke-width:2"/>
</svg> 
<?php
}
//get the data from the db

//create the loop that generates nice graphs according to data

//test with simple svg and then try it out

$color1 = "rgb(255,255,255)";
$color2 = "rgb(0,0,0)";
$color3 = "rgb(255,255,255)";
$color4 = "rgb(0,0,0)";


make_svg_line($color1, $color2, $color3, $color4);

?>

<svg width="1004" height="20" version="1.1" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="Gradient1">
      <stop class="stop1" offset="0%" />
      <stop class="stop2" offset="50%" />
      <stop class="stop3" offset="100%" />
    </linearGradient>
    <style>
      <![CDATA[
              #rect1 { fill: url(#Gradient1); }
              .stop1 { stop-color: red; }
              .stop2 { stop-color: black; stop-opacity: 0; }
              .stop3 { stop-color: blue; }
            ]]>
    </style>
  </defs>

  <rect id="rect1" x="0" y="0" rx="4" ry="4" width="1000" height="8" />
  
</svg>

</div>

<footer>
<?php
include("footer.php")
?>
</footer>
</body>

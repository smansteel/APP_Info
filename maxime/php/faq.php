<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">
<link rel="stylesheet" href="faq.css">

<?php
require "db_connect.php";
include "header.php";
?>
<img src="sources/bonhomme faq 2.png">
<div class="total">

  <div class="box">


    <div class="flex-content">
      <div class="menu">
        <?php
        $conn = OpenCon();
        $faq_list=[];
    //fetch from db if an account with this email exists
    $stmt4 = mysqli_prepare($conn, "SELECT * FROM faq");
    mysqli_stmt_execute($stmt4);
    mysqli_stmt_bind_result($stmt4, $id, $titre, $contenu);
    while (mysqli_stmt_fetch($stmt4)) {
      $push_array = [];
      array_push($push_array,$id, $titre, $contenu);
      //echo $id." ". $titre." ". $contenu;

      //var_dump($push_array);
        array_push($faq_list,  $push_array);}

    mysqli_stmt_close($stmt4);

    //var_dump($faq_list);
      $lencol = sizeof($faq_list)-1;
    for($x = 0; $x <= $lencol; $x++){
      ?>
        <div class="menu-item">
          <div class="menu-item-header">
            <?php 
            echo $faq_list[$x][1];
            ?>

          </div>
          <div class="menu-item-body">
            <div class="menu-item-body-content">
                          <?php 
            echo $faq_list[$x][2];
            ?>
            </div>
          </div>
        </div>
      <?php

    }
        
    include "footer.php";
      ?> 
<script>
  const menuItemHeaders = document.querySelectorAll(".menu-item-header");

  menuItemHeaders.forEach(menuItemHeader => {
    menuItemHeader.addEventListener("click", event => {

      menuItemHeader.classList.toggle("active");
      const menuItemBody = menuItemHeader.nextElementSibling;
      if (menuItemHeader.classList.contains("active")) {
        menuItemBody.style.maxHeight = menuItemBody.scrollHeight + "px";
      } else {
        menuItemBody.style.maxHeight = 0;
      }

    });
  });
</script>
</div>
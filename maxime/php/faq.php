<!DOCTYPE html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="with=device-wdith, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">
  <link rel="stylesheet" href="faq.css">
  <link rel="stylesheet" href="app_v2.js">
  <title>Accueil - AirQ</title>
</head>



<body>
  <?php
  include("header.php")
  ?>
  <?php
  require "db_connect.php";
  ?>
  <div class="flex-faq">
    <img class="img-faq" src="sources/bonhomme faq 2.png">
    <div class="total">
      <div class="box-faq">
        <div class="flex-content-faq">
          <div class="menu-faq">
            <?php
            $conn = OpenCon();
            $faq_list = [];
            //fetch from db if an account with this email exists
            $stmt4 = mysqli_prepare($conn, "SELECT * FROM faq");
            mysqli_stmt_execute($stmt4);
            mysqli_stmt_bind_result($stmt4, $id, $titre, $contenu);
            while (mysqli_stmt_fetch($stmt4)) {
              $push_array = [];
              array_push($push_array, $id, $titre, $contenu);
              //echo $id." ". $titre." ". $contenu;

              //var_dump($push_array);
              array_push($faq_list,  $push_array);
            }

            mysqli_stmt_close($stmt4);

            //var_dump($faq_list);
            $lencol = sizeof($faq_list) - 1;
            for ($x = 0; $x <= $lencol; $x++) {
            ?>

              <div class="menu-item-faq">
                <div class="menu-item-header-faq">
                  <?php
                  echo $faq_list[$x][1];
                  ?>
                </div>
                <div class="menu-item-body-faq">
                  <div class="menu-item-body-content-faq">
                    <?php
                    echo $faq_list[$x][2];
                    ?>
                  </div>
                </div>

              </div>
            <?php
            } ?>
            <script>
              const menuItemHeaders = document.querySelectorAll(".menu-item-header-faq");

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
        </div>
      </div>
    </div>
  </div><?php
        include "footer.php";
        ?>
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
</script>
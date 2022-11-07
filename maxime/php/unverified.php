<?php
// tell ppl to lookup their email adress + implement a backup solution in case the link does not work. 
//<meta http-equiv="refresh" content="1;url=/login.php" />

include "mailsend.php";
include "db_connect.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<link rel="stylesheet" href="login.css">

<body>


    <div class="background"></div>

    <div class="bg-image">
        <img src="sources/captair.png" class="logo">
        <div class="text">
            Un email vous a été envoyé pour confirmer la création de votre compte<br>Nous vous invitons à vérifier votre compte avant de commencer a utiliser nos services<br><br>
        </div>
        <a class="newacc" href="/login.php" class="newacc">Retour</a><br>
    </div>



    <?php
    //text
    ?>

</body>

</html>
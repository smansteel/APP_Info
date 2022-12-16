<?php
// tell ppl to lookup their email adress + implement a backup solution in case the link does not work. 
//<meta http-equiv="refresh" content="1;url=/login.php" />
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<link rel="stylesheet" href="login.css">

<body>
    <div class="box">
        <div class="flex-content">
            <?php include("header.php"); ?>
        </div>


        <div class="bg-image">
            <img src="sources/captair.png" class="logo">
            <div class="text">
                Un email vous a été envoyé pour confirmer la création de votre compte<br> Nous vous invitons à les vérifier.
            </div>
            <br>
            <a class="newacc" href="/login.php" class="newacc">Retour à la page de connexion</a><br>
        </div>


        </div>
            <div class="flex-content" id="footer">
            <?php include("footer.php"); ?>
        </div>


</body>

</html>
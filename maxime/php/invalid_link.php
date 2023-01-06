<?php
// invalid confirmation link with token (expired/ not in db) réessayer la procédure ou ,ous contacter a contact@captair.paris
?>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="with=device-wdith, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="app_v2.js">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

</head>

<body>
    <?php include("header.php"); ?>
    <div class="flex-content" id="content">
        <div class="bg-image">
            <img src="sources/captair.png" class="logo">
            <div class="text">
                Le lien de vérification a expiré<br> Nous vous invitons à réessayer la procédure ou à nous contacter a l'adresse mail : <a href="mailto:contact@captair.paris">contact@captair.paris</a>
            </div>
            <br>
            <a class="newacc" href="/login.php" class="newacc">Se Connecter</a><br>
        </div>

        <?php include("footer.php"); ?>
    </div>

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

</html>
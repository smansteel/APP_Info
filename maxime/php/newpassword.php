<?php
session_start();
if (isset($_SESSION["token"]) && isset($_SESSION["id"])) {
} else {
    header("Loaction: invalid_link.php");
} ?>

<body>

    <link rel="stylesheet" href="login.css">

    <div class="background"></div>
    <div class="bg-image">

        <img src="sources/captair.png" class="logo">



        <form action="changepasswd.php" method="post" class="form">

            <div class="form-connect">
                <input type="password" name="password" id="password" class="form_field" placeholder="Mot de passe" required>
            </div>

            <div class="form-connect">
                <input type="password" name="password1" id="password1" class="form_field" placeholder="Confirmer le mot de passe" required>
            </div>

            <div class="form-example">
                <input type="submit" value="Confirmer" class="submit_button">
            </div>
        </form>
        <br>




    </div>
    </div>

</body>
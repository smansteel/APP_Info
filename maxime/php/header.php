<link rel="stylesheet" href="../css/header.css">
<!-- Font Awesome logos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../js/app_v2.js">

<div class="header">
    <nav>
        <a href="/">
            <img class="logo-header" src="sources/air_Q_full_turquoise_v3.svg" />
        </a>

        <ul class="menu">
            <li><a href="/">A Propos</a></li>
            <li><a href="/donnees.php">Données</a></li>
            <li><a href="/faq.php">FAQ</a></li>
            <li>

                <?php
                session_start();
                if (isset($_SESSION["prenom"])) {
                ?> <button class="btn">
                        <a href="/moncompte.php">Mon Compte</a>
                    </button><?php
                            } else {
                                ?> <button class="btn">
                        <a href="/login.php">Connexion</a>
                    </button><?php
                            }
                                ?>

            </li>
        </ul>
        <button class="toggle ">
            <div class="bar"></div>
</div>

</nav>
<nav class="mobile-nav">
    <li><a href="/">A Propos</a></li>
    <li><a href="/donnees.php">Données</a></li>
    <li><a href="/faq.php">FAQ</a></li>
    <li><a href="/login.php">Connexion</a></li>
</nav>
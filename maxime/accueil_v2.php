<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="with=device-wdith, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style_v2.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">
    <title>Accueil - AirQ</title>
</head>

<body>


<?php
include("header.php")
?>


    <div class="bodyparagraph">

        <div class="slider">
            <img src="images/carrousel1.jpg" alt="img1" class="img_slider active">
            <img src="images/carrousel2.jpg" alt="img2" class="img_slider">
            <img src="images/carrousel3.jpg" alt="img3" class="img_slider">
            <img src="images/carrousel4.jpg" alt="img4" class="img_slider">
            <img src="images/carrousel5.jpg" alt="img5" class="img_slider">
            <img src="images/carrousel6.jpg" alt="img6" class="img_slider">

            <div class="suivant"><i class="fa-solid fa-circle-chevron-right"></i>
            </div>
            <div class="precedent"><i class="fa-solid fa-circle-chevron-left"></i>
            </div>
        </div>

        <script src="app_v2.js"></script>

        <div class="contenu">
            <p>
                Bonjour
            </p>
        </div>

        <div class="forme">
            <main>
                <div class="box">
                    <div class="imgBx">
                        <img src="images/img1.jpg">
                    </div>

                    <div class="content">
                        <h2>
                            Capteur pollution<br><span>Capteurs de CO et de microparticules embarqués sur le bracelet,
                                pour évaluer la qualité de l’air environnant</span>
                        </h2>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="images/img2.jpg">
                    </div>

                    <div class="content">
                        <h2>
                            Capteur cardiaque<br><span> Capteur cardiaque embarqué, pour évaluer le rythme
                                cardiaque et établir des tendances de stress au quotidien</span>
                        </h2>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="images/img3.jpg">
                    </div>

                    <div class="content">
                        <h2>
                            Capteur sonnore<br><span>Micro de haute précision embarqué pour mesurer le niveau sonore et
                                évaluer le
                                remplissage</span>
                        </h2>
                    </div>
                </div>
            </main>
            <table cellspacing="0" width="100%">
                <td align="center" style="padding: 0px 10px 0px 10px;">
                    <table cellspacing="0" width="100%" style="max-width: 1100px;">

                        <td bgcolor="#85FFF5" align="left" valign="top"
                            style=" padding: 15px 20px 20px 20px; border-radius: 25px 25px 0px 0px; color: #000000; ">
                            <h1 style="font-size: 30px; font-weight: 400; margin: 2;"><strong> Inscrivez-vous à
                                    notre
                                    newsletter</strong>
                            </h1>
                        </td>

                    </table>
                </td>
                <tr>
                    <td align="center" style="padding: 0px 10px 0px 10px;">
                        <table cellspacing="0" width="100%" style="max-width: 1100px;">
                            <td bgcolor="#85FFF5" align="left"
                                style="padding: 10px 30px 25px 30px;border-radius: 0px 0px 25px 25px; color: #111111; font-size: 18px; font-weight: 400; line-height: 25px;">
                                Si vous souhaitez bénéficier dès a présent des avancées
                                technologiques
                                de nos capteurs, vous pouvez vous inscrire à notre
                                newsletter pour être informé de la date de sortie. </p>
                                <table align="center" width="80%"
                                    style="max-width: 400px;margin-left:300px;margin-right:300px;margin-top:20px ">
                                    <td bgcolor="white"
                                        style="padding: 20px 5px 20px 40px;border-radius: 30px 30px 30px 30px; font-size: 10px">
                                        <input type="PasswordInput" id="confirmEntréemdp"
                                            name="confirmEntréemdp"><button>S'inscrire</button>
                                    </td>
                                </table>
                            </td>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

    </div>

    <footer>

        <div class="contenu-footer">
            <div class="bloc footer-services">
                <h4>&copy; 2022 AirQ</h4>
            </div>

            <div class="liens">
                <div class="bloc footer-services">
                    <a href="#">Nous contacter</a>
                </div>
                <div class="bloc footer-services">
                    <a href="#">Mentions légales</a>
                </div>
                <div class="bloc footer-services">
                    <a href="#">CGU</a>
                </div>
                <div class="bloc footer-services">
                    <a href="#">Politique de confidentialité</a>
                </div>
            </div>

        </div>


    </footer>

</body>
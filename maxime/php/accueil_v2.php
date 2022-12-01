<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="with=device-wdith, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style_v2.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
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

        <div id="blocp">
            <div id="bloc1">
                <div id="container">
                    <div id="ligne">
                        <div id="bloc2">
                            <h1> “ Le métro parisien transporte
                                1,5 milliard d’utilisateurs par an ”
                                <p> L’air du métro, plus pollué que l’on pense !

                                    Une étude alerte sur la présence de particules fines
                                    en quantité importante dans le métro. L’association
                                    Respire à l’origine de cette étude a relevé des concentrations
                                    importantes, 300 μg/m3 soit des taux 7,5 fois plus élevés que ceux recommandés par l’OMS. Au
                                    vu du temps passé chaque jour dans le métro, cela est inquiétant pour les usagers. Pour
                                    rappel, la pollution de l’air serait la cause de 98 000 décès prématurés chaque année en
                                    France. Ce sont les systèmes de freinage qui en sont à l’origine. En effet, à l’approche des
                                    stations, les
                                    plaquettes de freins et les roues émettent de
                                    nombreuses particules(PM10) dans
                                    l’atmosphère. </p>
                        </div>
                        <div id="bloc2">
                            <img src="sources/Ellipse 4.png" alt="">

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="curve">
            <img src="images/wave-haikei (4).svg">
        </div>



    </div>

    <div id="blocp11">
        <div id="bloc11">
            <div id="container">
                <div id="ligne">
                    <div id="bloc2">
                        <h1> Notre mission :

                            <p> Améliorer le bien-être et la santé des usagers du métro au quotidien. </p>

                    </div>
                    <div id="bloc2">
                        <h1> Notre solution :

                            <p> Un bracelet (captair) équipé de plusieurs capteurs permettant de déterminer la qualité de
                                l'air
                                auprès de l'utilisateurs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="blocimage">
        <div id="containerimage">
            <div id="ligneimage">
                <div id="bloc2image">
                    <h1><img class="zen" src="images/zen.jpeg">
                </div>
                <div id="bloc2image">
                    <h2><img class="bracelet" src="images/bracelet.png">
                </div>
            </div>
        </div>
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

        <div id="blocprincipal">
            <div id="blocnews">
                <div id="blocnews1">
                    <div id="lignenews">
                        <div id="blocnews2">
                            <h1> Inscrivez-vous à
                                notre
                                newsletter
                                <p> Si vous souhaitez bénéficier dès a présent des avancées
                                    technologiques
                                    de nos capteurs, vous pouvez vous inscrire à notre
                                    newsletter pour être informé de la date de sortie. </p>
                        </div>
                    </div>
                    <input type="PasswordInput" id="confirmEntréemdp" name="confirmEntréemdp"><button>S'inscrire</button>
                </div>
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
    </div>
</body>
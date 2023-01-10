<!DOCTYPE html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="with=device-wdith, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style_v2 copy.css">
    <link rel="stylesheet" href="app_v2.js">

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <title>Accueil - AirQ</title>
</head>

<body>
    <?php include("header.php") ?>

    <div class="bodyparagraph">

        <div class="slider">
            <img src="images/carrousel3.jpg" alt="img1" class="img_slider active">
            <img src="images/carrousel6.jpg" alt="img5" class="img_slider">
            <img src="images/carrousel5.jpg" alt="img5" class="img_slider">
            <img src="images/carrousel8.jpg" alt="img6" class="img_slider">
            <img src="images/carrousel2.jpg" alt="img2" class="img_slider">
            <img src="images/carrousel4.jpg" alt="img4" class="img_slider">
            <img src="images/carrousel10.jpg" alt="img5" class="img_slider">

            <div class="suivant"><i class="fa-solid fa-circle-chevron-right"></i>
            </div>
            <div class="precedent"><i class="fa-solid fa-circle-chevron-left"></i>
            </div>
        </div>


        <script src="app_v2.js" defer></script>



        <div id="container">
            <div class="gauche">
                <h1 class="reveal-1">Le métro parisien transporte 1,5 milliard d’utilisateurs par an</h1>
                <p class="reveal-2">L’air du métro, plus pollué que l’on pense ! Une étude alerte sur la présence de particules fines en quantité importante dans le métro. L’association Respire, à l’origine de cette étude, a relevé des concentrations importantes, soit des taux 7,5 fois plus élevés que ceux recommandés par l’OMS. Au vu du temps passé chaque jour dans le métro, cela est inquiétant pour les usagers. Pour rappel, la pollution de l’air serait la cause de 98 000 décès prématurés chaque année en France.</p>
                <p class="reveal-3">Les systèmes de freinage du métro sont à l’origine de cette pollution. En effet, à l’approche des stations, les plaquettes de freins et les roues émettent de nombreuses particules (PM10) dans l’atmosphère.</p>
            </div>
            <div class="droite">
                <img src="images/metrobonde.jpg" alt="Metro Bonde">
            </div>



        </div>



        <div id="blocimage">
            <div class="left">
                <h1 class="reveal-1">Notre mission :</h1>
                <p class="reveal-2">Notre mission est de contribuer à améliorer le bien-être des utilisateurs du métro parisien en proposant des solutions concrètes et innovantes pour rendre le voyage plus confortable et agréable.</p>
                <img src="images/zen.jpeg" alt="Image de bien-être">
            </div>
            <div class="right">
                <h1 class="reveal-1">Notre solution :</h1>
                <p class="reveal-2">Le bracelet Captair, qui est équipé de plusieurs capteurs permettant de mesurer la qualité de l'environnement autour de l'utilisateur.
                    Le bracelet est conçu pour être porté par les utilisateurs du métro et peut détecter différents paramètres tels que l'affluence la qualité de l'air et le bruit. En utilisant ces données,
                    le bracelet Captair peut aider les utilisateurs à prendre des décisions informées sur leur voyage et à signaler tout problème de qualité. En fournissant ces informations en temps réel,
                    nous espérons contribuer à améliorer la qualité de vie des utilisateurs du métro et à renforcer la réputation de la ville de Paris en tant que destination touristique attractive.</p>
                <img src="images/bracelet.png" alt="Image de bracelet">
            </div>
        </div>


        <div class="curve1">
            <img><svg id="visual" viewBox="0 0 1900 120" width="1900" height="120" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
                <rect x="0" y="0" width="1900" height="140" fill="#00c4b3"></rect>
                <path d="M0 62L52.8 67.7C105.7 73.3 211.3 84.7 316.8 80.2C422.3 75.7 527.7 55.3 633.2 56C738.7 56.7 844.3 78.3 950 84.2C1055.7 90 1161.3 80 1266.8 77C1372.3 74 1477.7 78 1583.2 67.2C1688.7 56.3 1794.3 30.7 1847.2 17.8L1900 5L1900 121L1847.2 121C1794.3 121 1688.7 121 1583.2 121C1477.7 121 1372.3 121 1266.8 121C1161.3 121 1055.7 121 950 121C844.3 121 738.7 121 633.2 121C527.7 121 422.3 121 316.8 121C211.3 121 105.7 121 52.8 121L0 121Z" fill="white" stroke-linecap="round" stroke-linejoin="miter"></path>
            </svg></img>
        </div>

        <div class="forme">
            <div class="capteurs reveal-1">
                <strong>Les différents capteurs :</strong>
                <h5>(Placer le curseur sur les images pour decouvrir les capteurs.)</h5>
            </div>
            <main>

                <div class="box reveal-2">
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
                <div class="box reveal-2">
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
                <div class="box reveal-2">
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
        </div>
        <div class="fondblanc">
            <h1>espace</h1>
            <div class="newsletter">
                <h2 class="reveal-1">Inscrivez-vous à notre newsletter</h2>
                <p class="reveal-2">Si vous souhaitez bénéficier dès à présent des avancées technologiques de nos capteurs, vous pouvez vous inscrire à notre newsletter pour être informé de la date de sortie.</p>
                <form class="reveal-3" action="addnewsletter.php" method="post" class="form">
                    <input type="email" name="email" id="email" class="form_field" placeholder="Adresse email" required>
                    <input type="submit" value="S'inscrire" class="newsbtn">
                </form>

            </div>
        </div>


        <?php include("footer.php") ?>
    </div>
</body>
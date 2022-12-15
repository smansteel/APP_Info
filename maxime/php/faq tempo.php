<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">



<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">
<link rel="stylesheet" href="style.css">


<img src="sources/bonhomme faq 2.png">




<div class="menu">

    <li class="menu-item" id="Question1">
        <a class="menu-item-header">
            Comment jumeler sa montre avec son compte ?
        </a>
        <div class="menu-item-sub">
            <a>
                Il est très simple de synchroniser la montre à votre compte, un code vous sera fourni lors de l'acquisition de la montre. Il suffira d'aller votre compte et mettre ce code pour jumeler les deux ensemble. </a>
        </div>
    </li>
    <li class="menu-item" id="Question2">
        <a class="menu-item-header">
            Le délai de préparation et d’envoi des commandes ?
        </a>
        <div class="menu-item-sub">
            <a>
                Dès la commande valider, la montre partira en fabrication. Compter une à deux semaines pour la réception de votre commande. </a>
        </div>
    </li>
    <li class="menu-item" id="Question3">
        <a class="menu-item-header">
            Question 3
        </a>
        <div class="menu-item-sub">
            <a>Lorem ipsum dolor sit amet. Nobis quae sit corrupti beatae a voluptatem alias.</a>
        </div>
    </li>
    <li class="menu-item" id="Question4">
        <a class="menu-item-header">
            Question 4
        </a>
        <div class="menu-item-sub">
            <a>Lorem ipsum dolor sit amet. Nobis quae sit corrupti beatae a voluptatem alias.</a>
        </div>
    </li>
    <li><a href="index.php">Retour à l'accueil</a></li>
</div>


<style>
    :root {
        --blue: #00ffc3;
        --white: #00ffc3;
        --black: #000000;
        --grey: #888888;


    }

    .menu {
        margin-right: 150px;
        margin-left: 250px;
    }


    .menu-item {

        margin: 5;
        padding: 0;
        font-size: 1.2em;
        box-sizing: border-box;
        font-family: 'Nunito Sans', sans-serif;
        list-style: none;
        overflow: hidden;

    }


    body {
        display: flex;
        align-items: center;
        justify-content: right;
        background-image: url("sources/background.jpeg");
        background-repeat: no-repeat;
        background-size: 100% 100%;

    }



    .menu-item-header {
        display: block;
        padding: 1rem 2.2rem;
        background: white;
        color: black;
        position: relative;
        border-radius: 10px;


    }

    .menu-item-sub {
        background: var(--white);
        overflow: hidden;
        transition: max-height 0.3s;
        max-height: 0;
        border-radius: 10px;

    }



    .accordion-item-header::after {
        content: "\002B";
        font-size: 2rem;
        position: absolute;
        right: 1rem;
    }

    .accordion-item-header.active::after {
        content: "\2212";
    }


    .menu-item-sub a {
        display: block;
        padding: 1rem 1.6rem;
        color: black;
        font-size: 0.9rem;
        position: relative;
        border-bottom: 1px solid var(--light-grey);
        font-size: 1em;

    }

    .menu-item:target .menu-item-sub {
        max-height: 10em;

    }

    img {
        width: 400px;
        height: 400px;
        margin-right: auto;
    }
</style>

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
<?php
$root = "";
?>
<?php $image_folder = $root . "/images" ?>
<?php $css = $root . "/css/" ?>
<?php $js = $root . "/js/"; ?>

<body>

    <link rel="stylesheet" href="<?= $css ?>login.css">
    <div class="box" style="background-image: url(<?= $image_folder ?>/blurry_lr.jpg);">
        <div class="bg-image">

            <img src="<?= $image_folder ?>/captair.png" class="logo">
            <div class="error">

                <?php
                if (isset($data["error"])) {
                    if ($data["error"] == "passwd") {
                        echo 'Les mots de passe sont différents, veuillez les réentrer';
                    }
                }

                ?>



                <form action="<?= $root ?>/auth/forgor_retype/" method="post" class="form">
                    <input type="hidden" name="id" value=<?= $data["id"] ?>>
                    <div class="form-connect">
                        <input type="password" name="password" id="password" class="form_field" placeholder="Mot de passe" required>
                    </div>

                    <div class="form-connect">
                        <input type="password" name="password1" id="password1" class="form_field" placeholder="Confirmer le mot de passe" required>
                    </div>

                    <div class="form-example">
                        <input type="submit" name="submit" value="Confirmer" class="submit_button">
                    </div>
                </form>
                <br>




            </div>
        </div>
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
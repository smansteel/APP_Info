<?php $image_folder = "../../../public/images/" ?>
<?php $css = "../../../public/css/" ?>
<?php $js = "../../../public/js/" ;
$root = "/public";
?>

<link rel="stylesheet" href="<?= $css ?>header_footer.css">

<div class="footer">
    <div class="contenu-footer">
        <div class="bloc footer-services">
            <h4>&copy; 2022 AirQ</h4>
        </div>

        <div class="liens">
            <div class="bloc footer-services">
                <a href="mailto:contact@captair.paris">Nous contacter</a>
            </div>
            <div class="bloc footer-services">
                <a href="<?= $root ?>/ml">Mentions légales</a>
            </div>
            <div class="bloc footer-services">
                <a href="<?= $root ?>/cgu">CGU</a>
            </div>
            <div class="bloc footer-services">
                <a href="<?= $root ?>/pdc">Politique de confidentialité</a>
            </div>
        </div>
    </div>
</div>
<?php
$root = "/";
?>

<script>
    if (confirm("Voulez vous supprimer votre capteur (<?= $data["id"] ?>) cette action n'est pas réversible, toutes vos données seront perdues")) {
        window.location.replace("<?= $root ?>moncompte/del_conf_capteur/<?= $data["id"] ?>");
    } else {
        window.location.replace("<?= $root ?>moncompte/");
    }
</script>
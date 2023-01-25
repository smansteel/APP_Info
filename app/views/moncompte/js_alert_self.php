<?php
$root = "/";
?>

<script>
    if (confirm("Voulez vous supprimer votre compte cette action n'est pas réversible, toutes vos données seront perdues")) {
        window.location.replace("<?= $root ?>moncompte/delete_conf/<?= $data["id"] ?>");
    } else {
        window.location.replace("<?= $root ?>moncompte/");
    }
</script>
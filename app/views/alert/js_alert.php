<?php
$root = "/";
?>

<script>
    if (confirm("Voulez vous supprimer votre <?= $data["object"] ?> (<?= $data["id"] ?>) cette action n'est pas réversible, toutes vos données seront perdues")) {
        window.location.replace("<?= $root ?>admin/del/<?= $data["object"] ?>/<?= $data["id"] ?>");
    } else {
        window.location.replace("<?= $root ?>admin/<?= $data["object"] ?>/");
    }
</script>
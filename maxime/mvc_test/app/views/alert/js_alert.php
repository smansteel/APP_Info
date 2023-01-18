<?php
$root = "/public/";
?>

<script>
    if (confirm("Voulez vous supprimer <?= $data["object"] ?> avec l'id <?= $data["id"] ?>")) {
        window.location.replace("<?= $root ?>admin/del/<?= $data["object"] ?>/<?= $data["id"] ?>");
    } else {
        window.location.replace("<?= $root ?>admin/");
    }
</script>
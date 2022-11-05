
<?php

if (isset($_GET['name'])) {
    echo ' Hi ' . $_GET['name'];
} else {
    echo 'Pas de nom :/';
}

?>
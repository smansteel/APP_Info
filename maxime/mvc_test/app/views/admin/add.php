<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier </title>
</head>

<body>
    <?php include_once 'navs.php';
    if ($data == "user") {


    ?>

        <form method="post" action="/public/admin/add/users/">

            <label>Nom</label><br>
            <input type="text" name="nom" value=""><br>
            <label>Prénom</label><br>
            <input type="text" name="prenom" value=""><br>
            <label>Email</label><br>
            <input type="text" name="email" value=""><br>
            <label>Password</label><br>
            <input type="text" name="password" value=""><br>
            <label>Verifié</label><br>
            <input type="text" name="verified" value=""><br>
            <label>Admin</label><br>
            <input type="text" name="admin" value=""><br>


            <input type="submit" value="Modifier" name="modifier">
        </form><?php

            } else if ($data == "capteur") {

                ?>

        <form method="post" action="/public/admin/add/capteurs/">

            <label>status</label><br>
            <input type="text" name="status" value=""><br>
            <label>ID</label><br>
            <input type="text" name="id" value=""><br>
            <label>owner</label><br>
            <input type="tel" name="owner" value=""><br><br>
            <input type="submit" value="Modifier" name="modifier">
        </form><?php

            } ?>


</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier </title>
</head>
<body>
<?php     
        include_once'navs.php';
        require 'connexion.php';
        $id = $_GET['id'];
        $sqlState = $pdo->prepare('SELECT * FROM users WHERE id=?');
        $sqlState->execute([$id]);

        $utilisateur = $sqlState->fetch(PDO::FETCH_ASSOC);

        if(isset($_POST['modifier'])){

            if(!empty($_POST['password'])){
             $nom = $_POST['nom'];
              $prenom = $_POST['prenom'];
              $status = $_POST['status'];
            $email = $_POST['email'];
            $id = $_POST['id'];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);;

                $sqlState = $pdo->prepare('UPDATE users 
                                            SET email=? , nom=?, prenom=?, password=?, verified=?
                                            WHERE id=? 
                ');

                $sqlState->execute([$email, $nom, $prenom, $password, $status,$id]);
                header('Location: users.php');
                }else{
                      $nom = $_POST['nom'];
              $prenom = $_POST['prenom'];
              $status = $_POST['status'];
            $email = $_POST['email'];
            $id = $_POST['id'];
            

                $sqlState = $pdo->prepare('UPDATE users 
                                            SET email=? , nom=?, prenom=?, verified=?
                                            WHERE id=? 
                ');

                $sqlState->execute([$email, $nom, $prenom, $status,$id]);
                header('Location: users.php');
                }

        }
    ?>
    <form method="post">
                <label>Nom</label><br>
        <input type="text" name="nom" value="<?=$utilisateur["nom"]?>" ><br>
                <label>Prénom</label><br>
        <input type="text" name="prenom" value="<?=$utilisateur["prenom"]?>" ><br>
                <label>Status</label><br>
        <input type="text" name="status" value="<?=$utilisateur["verified"]?>" ><br>
        <input type="hidden" name="id" value="<?php echo $utilisateur['id']?>"><br>
        <label>email</label><br>
        <input type="email" name="email" value="<?php echo $utilisateur['email']?>" ><br>
        <label>password</label><br>
        <input type="text" name="password" value="" ><br>

        <input type="submit" value="Modifier" name="modifier">
    </form>
    
</body>
</html>
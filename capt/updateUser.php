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
        $sqlState = $pdo->prepare('SELECT * FROM utilisateur WHERE id=?');
        $sqlState->execute([$id]);

        $utilisateur = $sqlState->fetch(PDO::FETCH_ASSOC);

        if(isset($_POST['modifier'])){
            $email = $_POST['email'];
            $capteur = $_POST['capteur'];
            $id = $_POST['id'];
            if(!empty($email) && !empty($capteur)){
                $sqlState = $pdo->prepare('UPDATE utilisateur 
                                            SET email=? , capteur=?
                                            WHERE id=? 
                ');

                $sqlState->execute([$email,$capteur,$id]);
                header('location:users.php');
            }else{
                echo "Le email et le capteur sont requis.";
            }
        }
    ?>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $utilisateur['id']?>"><br>
        <label>email</label><br>
        <input type="email" name="email" value="<?php echo $utilisateur['email']?>" ><br>
        <label>Capteur</label><br>
        <input type="text" name="capteur" value="<?php echo $utilisateur['capteur'] ?>"><br><br>
        <input type="submit" value="Modifier" name="modifier">
    </form>
    
</body>
</html>
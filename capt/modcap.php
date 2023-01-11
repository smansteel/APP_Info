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
        $id = $_GET['id_des'];
        $sqlState = $pdo->prepare('SELECT * FROM capteurs WHERE id_des=?');
        $sqlState->execute([$id]);

        $capteurs = $sqlState->fetch(PDO::FETCH_ASSOC);

        if(isset($_POST['modifier'])){
            $status = $_POST['status'];
            $owner = $_POST['owner'];
            $id = $_POST['id'];
            if(!empty($status) && !empty($owner)){
                $sqlState = $pdo->prepare('UPDATE capteurs 
                                            SET status=? , owner=?
                                            WHERE id_des=? 
                ');

                $sqlState->execute([$status,$owner,$id]);
                header('location:Capair.php');
            }else{
                echo "Le status et le owner sont requis.";
            }
        }
    ?>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $capteurs['id_des']?>"><br>
        <label>status</label><br>
        <input type="text" name="status" value="<?php echo $capteurs['status']?>" ><br>
        <label>owner</label><br>
        <input type="tel" name="owner" value="<?php echo $capteurs['owner'] ?>"><br><br>
        <input type="submit" value="Modifier" name="modifier">
    </form>
    
</body>
</html>
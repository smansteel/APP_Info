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
        $sqlState = $pdo->prepare('SELECT * FROM capteurs WHERE id_sql=?');
        $sqlState->execute([$id]);

        $capteurs = $sqlState->fetch(PDO::FETCH_ASSOC);

        if(isset($_POST['modifier'])){
            $status = $_POST['status'];
            $owner = $_POST['owner'];
            $id = $_POST['id'];
            $id_sql = $_POST['id_sql'];
            echo $status ."  ". empty($status);
            if($status == 0 || empty($owner) || empty($id)){
                                echo "Tout les champs sont requis!";
               
            }else{


                 $sqlState = $pdo->prepare('UPDATE capteurs 
                                            SET status=? , owner=?, id=?
                                            WHERE id_sql=? 
                ');

                $sqlState->execute([$status,$owner,$id, $id_sql]);
                header('Location: capair.php');
            }
        }
    ?>
    <form method="post">
        <input type="hidden" name="id_sql" value="<?php echo $capteurs['id_sql']?>"><br>
        <label>status</label><br>
        <input type="text" name="status" value="<?php echo $capteurs['status']?>" ><br>
        <label>ID</label><br>
        <input type="text" name="id" value="<?php echo $capteurs['id']?>" ><br>
        <label>owner</label><br>
        <input type="tel" name="owner" value="<?php echo $capteurs['owner'] ?>"><br><br>
        <input type="submit" value="Modifier" name="modifier">
    </form>
    
</body>
</html>
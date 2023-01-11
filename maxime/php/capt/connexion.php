<?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'capteurs';
            
            try{
                $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo 'Connexion réussie';
            }
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>
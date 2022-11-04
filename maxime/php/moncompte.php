<link rel="stylesheet" href="login.css">
<html>
   <body>Bienvenue <?php  session_start(); echo $_SESSION["prenom"] ?>, dans cette rubrique vous pouvez, modifier les paramètres de votre comptes et gérer votre capteur. 
   <a href=/logout.php>Logout ?<a>
</body> 

</html>
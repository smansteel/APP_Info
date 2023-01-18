<?php
class Auth extends Controller
{
    public function login()
    {
        $root = "/public";
        $this->model('Database');
        $this->view('header_footer/header');

        $_POST["email"];
        $_POST["password"];

        if (isset($_POST["email"]) || isset($_POST["password"])) {
            $db = new Database;
            $mail = $_POST["email"];
            $passwd = $_POST["password"];

            $hashed = password_hash($passwd, PASSWORD_DEFAULT);
            $selected_fields = ["id", "password", "nom", "prenom", "creation", "verified"];
            $table = "users";
            $where_column = "email";
            $where_value = $mail;

            $db->select($selected_fields, $table, $where_column, $where_value);
            $userlist = $db->return_list();
            $f_user = $userlist[0];
            $id =  $f_user[0];
            $hash =  $f_user[1];
            $nom =  $f_user[2];
            $prenom =  $f_user[3];
            $creation =  $f_user[4];
            $verified =  $f_user[5];


            if (!isset($nom)) {
                header("Location: $root/auth/login/?error=noacc");
            } else {
                if (password_verify($passwd,  $hash)) {
                    if ($verified == '0') {
                        header("Location: /unverified_logic.php?id=$id");
                    } else if ($verified == '1') {
                        session_start();
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $mail;
                        $_SESSION["nom"] = $nom;
                        $_SESSION["prenom"] = $prenom;
                        $_SESSION["creation"] = $creation;

                        echo $nom . " " . $_SESSION["nom"];
                        header("Location: $root/moncompte/");
                    } else {
                        echo $verified;
                    }
                } else {
                    header("Location: $root/auth/login/?error=badcred");
                    exit();
                    //echo "Bah non mauvais mdp ";
                    //echo password_hash("1234",1);
                }
            }
            $db->close();
        }





        $this->view('header_footer/footer');
    }
    public function logout()
    {
        $root = "/public";
        session_start();
        session_destroy();
        header("Location: $root");
    }

    public function inscription()
    {
        $root = "/public";
        $this->model('Database');

        $_POST["email"];
        $_POST["password"];

        if (isset($_POST["email"]) || isset($_POST["password"])) {
            $db = new Database;
            $mail = $_POST["email"];
            $passwd = $_POST["password"];

            $hashed = password_hash($passwd, PASSWORD_DEFAULT);
            $selected_fields = ["id", "password", "nom", "prenom", "creation", "verified"];
            $table = "users";
            $where_column = "email";
            $where_value = $mail;

            $db->select($selected_fields, $table, $where_column, $where_value);
            $userlist = $db->return_list();
            $f_user = $userlist[0];
            $id =  $f_user[0];
            $hash =  $f_user[1];
            $nom =  $f_user[2];
            $prenom =  $f_user[3];
            $creation =  $f_user[4];
            $verified =  $f_user[5];


            if (!isset($nom)) {
                header("Location: $root/auth/login/?error=noacc");
            } else {
                if (password_verify($passwd,  $hash)) {
                    if ($verified == '0') {
                        header("Location: /unverified_logic.php?id=$id");
                    } else if ($verified == '1') {
                        session_start();
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $mail;
                        $_SESSION["nom"] = $nom;
                        $_SESSION["prenom"] = $prenom;
                        $_SESSION["creation"] = $creation;

                        echo $nom . " " . $_SESSION["nom"];
                        header("Location: $root/moncompte/");
                    } else {
                        echo $verified;
                    }
                } else {
                    header("Location: $root/login/inscription/?error=email");
                    exit();
                    //echo "Bah non mauvais mdp ";
                    //echo password_hash("1234",1);
                }
            }
            $db->close();
        }
    }
}

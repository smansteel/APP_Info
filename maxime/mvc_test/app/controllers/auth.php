<?php
class Auth extends Controller
{
    public function login()
    {
        $this->model("Database");
        $root = "/public";

        $this->view('header_footer/header');

        if (isset($_POST["email"]) || isset($_POST["password"])) {
            $db = new Database;
            $mail = $_POST["email"];
            $passwd = $_POST["password"];
            echo $mail;

            $selected_fields = ["id", "password", "nom", "prenom", "creation", "verified", "admin"];
            $table = "users";
            $where_column = "email";
            $where_value = $mail;

            $db->select_fields($selected_fields, $table, $where_column, $where_value);
            $f_user = $db->return_list()[0];
            $id =  $f_user["id"];
            $hash =  $f_user["password"];
            $nom =  $f_user["nom"];
            $prenom =  $f_user["prenom"];
            $creation =  $f_user["creation"];
            $verified =  $f_user["verified"];
            $admin =  $f_user["admin"];


            if (!isset($nom)) {
                header("Location: $root/auth/login/?error=noacc");
            } else {
                if (password_verify($passwd,  $hash)) {
                    if ($verified == '0') {
                        header("Location: $root/auth/unverif/$id");
                    } else if ($verified == '1') {
                        session_start();
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $mail;
                        $_SESSION["nom"] = $nom;
                        $_SESSION["prenom"] = $prenom;
                        $_SESSION["creation"] = $creation;
                        $_SESSION["Admin"] = $admin;

                        echo $nom . " " . $_SESSION["nom"];
                        header("Location: $root/moncompte/");
                    } else {
                        echo $verified;
                    }
                } else {
                    header("Location: $root/auth/login/badcred");
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

    public function email($email,)
    {
        $this->model('Mailer');
        $mailer = new Mailer;
        $token = "1234";
        $typeofemail = 0;
        $mailer->send($token, $email, $typeofemail);
    }

    public function inscription()
    {
        $root = "/public";
        $this->model('Database');

        var_dump($_POST);
        if (isset($_POST["submit"])) {
            $db = new Database;
            $mail = $_POST["email"];
            $passwd = $_POST["Entreemdp"];
            $confpasswd = $_POST["confirmEntreemdp"];
            $selected_fields = ["id"];
            $table = "users";
            $where_column = "email";
            $where_value = $mail;

            $db->select_fields($selected_fields, $table, $where_column, $where_value);
            $f_user = $db->return_list()[0];
            var_dump($f_user);
            $db->close();




            if (isset($f_user["id"])) {
                header("Location: $root/login/acc_exists");
            } else {
                if (preg_match("/^.{6}/",  $passwd)) {
                    if ($passwd == $confpasswd) {
                        $db = new Database;
                        $insert_fields = ["email", "password", "nom", "prenom"];
                        $insert_fields_value = [$mail, password_hash($passwd, 1), $_POST["nom"], $_POST["prenom"]];
                        $db->insert("users", $insert_fields, $insert_fields_value);


                        header("Location: $root/login/verify/$mail/");
                    } else {
                        header("Location: $root/login/inscription/passwd_nomatch");
                    }
                } else {
                    header("Location: $root/login/inscription/passwd_str");
                    exit();
                }
            }
            $db->close();
        }
    }
    public function verify($token)
    {
        $this->model('Database');

        $db = new Database;
        $table = "onetimepasses";
        $selected_fields = ["creation_time", "account_id", "utilisation"];
        $where_column = 'token';
        $where_value = $token;
        $db->select_fields($selected_fields, $table, $where_column, $where_value);
        $creation_time = $db->return_list()[0]["creation_time"];
        $account_id = $db->return_list()[0]["account_id"];
        $utilisation = $db->return_list()[0]["utilisation"];

        if (!isset($creation_time) || $creation_time <= time() - 6000) {
            $this->view('header_footer/header');
            $this->view('auth/invalid');
            $this->view('header_footer/footer');
        } else {
            $db = new Database;
            $table = "onetimepasses";
            $where_field = "account_id";
            $where_value = $account_id;
            $db->delete($table, $where_field, $where_value);
            $db->close();
            if ($utilisation == '0') {
                $db = new Database;
                $update_fields = ["verified"];
                $update_fields_value = [1];
                $table = "users";
                $where_column = "id";
                $where_value = $account_id;
                $db->update($update_fields, $update_fields_value, $table, $where_column, $where_value);
                $db->close();
                $this->view('header_footer/header');
                $this->view('auth/verified');
                $this->view('header_footer/footer');
            } else if ($utilisation == "1") {

                $db = new Database;
                $update_fields = ["verified"];
                $update_fields_value = [1];
                $table = "users";
                $where_column = "id";
                $where_value = $account_id;
                $db->update($update_fields, $update_fields_value, $table, $where_column, $where_value);
                $db->close();
                $this->view('header_footer/header');
                $this->view('auth/password_retype', ['id' => $account_id]);
                $this->view('header_footer/footer');
            }
        }
    }
    public function forgor()
    {
        if (isset($_POST["submit"])) {
            $this->model('Mailer');
            $this->model('Database');
            $mail = $_POST["email"];
            $db = new Database;
            $table = "users";
            $selected_fields = ["id"];
            $where_column = 'email';
            $where_value = $mail;
            $db->select_fields($selected_fields, $table, $where_column, $where_value);
            $id = $db->return_list()[0]["id"];


            $mailer = new Mailer;
            $token = $this->tokenGen();
            $email = $mail;
            $typeofemail = 0;
            $mailer->send($token, $email, $typeofemail);
            $db = new Database;
            $table = "onetimepasses";
            $fields = ["token", "utilisation", "creation_time", "account_id"];
            $fields_value = [$token, "1", time(), $id];
            $db->insert($table, $fields, $fields_value);

            header("Location: $this->root/login/verify/");
        }
    }

    public function forgor_retype()
    {
        $this->model('Database');
        if (isset($_POST["id"])) {
            if (isset($_POST["submit"])) {
                if (($_POST["password"] == $_POST["password"]) && (preg_match("/^.{6}/",  $_POST["password"])))

                    $id = $_POST["id"];
                $hash = password_hash($_POST["password"], 1);
                $db = new Database;
                $table = "users";
                $update_fields = ["password"];
                $update_fields_value = [$hash];
                $where_column = "id";
                $where_value = $_POST["id"];
                $db->update($update_fields, $update_fields_value, $table, $where_column, $where_value);

                header("Location: $this->root/login/chang");
            } else {
                $this->view('header_footer/header');
                $this->view('auth/password_retype', ['id' => $_POST["id"]]);
                $this->view('header_footer/footer');
            }
        }
    }
}

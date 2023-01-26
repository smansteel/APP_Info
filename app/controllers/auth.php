<?php
class Auth extends Controller
{
    public function login()
    {
        $this->model("Database");
        $root = "";

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
            $verified =  $f_user["verified"];
            $admin =  $f_user["admin"];


            if (!isset($id)) {
                header("Location: $root/login/?error=noacc");
                exit();
            } else {
                if (password_verify($passwd,  $hash)) {
                    if ($verified == '0') {
                        header("Location: $root/auth/unverif/$id");
                        exit();
                    } else if ($verified == '1') {
                        $_SESSION["id"] = $id;
                        $_SESSION["Admin"] = $admin;

                        header("Location: $root/moncompte/");
                        exit();
                    } else {
                        echo $verified;
                    }
                } else {
                    header("Location: $root/login/badcred");
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
        $root = "";
        session_destroy();
        header("Location: $root/");
        exit();
    }

    public function unverif($param = "void")
    {
        $root = "";
        header("Location: $root/login/verif");
        exit();
    }
    public function inscription()
    {
        $root = "";
        $this->model('Database');
        $this->model('Mailer');

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
            $f_user = $db->return_list();
            $db->close();




            if (isset($f_user[0])) {
                header("Location: $root/login/acc_exists");
                exit();
            } else {
                if (preg_match("/^.{6}/",  $passwd)) {
                    if ($passwd == $confpasswd) {
                        $db = new Database;
                        $insert_fields = ["email", "password", "nom", "prenom"];
                        $insert_fields_value = [$mail, password_hash($passwd, 1), $_POST["nom"], $_POST["prenom"]];
                        $db->insert("users", $insert_fields, $insert_fields_value);

                        $db = new Database;
                        $table = "users";
                        $selected_fields = ["id"];
                        $where_column = 'email';
                        $where_value = $mail;
                        $db->select_fields($selected_fields, $table, $where_column, $where_value);
                        $id = $db->return_list()[0]["id"];
                        $db->close();
                        $mailer = new Mailer;
                        $token = $this->tokenGen();
                        $email = $mail;
                        $typeofemail = 1;
                        $mailer->send($token, $email, $typeofemail);
                        $db = new Database;
                        $table = "onetimepasses";
                        $fields = ["token", "utilisation", "creation_time", "account_id"];
                        $fields_value = [$token, "0", time(), $id];
                        $db->insert($table, $fields, $fields_value);

                        $db->close();
                        header("Location: $root/login/verify/$mail/");
                        exit();
                    } else {
                        header("Location: $root/login/inscription/passwd_nomatch");
                        exit();
                    }
                } else {
                    header("Location: $root/login/inscription/passwd_str");
                    exit();
                }
            }
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
            $db->close();


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
            $db->close();
            header("Location: $this->root/login/verify/");
            exit();
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
                $db->close();
                header("Location: $this->root/login/chang");
                exit();
            } else {
                $this->view('header_footer/header');
                $this->view('auth/password_retype', ['id' => $_POST["id"]]);
                $this->view('header_footer/footer');
            }
        }
    }
}

<?php

class Login extends Controller
{
    public function index($param = 'void')
    {
        if (isset($_SESSION["id"])) {
            header("Location: /moncompte/");
            exit();
        }
        $this->view('header_footer/header');
        if ($param != 'void') {
            $this->view('auth/index', ["error" => $param]);
        } else {
            $this->view('auth/index');
        }
        $this->view('header_footer/footer');
    }
    public function inscription($param = "void")
    {
        $this->view('header_footer/header');
        $this->view('auth/inscription', ["error" => $param]);
        $this->view('header_footer/footer');
    }



    public function verify($mail = "void")
    {
        if ($mail != "void") {
            $this->model('Mailer');
            $this->model('Database');

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
            header("Location: $this->root/login/verify/");
            exit();
        } else {
            $this->view('header_footer/header');
            $this->view('auth/verify');
            $this->view('header_footer/footer');
        }
    }

    public function login($param = 'void')
    {
        $this->index($param);
    }
    public function forgor()
    {
        $this->view('header_footer/header');
        $this->view('auth/forgor');
        $this->view('header_footer/footer');
    }
}

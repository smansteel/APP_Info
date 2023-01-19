<?php

class Login extends Controller
{
    public function index($param = 'void')
    {
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

    public function tokenGen()
    {
        $rtoken = "";
        $array_letters = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));;
        for ($i = 0; $i < 30; $i++) {
            $rtoken .= $array_letters[array_rand($array_letters, 1)];
        }
        return $rtoken;
    }

    public function verify($mail = "void")
    {
        if ($mail != "void") {
            $this->model('Mailer');

            $mailer = new Mailer;
            $token = $this->tokenGen();
            $email = $mail;
            $typeofemail = 0;
            $mailer->send($token, $email, $typeofemail);
            $db = new Database;
            $table = "onetimepasses";
            $fields = ["token", "utilisation", "creation_time", "account_id"];
            $fields_value = [];
            $db->insert($table, $fields, $fields_value);

            $this->view('header_footer/header');
            $this->view('auth/inscription');
            $this->view('header_footer/footer');
        }
    }

    public function login($param = 'void')
    {
        $this->index($param);
    }
}

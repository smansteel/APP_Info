<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('header_footer/header');
        $this->view('home/index');
        $this->view('header_footer/footer');
    }

    public function addnewsletter()
    {


        $this->model('Database');


        // adding email
        $db = new Database;
        $table = "newsletter";
        $field =  "email";
        $field_value = $_POST['email'];

        $db->insert_one($table, $field, $field_value);
        $db->close();
    }
}

<?php
class Admin extends Controller
{
    public function index()
    {
       $this->users();
    }

    public function users(){
        $this->model('Database');
        $db = new Database;
        $selected_fields = ["id", "email", "nom", "prenom", "creation", "verified"];
        $table = "users";
        $where_column = "verified";
        $where_value = "1";
        $db->select($selected_fields, $table, $where_column, $where_value);
        $userlist = $db->return_list();
        $db->close();
        $db = new Database;
        $selected_fields = ["id", "email", "nom", "prenom", "creation", "verified"];
        $table = "capteurs";
        $where_column = "verified";
        $where_value = "1";
        $db->select($selected_fields, $table, $where_column, $where_value);
        $userlist = $db->return_list();
        $db->close();



        $this->view('admin/users', ['userlist' => $userlist]);

    }
}

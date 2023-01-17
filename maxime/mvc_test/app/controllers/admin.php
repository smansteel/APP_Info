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
        $db->select_fields($selected_fields, $table, $where_column, $where_value);
        $userlist = $db->return_list();
        $db->close();
        foreach($userlist as $utilisateur){
            $db = new Database;
            $selected_fields = ["id", "id_sql", "status", "owner"];
            $table = "capteurs";
            $where_value = $utilisateur['id'];
            $where_column = "owner";
            $db->select_fields($selected_fields, $table, $where_column, $where_value);
            echo $utilisateur['id'];
            $capteur_list[$utilisateur['id']] = $db->return_list();
            $db->close();
        }



        $this->view('admin/users', ['userlist' => $userlist, 'capteur_list' => $capteur_list]);

    
}
}
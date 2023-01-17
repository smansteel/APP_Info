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
        var_dump($userlist);
        foreach($userlist as $utilisateur){
            
            $db = new Database;
            $selected_fields = ["id", "id_sql", "status", "owner"];
            $table = "capteurs";
            $where_value = $utilisateur['id'];
            $where_column = "owner";
            $db->select_fields($selected_fields, $table, $where_column, $where_value);

            if (sizeof($db->return_list())!=0){
                $capteur_list = $db->return_list();
                $userlist['capteurs'] = $capteur_list;}

            $db->close();
        }



        $this->view('admin/users', ['userlist' => $userlist]);

    
}
}
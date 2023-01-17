<?php
class Admin extends Controller
{
    public function index()
    {
        $this->users();
    }

    public function users()
    {
        $this->model('Database');
        $db = new Database;
        $selected_fields = ["id", "email", "nom", "prenom", "creation", "verified"];
        $table = "users";
        $where_column = "verified";
        $where_value = "1";
        $db->select_fields($selected_fields, $table, $where_column, $where_value);
        $userlist = $db->return_list();
        $db->close();
        //var_dump($userlist);
        $capteurs_list = [];
        foreach ($userlist as $utilisateur) {

            $db = new Database;
            $selected_fields = ["id", "id_sql", "status", "owner"];
            $table = "capteurs";
            $where_value = $utilisateur['id'];
            $where_column = "owner";
            $db->select_fields($selected_fields, $table, $where_column, $where_value);
            if (sizeof($db->return_list()) != 0) {
                $capteur_list = $db->return_list();
                array_push($capteurs_list,  [$utilisateur['id'], $capteur_list]);
            }
            //var_dump($capteurs_list);

            $db->close();
        }



        $this->view('admin/users', ['userlist' => $userlist, 'capteurs_list' =>  $capteurs_list]);
    }

    public function capteurs()
    {
        $this->model('Database');
        $db = new Database;

        //var_dump($userlist);
        $ownerlist = [];

        $selected_fields = ["id", "id_sql", "status", "owner"];
        $table = "capteurs";
        $db->select_etoile_fields($selected_fields, $table);
        $capteurlist = $db->return_list();
        //var_dump($capteurs_list);

        $db->close();
        foreach ($capteurlist as $capteur) {
            $db = new Database;
            $selected_fields = ["id", "email", "nom", "prenom", "creation", "verified"];
            $table = "users";
            $where_column = "id";
            $where_value = $capteur["owner"];
            $db->select_fields($selected_fields, $table, $where_column, $where_value);
            $owner = $db->return_list();
            if (sizeof($owner) != 0) {
                array_push($ownerlist,  [$capteur['id_sql'], $owner]);
            }
            $db->close();
        }



        $this->view('admin/capteurs', ['capteurlist' => $capteurlist, 'ownerlist' =>  $ownerlist]);
    }
}

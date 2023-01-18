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
    public function edit($param = "void")
    {   // !! ADD CHECK FOR ADMIN SESSION !! && $_SESSION["admin"]
        $this->model('Database');
        if ($param == 'capteurs' || $param == 'users') {
            $fields_to_edit = ["fields" => [], "values" => []];
            if ($param == 'capteurs') {
                $possible_fields = ["id_sql", "id", "status", "owner"];
            } else {
                $possible_fields = ["id", "email", "nom", "prenom", "password", "verified"];
            }
            foreach ($possible_fields as $field) {
                if (isset($_POST[$field])) {
                    echo $_POST[$field];
                    array_push($fields_to_edit["fields"], $field);
                    array_push($fields_to_edit["values"], $_POST[$field]);
                }
            }
            $db = new Database;
            $where_column = array_shift($fields_to_edit["fields"]);
            $where_value = array_shift($fields_to_edit["values"]);
            $update_fields = $fields_to_edit["fields"];
            $update_fields_value =  $fields_to_edit["values"];
            $table = $param;

            $db->update($update_fields, $update_fields_value, $table, $where_column, $where_value);
        } else {
            header('Location: /public/');
            exit();
        }
    }
    public function modif($param = "void", $param1 = "void")
    {
        $this->model('Database');
        // !! ADD CHECK FOR ADMIN SESSION !! && $_SESSION["admin"]
        if (intval($param1) != 0) {
            if ($param == 'capteurs') {
                $db = new Database;
                $selected_fields = ["id", "id_sql", "status", "owner"];
                $table = "capteurs";
                $where_value = $param1;
                $where_column = "id_sql";
                $db->select_fields($selected_fields, $table, $where_column, $where_value);
                $capteur = $db->return_list();
                $db->close();

                $this->view('admin/mod', ["capteur" => $capteur]);
            } else if ($param == 'users') {
                $db = new Database;
                $selected_fields = ["id", "email", "nom", "prenom", "creation", "verified"];
                $table = "users";
                $where_column = "id";
                $where_value = $param1;
                $db->select_fields($selected_fields, $table, $where_column, $where_value);
                $user = $db->return_list()[0];
                $db->close();

                $this->view('admin/mod', ["user" => $user]);
            } else {
                // header("Location: /public/");
                // exit();
            }
        } else {
            // header("Location: /public/");
            // exit();
        }
    }
}

<?php
class Admin extends Controller
{
    protected $root = "";
    public function index()
    {
        $this->users();
    }

    public function  checkauth()
    {
        if (isset($_SESSION["Admin"]) && ($_SESSION["Admin"] == "2" || $_SESSION["Admin"] == "1" || $_SESSION["Admin"] == 1 || $_SESSION["Admin"] == 2)) {
            return (intval($_SESSION["Admin"]));
        } else {
            return 0;
        }
    }

    public function users()
    {
        if ($this->checkauth() == 2) {

            $this->model('Database');
            $db = new Database;
            $selected_fields = ["id", "email", "nom", "prenom", "creation", "verified"];
            $table = "users";
            $where_column = "verified";
            $where_value = "1";
            $db->select_fields_nw($selected_fields, $table);
            $userlist = $db->return_list();
            $db->close();
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


                $db->close();
            }


            $this->view('header_footer/navs', "user");
            $this->view('admin/users', ['userlist' => $userlist, 'capteurs_list' =>  $capteurs_list]);
        } else {
            header("Location: /");
            exit();
        }
    }

    public function faq()
    {
        if ($this->checkauth() == 2) {

            $this->model('Database');
            $db = new Database;
            $selected_fields = ["id", "titre", "contenu"];
            $table = "faq";
            $db->select_fields_nw($selected_fields, $table);
            $faqlist = $db->return_list();
            $db->close();




            $this->view('header_footer/navs', "faq");
            $this->view('admin/faq', ['faqlist' => $faqlist]);
        } else {
            header("Location: /");
            exit();
        }
    }

    public function capteurs()
    {
        $auth = $this->checkauth();
        if (($auth >= 1) || ($auth <= 2)) {

            $this->model('Database');
            $db = new Database;


            $ownerlist = [];

            $selected_fields = ["id", "id_sql", "status", "owner"];
            $table = "capteurs";
            $db->select_etoile_fields($selected_fields, $table);
            $capteurlist = $db->return_list();


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




            $this->view('header_footer/navs', "capteur");
            $this->view('admin/capteurs', ['capteurlist' => $capteurlist, 'ownerlist' =>  $ownerlist]);
        } else {
            header("Location: /");
            exit();
        }
    }
    public function edit($param = "void")
    {   // !! ADD CHECK FOR ADMIN SESSION !! && $_SESSION["admin"]
        $auth = $this->checkauth();
        if (($auth == 2 && ($param == 'users' || $param == "faq")) || (($auth <= 2 && $auth >= 1) && $param == 'capteurs')) {
            $this->model('Database');
            if ($param == 'capteurs' || $param == 'users' || $param == 'faq') {
                $fields_to_edit = ["fields" => [], "values" => []];
                if ($param == 'capteurs') {
                    $possible_fields = ["id_sql", "id", "status", "owner"];
                } else if ($param == 'users') {
                    $possible_fields = ["id", "email", "nom", "prenom", "password", "verified", "admin"];
                } else if ($param == 'faq') {
                    $possible_fields = ["id", "titre", "contenu"];
                }
                foreach ($possible_fields as $field) {
                    if (isset($_POST[$field])) {
                        if ($field == "password" && $_POST[$field] == "") {
                        } else {
                            array_push($fields_to_edit["fields"], $field);
                            array_push($fields_to_edit["values"], $_POST[$field]);
                        }
                    }
                }
                $db = new Database;
                $where_column = array_shift($fields_to_edit["fields"]);
                $where_value = array_shift($fields_to_edit["values"]);
                $update_fields = $fields_to_edit["fields"];
                $update_fields_value =  $fields_to_edit["values"];
                $table = $param;

                $db->update($update_fields, $update_fields_value, $table, $where_column, $where_value);
                $db->close();
                header("Location: $this->root/admin/$param");
                exit();
            } else {
                header("Location: /");
                exit();
            }
        } else {
            header("Location: /");
            exit();
        }
    }
    public function modif($param = "void", $param1 = "void")
    {
        $this->model('Database');
        $auth = $this->checkauth();
        if (($auth == 2 && ($param == 'users' || $param == 'faq')) || (($auth <= 2 && $auth >= 1) && $param == 'capteurs')) {
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
                    $this->view('header_footer/navs', $param);
                    $this->view('admin/mod', ["capteur" => $capteur]);
                } else if ($param == 'users') {
                    $db = new Database;
                    $selected_fields = ["id", "email", "nom", "prenom", "creation", "verified", "admin"];
                    $table = "users";
                    $where_column = "id";
                    $where_value = $param1;
                    $db->select_fields($selected_fields, $table, $where_column, $where_value);
                    $user = $db->return_list()[0];
                    $db->close();
                    $this->view('header_footer/navs', $param);
                    $this->view('admin/mod', ["user" => $user]);
                } else if ($param == 'faq') {
                    $db = new Database;
                    $selected_fields = ["id", "titre", "contenu"];
                    $table = "faq";
                    $where_column = "id";
                    $where_value = $param1;
                    $db->select_fields($selected_fields, $table, $where_column, $where_value);
                    $faq = $db->return_list()[0];
                    $db->close();
                    $this->view('header_footer/navs', $param);
                    $this->view('admin/mod', ["faq" => $faq]);
                } else {
                    header("Location: /");
                    exit();
                }
            } else {
                header("Location: /");
                exit();
            }
        } else {
            header("Location: /");
            exit();
        }
    }
    public function del($param = "void", $param1 = "void")
    { // !! ADD CHECK FOR ADMIN SESSION !! && $_SESSION["admin"]
        $auth = $this->checkauth();
        if (($auth == 2 && ($param == 'users' || $param == "faq")) || (($auth <= 2 && $auth >= 1) && $param == 'capteurs')) {
            $this->model('Database');
            if (intval($param1) != 0) {
                $db = new Database;
                $table = $param;
                if ($param == "capteurs") {
                    $where_field = "id_sql";
                    $where_value = $param1;
                    $db->delete($table, $where_field, $where_value);
                } else if ($param == "users") {

                    $where_field = "id";
                    $where_value = $param1;
                    $db->delete($table, $where_field, $where_value);
                } else if ($param == "faq") {

                    $where_field = "id";
                    $where_value = $param1;
                    $db->delete($table, $where_field, $where_value);
                }
                $where_value = $param1;
                $db->delete($table, $where_field, $where_value);
                $db->close();
            }
            header("Location: $this->root/admin/$param");
        } else {
            header("Location: /");
            exit();
        }
    }
    public function del_conf($param = "void", $param1 = "void")
    { // !! ADD CHECK FOR ADMIN SESSION !! && $_SESSION["admin"]
        $auth = $this->checkauth();
        if (($auth == 2 && ($param == 'users' || $param == "faq")) || (($auth <= 2 && $auth >= 1) && $param == 'capteurs')) {
            if (intval($param1) != 0) {
                $this->view("alert/js_alert", ["object" => $param, "id" => $param1]);
            }
        } else {
            header("Location: /");
            exit();
        }
    }

    public function add($param = "void")
    {
        $auth = $this->checkauth();
        if (($auth == 2 && ($param == 'users' || $param == "faq")) || (($auth <= 2 && $auth >= 1) && $param == 'capteurs')) {
            $this->model('Database');
            if ($param == 'capteurs' || $param == 'faq' || $param == 'users') {
                $fields_to_edit = ["fields" => [], "values" => []];
                if ($param == 'capteurs') {
                    $possible_fields = ["id", "status", "owner"];
                } else if ($param == 'faq') {
                    $possible_fields = ["id", "titre", "contenu"];
                } else if ($param == 'users') {
                    $possible_fields = ["email", "nom", "prenom", "password", "verified", "admin"];
                }
                foreach ($possible_fields as $field) {
                    if (isset($_POST[$field])) {
                        if ($field == "password" && $_POST[$field] == "") {
                        } else if ($field == "password") {
                            array_push($fields_to_edit["fields"], $field);
                            array_push($fields_to_edit["values"], password_hash($_POST[$field], 1));
                        } else {
                            array_push($fields_to_edit["fields"], $field);
                            array_push($fields_to_edit["values"], $_POST[$field]);
                        }
                    }
                }
                $db = new Database;
                $update_fields = $fields_to_edit["fields"];
                $update_fields_value =  $fields_to_edit["values"];
                $table = $param;

                $db->insert($table, $update_fields, $update_fields_value);
                $db->close();
                header("Location: $this->root/admin/$param");
                exit();
            } else {
                header("Location: /");
                exit();
            }
        } else {
            header("Location: /");
            exit();
        }
    }
    public function ajouter($param = "void")
    {
        $auth = $this->checkauth();
        if (($auth == 2 && ($param == 'users' || $param == 'user' || $param == "faq")) || (($auth <= 2 && $auth >= 1) && ($param == 'capteurs' || $param = "capteur"))) {
            $this->view('header_footer/navs', $param);
            $this->view('admin/add', $param);
        } else {
            header("Location: /");
            exit();
        }
    }
}

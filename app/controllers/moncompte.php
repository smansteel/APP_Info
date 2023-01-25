<?php
class Moncompte extends Controller
{
    public function index()
    {
        $this->model("Database");
        if (!isset($_SESSION["id"])) {
            header("Location: /login/");
            exit();
        } else {
            $db = new Database;
            $db->select_fields(["email", "prenom", "nom", "creation", "verified", "admin"], "users", "id", $_SESSION["id"]);

            $db_list = $db->return_list();
            $user = $db_list[0];


            $db = new Database;
            $db->select_fields(["id", "id_sql", "name", "status"], "capteurs", "owner", $_SESSION["id"]);

            $cpt_list = $db->return_list();



            $this->view('header_footer/header');
            $this->view('moncompte/index', ["user" => $user, "capteurs" => $cpt_list]);
            $this->view('header_footer/footer');
        }
    }
    public function add_capteur()
    {
        $this->model("Database");
        if (!isset($_SESSION["id"])) {
            header("Location: /login/");
            exit();
        } else if (isset($_POST["id"])) {
            $db = new Database;
            $db->select_fields(["email", "prenom", "nom", "creation", "verified"], "users", "id", $_SESSION["id"]);
            $db->return_list();
            $user = $db[0][0];

            $db = new Database;
            $db->insert("users", ["email", "prenom", "nom", "creation", "verified"], ["email", "prenom", "nom", "creation", "verified"]);
            $db->return_list();
            $capt = $db[0][0];



            $this->view('header_footer/header');
            $this->view('moncompte/index', ["user " => $user]);
            $this->view('header_footer/footer');
        }
    }
}

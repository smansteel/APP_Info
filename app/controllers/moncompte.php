<?php
class Moncompte extends Controller
{
    public function index($param = "void")
    {
        $this->model("Database");
        $this->model("Averager");
        if (!isset($_SESSION["id"])) {
            header("Location: /login/");
            exit();
        } else {
            // $db_gen  = new Database;
            // $db_gen->gen();
            // $db_gen->close();
            $db = new Database;
            $db->select_fields(["email", "prenom", "nom", "creation", "verified", "admin"], "users", "id", $_SESSION["id"]);

            $db_list = $db->return_list();
            $user = $db_list[0];
            $db->close();


            $db = new Database;
            $db->select_fields(["id", "id_sql", "name", "status"], "capteurs", "owner", $_SESSION["id"]);

            $cpt_list = $db->return_list();
            $db->close();
            $avg_fordays = [];
            foreach ($cpt_list as $capteur) {
                $db = new Database;
                $db->select_fields(["time", "location", "airq_air", "airq_db", "airq_cardiac"], "capteurs_qualite", "capteur_id", $capteur["id_sql"]);

                $res = $db->return_list();
                $average = new Averager;

                $avg_fordays[$capteur["id_sql"]] = $average->fromArray($res);
                $db->close();
            }

            $this->view('header_footer/header');
            $this->view('moncompte/index', ["user" => $user, "capteurs" => $cpt_list, "airq" => $avg_fordays, "param" => $param]);
            $this->view('header_footer/footer');
        }
    }
    public function addcapteur()
    {
        if (isset($_POST["submit"])) {
            $this->view('header_footer/header');
            $this->view('moncompte/addcapt', ["id" => $_SESSION["id"]]);
            $this->view('header_footer/footer');
        }
    }
    public function doaddcapteur()
    {
        $this->model("Database");
        if (isset($_POST["submit"])) {
            $db = new Database;
            echo $_POST["id"];
            $db->select_fields(["owner"], "capteurs", "id", $_POST["id"]);


            $owner = $db->return_list()[0]["owner"];
            $db->close();
            if ($owner == 0 || $owner == "") {
                $db = new Database;
                $db->update(["name", "owner"], [$_POST["name"], $_SESSION["id"]], "capteurs", "id", $_POST["id"]);
                $db->close();
                header("Location: /moncompte/");
                exit();
            } else {
                header("Location: /moncompte/");
                exit();
            }
        }
    }
    public function editcapteur()
    {
        if (isset($_POST["submit"])) {
            $this->view('header_footer/header');
            $this->view('moncompte/changeinfos', ["id" => $_POST["id"]]);
            $this->view('header_footer/footer');
        }
    }
    public function doeditcapteur()
    {
        $this->model("Database");
        if (isset($_POST["submit"])) {
            $db = new Database;
            $db->select_fields(["owner"], "capteurs", "id_sql", $_POST["id"]);
            $owner = $db->return_list()[0]["owner"];
            $db->close();
            if ($_SESSION["id"] == $owner) {
                $db = new Database;
                $db->update(["name"], [$_POST["name"]], "capteurs", "id_sql", $_POST["id"]);
                $db->close();
                header("Location: /moncompte/");
                exit();
            } else {
                header("Location: /moncompte/");
                exit();
            }
        }
    }
    public function delcapteur()
    {
        $this->view('moncompte/js_alert', ["id" => $_POST["id"]]);
    }
    public function del_conf_capteur($param)
    {
        $this->model("Database");

        $db = new Database;
        $db->select_fields(["owner"], "capteurs", "id_sql", $param);
        $owner = $db->return_list()[0]["id"];
        $db->close();
        header("Location: /moncompte/");
        if (!isset($param)) {
            header("Location: /moncompte/");
            exit();
        } else if ($_SESSION["id"] == $owner) {
            $db = new Database;
            $db->delete("capteurs", "id_sql", $param);
            $db->close();
            header("Location: /moncompte/");
            exit();
        } else {
            header("Location: /moncompte/");
            exit();
        }
    }
    public function togglecapteur()
    {
        if (isset($_POST["submit"])) {
            if ($_POST["status"] == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
            $this->model('Database');
            $db = new Database;
            $db->update(["status"], [$status], "capteurs", "id_sql", $_POST["id"]);
            echo $_POST["status"] . " " . $status;
            $db->close();
            header("Location: /moncompte/");
            exit();
        }
    }
    public function edit()
    {
        if (isset($_POST["submit"])) {
            $this->view('header_footer/header');
            $this->view('moncompte/changeinfos_acc');
            $this->view('header_footer/footer');
        }
    }
    public function doeditacc()
    {
        $this->model("Database");
        if (isset($_POST["submit"])) {
            $db = new Database;
            $db->select_fields(["id"], "users", "email", $_POST["email"]);
            $email = $db->return_list()[0]["email"];
            $db->close();
            if (empty($email)) {
                $db = new Database;
                $db->update(["nom", "prenom", "email"], [$_POST["name"], $_POST["prenom"], $_POST["email"]], "users", "id", $_SESSION["id"]);
                header("Location: /moncompte/email_duplicate");
                $db->close();
                exit();
            }
        }
    }
    public function delete()
    {
        $this->view('moncompte/js_alert_self', ["id" => $_SESSION["id"]]);
    }
    public function delete_conf($param)
    {

        $this->model("Database");
        if (!isset($param)) {
            header("Location: /moncompte/");
            exit();
        } else if ($_SESSION["id"] == $param) {
            $db = new Database;
            $db->delete("users", "id", $_SESSION["id"]);
            header("Location: /login/");
            $db->close();
            exit();
        } else {
            header("Location: /moncompte/");
            exit();
        }
        session_destroy();
        session_unset();
    }
}

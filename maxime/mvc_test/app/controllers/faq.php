<?php
class Faq extends Controller
{
    public function index()
    {
        $this->model('Database');

        // Getting faq questions
        $db = new Database;
        $selected_fields =  ["titre", "contenu"];
        $table = "faq";

        $db->select_etoile($selected_fields, $table);

        $faq_questions = $db->return_list();

        $db->close();



        $this->view('header_footer/header');
        $this->view('faq/index', ['questions' => $faq_questions]);
        $this->view('header_footer/footer');
    }
}

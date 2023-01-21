<?php
class Moncompte extends Controller
{
    public function index()
    {
        $this->view('header_footer/header');
        $this->view('moncompte/index');
        $this->view('header_footer/footer');
    }
}

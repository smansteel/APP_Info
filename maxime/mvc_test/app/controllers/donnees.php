<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('header_footer/header');
        $this->view('donnees/index');
        $this->view('header_footer/footer');
    }
}

<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('header_footer/header');
        $this->view('home/index');
        $this->view('header_footer/footer');
    }
}

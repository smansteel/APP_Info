<?php

class Login extends Controller
{
    public function index()
    {
        $this->view('header_footer/header');
        $this->view('auth/index');
        $this->view('header_footer/footer');
    }
    public function inscription()
    {
        $this->view('header_footer/header');
        $this->view('auth/inscription');
        $this->view('header_footer/footer');
    }
}

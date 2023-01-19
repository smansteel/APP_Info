<?php
class Ml extends Controller
{
    public function index()
    {
        $this->view('header_footer/header');
        $this->view("legal/ml");
        $this->view('header_footer/footer');
    }
}

<?php
class Pdc extends Controller
{
    public function index()
    {
        $this->view('header_footer/header');
        $this->view("legal/pdc");
        $this->view('header_footer/footer');
    }
}

<?php
class Admin extends Controller
{
    public function index()
    {
        $this->view('header_footer/header');
        $this->view('admin/index');
        $this->view('header_footer/footer');
    }
}
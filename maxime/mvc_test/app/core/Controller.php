<?php

class Controller
{
    protected $root = "";
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function tokenGen()
    {
        $rtoken = "";
        $array_letters = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));;
        for ($i = 0; $i < 30; $i++) {
            $rtoken .= $array_letters[array_rand($array_letters, 1)];
        }
        return $rtoken;
    }
}

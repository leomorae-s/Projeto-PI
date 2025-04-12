<?php

namespace controllers;

class Login{
    public function index(){
        return [
            'views' => 'login.php',
            'data' => ['title' => 'Login']
        ];
    }

    public function store(){
        var_dump($_POST);
    }
}
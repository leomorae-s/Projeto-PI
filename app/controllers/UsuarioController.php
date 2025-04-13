<?php

namespace controllers;
use Database;
use helpers\View;
use Redirect;

require_once __DIR__ . '/../helpers/View.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/Redirect.php';
class  UsuarioController{
    public function index(){
        var_dump("home");
    }

    public function login(){
        View::render("login");
    }

    public function authenticate(){
        $database = new Database();
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = trim($_POST['senha']);

        $usuario = $database->findBy('usuario', 'email', $email);
//        if(!password_verify($password, $usuario['senha'])) {
//            \Redirect::redirect("/");
//        }

        if ($usuario) {
            if ($usuario['senha'] == $senha) {
                \Redirect::redirect("/");
                var_dump("entrou");
            } else {
                var_dump("erro: senha incorreta");
            }
        } else {
            var_dump("erro: usuário não encontrado");
        }






    }
}
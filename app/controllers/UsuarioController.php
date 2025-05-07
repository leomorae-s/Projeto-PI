<?php

namespace controllers;
use Database;
use helpers\View;
use Redirect;
use helpers\Auth;

require_once __DIR__ . '/../helpers/View.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../helpers/Redirect.php';
require_once __DIR__ . '/../helpers/Auth.php';

class  UsuarioController{
    public function index(){
        $usuario = Auth::getNomeUsuarioLogado();
        if($usuario){
            echo "bem vindo " . $usuario;
        } else {
            echo "Faça login";
        }
    }

    public function login(){
        View::render("login.php", ['title' => "Login"], false);
    }

    public function authenticate(){
        $database = new Database();
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = trim($_POST['senha']);

        $usuario = $database->findBy('usuarios', 'email', $email);
//        if(!password_verify($password, $usuario['senha'])) {
//            \Redirect::redirect("/");
//        }

            if ($usuario['senha'] !== $senha) {
                var_dump("senha incorreta");
                return;
            }

         Auth::setUsuarioLogado($usuario);
         Redirect::redirect("/");

        }
}
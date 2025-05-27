<?php

namespace controllers;
use Database;
use helpers\View;
use PDO;
use PDOException;
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

        public function editUsuario() {
            require_once __DIR__ . '/../views/funcionarioEdit.php';
        }

    public function postUsuario() {
        $db = new \Database();
        $pdo = $db->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $nome = $_POST['nome'] ?? '';
            $regiao_atuacao = $_POST['regiao_atuacao'] ?? '';
            $email = $_POST['email'] ?? '';
            $salario = $_POST['salario'] ?? '';
            $cargo = $_POST['cargo'] ?? '';
            $telefone = $_POST['telefone'] ?? '';

            try {
                $stmt = $pdo->prepare('UPDATE usuarios SET nome = ?, regiao_atuacao = ?, email = ?, salario = ?, cargo = ?, telefone = ? WHERE id = ?');
                $stmt->execute([$nome, $regiao_atuacao, $email, $salario,$cargo,$telefone,  $id]);

                header("Location: /verFuncionarios");
                exit;
            } catch (PDOException $e) {
                echo "Erro ao atualizar: " . $e->getMessage();
            }
        }
    }
}
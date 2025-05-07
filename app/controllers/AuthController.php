<?php

require_once 'core/Database.php';

class AuthController
{
    public function showLogin()
    {
        require 'app/views/auth/login.php';
    }

    public function login()
    {
        session_start();

        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $db = new Database();
        $pdo = $db->connect();

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario'] = [
                'id' => $usuario['id'],
                'nome' => $usuario['nome'],
                'tipo' => $usuario['tipo']
            ];
            header('Location: /dashboard');
        } else {
            header('Location: /login?erro=1');
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
    }
}

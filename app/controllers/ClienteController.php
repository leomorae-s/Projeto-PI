<?php

namespace controllers;

use PDO;

class ClienteController
{
    public function index() {
        require_once __DIR__ . '/../views/empresas.php';
    }

    public function edit() {
        require_once __DIR__ . '/../views/empresasEdit.php';
    }

    public function postEmpresas() {
        $db = new \Database();
        $pdo = $db->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $nome = $_POST['nome'] ?? '';
            $tipo = $_POST['tipo'] ?? '';
            $email = $_POST['email'] ?? '';
            $cnpj = $_POST['cnpj'] ?? '';
            $localizacao = $_POST['localizacao'] ?? '';
            $telefone = $_POST['telefone'] ?? '';

            try {
                $stmt = $pdo->prepare('UPDATE empresas SET nome = ?, tipo = ?, email = ?, cnpj = ?, localizacao = ?, telefone = ? WHERE id = ?');
                $stmt->execute([$nome, $tipo, $email, $cnpj,$localizacao,$telefone,  $id]);

                header("Location: /cliente");
                exit;
            } catch (PDOException $e) {
                echo "Erro ao atualizar: " . $e->getMessage();
            }
        }
    }
}
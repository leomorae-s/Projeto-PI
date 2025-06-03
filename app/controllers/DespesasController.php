<?php

namespace controllers;
use PDO;

require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../helpers/Redirect.php';

class DespesasController
{
    public function showDespesas() {
        require_once __DIR__ . '/../views/despesa.php';
    }

    public function despesasForm()
    {
        $categoria = $_POST['categoria'] ?? null;
        $subcategoria = $_POST['subcategoria'] ?? null;
        $valor = $_POST['valor'] ?? null;
        $data = $_POST['data'] ?? null;

        $db = new \Database();
        $pdo = $db->connect();

        $sql = "INSERT INTO despesas (categoria, subcategoria, valor, data) 
            VALUES (:categoria, :subcategoria, :valor, :data)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':subcategoria', $subcategoria);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':data', $data);

        $stmt->execute();

        \Redirect::redirect("despesas");
    }

    public function visuDespesas() {
        require_once __DIR__ . '/../views/visuDespesas.php';
    }

    public function editarDespesa() {
        require_once __DIR__ . '/../views/editarDespesas.php';
    }

    public function postDespesa() {
        $db = new \Database();
        $pdo = $db->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $categoria = $_POST['categoria'] ?? '';
            $subcategoria = $_POST['subcategoria'] ?? '';
            $valor = $_POST['valor'] ?? '';
            $data = $_POST['data'] ?? '';

            try {
                $stmt = $pdo->prepare('UPDATE despesas SET categoria = ?, subcategoria = ?, valor = ?, data = ? WHERE id = ?');
                $stmt->execute([$categoria, $subcategoria, $valor, $data, $id]);

                header("Location: /despesas");
                exit;
            } catch (PDOException $e) {
                echo "Erro ao atualizar: " . $e->getMessage();
            }

        }
    }

}
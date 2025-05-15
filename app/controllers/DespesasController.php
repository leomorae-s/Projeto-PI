<?php

namespace controllers;
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

}
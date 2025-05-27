<?php

namespace controllers;

use PDO;

class ProdutoController
{

    public function listar(){
        require_once __DIR__ . '/../views/produto.php';
    }

    public function produtoForm(){
        require_once __DIR__ . '/../views/cadastrarproduto.php';
    }

    public function produtoEdit(){
        require_once __DIR__ . '/../views/editarproduto.php';
    }

    public static function options(){
        $db = new \Database();
        $pdo = $db->connect();

        $sql = "SELECT DISTINCT nome, id FROM produtos";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($id){
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(){
        $db = new \Database();
        $pdo = $db->connect();
        $preco = str_replace(',', '.', $_POST['preco']);
        $sql = "INSERT INTO produtos (nome, descricao, preco, estoque, categoria) 
                VALUES (:nome, :descricao, :preco, :estoque, :categoria)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":nome", $_POST['nome']);
        $stmt->bindParam(":descricao", $_POST['descricao']);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":estoque", $_POST['estoque']);
        $stmt->bindParam(":categoria", $_POST['categoria']);
        $stmt->execute();

        header("Location: /produtos");
        exit;

    }

    public function update($id, $data){
        $sql = "UPDATE produtos 
                SET nome = :nome, descricao = :descricao, preco = :preco,categoria= :catgoria, estoque = :estoque 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $data['nome']);
        $stmt->bindParam(":descricao", $data['descricao']);
        $stmt->bindParam(":preco", $data['preco']);
        $stmt->bindParam(":categoria", $data['categoria']);
        $stmt->bindParam(":estoque", $data['estoque']);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function postProduto() {
        $db = new \Database();
        $pdo = $db->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $nome = $_POST['nome'] ?? '';
            $descricao = $_POST['descricao'] ?? '';
            $preco = $_POST['preco'] ?? '';
            $estoque = $_POST['estoque'] ?? '';
            $categoria = $_POST['categoria'] ?? '';


            try {
                $stmt = $pdo->prepare('UPDATE produtos SET nome = ?, descricao = ?, preco = ?, estoque = ?, categoria = ? WHERE id = ?');
                $stmt->execute([$nome, $descricao, $preco, $estoque,$categoria, $id]);

                header("Location: /produtos");
                exit;
            } catch (PDOException $e) {
                echo "Erro ao atualizar: " . $e->getMessage();
            }
        }
    }

    public function delete($id){
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
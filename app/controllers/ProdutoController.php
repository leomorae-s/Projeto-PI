<?php

namespace controllers;

use PDO;

class ProdutoController
{

    private $db;

    public function __construct(){
        $this->db = ((new \Database())->getConnection());
    }

    public function index(){
        $sql = "SELECT * FROM produtos";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

    public function show($id){
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(){

        $sql = "INSERT INTO produtos (nome, descricao, preco, categoria, estoque) 
                VALUES (:nome, :descricao, :preco, :categoria, :estoque)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $_POST['nome']);
        $stmt->bindParam(":descricao", $_POST['descricao']);
        $stmt->bindParam(":preco", $_POST['preco']);
        $stmt->bindParam(":categoria", $_POST['categoria']);
        $stmt->bindParam(":estoque", $_POST['estoque']);
        $stmt->execute();
        return $stmt->rowCount();

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

    public function delete($id){
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
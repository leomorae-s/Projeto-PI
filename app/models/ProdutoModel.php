<?php

namespace models;

use Database;
use PDO;

require_once "../config/database.php";

class ProdutoModel
{

    private $nome;
    private $descricao;
    private $preco;
    private $categoria;
    private $estoque;

    public function __construct($nome, $descricao, $preco, $categoria, $estoque){
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->categoria = $categoria;
        $this->estoque = $estoque;
    }

    public function salvarProduto(){

        try {
            $banco = new Database();
            $pdo = $banco->getConnection();
            $sql = "INSERT INTO produtos (nome, descricao, preco, categoria, estoque) values (?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $this->nome);
            $stmt->bindParam(2, $this->descricao);
            $stmt->bindParam(3, $this->preco);
            $stmt->bindParam(4, $this->categoria);
            $stmt->bindParam(5, $this->estoque);
            $stmt->execute();
            echo "item criado com sucesso";

        } catch (\PDOException $e) {
            echo $e->getMessage();
        } finally {
            $banco->closeConnection();
        }
    }

    public function buscarProdutos(){
        try {
            $banco = new Database();
            $pdo = $banco->getConnection();
            $sql = "SELECT * FROM produtos";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return "Produto: " . $result['nome'] . "\nPreço: " . $result['preco'];

        } catch (\PDOException $e) {
            echo $e->getMessage();
        } finally {
            $banco->closeConnection();
        }

        return "Conexão encerrada com sucesso";
    }

}
<?php

namespace models;

require_once "../config/database.php";
class ItemVendaModel
{
    private $id_venda;
    private $id_produto;
    private $quantidade;
    private $preco_unitario;

    private $banco;
    private $pdo;

    public function __construct($id_venda, $id_produto, $nome, $quantidade, $preco_unitario, $banco, $pdo)
    {

        $this->id_venda = $id_venda;
        $this->id_produto = $id_produto;
        $this->quantidade = $quantidade;
        $this->preco_unitario = $preco_unitario;
        $this->banco = new \Database();
        $this->pdo = $this->banco->getConnection();
    }


    public function inserirItemVenda(){

        try {
            $sql = "INSERT INTO itens_venda (id_venda, id_produto, quantidade, preco_unit) VALUES (?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $this->id_venda);
            $stmt->bindParam(2, $this->id_produto);
            $stmt->bindParam(3, $this->quantidade);
            $stmt->bindParam(4, $this->preco_unitario);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (\PDOException){
            throw new \PDOException("Erro: " . $e->getMessage());
        } finally {
            $this->banco->closeConnection();
        }
    }

    public function pegarItensVenda(){

        try {
            $sql = "SELECT * FROM itens_venda";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\PDOException){
            throw new \PDOException("Erro: " . $e->getMessage());
        }
    }

    public function deletarItemVenda($id_venda){

        $sql = "DELETE FROM itens_venda where id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id_venda);
        $stmt->execute();

        return $stmt->rowCount();
    }



}
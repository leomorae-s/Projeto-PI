<?php

namespace models;
use Cassandra\Date;
use PDO;
use PDOException;

require_once "../config/database.php";
class FinanceiroModel
{
    private $tipo;
    private $descricao;
    private $valor;
    private $data;
    private $categoria;
    private $banco;
    private $pdo;

    public function __construct($tipo, $descricao, $valor, $data, $categoria){
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        $this->valor = $valor;
        $this->data = date("Y-m-d");
        $this->categoria = $categoria;
        $this->banco = new \Database();
        $this->pdo = $this->banco->getConnection();
    }

    public function inserirMovimentacao(){

        try {
            $sql = "INSERT INTO movimentacoes(tipo, descricao, valor, data, categoria) values (?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $this->tipo);
            $stmt->bindParam(2, $this->descricao);
            $stmt->bindParam(3, $this->valor);
            $stmt->bindParam(4, $this->data);
            $stmt->bindParam(5, $this->categoria);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new PDOException("Erro:" . e->getMessage());
        } finally {
            $this->banco->closeConnection();
        }
    }

    public function removerMovimentacao($id){
        try {


            $sql = "DELETE FROM movimentacoes WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e){
            throw new PDOException("Erro:" . $e->getMessage());
        } finally {
            $this->banco->closeConnection();
        }
    }

    public function pegarMovimentacoes(){
        try {
            $sql = "SELECT * FROM movimentacoes";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        } catch (PDOException){
            throw new PDOException("Erro:" . $e->getMessage());
        } finally {
            $this->banco->closeConnection();
        }
    }

}
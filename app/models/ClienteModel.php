<?php

namespace models;

require_once __DIR__ . '/../core/Database.php';

class ClienteModel
{

    private $nome;
    private $cnpj;
    private $razao_social;

    private $banco;
    private $pdo;

    public function __construct($nome, $cnpj, $razao_social){
        $this->nome = $nome;
        $this->cnpj = $cnpj;
        $this->razao_social = $razao_social;
        $this->banco = new \Database();
        $this->pdo = $this->banco->getConnection();

    }

    public function salvarCliente(){

        try {
            $pdo = $this->pdo;
            $sql = "INSERT INTO clientes ('nome', 'cnpj', 'razao_social') VALUES (?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $this->nome);
            $stmt->bindParam(2, $this->cnpj);
            $stmt->bindParam(3, $this->razao_social);
            $stmt->execute();

            return $stmt->rowCount();

        } catch (\PDOException $e) {
            throw new \PDOException("Erro ao salvar cliente: " . $e->getMessage(), (int)$e->getCode());
        } finally {
            if (isset($banco)) {
                $banco->closeConnection();
            }
        }

    }

    public function buscarCliente($nome){

        try {


            $pdo = $this->pdo;
            $sql = "SELECT * FROM clientes WHERE nome = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->execute();

            return $stmt->fetch();
        } catch (\PDOException $e) {
            throw new \PDOException("Erro ao buscar cliente: " . $e->getMessage(), (int)$e->getCode());
        } finally {
            if (isset($banco)) {
                $banco->closeConnection();
            }
        }

    }

    public function deletarUsuario($nome){

        try {
            $pdo = $this->pdo;
            $sql = "DELETE FROM clientes WHERE nome = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            throw new \PDOException("Erro ao deletar cliente: " . $e->getMessage(), (int)$e->getCode());
        } finally {
            if (isset($banco)) {
                $banco->closeConnection();
            }
        }
    }

}
<?php

namespace models;


use Database;

use PDO;
use PDOException;

require_once "../config/database.php";

abstract class UsuarioModel
{
    protected $nome;
    protected $email;

    protected $senha;

    protected $tipo;



    public function __construct($nome, $email, $senha, $tipo){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->tipo = $tipo;
    }

    public function salvarUsuario()
    {
        try {

            $banco = new Database();
            $pdo = $banco->getConnection();

            $senhaHash = password_hash($this->senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nome, email, senha, tipo_usuario, criado_em) values (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $this->nome);
            $stmt->bindParam(2, $this->email);
            $stmt->bindParam(3, $senhaHash);
            $stmt->bindParam(4, $this->tipo);
            $dataDeCriacao = date("Y-m-d");
            $stmt->bindParam(5, $dataDeCriacao);
            $stmt->execute();






        } catch (PDOException $e) {
            echo "Erro ao salvar no banco de dados" . $e->getMessage();
        } finally {
            $banco->closeConnection();
        }
    }


    public function buscarUsuarioPorNome($nome) {
        try {
            $banco = new Database();
            $pdo = $banco->getConnection();

            $sql = "SELECT * FROM usuarios WHERE nome = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result ?: null;

        } catch (PDOException $e) {

            throw new PDOException("Erro ao buscar no banco: " . $e->getMessage());
        } finally {
            if (isset($banco)) {
                $banco->closeConnection();
            }
        }
    }



    public function deletarUsuarioPorNome($nome){

        try {
            $banco = new Database();
            $pdo = $banco->getConnection();
            $sql = "DELETE FROM usuarios WHERE nome = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->execute();
            return $stmt->rowCount() > 0;

        } catch (PDOException $e) {

            throw new PDOException("Erro ao deletar usuário" . $e->getMessage());
        } finally {

            if (isset($banco)) {
                $banco->closeConnection();
            }
        }

    }

}
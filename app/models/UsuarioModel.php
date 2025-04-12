<?php

namespace models;


use Database;

use PDO;
use PDOException;

require_once "../config/database.php";

class UsuarioModel
{
    private $nome;
    private $email;

    private $senha;

    private $tipo;



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


    public function buscarUsuarioPorNome($nome){

        try {
            $banco = new Database();
            $pdo = $banco->getConnection();
            $sql = "SELECT * FROM usuarios WHERE nome = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                return "Usuario não encontrado";
            } else {

                return "Nome: " . $result['nome'] . "\nE-mail: " . $result['email'] . "\nCargo: " . $result['tipo_usuario'];
            }

        } catch (PDOException $e) {
            echo "Erro ao buscar no banco de dados! " . $e->getMessage();
        } finally {
            $banco->closeConnection();
        }
        return "conexão fechada!";

    }


    public function deletarUsuarioPorNome($nome){

        try {
            $banco = new Database();
            $pdo = $banco->getConnection();
            $sql = "DELETE FROM usuarios WHERE nome = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->execute();
            echo "Usuario deletado com sucesso";
        } catch (PDOException $e) {
            echo "Erro ao deletar no banco de dados" . $e->getMessage();
        } finally {
            $banco->closeConnection();
        }

    }

}
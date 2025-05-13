<?php

namespace models;
require_once __DIR__ . '/UsuarioModel.php';
require_once __DIR__ . '/../core/Database.php';

class GerenteModel extends UsuarioModel
{
    public static function salvarGerente($dados) {
        try {
            $db = new \Database();
            $pdo = $db->connect();

            $sql = "INSERT INTO usuarios (nome, telefone, email, cargo, regiao_atuacao, salario, senha)
                    VALUES (:nome, :telefone, :email, :cargo, :regiao, :salario, :senha)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':telefone', $dados['telefone']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':cargo', $dados['cargo']);
            $stmt->bindParam(':regiao', $dados['regiao']);
            $stmt->bindParam(':salario', $dados['salario']);
            $stmt->bindParam(':senha', $dados['senha']);

            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erro ao salvar usuário: " . $e->getMessage());
        }
    }
}
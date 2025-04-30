<?php

namespace models;

class GerenteModel extends UsuarioModel
{
    public function salvarVendedor() {
        $sql = "INSERT INTO usuarios (nome, email, senha, tipo, regiao_atuacao, telefone, cargo, salario)
            VALUES (:nome, :email, :senha, :tipo, :regiaoAtuacao, :telefone, :cargo, :salario)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':regiaoAtuacao', $this->regiaoAtuacao);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':cargo', $this->cargo);
        $stmt->bindParam(':salario', $this->salario);

        return $stmt->execute();
    }




}
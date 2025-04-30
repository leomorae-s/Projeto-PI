<?php

namespace models;

class VendedorModel extends UsuarioModel
{
    private $regiaoAtuacao;
    private $telefone;
    private $cargo;
    private $salario;

    private $pdo;
    private $banco;

    /**
     * @param $regiaoAtuacao
     * @param $telefone
     * @param $cargo
     * @param $salario
     */
    public function __construct($nome,$email, $senha, $tipo, $regiaoAtuacao, $telefone, $cargo, $salario)
    {
        parent::__construct($nome, $email, $senha, $tipo);
        $this->regiaoAtuacao = $regiaoAtuacao;
        $this->telefone = $telefone;
        $this->cargo = $cargo;
        $this->salario = $salario;
        $this->banco = new \Database();
        $this->pdo = $this->banco->getConnection();
    }

    public function registrarVenda($empresa, $descricao, $vendedor, $data, $produto, $quantidade, $valor)
    {
        try {
            $total = $valor * $quantidade;

            $sql = "INSERT INTO movimentacoes (empresa, descricao, vendedor, data, produto, quantidade, valor, total)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $empresa,
                $descricao,
                $vendedor,
                $data,
                $produto,
                $quantidade,
                $valor,
                $total
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new PDOException("Erro ao registrar venda: " . $e->getMessage());
        } finally {
            $this->banco->closeConnection();
        }
    }

    public function registrarDespesas($categoria, $subCategoria, $valor, $data) {
        try {

            $sql = "INSERT INTO despesas (categoria, subCategoria, valor, data)
                VALUES (?, ?, ?, ?)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $categoria,
                $subCategoria,
                $valor,
                $data,
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new PDOException("Erro ao registrar venda: " . $e->getMessage());
        } finally {
            $this->banco->closeConnection();
        }
    }
}
<?php
require_once 'core/Database.php';

class FinanceiroModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->connect();
    }

    public function listar()
    {
        $stmt = $this->pdo->query("SELECT * FROM financeiro ORDER BY data_lancamento DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inserir($tipo, $descricao, $valor, $data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO financeiro (tipo, descricao, valor, data_lancamento)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->execute([$tipo, $descricao, $valor, $data]);
    }

    public function totalPorTipo()
    {
        $stmt = $this->pdo->query("
            SELECT tipo, SUM(valor) AS total
            FROM financeiro
            GROUP BY tipo
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

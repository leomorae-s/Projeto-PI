<?php
require_once 'core/Database.php';

class VendaModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->connect();
    }

    public function salvar($usuarioId, $itens)
    {
        $this->pdo->beginTransaction();

        $total = 0;
        foreach ($itens as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }

        $stmt = $this->pdo->prepare("INSERT INTO vendas (usuario_id, total) VALUES (?, ?)");
        $stmt->execute([$usuarioId, $total]);
        $vendaId = $this->pdo->lastInsertId();

        foreach ($itens as $item) {
            $stmt = $this->pdo->prepare("
                INSERT INTO itens_venda (venda_id, produto_id, quantidade, preco_unitario)
                VALUES (?, ?, ?, ?)
            ");
            $stmt->execute([$vendaId, $item['produto_id'], $item['quantidade'], $item['preco']]);
        }

        $this->pdo->commit();
    }

    public function listar()
    {
        $stmt = $this->pdo->query("
            SELECT v.*, u.nome AS vendedor
            FROM vendas v
            JOIN usuarios u ON v.usuario_id = u.id
            ORDER BY v.data DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

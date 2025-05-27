<?php

require_once __DIR__ . '/../models/VendaModel.php';
require_once  __DIR__ . '/../models/ProdutoModel.php';

class VendaController
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: /login');
            exit;
        }

        //$vendaModel = new VendaModel();
        //$vendas = $vendaModel->listar();

        require_once __DIR__ . '/../views/vendas.php';
    }

    public function nova()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: /login');
            exit;
        }

        //$produtoModel = new ProdutoModel();
        //$produtos = $produtoModel->listar();

        require_once __DIR__ . '/../views/cadastroVendas.php';
    }

    public function salvar()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: /login');
            exit;
        }

        $itens = [];

        foreach ($_POST['produto_id'] as $index => $produtoId) {
            $itens[] = [
                'produto_id' => $produtoId,
                'quantidade' => $_POST['quantidade'][$index],
                'preco' => $_POST['preco'][$index]
            ];
        }

        $vendaModel = new VendaModel();
        $vendaModel->salvar($_SESSION['usuario']['id'], $itens);

        header('Location: /vendas');
    }

    public function postVenda()
    {
        $db = new \Database();
        $pdo = $db->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empresa_id = $_POST['empresa_id'];
            $vendedor_id = $_POST['vendedor_id'];
            $produto_id = $_POST['produto_id'];
            $descricao = $_POST['descricao'];
            $data = $_POST['data'];
            $quantidade = $_POST['quantidade'];
            $valor_unitario = $_POST['valor'];
            $total = $_POST['total'];

            try {
                $sql = "INSERT INTO vendas 
                (empresa_id, vendedor_id, produto_id, descricao, data, quantidade, valor_unitario, total) 
                VALUES (:empresa_id, :vendedor_id, :produto_id, :descricao, :data, :quantidade, :valor_unitario, :total)";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':empresa_id' => $empresa_id,
                    ':vendedor_id' => $vendedor_id,
                    ':produto_id' => $produto_id,
                    ':descricao' => $descricao,
                    ':data' => $data,
                    ':quantidade' => $quantidade,
                    ':valor_unitario' => $valor_unitario,
                    ':total' => $total
                ]);

                header("Location: /vendas");
                exit;
            } catch (PDOException $e) {
                echo "Erro ao cadastrar venda: " . $e->getMessage();
            }
        }
    }

}

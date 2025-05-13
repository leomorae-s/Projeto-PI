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

        $vendaModel = new VendaModel();
        $vendas = $vendaModel->listar();

        require 'app/views/vendas/index.php';
    }

    public function nova()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: /login');
            exit;
        }

        $produtoModel = new ProdutoModel();
        $produtos = $produtoModel->listar();

        require 'app/views/vendas/nova.php';
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
}

<?php

require_once 'models/FinanceiroModel.php';

class FinanceiroController
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: /login');
            exit;
        }

        $model = new FinanceiroModel();
        $lancamentos = $model->listar();
        $totais = $model->totalPorTipo();

        require 'app/views/financeiro/index.php';
    }

    public function novo()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: /login');
            exit;
        }

        require 'app/views/financeiro/novo.php';
    }

    public function salvar()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: /login');
            exit;
        }

        $tipo = $_POST['tipo'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $data = $_POST['data'];

        $model = new FinanceiroModel();
        $model->inserir($tipo, $descricao, $valor, $data);

        header('Location: /financeiro');
    }
}

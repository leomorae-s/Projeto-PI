<?php

require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/VendaController.php';
require_once '../app/controllers/FinanceiroController.php';
require_once '../app/controllers/DespesasController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

switch ($uri) {
    case '/':
        if($method === 'GET') {
            (new AuthController())->showInicio();
        }
        break;
    case '/register':
        if($method === 'GET'){
            (new AuthController())->showRegister();
        } elseif ($method === 'POST') {
            (new AuthController())->register();
        }
        break;
    case '/login':
        if ($method === 'GET') {
            (new AuthController())->showLogin();
        } elseif ($method === 'POST') {
            (new AuthController())->login();
        }
        break;

    case '/logout':
        (new AuthController())->logout();
        break;

    case '/dashboard':
        require '../app/views/dashboard/index.php';
        break;

    case '/vendas':
        (new VendaController())->index();
        break;

    case '/vendas/nova':
        (new VendaController())->nova();
        break;

    case '/vendas/salvar':
        if ($method === 'POST') {
            (new VendaController())->salvar();
        }
        break;


    case '/financeiro':
        (new FinanceiroController())->index();
        break;

    case '/financeiro/novo':
        (new FinanceiroController())->novo();
        break;

    case '/financeiro/salvar':
        if ($method === 'POST') {
            (new FinanceiroController())->salvar();
        }
        break;
    case '/funcionario':
        if($method === 'GET') {
            (new AuthController())->showCadastroFuncionario();
        } elseif ($method === 'POST') {
            (new AuthController())->salvarFuncionario();
        }
        break;
    case '/despesas':
        if($method === 'GET') {
            (new \controllers\DespesasController())->showDespesas();
        } elseif($method === 'POST'){
            (new \controllers\DespesasController())->despesasForm();
        }
        break;

    case '/verFuncionarios':
        if($method === 'GET') {
            (new AuthController())->showFuncionario();
        }
        break;


    default:
        http_response_code(404);
        echo "Página não encontrada.";
}

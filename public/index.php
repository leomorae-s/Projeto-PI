<?php

require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/VendaController.php';
require_once '../app/controllers/FinanceiroController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

switch ($uri) {
    case '/':
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

    default:
        http_response_code(404);
        echo "Página não encontrada.";
}

<?php
session_start();
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/VendaController.php';
require_once '../app/controllers/FinanceiroController.php';
require_once '../app/controllers/DespesasController.php';
require_once '../app/controllers/ClienteController.php';
require_once '../app/controllers/UsuarioController.php';
require_once '../app/controllers/ProdutoController.php';

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
        if($method === 'GET') {
            (new VendaController())->nova();
        } elseif ($method === 'POST') {
            (new VendaController())->postVenda();
        }

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

    case '/despesas/visualizar':
        if($method === 'GET') {
            (new \controllers\DespesasController())->visuDespesas();
        }
        break;

    case '/despesas/editar':
        if($method === 'GET') {
            (new \controllers\DespesasController())->editarDespesa();
        } elseif ($method === 'POST') {
            (new \controllers\DespesasController())->postDespesa();
        }
        break;

    case '/verFuncionarios':
        if($method === 'GET') {
            (new AuthController())->showFuncionario();
        } elseif($method === 'POST'){
            (new AuthController())->salvarFuncionario();
        }
        break;
    case '/cliente':
        if($method === 'GET') {
            (new controllers\ClienteController())->index();
        }
        break;

    case '/empresas/editar':
        if($method === 'GET') {
            (new controllers\ClienteController())->edit();
        } elseif ($method === 'POST') {
            (new controllers\ClienteController())->postEmpresas();
        }
        break;

    case '/funcionario/editar':
        if($method === 'GET') {
            (new controllers\UsuarioController())->editUsuario();
        } elseif ($method === 'POST') {
            (new controllers\UsuarioController())->postUsuario();
        }
        break;

    case '/produtos':
        if($method === 'GET') {
            (new controllers\ProdutoController())->listar();
        }
        break;

    case '/cadastroProdutos':
        if($method === 'GET') {
            (new controllers\ProdutoController())->produtoForm();
        }elseif($method === 'POST') {
            (new controllers\ProdutoController())->create();
        }
        break;

    case '/produtos/edit':
        if($method === 'GET') {
            (new controllers\ProdutoController())->produtoEdit();
        }elseif($method === 'POST') {
            (new controllers\ProdutoController())->postProduto();
        }
        break;

    case '/controlerFinanceiro':
        if($method === 'GET') {
            (new FinanceiroController())->index();
        }
        break;


    default:
        http_response_code(404);
        echo "Página não encontrada.";
}

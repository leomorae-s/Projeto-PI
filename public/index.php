<?php
require_once '../routes/Routes.php';
require_once '../app/controllers/UsuarioController.php';
require_once __DIR__ . "/../app/config/database.php";

// Iniciar a conexão
try {
    $database = new Database();
} catch (PDOException $e) {
    var_dump($e->getMessage());
}

// Inicia o roteador
$router = new \routes\Routes();

// Define as rotas
$router->add('GET','/', [\controllers\UsuarioController::class, 'index']);
$router->add('GET','/login', [\controllers\UsuarioController::class, 'login']);
$router->add('POST','/login/store', [\controllers\UsuarioController::class, 'authenticate']);
//$router->add('/usuario/{id}', [UserController::class, 'show']);

// Roda o roteador com a URL atual
$router->dispatch($_SERVER['REQUEST_URI']);

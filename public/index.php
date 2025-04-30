<?php
session_start();
require_once '../routes/Routes.php';
require_once '../app/controllers/UsuarioController.php';
require_once '../app/controllers/VendaController.php';
require_once __DIR__ . "/../app/config/database.php";

try {
    $database = new Database();
} catch (PDOException $e) {
    var_dump($e->getMessage());
}

$router = new \routes\Routes();

$router->add('GET','/', [\controllers\UsuarioController::class, 'index']);
$router->add('GET','/login', [\controllers\UsuarioController::class, 'login']);
$router->add('POST','/login/store', [\controllers\UsuarioController::class, 'authenticate']);
$router->add('GET','/vendas', [\controllers\VendaController::class, 'index']);
//$router->add('/usuario/{id}', [UserController::class, 'show']);

$router->dispatch($_SERVER['REQUEST_URI']);

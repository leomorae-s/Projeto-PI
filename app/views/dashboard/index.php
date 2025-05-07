<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: /login');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Painel</title>
    </head>
    <body>
        <h2>Bem-vindo, <?= htmlspecialchars($_SESSION['usuario']['nome']) ?></h2>
        <p>Tipo: <?= $_SESSION['usuario']['tipo'] ?></p>
        <a href="/logout">Sair</a>
    </body>
</html>

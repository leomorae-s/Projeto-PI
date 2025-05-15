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
    <style>
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #000;
            text-decoration: none;
            font-size: 16px;
            transition: background 0.2s;
        }

        .sidebar a:hover {
            background-color: #27ae60;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            color: white;
            cursor: pointer;
            z-index: 1001;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
        }
    </style>
    <body>
        <h2>Bem-vindo, <?= htmlspecialchars($_SESSION['usuario']['nome']) ?></h2>
        <p>Tipo: <?= $_SESSION['usuario']['tipo'] ?></p>
        <a href="/logout">Sair</a>

        <div id="sidebar" class="sidebar">
            <span class="close-btn" onclick="toggleMenu()">&times;</span>
            <a href="financeiro.html"><span>📊</span>Controle Financeiro</a>
            <a href="/despesas"><span>💸</span>Despesas</a>
            <a href="/vendas"><span>💰</span>Vendas</a>
            <a href="produtos.html"><span>📦</span>Produtos</a>
            <a href="clientes.html"><span>👥</span>Clientes</a>
            <a href="/verFuncionarios"><span>🧑‍💼</span>Funcionários</a>
        </div>
    </body>
</html>





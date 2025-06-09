<?php

use controllers\ProdutoController;

require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/ProdutoController.php';

$empresas = AuthController::listarEmpresas();
$usuarios = AuthController::listarUsuarios();
$produtos = ProdutoController::options();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>FinTrack - Cadastrar Venda</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <style>
        /* Seu CSS permanece igual */
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #fff;
    }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
            background-color: #18B95A;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 1001; 
        }

        .menu {
            display: flex;
            align-items: center;
        }
        .logo{
            font-size:20px;
            padding-left:5px;
        }

        .logout-btn {
            background: white;
            color: #27ae60;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
        }

        main {
            display: flex;
            justify-content: center;
            padding: 2rem;
        }

        .form-container {
            background-color: #fff;
            border-radius: 12px;
            padding: 2rem;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .form-container h2 {
            text-align: center;
            color: #27ae60;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        label {
            display: block;
            margin-bottom: 0.3rem;
            font-weight: 600;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
        }

        .form-row {
            display: flex;
            gap: 1rem;
        }

        .form-row > .form-group {
            flex: 1;
        }

        .btn-row {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn.cancel {
            background-color: #e0e0e0;
            color: #000;
            text-decoration:none;
            width: 100%;
            margin-right:20px;
            text-align:center;
        }
        .btn.cancel:hover{
            background-color:rgb(179, 179, 179);
        }

        .btn.submit {
            background-color: #2ecc71;
            color: white;
            width: 100%;
        }
        
        .btn.submit:hover{
            background-color: #27ae60;
        }

        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
            }

            .btn-row {
                flex-direction: column;
                gap: 1rem;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
  <header>
    <div class="menu">
      <span class="material-symbols-outlined">clock_loader_60</span>
      <span class="logo">Fin track</span>
    </div>
    <button class="logout-btn">Logout</button>
  </header>
  <?php require_once __DIR__ . '/dashboard/sidebar.php'?>
<main>
    <div class="form-container">
        <h2>Venda</h2>
        <form method="POST">
            <div class="form-group">
                <label for="empresa">Empresa Cliente</label>
                <select id="empresa" name="empresa_id">
                    <option value="">Selecione</option>
                    <?php foreach ($empresas as $linha): ?>
                        <option value="<?php echo $linha['id']; ?>"><?php echo $linha['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" placeholder="Descrição da venda" />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="vendedor">Vendedor</label>
                    <select id="vendedor" name="vendedor_id">
                        <option value="">Selecione</option>
                        <?php foreach ($usuarios as $linha): ?>
                            <option value="<?php echo $linha['id']; ?>"><?php echo $linha['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="data">Data</label>
                    <input type="date" id="data" name="data" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="produto">Produto</label>
                    <select id="produto" name="produto_id">
                        <option value="">Selecione</option>
                        <?php foreach ($produtos as $linha): ?>
                            <option value="<?php echo $linha['id']; ?>"><?php echo $linha['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <select id="quantidade" name="quantidade">
                        <option value="">Selecione</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input type="number" step="0.01" id="valor" name="valor" placeholder="R$ 0,00"/>
                </div>
                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="number" step="0.01" id="total" name="total" placeholder="R$ 0,00" />
                </div>
            </div>

            <div class="btn-row">
                <a href="/vendas" type="button" class="btn cancel">Voltar</a>
                <button type="submit" class="btn submit">Adicionar</button>
            </div>
        </form>
    </div>
</main>
</body>
</html>

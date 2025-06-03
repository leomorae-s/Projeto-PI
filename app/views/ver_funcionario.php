<?php
    require_once __DIR__ . '/../models/GerenteModel.php';
    $funcionarios = \models\GerenteModel::listarGerentes();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Funcionário</title>
  <link rel="stylesheet" href="../css/ver_funcionario.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f9f9f9;
            color: #333;
        }

        .container {
            padding: 30px;
            margin-left: 250px; /* Adiciona espaço da sidebar */
        }

        .topbar{
            background: #18B95A;
            display: flex;
            color: white;
            justify-content: space-between;
            padding: 10px 20px;
            align-items: center;
        }
        .menu-logo{
            display: flex;
            align-items: center;
            gap: 40px;
        }


        .logout {
            background: #338153;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .container {
            padding: 30px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            align-items: center;
        }

        .buscar {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .buscar input {
            height: 30px;
            padding: 6px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-buscar {
            height: 30px;
            padding: 6px 10px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-cadastrar {
            background: #27ae60;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-cadastrar a{
            text-decoration: none;
            color: white;
        }

        .tabela {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .tabela th,
        .tabela td {
            padding: 12px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        .btn-edit {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }


        .material-symbols-outlined {
            font-variation-settings:
                    'FILL' 0,
                    'wght' 300,
                    'GRAD' 0,
                    'opsz' 20
        }

    </style>

</head>

<body>
  <header class="topbar">
    <div class="menu-logo">
      <span class="material-symbols-outlined">menu</span>
      <span class="logo">Fin track</span>
    </div>
    <button class="logout">Logout</button>
  </header>

  <?php require_once __DIR__ . '/dashboard/sidebar.php'?>

  <main class="container">
    <h2>Funcionários</h2>

    <div class="actions">
      <div class="buscar">
        <input type="text" placeholder="Buscar..." />
        <button class="btn-buscar"><span class="material-symbols-outlined" style="font-size: 18px;">search</span>
        </button>
      </div>
        <a href="/funcionario" class="btn-cadastrar">Cadastrar</a>

    </div>

    <table class="tabela">
      <thead>
        <tr>
          <th>Funcionários</th>
            <th>Tipo</th>
          <th>Editar</th>
        </tr>
      </thead>
        <tbody>
        <?php foreach ($funcionarios as $linha): ?>
            <tr>
                <td><?php echo htmlspecialchars($linha['nome']); ?></td>
                <td><?php echo htmlspecialchars($linha['cargo']); ?></td>
                <td>
                    <a href="/funcionario/editar?id=<?= $linha['id'] ?>">Editar Funcionario</a>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
  </main>
</body>
</html>

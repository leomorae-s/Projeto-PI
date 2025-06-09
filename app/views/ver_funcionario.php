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


        .logout-btn {
            background: #338153;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
        }
        .container h2 {
            margin-bottom: 1.5rem;
        }

        .menu {
            display: flex;
            align-items: center;
        }
        .logo{
            font-size:20px;
            padding-left:5px;
        }

        .cadastrar {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s;
            text-decoration:none;
            font-size:14px;
            }

        .cadastrar:hover {
            background-color: #27ae60;
            }
        .search-input {
            padding: 0.5rem 0.50rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
            }
        .controls {
            gap: 13rem;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
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
        .container {
            padding: 30px;
        }
        .controls {
            gap: 13rem;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            }
        .container {
            margin-left: 220px; /* igual à largura da sidebar */
            padding: 110px 20px 20px 50px; /* top > header height */
            min-height: calc(100vh - 60px);
        }
        td a span{
            color:rgb(22, 22, 22);
            padding-left:10px;
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

  <main class="container">
    <h2>Funcionários</h2>
      <div class="controls">
        <input type="text" placeholder="Buscar..." class="search-input"/>
        <a href="/funcionario" class="cadastrar">Cadastrar</a>
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
                    <a href="/funcionario/editar?id=<?= $linha['id'] ?>"><span class="material-symbols-outlined">edit_square</span></a>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
  </main>
</body>
</html>

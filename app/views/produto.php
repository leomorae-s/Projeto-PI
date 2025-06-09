<?php
    $db = new Database();
    $pdo = $db->connect();

    $sql = "SELECT * FROM produtos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FinTrack - Produtos</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
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


    .container {
        margin-left: 220px; /* igual à largura da sidebar */
        padding: 110px 20px 20px 50px; /* top > header height */
        min-height: calc(100vh - 60px);
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


    .logout-btn {
      background: #338153;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 20px;
      cursor: pointer;
      font-weight: 600;
    }
    .search-add {
      display: flex;
      gap: 10px;
      align-items: center;
    }

    .sidebar {
        position: fixed;
        top: 60px; /* para não ficar embaixo do header */
        left: 0;
        width: 220px;
        height: calc(100vh - 60px); /* altura da tela menos a altura do header */
        background-color:rgb(4, 17, 31);
        padding-top: 20px;
        color: white;
        z-index: 1000; /* menor que o header */
        overflow-y: auto; /* para caso o conteúdo ultrapasse o tamanho */
    }

    .edit-icon {
      cursor: pointer;
      font-size: 16px;
    }
    .controls {
      gap: 13rem;
      align-items: center;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
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
    table {
      width: 97%;
      border-collapse: collapse;
      margin-left:20px;
    }
    th, td {
      padding: 0.8rem 2rem;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      font-weight: bold;
      color: #444;
    }

    td i {
      color: #333;
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
      <h2>Produtos</h2>
      <div class="controls">
        <input type="text" placeholder="Buscar..." class="search-input" />
        <a href="/cadastroProdutos" class="cadastrar">Cadastrar</a>
      </div>

    <table>
      <thead>
        <tr>
          <th>Produto</th>
          <th>Categoria</th>
          <th>Editar</th>
        </tr>
      </thead>
        <tbody>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= htmlspecialchars($produto['nome']) ?></td>
                <td><?= htmlspecialchars($produto['categoria']) ?></td>
                <td>
                    <a href="/produtos/edit?id=<?= $produto['id'] ?>"><span class="material-symbols-outlined">edit_square</span></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
  </main>

</body>
</html>

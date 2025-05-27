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
        background-color: #34495e;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        z-index: 1001; /* maior que a sidebar */
    }


    .container {
        margin-left: 220px; /* igual à largura da sidebar */
        padding: 80px 20px 20px 20px; /* top > header height */
        background-color: #f4f4f4;
        min-height: calc(100vh - 60px);
    }

    .menu {
      display: flex;
      align-items: center;
    }

    .menu-icon {
      font-size: 24px;
      margin-right: 10px;
      cursor: pointer;
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

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .top-bar h2 {
      font-size: 20px;
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
        background-color: #2c3e50;
        padding-top: 20px;
        color: white;
        z-index: 1000; /* menor que o header */
        overflow-y: auto; /* para caso o conteúdo ultrapasse o tamanho */
    }

    .search-box {
      padding: 6px 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .add-btn {
      background-color: #28a745;
      color: white;
      border: none;
      padding: 6px 14px;
      border-radius: 5px;
      cursor: pointer;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      text-align: left;
      padding: 12px;
    }

    th {
      color: #333;
      font-weight: normal;
    }

    tr {
      border-bottom: 1px solid #ddd;
    }

    .edit-icon {
      cursor: pointer;
      font-size: 16px;
    }
  </style>
</head>
<body>

  <header>
    <div class="menu">
      <span class="menu-icon">&#9776;</span>
      <span>Fin track</span>
    </div>
    <button class="logout-btn">Logout</button>
  </header>

  <?php require_once __DIR__ . '/dashboard/sidebar.php'?>

  <main class="container">
    <div class="top-bar">
      <h2>Produtos</h2>
      <div class="search-add">
        <input type="text" placeholder="Pesquisar..." class="search-box" />
        <a href="/cadastroProdutos" class="add-btn">Cadastrar</a>
      </div>
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
                    <a href="/produtos/edit?id=<?= $produto['id'] ?>">Editar Produto</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
  </main>

</body>
</html>

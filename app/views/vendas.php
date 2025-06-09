<?php
    require_once __DIR__ . '/../core/Database.php';

    $db = new \Database();
    $pdo = $db->connect();

    // Buscar todos os vendedor_id distintos
    $sqlVendedores = "SELECT DISTINCT vendedor_id FROM vendas WHERE vendedor_id IS NOT NULL AND vendedor_id != ''";
    $stmtVendedores = $pdo->prepare($sqlVendedores);
    $stmtVendedores->execute();
    $vendedores_ids = $stmtVendedores->fetchAll(PDO::FETCH_COLUMN);

    // Buscar todos os produto_id distintos
    $sqlProdutos = "SELECT DISTINCT produto_id FROM vendas WHERE produto_id IS NOT NULL AND produto_id != ''";
    $stmtProdutos = $pdo->prepare($sqlProdutos);
    $stmtProdutos->execute();
    $produtos_ids = $stmtProdutos->fetchAll(PDO::FETCH_COLUMN);

    // Buscar nomes dos vendedores
    $vendedores = [];
    if ($vendedores_ids) {
        $placeholdersV = implode(',', array_fill(0, count($vendedores_ids), '?'));
        $sqlNomesVendedores = "SELECT id, nome FROM usuarios WHERE id IN ($placeholdersV)";
        $stmtNomesVendedores = $pdo->prepare($sqlNomesVendedores);
        $stmtNomesVendedores->execute($vendedores_ids);
        $vendedores = $stmtNomesVendedores->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar nomes dos produtos
    $produtos = [];
    if ($produtos_ids) {
        $placeholdersP = implode(',', array_fill(0, count($produtos_ids), '?'));
        $sqlNomesProdutos = "SELECT id, nome FROM produtos WHERE id IN ($placeholdersP)";
        $stmtNomesProdutos = $pdo->prepare($sqlNomesProdutos);
        $stmtNomesProdutos->execute($produtos_ids);
        $produtos = $stmtNomesProdutos->fetchAll(PDO::FETCH_ASSOC);
    }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FinTrack - Vendas</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
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

    /* Sidebar */
    .sidebar {
        position: fixed;
        top: 60px; /* altura do header */
        left: 0;
        width: 220px; /* mesma largura usada no margin-left do main */
        height: calc(100vh - 60px); /* para não cobrir o header */
        background-color: #2c3e50;
        padding-top: 20px;
        z-index: 1000;
        color: white;
    }

    /* Conteúdo */
    .main-content {
        margin-left: 220px;
        padding: 80px 20px 20px 20px; /* top 80px por causa do header */
        background-color: #f4f4f4;
        min-height: calc(100vh - 60px);
    }


    .menu-icon {
      font-size: 1.7rem;
      cursor: pointer;
      margin-right: 1rem;
    }

    .logo {
      font-weight: 700;
      font-size: 1.4rem;
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


    main {
        margin-left: 220px; /* empurra o conteúdo pra direita, evitando ficar atrás da sidebar */
        padding: 80px 20px 20px 20px; /* padding-top > header para não ficar atrás */
        background-color: #f4f4f4;
        min-height: calc(100vh - 60px);
    }

    .top-info {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      margin-bottom: 2rem;
    }

    .top-info h2 {
      font-weight: 700;
      color: #27ae60;
      font-size: 1.3rem;
    }

    .add-btn {
      background: #27ae60;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 10px;
      cursor: pointer;
      margin-top: 0.5rem;
    }

    .search-bar {
      margin-bottom: 1rem;
    }

    .search-bar input {
      padding: 0.5rem 0.8rem;
      border: 1px solid #ccc;
      border-radius: 10px;
      width: 250px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #ecf9f1;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    th, td {
      padding: 1rem;
      text-align: left;
    }

    th {
      background-color: #d5f5e3;
      color: #239b56;
      font-weight: 600;
    }

    tr:not(:last-child) {
      border-bottom: 1px solid #c8e6c9;
    }

    .comprovante-btn {
      background: #27ae60;
      color: white;
      border: none;
      padding: 0.4rem 0.8rem;
      border-radius: 8px;
      cursor: pointer;
      font-size: 0.85rem;
    }

    .remove-btn {
      background: transparent;
      color: #e74c3c;
      border: none;
      font-size: 1.2rem;
      cursor: pointer;
    }

    .empty-msg {
      text-align: center;
      padding: 2rem;
      color: #999;
    }

    @media (max-width: 768px) {
      .top-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
      }

      .search-bar input {
        width: 100%;
      }

      .add-btn {
        width: 100%;
      }
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

  <main>
    <div class="top-info">
      <h2>Registro de Vendas</h2>
        <a href="/vendas/nova" class="add-btn">Cadastrar Venda</a>
    </div>

    <div class="search-bar">
      <input type="text" placeholder="Buscar por vendedor..." />
    </div>

    <table>
      <thead>
        <tr>
          <th>Vendedor</th>
            <th>Produto</th>
        </tr>
      </thead>
        <tbody>
        <?php foreach ($vendedores as $vendedor): ?>
            <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?php echo htmlspecialchars($vendedor['nome']); ?></td>
                <td><?php echo htmlspecialchars($produto['nome']); ?></td>
            </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
  </main>
</body>
</html>

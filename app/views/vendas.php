<?php
    require_once __DIR__ . '/../core/Database.php';

    $db = new \Database();
    $pdo = $db->connect();

    // Buscar todos os vendedor_id distintos
$sql = "SELECT
            u.nome AS nome_vendedor,
            p.nome AS nome_produto
        FROM
            vendas v
        JOIN
            usuarios u ON v.vendedor_id = u.id
        JOIN
            produtos p ON v.produto_id = p.id
        WHERE
            v.vendedor_id IS NOT NULL AND v.vendedor_id != ''
            AND v.produto_id IS NOT NULL AND v.produto_id != ''";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$vendas_detalhadas = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
      <span class="material-symbols-outlined">clock_loader_60</span>
      <span class="logo">Fin track</span>
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
      <input type="text" placeholder="Buscar por vendedor..." class="search-input" onkeyup="filtrarEmpresas()"/>
    </div>

    <table class="tabela-categorias" id="tabela-categorias">
      <thead>
        <tr>
          <th>Vendedor</th>
            <th>Produto</th>
        </tr>
      </thead>
        <tbody>
        <?php foreach ($vendas_detalhadas as $venda): ?>
            <tr>
                <td><?php echo htmlspecialchars($venda['nome_vendedor']); ?></td>
                <td><?php echo htmlspecialchars($venda['nome_produto']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
  </main>
  <script>
    function filtrarEmpresas() {
      const filtro = document.querySelector(".search-input").value.toLowerCase();
      const linhas = document.querySelectorAll("#tabela-categorias tr");
  
      linhas.forEach((linha) => {
        const nomeEmpresa = linha.children[0].textContent.toLowerCase();
        linha.style.display = nomeEmpresa.includes(filtro) ? "" : "none";
      });
    }
  </script>
</body>
</html>

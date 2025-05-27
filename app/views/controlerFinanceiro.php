<?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        // Se não está logado, redireciona
        header('Location: /login');
        exit;
    }

    // Dados do usuário logado
    $salario=$_SESSION['usuario']['salario'];
    $vendedorId = $_SESSION['usuario']['id'];

    $db = new \Database();
    $pdo = $db->connect();

    $stmt = $pdo->prepare("SELECT SUM(total) AS total_vendas FROM vendas WHERE vendedor_id = ?");
    $stmt->execute([$vendedorId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("SELECT COUNT(*) AS quantidade_vendas FROM vendas WHERE vendedor_id = ?");
    $stmt->execute([$vendedorId]);
    $vendas = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("SELECT descricao, data, quantidade, total FROM vendas ORDER BY data DESC LIMIT 5");
    $stmt->execute();
    $acoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $totalVendas = $result['total_vendas'] ?? 0;

    $lucroTotal = $totalVendas + $salario;
    $lucroTotalFormatado = number_format($lucroTotal, 2, ',', '.');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FinTrack - Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
    }

    body {
      background: #ffffff;
      color: #1e8449;
    }

    /* Header fixo no topo */
    header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 60px;
        background-color: #1e8449;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        z-index: 1001; /* maior que a sidebar */
    }

    header .logo {
        font-size: 24px;
        font-weight: bold;
    }

    header .logout-btn {
        background-color: #4ec681;
        border: none;
        padding: 8px 16px;
        color: white;
        border-radius: 4px;
        cursor: pointer;
    }

    header .menu-icon {
        cursor: pointer;
        font-size: 24px;
        margin-right: 10px;
    }

    /* Sidebar */
    .sidebar {
        position: fixed;
        top: 60px; /* abaixo do header */
        left: 0;
        width: 220px;
        height: calc(100vh - 60px); /* ajusta pra não passar do header */
        background-color: #1e8449;
        padding-top: 20px;
        z-index: 1000;
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
      background: white;
      color: #27ae60;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 20px;
      cursor: pointer;
      font-weight: 600;
    }

    main {
      padding: 2rem;
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

    .filter-btn {
      background: #27ae60;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 10px;
      cursor: pointer;
      margin-top: 0.5rem;
    }

    .stats-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .card {
      background: #ecf9f1;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      padding: 1rem;
    }

    .card h3 {
      font-size: 1rem;
      color: #1e8449;
    }

    .card p {
      font-size: 1.4rem;
      font-weight: bold;
      color: #145a32;
    }

    .charts-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
    }

    .chart-box {
      background: #ecf9f1;
      border-radius: 12px;
      padding: 1rem;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      height: 250px;
    }

    .chart-box h4 {
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: #27ae60;
      font-size: 1rem;
    }

    canvas {
      max-height: 160px;
    }

    .extra-elements {
      margin-top: 3rem;
      background: #d5f5e3;
      padding: 1rem;
      border-radius: 12px;
    }

    .extra-elements h3 {
      margin-bottom: 0.5rem;
      color: #239b56;
    }

    .extra-elements ul {
      list-style: disc;
      margin-left: 1.5rem;
      color: #1e8449;
    }

    @media (max-width: 768px) {
      main {
        padding: 1rem;
      }

      header {
        flex-direction: row;
        justify-content: space-between;
        padding: 1rem;
      }

      .top-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
      }

      .top-info h2 {
        font-size: 1.1rem;
      }

      .filter-btn {
        width: 100%;
      }

      .chart-box {
        height: auto;
      }

      canvas {
        max-height: 200px;
      }

      .logout-btn {
        padding: 0.4rem 0.8rem;
      }
    }

    @media (max-width: 480px) {
      header {
        flex-direction: column;
        align-items: flex-start;
      }

      .logo {
        font-size: 1.2rem;
        margin-top: 0.5rem;
      }

      .menu-icon {
        font-size: 1.5rem;
      }

      .logout-btn {
        margin-top: 0.5rem;
        align-self: flex-end;
      }

      .filter-btn {
        width: 100%;
      }

      .card p {
        font-size: 1.2rem;
      }

      .charts-grid {
        gap: 1rem;
      }

      .chart-box {
        padding: 0.75rem;
      }
    }
  </style>
</head>
<body>
  <header>
    <div style="display: flex; align-items: center;">
      <div class="menu-icon">&#9776;</div>
      <div class="logo">FinTrack</div>
    </div>
    <button class="logout-btn">Logout</button>
  </header>

  <?php require_once __DIR__ . '/dashboard/sidebar.php'; ?>

  <main class="main-content">
      <div class="top-info">
          <h2>Controle Financeiro - Vendas</h2>
      </div>

      <div class="stats-cards">
          <div class="card">
              <h3>Total Vendas</h3>
              <p><?php echo number_format($totalVendas, 2, ',', '.'); ?></p>
          </div>
          <div class="card">
              <h3>Quantidade de Vendas</h3>
              <p><?php echo $vendas['quantidade_vendas'] ?></p>
          </div>
          <div class="card">
              <h3>Salário</h3>
              <p><?php echo $salario ?></p>
          </div>
          <div class="card">
              <h3>Total de Lucro</h3>
              <p><?php echo $lucroTotalFormatado?></p>
          </div>
      </div>

      <div class="extra-elements">
          <h3>Vendas Recentes</h3>
          <ul>
              <?php foreach ($acoes as $venda): ?>
                  <li>
                      <?= htmlspecialchars($venda['descricao']) ?> -
                      <?= date('d/m/Y', strtotime($venda['data'])) ?> -
                      Quantidade: <?= $venda['quantidade'] ?> -
                      Total: R$ <?= number_format($venda['total'], 2, ',', '.') ?>
                  </li>
              <?php endforeach; ?>
          </ul>
      </div>
  </main>

</body>
</html>

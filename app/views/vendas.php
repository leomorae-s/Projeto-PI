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
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
    }

    body {
      background: #ffffff;
      color: #1e8449;
    }

    header {
      background: #27ae60;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 1.5rem;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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
    <div style="display: flex; align-items: center;">
      <div class="menu-icon">&#9776;</div>
      <div class="logo">FinTrack</div>
    </div>
    <button class="logout-btn">Logout</button>
  </header>

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
          <th>Comprovante</th>
          <th>Remover</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Antonio Leonardo</td>
          <td><button class="comprovante-btn">Visualizar PDF</button></td>
          <td><button class="remove-btn">&times;</button></td>
        </tr>
        <tr>
          <td>Igor Gonsalves</td>
          <td><button class="comprovante-btn">Visualizar PDF</button></td>
          <td><button class="remove-btn">&times;</button></td>
        </tr>
        <tr>
          <td>Carla Ferreira</td>
          <td><button class="comprovante-btn">Visualizar PDF</button></td>
          <td><button class="remove-btn">&times;</button></td>
        </tr>
      </tbody>
    </table>
  </main>
</body>
</html>

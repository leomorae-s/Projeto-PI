<?php
    require_once __DIR__ . '/../controllers/AuthController.php';
    $empresas = AuthController::listarEmpresas();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Empresas - Fin Track</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      margin: 0;
      background-color: #f1f1f1;
    }

    header {
      background-color: #2ecc71;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 20px;
    }

    .menu-icon {
      font-size: 24px;
      cursor: pointer;
    }

    .logo {
      font-size: 18px;
    }

    .logout-btn {
      background-color: #3fa96d;
      border: none;
      color: white;
      padding: 8px 14px;
      border-radius: 5px;
      cursor: pointer;
    }

    main {
      padding: 40px 20px;
      max-width: 900px;
      margin: auto;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .search-input {
      padding: 8px 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 250px;
    }

    .add-btn {
      background-color: #2ecc71;
      color: white;
      border: none;
      padding: 10px 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
    }

    th, td {
      text-align: left;
      padding: 12px 16px;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f9f9f9;
    }

    .edit-icon {
      cursor: pointer;
      font-size: 18px;
      color: #333;
    }
  </style>
</head>

<body>
  <div id="menu-placeholder"></div>

  <header>
    <div class="menu-icon" onclick="toggleMenu()">&#9776;</div>
    <div class="logo">Fin Track</div>
    <button class="logout-btn">Logout</button>
  </header>

  <?php require_once __DIR__ . '/dashboard/sidebar.php'?>?>

  <main>
    <div class="top-bar">
      <input type="text" class="search-input" placeholder="Pesquisar empresas..." onkeyup="filtrarEmpresas()">
      <a href="/register" class="add-btn" >Cadastrar</a>
    </div>

    <table>
      <thead>
        <tr>
          <th>Empresas</th>
          <th>CNPJ</th>
          <th>Editar</th>
        </tr>
      </thead>
      <tbody id="tabela-empresas">
      <?php foreach ($empresas as $linha): ?>
          <tr>
              <td><?= htmlspecialchars($linha['nome']) ?></td>
              <td><?= htmlspecialchars($linha['cnpj']) ?></td>
              <td>
                  <a href="/empresas/editar?id=<?= $linha['id'] ?>">Editar Empresas</a>
              </td>
          </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </main>

  <script>
    function toggleMenu() {
      const sidebar = document.getElementById("sidebar");
      sidebar.style.left = (sidebar.style.left === "0px") ? "-250px" : "0px";
    }
  
    function filtrarEmpresas() {
      const filtro = document.querySelector(".search-input").value.toLowerCase();
      const linhas = document.querySelectorAll("#tabela-empresas tr");
  
      linhas.forEach((linha) => {
        const nomeEmpresa = linha.children[0].textContent.toLowerCase();
        linha.style.display = nomeEmpresa.includes(filtro) ? "" : "none";
      });
    }
  </script>  
</body>
</html>

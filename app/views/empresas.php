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
      background: #338153;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 20px;
      cursor: pointer;
      font-weight: 600;
    }
    .edit-icon {
      cursor: pointer;
      font-size: 18px;
      color: #333;
    }
    .container {
        margin-left: 220px; /* igual à largura da sidebar */
        padding: 90px 20px 20px 50px; /* top > header height */
        min-height: calc(100vh - 60px);
    }
    .container h2 {
      margin-bottom: 1.5rem;
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
  <div id="menu-placeholder"></div>

  <header>
    <div class="menu">
      <span class="material-symbols-outlined">clock_loader_60</span>
      <span class="logo">Fin track</span>
    </div>
    <button class="logout-btn">Logout</button>
  </header>

  <?php require_once __DIR__ . '/dashboard/sidebar.php'?>?>

  <main class="container">
    <h2>Clientes</h2>
    <div class="controls">
      <input type="text" class="search-input" placeholder="Pesquisar empresas..." onkeyup="filtrarEmpresas()">
      <a href="/register" class="cadastrar" >Cadastrar</a>
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
                  <a href="/empresas/editar?id=<?= $linha['id'] ?>"><span class="material-symbols-outlined">edit_square</span></a>
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

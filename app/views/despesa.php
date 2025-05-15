<?php
    require_once __DIR__ . '/../models/DespesasModel.php';
    $categorias = \models\DespesasModel::listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Fin Track - Despesa</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link rel="stylesheet" href="./despesa.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }


        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2ecc71;
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .menu-icon {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .logout {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .logout:hover {
            background-color: #219150;
        }

        main, .form-section {
            padding: 2rem;
            display: none;
        }

        main.active, .form-section.active {
            display: block;
        }


        .container {
            max-width: 900px;
            margin: auto;
            background-color: #fff;
        }


        .container h2 {
            margin-bottom: 1.5rem;
        }

        .search-input {
            padding: 0.5rem 0.50rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
        }


        .controls {
            display: flex;
            gap: 13rem;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .dropdown label {
            margin-right: 0.5rem;
            font-weight: bold;
        }

        #tipo {
            padding: 0.4rem;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .cadastrar {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .cadastrar:hover {
            background-color: #27ae60;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 0.8rem 1rem;
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

        .form-container {
            max-width: 700px;
            margin: auto;
            background-color: #fff;
        }

        .form-container h2 {
            margin-bottom: 1rem;
        }

        .form-row {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 0.3rem;
            font-weight: bold;
        }

        .form-group input {
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1.2rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn.back {
            background-color: #ccc;
            color: #333;
        }

        .btn.save {
            background-color: #2ecc71;
            color: white;
        }

        .btn.save:hover {
            background-color: #27ae60;
        }

    </style>
  
</head>
<body>
  <header>
    <div class="menu-icon">
      <i class="fas fa-bars"></i>
      <span class="logo">Fin track</span>
    </div>
    <button class="logout">Logout</button>
  </header>

  
  <main id="listagemSection" class="active">
    <div class="container">
      <h2>Despesa</h2>

      <div class="controls">
        <div class="dropdown">
          <label for="tipo">Tipo</label>
          <select id="tipo">
            <option>Funcionario</option>
            <option>Outro</option>
          </select>
        </div>
        <input type="text" class="search-input" placeholder="Buscar...">
        <button class="cadastrar">Cadastrar</button>
      </div>
      

      <table>
        <thead>
          <tr>
            <th>Tipo</th>
            <th>Relatório</th>
            <th>Editar</th>
          </tr>
        </thead>
          <tbody>
          <?php foreach ($categorias as $linha): ?>
              <tr>
                  <td><?php echo htmlspecialchars($linha['categoria']); ?></td>
                  <td><i class="fas fa-file-alt"></i></td>
                  <td>
                      <a href="/despesas/editar">
                          <i class="fas fa-pen" style="cursor:pointer;"></i>
                      </a>
                  </td>

              </tr>
          <?php endforeach; ?>
          </tbody>
      </table>
    </div>
  </main>

  
  <section class="form-section" id="formSection">
    <div class="form-container">
      <h2>Despesa</h2>
      <form id="despesaForm" method="post">
        <div class="form-row">
          <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" id="categoria" name="categoria">
          </div>
          <div class="form-group">
            <label for="subcategoria">Subcategoria</label>
            <input type="text" id="subcategoria" name="subcategoria">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" step="0.01" id="valor" name="valor">
          </div>
          <div class="form-group">
            <label for="data">Data</label>
            <input type="date" id="data" name="data">
          </div>
        </div>

        <div class="buttons">
          <button type="button" class="btn back">Voltar</button>
          <button type="submit" class="btn save">Salvar</button>
        </div>
      </form>
    </div>
  </section>

  <!-- Script para alternar telas -->
  <script>
    const cadastrarBtn = document.querySelector('.cadastrar');
    const voltarBtn = document.querySelector('.back');
    const listagem = document.getElementById('listagemSection');
    const formSection = document.getElementById('formSection');
    const formTitle = document.querySelector('.form-container h2');
    const salvarBtn = document.querySelector('.save');
    const form = document.getElementById('despesaForm');
    const editIcons = document.querySelectorAll('.edit-icon');

    cadastrarBtn.addEventListener('click', () => {
      formTitle.textContent = 'Nova Despesa';
      salvarBtn.textContent = 'Salvar';
      form.reset();
      listagem.classList.remove('active');
      formSection.classList.add('active');
    });

    voltarBtn.addEventListener('click', () => {
      formSection.classList.remove('active');
      listagem.classList.add('active');
    });

    editIcons.forEach((icon) => {
      icon.addEventListener('click', () => {
          const categoriaId = icon.getAttribute('data-id');

          fetch(`/despesas/1${categoriaId}`)
              .then(response => response.json())
              .then(data => {
                  document.getElementById('categoria').value = data.categoria;
                  document.getElementById('subcategoria').value = data.subcategoria;
                  document.getElementById('valor').value = data.valor;
                  document.getElementById('data').value = data.data;

                  formTitle.textContent = 'Editar Despesa';
                  salvarBtn.textContent = 'Atualizar';

                  listagem.classList.remove('active');
                  formSection.classList.add('active');
              });
      });
    });
  </script>

</body>
</html>

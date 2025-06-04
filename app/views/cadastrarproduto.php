<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Produto - FinTrack</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      margin: 0;
      background-color: #fff;
    }

    header {
      background-color: #28a745;
      padding: 10px 20px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
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

    .form-container {
      max-width: 800px;
      margin: 40px auto;
      padding: 30px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }

    .form-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .form-header h2 {
      font-size: 22px;
    }

    .form-header .date-label {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .form-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .form-grid label {
      display: block;
      font-size: 14px;
      margin-bottom: 5px;
    }

    .form-grid input,
    .form-grid select {
      width: 100%;
      padding: 8px;
      border: 1px solid #999;
      border-radius: 5px;
    }

    .form-actions {
      margin-top: 30px;
      display: flex;
      justify-content: center;
      gap: 20px;
    }

    .btn {
      padding: 10px 30px;
      border: none;
      border-radius: 5px;
      font-size: 15px;
      cursor: pointer;
    }

    .btn-back {
      background-color: #e0e0e0;
      color: #000;
    }

    .btn-save {
      background-color: #28a745;
      color: white;
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

  <div class="form-container">
    <div class="form-header">
      <h2>Cadastro do Produto</h2>
      <div class="date-label">
        <span>Data</span>
        <span>📅</span>
      </div>
    </div>

      <form action="" method="POST">
          <div class="form-grid">
              <div>
                  <label for="nome">Nome</label>
                  <input type="text" id="nome" name="nome">
              </div>

              <div>
                  <label for="descricao">Descrição</label>
                  <input type="text" id="descricao" name="descricao">
              </div>

              <div>
                  <label for="preco">Preço</label>
                  <input type="text" id="preco" name="preco">
              </div>

              <div>
                  <label for="estoque">Estoque</label>
                  <input type="number" id="estoque" name="estoque" min="0">
              </div>

              <div>
                  <label for="categoria">Categoria</label>
                  <input type="text" id="categoria" name="categoria">
              </div>

          </div>

          <div class="form-actions">
              <a href="/produtos" class="btn btn-back" type="button">Voltar</a>
              <button class="btn btn-save" type="submit">Salvar</button>
          </div>
      </form>

</body>
</html>

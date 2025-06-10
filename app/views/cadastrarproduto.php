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

    .form-container {
      padding: 30px;
      margin-top:100px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
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
      border: 1px solid #ccc;
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
      text-decoration:none;
    }
    .btn-back:hover {
      background-color:rgb(179, 179, 179);
    }

    .btn-save {
      background-color: #2ecc71;
      color: white;
    }
    .btn-save:hover {
      background-color: #27ae60;
    }
    .container {
        max-width: 700px;
        width: 100%;
        padding: 2rem;
        margin: 0 auto; 
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
  <div class="container">
    <div class="form-container">
      <div class="form-header">
        <h2>Cadastro do Produto</h2>
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
                    <input type="text" id="estoque" name="estoque">
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
  </div>

</body>
</html>

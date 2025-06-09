<?php
    require_once __DIR__ . '/../core/Database.php';

    $db = new \Database();
    $pdo = $db->connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    // Atualização dos dados


    $stmt = $pdo->prepare('SELECT * FROM produtos WHERE id = ?');
    $stmt->execute([$id]);
    $produtos = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produtos) {
        die('Produto não encontrada');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Produto - FinTrack</title>
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
      max-width: 700px;
      margin: 40px auto;
      padding: 30px;
      border: 1px solid #ccc;
      border-radius: 10px;
      margin-top:120px;
    }

    .form-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .form-header h2 {
      font-size: 22px;
    }

    .form-group {
      margin-bottom: 20px;
    }
    .form-group input{
      width: 100%;
      height: 40px;
    }

    label {
      display: block;
      font-size: 14px;
      margin-bottom: 5px;
    }

    input,
    select,
    textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #999;
      border-radius: 5px;
      resize: none;
    }

    .form-row {
      display: flex;
      gap: 20px;
    }

    .form-row > div {
      flex: 1;
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

    .btn-delete {
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
      <span class="material-symbols-outlined">clock_loader_60</span>
      <span class="logo">Fin track</span>
    </div>
    <button class="logout-btn">Logout</button>
  </header>
    <?php require_once __DIR__ . '/dashboard/sidebar.php'?>
  <form action="" method="POST">
  <div class="form-container">
      <div class="form-header">
          <h2>Editar Produto</h2>
      </div>


      <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" id="nome" name="nome" required value="<?php echo $produtos['nome'] ?>">
      </div>

      <div class="form-group">
          <label for="descricao">Descrição</label>
          <textarea id="descricao" name="descricao" rows="2"><?= htmlspecialchars($produtos['descricao']) ?></textarea>

      </div>

      <div class="form-group">
          <label for="preco">Preço</label>
          <input type="number" id="preco" name="preco" step="0.01" required value="<?php echo $produtos['preco'] ?>">
      </div>

      <div class="form-group">
          <label for="estoque">Estoque</label>
          <input type="number" id="estoque" name="estoque" required value="<?php echo $produtos['estoque'] ?>">
      </div>

      <div class="form-group">
          <label for="categoria">Categoria</label>
          <input type="text" id="categoria" name="categoria" required value="<?php echo $produtos['categoria'] ?>">
      </div>
      <div class="form-actions">
        <button class="btn btn-delete">Voltar</button>
        <button class="btn btn-save" type="submit">Salvar</button>
      </div>
  </div>

  </form>

</body>
</html>

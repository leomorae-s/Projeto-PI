<?php
require_once __DIR__ . '/../core/Database.php';

$db = new \Database();
$pdo = $db->connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// Atualização dos dados


$stmt = $pdo->prepare('SELECT * FROM despesas WHERE id = ?');
$stmt->execute([$id]);
$despesa = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$despesa) {
    die('Despesa não encontrada');
}
?>
<!Doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Despesa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            padding: 2rem;
        }

        .form-container {
            max-width: 600px;
            background-color: #fff;
            margin: auto;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            margin-bottom: 1.5rem;
            color: #2ecc71;
            text-align: center;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 1.2rem;
        }

        .form-group label {
            margin-bottom: 0.4rem;
            font-weight: bold;
            color: #333;
        }

        .form-group input {
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 1.5rem;
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

<div class="form-container">
    <h2>Editar Despesa</h2>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($despesa['id']); ?>">

        <div class="form-group">
            <label>Categoria:</label>
            <input type="text" name="categoria" value="<?php echo htmlspecialchars($despesa['categoria']); ?>">
        </div>

        <div class="form-group">
            <label>Subcategoria:</label>
            <input type="text" name="subcategoria" value="<?php echo htmlspecialchars($despesa['subcategoria']); ?>">
        </div>

        <div class="form-group">
            <label>Valor:</label>
            <input type="text" name="valor" value="<?php echo htmlspecialchars($despesa['valor']); ?>">
        </div>

        <div class="form-group">
            <label>Data:</label>
            <input type="date" name="data" value="<?php echo htmlspecialchars($despesa['data']); ?>">
        </div>

        <div class="buttons">
            <a href="/despesas" class="btn back">Voltar</a>
            <button type="submit" class="btn save">Atualizar</button>
        </div>
    </form>
</div>
</body>
</html>

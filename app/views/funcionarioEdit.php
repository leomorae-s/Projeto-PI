<?php
require_once __DIR__ . '/../core/Database.php';

$db = new \Database();
$pdo = $db->connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// Atualização dos dados


$stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = ?');
$stmt->execute([$id]);
$despesa = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$despesa) {
    die('Despesa não encontrada');
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
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
            max-width: 700px;
            margin: auto;
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            margin-bottom: 1.5rem;
            color: #2ecc71;
        }

        .form-row {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 0.3rem;
            font-weight: bold;
            color: #333;
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
            background-color: #2ecc71;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Editar Usuário</h2>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($despesa['id']); ?>">

        <div class="form-row">
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" value="<?php echo htmlspecialchars($despesa['nome']); ?>">
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($despesa['email']); ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Região de Atuação:</label>
                <input type="text" name="regiao_atuacao" value="<?php echo htmlspecialchars($despesa['regiao_atuacao']); ?>">
            </div>

            <div class="form-group">
                <label>Telefone:</label>
                <input type="text" name="telefone" value="<?php echo htmlspecialchars($despesa['telefone']); ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Cargo:</label>
                <input type="text" name="cargo" value="<?php echo htmlspecialchars($despesa['cargo']); ?>">
            </div>

            <div class="form-group">
                <label>Salário:</label>
                <input type="text" name="salario" value="<?php echo htmlspecialchars($despesa['salario']); ?>">
            </div>
        </div>

        <div class="buttons">
            <button class="btn back" type="button" onclick="history.back()">Voltar</button>
            <button class="btn save" type="submit">Atualizar</button>
        </div>
    </form>
</div>

</body>
</html>

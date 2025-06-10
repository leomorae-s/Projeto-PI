<?php
    require_once __DIR__ . '/../core/Database.php';

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if (!$id) {
        die('ID inválido');
    }

    $db = new \Database();
    $pdo = $db->connect();

    $stmt = $pdo->prepare('SELECT * FROM despesas WHERE id = ?');
    $stmt->execute([$id]);
    $despesa = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$despesa) {
        die('Despesa não encontrada');
    }

    // 4) exiba todos os campos
?>
<!DOCTYPE html>
<html>
<head><title>Detalhes da Despesa</title>
</head>

<body>
<h1>Despesa: <?= htmlspecialchars($despesa['categoria']) ?></h1>
<ul>
    <li>Valor: <?= htmlspecialchars($despesa['subcategoria']) ?></li>
    <li>Data: <?= htmlspecialchars($despesa['valor']) ?></li>
    <li>Categoria: <?= htmlspecialchars($despesa['data']) ?></li>
    <!-- e assim por diante... -->
</ul>
</body>
</html>

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
    
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
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
        .menu{
          display:flex;
          align-items:center;
          justify-content:center;
        }
        .logo{
          font-size:20px;
          padding-left:5px;
        }
        .sidebar {
            position: fixed;
            top: 60px; /* abaixo do header */
            left: 0;
            width: 220px;
            height: calc(100vh - 60px); /* ajusta pra não passar do header */
            background-color: #18B95A;
            padding-top: 20px;
            z-index: 1000;
        }

        /* Conteúdo */
        .main-content {
            margin-left: 220px;
            padding: 80px 20px 20px 20px; /* top 80px por causa do header */
            background-color: #f4f4f4;
            min-height: calc(100vh - 60px);
        }
        .container{
            display:flex;
            align-items:center;
            justify-content: center;
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

        .logout-btn:hover {
            background-color: #219150;
        }
        .form-container {
            height:500px;
            width: 100%;
            padding:30px;
            max-width: 600px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-top:90px;
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
            background-color: #ECECEC;
            color: #333;
            width: 100px;
            height: 35px;
            font-size:15px;
            text-align:center;
            text-decoration: none;
        }

        .btn.save {
            background-color: #2ecc71;
            color: white;
            font-size:15px;
            text-align:center;

        }
        .btn.back:hover  {
            background-color:rgb(212, 212, 212);
        }

        .btn.save:hover {
            background-color: #27ae60;
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
    </div>
    </body>
    </html>

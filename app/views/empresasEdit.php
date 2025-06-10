<?php
require_once __DIR__ . '/../core/Database.php';

$db = new \Database();
$pdo = $db->connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// Atualização dos dados


$stmt = $pdo->prepare('SELECT * FROM empresas WHERE id = ?');
$stmt->execute([$id]);
$empresas = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$empresas) {
    die('Produtos não encontrada');
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Empresa</title>
    <head>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

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
        .container {
            margin-left: 220px; /* igual à largura da sidebar */
            padding: 110px 20px 20px 50px; /* top > header height */
            min-height: calc(100vh - 60px);
    }
        .container h2 {
            margin-bottom: 1.5rem;
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
        .search-add {
            display: flex;
            gap: 10px;
            align-items: center;
            }

        .sidebar {
            position: fixed;
            top: 60px; /* para não ficar embaixo do header */
            left: 0;
            width: 220px;
            height: calc(100vh - 60px); /* altura da tela menos a altura do header */
            background-color:rgb(4, 17, 31);
            padding-top: 20px;
            color: white;
            z-index: 1000; /* menor que o header */
            overflow-y: auto; /* para caso o conteúdo ultrapasse o tamanho */
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

    <main class="container">
        <div class="form-container">
            <h2>Editar Empresa</h2>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($empresas['id']); ?>">

                <div class="form-row">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" name="nome" value="<?php echo htmlspecialchars($empresas['nome']); ?>">
                    </div>

                    <div class="form-group">
                        <label>Tipo:</label>
                        <input type="text" name="tipo" value="<?php echo htmlspecialchars($empresas['tipo']); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($empresas['email']); ?>">
                    </div>

                    <div class="form-group">
                        <label>CNPJ:</label>
                        <input type="text" name="cnpj" value="<?php echo htmlspecialchars($empresas['cnpj']); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Localização:</label>
                        <input type="text" name="localizacao" value="<?php echo htmlspecialchars($empresas['localizacao']); ?>">
                    </div>

                    <div class="form-group">
                        <label>Telefone:</label>
                        <input type="text" name="telefone" value="<?php echo htmlspecialchars($empresas['telefone']); ?>">
                    </div>
                </div>

                <div class="buttons">
                    <a class="btn back" href="/cliente">Voltar</a>
                    <button class="btn save" type="submit">Atualizar</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>

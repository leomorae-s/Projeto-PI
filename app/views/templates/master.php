<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require __DIR__ . '/header.php'; ?>
    <?php 
    ?>
    <?php
        if (isset($viewPath) && file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "<h1>Erro: View não encontrada!</h1>";
        }
    ?>
</body>
</html>

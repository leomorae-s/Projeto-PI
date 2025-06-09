<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Controle Financeiro</title>
    <link rel="stylesheet" href="/front-pi/css/home.css">
    <style>
        

    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    <?php if (isset($_GET['erro'])): ?>
        <p class="error">Usuário ou senha inválidos!</p>
    <?php endif; ?>

    <form action="/login" method="post">
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>

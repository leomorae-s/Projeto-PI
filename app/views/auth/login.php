<!-- app/views/auth/login.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Controle Financeiro</title>
</head>
<body>
<h2>Login</h2>

<?php if (isset($_GET['erro'])): ?>
    <p style="color: red;">Usuário ou senha inválidos!</p>
<?php endif; ?>

<form action="/login" method="post">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Entrar</button>
</form>
</body>
</html>


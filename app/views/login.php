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
    <div class="form-container">
        <h2>Login</h2>
        <form method="POST" action="/login/store">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Digite seu email">

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
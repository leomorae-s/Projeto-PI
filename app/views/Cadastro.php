<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
    <link rel="stylesheet" href="cadatrar_funcionario.html">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=menu" />
</head>

<body>

<header class="topbar">
    <div class="menu-logo">
        <span class="material-symbols-outlined">menu</span>
        <span class="logo">Fin track</span>
    </div>
    <button class="logout">Logout</button>
</header>

<main>
    <section class="container">
        <form>
            <div class="group">
                <label for="nome">Nome da completo</label>
                <input type="text" id="nome" name="nome" required />
            </div>

            <div class="group">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" />
            </div>

            <div class="group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" />
            </div>

            <div class="group">
                <label for="cargo">Cargo</label>
                <input type="text" id="cargo" name="cargo" />
            </div>

            <div class="group">
                <label for="regiao">Região de atuação</label>
                <input type="text" id="regiao" name="regiao" />
            </div>

            <div class="group">
                <label for="salario">Salário</label>
                <input type="number" id="salario" name="salario" />
            </div>

            <div class="group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" />
            </div>

            <p class="termos">
                Ao criar uma conta, você concorda com os <a href="#">Termos de Serviço</a>. Para obter mais
                informações sobre as práticas de privacidade do FinTrack, consulte a Declaração de Privacidade do
                Fintrack. Ocasionalmente, enviaremos a você e-mails relacionados à conta.
            </p>

            <button type="submit" class="salvar">Salvar</button>
        </form>
    </section>
</main>
</body>

</html>
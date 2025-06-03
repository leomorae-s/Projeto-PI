<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
    <link rel="stylesheet" href="../../../front-pi/css/cadastrar_funcionario.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=menu" />
</head>
<style>
    * {
        box-sizing: border-box;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #f5f5f5;
    }

    .topbar{
        background: #18B95A;
        display: flex;
        color: white;
        justify-content: space-between;
        padding: 10px 20px;
        align-items: center;
    }
    .menu-logo{
        display: flex;
        align-items: center;
        gap: 40px;
    }

    .logout {
        background: #338153;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
    }

    main {
        display: flex;
        justify-content: center;
        margin-top: 40px;
    }

    .container {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
        max-width: 700px;
        width: 100%;
    }

    form {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .group {
        display: flex;
        flex-direction: column;
        grid-column: span 1;
    }

    .group label {
        margin-bottom: 5px;
        font-weight: 500;
    }

    .group input {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .termos {
        grid-column: span 3;
        font-size: 12px;
        color: #4caf50;
        margin-top: 10px;
    }

    .termos a {
        color: #4caf50;
        text-decoration: underline;
    }

    .salvar {
        flex: 100%;
        background-color: #00b16a;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .group {
            flex: 100%;
        }
    }
</style>

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
            <form method="post">
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
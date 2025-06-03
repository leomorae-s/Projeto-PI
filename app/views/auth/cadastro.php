<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro de Empresa - Fin Track</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      margin: 0;
      background-color: #f1f1f1;
    }

    header {
      background-color: #2ecc71;
      color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 20px;
    }

    .menu-icon {
      font-size: 24px;
      cursor: pointer;
    }

    .logo {
      font-size: 18px;
    }

    .logout-btn {
      background-color: #3fa96d;
      border: none;
      color: white;
      padding: 8px 14px;
      border-radius: 5px;
      cursor: pointer;
    }

    main {
      display: flex;
      justify-content: center;
      padding: 40px 20px;
    }

    .form-container {
      background-color: white;
      border: 1px solid #ddd;
      padding: 30px;
      border-radius: 10px;
      max-width: 700px;
      width: 100%;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    .form-row {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      margin-bottom: 20px;
    }

    .form-row input {
      flex: 1;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      min-width: 200px;
    }

    .full-width {
      width: 100%;
    }

    .info-text {
      font-size: 12px;
      color: #4caf50;
      margin-bottom: 20px;
    }

    .save-btn {
      background-color: #2ecc71;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      align-self: flex-end;
    }
  </style>
</head>
<body>

  <div id="menu-placeholder"></div>

  <header>
    <div class="menu-icon" onclick="toggleMenu()">&#9776;</div>
    <div class="logo">Fin Track</div>
    <button class="logout-btn">Logout</button>
  </header>

  <main>
    <div class="form-container">
      <form method="post">
        <div class="form-row">
          <input type="text" placeholder="Nome da empresa" name="empresa" required>
          <input type="text" placeholder="Tipo de empresa" name="tipo_empresa" required>
          <input type="email" placeholder="E-mail" name="email" required>
        </div>
        <div class="form-row">
          <input type="text" placeholder="CNPJ" name="cnpj" required>
          <input type="text" placeholder="Local" name="local" required>
          <input type="text" placeholder="Telefone" name="telefone" required>
        </div>
        <div class="form-row">
          <input type="password" placeholder="Senha" name="senha" class="full-width" required>
        </div>
        <p class="info-text">
          Ao criar uma conta, você concorda com os Termos de Serviço. Para obter mais informações sobre as práticas de privacidade do FinTrack, consulte a Declaração de Privacidade do FinTrack. Ocasionalmente, enviaremos a você e-mails relacionados à conta.
        </p>
        <button type="submit" class="save-btn">Salvar</button>
      </form>
    </div>
  </main>
</body>
</html>

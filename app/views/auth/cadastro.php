<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <title>Cadastro de Empresa - Fin Track</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
    }
    .logo{
      display:flex;
      padding:60px 70px 40px 60px;
      justify-content:center;
      align-items:center;
    }
    .logo span{
      font-size:100px;
      text-align:center;
      color:#18B95A;
    }
    .logo h1{
      font-size:50px;
      text-align:center;
      color:#18B95A;
    }
    .welcome{
      color:#18B95A;
      text-align:center;  
      font-size:36px;
    }
    .form-group{
      display:flex;
      flex-direction:column;
      padding-bottom:10px;
    }
    .form-group input{
      padding:12px;
      border-radius:8px;
      border:1px solid #ccc;
    }
    .signup-form{
      padding:16px;
      width: 80%;
    }
    .form-container{
      display:flex;
      justify-content:center;
    }

    .cadastro{
      width: 40%;
      height:100vh;
    }
    .visual{
      width: 60%;
      height:100vh;
      background-color:#18B95A;

    }
    .visual figure img{
      width: ;
      height: 400px;
    }
    .slla{
      display: flex;
      flex-direction:row;
    }

    .info-text{
      font-size:12px;
      padding:0px 16px 10px 16px;
      color:#18B95A;
    }
    .save-btn{
      border:none;
      height:40px;
      width:100%;
      border-radius:8px;
      background-color:#18B95A;
      color:white;
      font-size:16px;
    }
    .save-btn:hover{
      background-color: #27ae60;

    }

  </style>
</head>
<body>
  <div class="slla">
    <div class="visual">
      <figure>
        <img src="" alt="">
      </figure>
    </div>
    <div class="cadastro">
      <div class="logo">
        <span class="material-symbols-outlined">clock_loader_60</span>
        <h1>FinTrack</h1>

      </div>
      <p class="welcome">
        Cadastre-se no FinTrack!
      </p>
      <div id="menu-placeholder"></div>
      <main>
        <div class="form-container">
          <form method="post" class="signup-form">

            <div class="form-row">
              <div class="form-group">
                <label for="empresa">Nome da empresa</label>
                <input type="text" id="empresa" name="empresa" placeholder="Ex: Soluções Criativas LTDA" required>
              </div>
              <div class="form-group">
                <label for="tipo_empresa">Tipo de empresa</label>
                <input type="text" id="tipo_empresa" name="tipo_empresa" placeholder="Ex: Tecnologia" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="seu@email.com" required>
              </div>
              <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="text" id="cnpj" name="cnpj" placeholder="00.000.000/0001-00" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="local">Local</label>
                <input type="text" id="local" name="local" placeholder="Ex: São Paulo, SP" required>
              </div>
              <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" placeholder="(11) 99999-9999" required>
              </div>
            </div>

            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="password" id="senha" name="senha" required>
            </div>

            <p class="info-text">
              Ao criar uma conta, você concorda com os Termos de Serviço. Para obter mais informações sobre as práticas de privacidade do FinTrack, consulte a Declaração de Privacidade do FinTrack. Ocasionalmente, enviaremos a você e-mails relacionados à conta.
            </p>

            <button type="submit" class="save-btn">Salvar</button>

          </form>
        </div>
      </main>
    </div>
  </div>
</body>
</html>

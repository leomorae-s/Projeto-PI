<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Controle Financeiro</title>
    <link rel="stylesheet" href="/front-pi/css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }
        .slla{
            display:flex;
            flex-direction:row;
        }
        .visual{
            width: 60%;
            height:100vh;
            background-color:#18B95A;
        }
        .login-container{
            width: 40%;
            height:100vh;
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
        .logo h2{
            font-size:50px;
            text-align:center;
            color:#18B95A;
        }
        .welcome{
            color:#18B95A;
            text-align:center;  
            font-size:36px;
            padding-bottom:60px;
        }
        .input-group{
            display:flex;
            flex-direction:column;
            padding-bottom:12px;
        }
        .input-group input{
            padding:12px;
            border-radius:8px;
            border:1px solid #ccc;
        }
        .input-group label{
            padding:5px;
        }
        .form{
            padding:50px;
        }

        .options{
            display:flex;
            flex-direction:row-reverse;
            padding-bottom:12px;
        }
        .forgot-password{
            color:#18B95A;
            font-size:15px;
        }
        button{
            width:100% ;
            height:40px;
            border:none;
            border-radius:8px;
            background:#18B95A;
            color:white;
            font-size:16px;
        }
        button:hover{
            background-color:#27ae60;
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

    <div class="login-container">
        <div class="logo">
            <span class="material-symbols-outlined">clock_loader_60</span>
            <h2>FinTrack</h2>

      </div>
      <p class="welcome">
        Bem-vindo de volta!
      </p>
        <?php if (isset($_GET['erro'])): ?>
            <p class="error">Usuário ou senha inválidos!</p>
        <?php endif; ?>
            <form action="/login" method="post" class="form">

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="seu@email.com" required>
                </div>

                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Sua senha secreta" required>
                </div>

                <div class="options">
                    <a href="/esqueci-senha" class="forgot-password">Esqueci minha senha</a>
                </div>

                <button type="submit">Entrar</button>

            </form>
    </div>
</div>

</body>
</html>

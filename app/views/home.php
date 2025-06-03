<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fintrack</title>
  <link rel="stylesheet" href="home.css" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
        }
        .menu {
            display: flex;
            justify-content: space-around;
            gap: 30px;
            list-style: none;
        }
        .menu li a{
            text-decoration: none;
            color: black;
            font-size: 12px;
        }
        .menu li a:hover {
            color: #18B95A;
        }
        .logo {
            font-size: 18px;
            color: #18B95A;
        }
        .welcome-section{
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding-top: 80px;
            padding-bottom: 60px;
        }
        .welcome-section figure img{
            width: 400px;
            height: 350px;
            border-radius: 5px;
        }
        .intro{

            width: 553px;
        }
        .intro h1{
            color:#18B95A;
            font-size: 32px;
        }
        .intro p{
            font-size: 18px;
            padding: 10px;
        }
        .register{
            width: 122px;
            height: 40px;
            background-color: #F5F5F5;
            border-radius: 30px;
            border:none ;
            font-size: 15px;
            margin-right: 10px;
            margin-top: 10px;
            cursor: pointer;
        }
        .register:hover{
            background-color: #dbdbdb;
        }

        .enter{
            width: 122px;
            height: 40px;
            background-color: #18B95A;
            border-radius: 30px;
            border:none;
            color:white;
            font-size: 15px;
            cursor: pointer;
        }
        .enter:hover{
            background-color: #119e49;
        }
        .about{
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 50px;

        }

        .about h3{
            font-size: 28px;
            color: #18B95A;
        }
        .about p{
            font-size: 18px;
            text-align: center;
            padding: 20px 80px 60px;
        }

        .about-servise{
            background-color: #18B95A;
            padding: 40px;
            text-align: center;
            color: white;
            height: 350px;
        }
        .about-servise h3{
            font-size: 28px;

        }

        .material-symbols-outlined {
            font-variation-settings:
                    'FILL' 0,
                    'wght' 100,
                    'GRAD' -25,
                    'opsz' 24
        }


        .service{
            padding-top: 40px ;
            padding-bottom: 50px;
            display: flex;
            justify-content: space-between;
            font-size: 20px;
        }
        .service-item{
            display: flex;
            flex-direction: row;
        }
        .service-item p{
            display: flex;
            align-items:center ;
            padding: 5px;
        }

        .icon-circle{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 2px solid;
            margin-bottom: 10px;
        }
        .icon-circle span{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .plano p{
            font-size: 20px;
            padding: 10px;
        }
        .telefone{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        .telefone p{
            padding: 5px;
        }
        .circle{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 1px solid currentColor;
        }

        footer {
            background-color: #272727;
            padding: 20px 10px;
            text-align: center;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 12px;
            line-height: 1.6;
        }

        footer a {
            color: #00ff88;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #00cc6a;
            text-decoration: underline;
        }

        footer .copyright {
            font-size: 10px;
            color: #aaaaaa;
        }
    </style>
    
</head>

<body>
  <header>
    <div class="logo">Fin <span>track</span></div>
    <nav>
      <ul class="menu">
        <li><a href="#">Sobre Nós</a></li>
        <li><a href="#">Planos E Preços</a></li>
        <li><a href="#">Suporte</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section>
      <div class="welcome-section">
        <div class="intro">
          <h1>Controle suas finanças com facilidade</h1>
          <p>Bem-vindo à Fintrack, a solução ideal para gestão financeira empresarial</p>
          <button class="register" type="button" onclick="window.location.href='register'">Cadastrar</button>
          <button class="enter" type="button" onclick="window.location.href='login'">Entrar</button>
        </div>
        <figure>
          <img
            src="https://belkcollege.charlotte.edu/wp-content/uploads/sites/953/2024/05/Finance-Real-Estate_1000x1000-4.jpg"
            alt="Imagem ilustrativa sobre finanças" />
        </figure>
      </div>
    </section>

    <section class="about">
      <h3>Sobre nós</h3>
      <p>Nosso site de controle financeiro foi desenvolvido para ajudar você a organizar suas finanças pessoais de forma
        simples, rápida e eficiente. Com uma interface intuitiva, ele permite registrar receitas e despesas e
        categorizar seus gastos. Ideal para quem quer ter mais controle sobre o próprio dinheiro, o site oferece
        gráficos e relatórios que facilitam a visualização da sua saúde financeira. Tudo isso com segurança e
        acessibilidade, para que você possa tomar decisões mais conscientes e planejar um futuro financeiro mais
        tranquilo.</p>
    </section>
    <div class="about-servise">
      <section>
        <h3>Serviços</h3>
        <div class="service">
          <div class="service-item">
            <div class="icon-circle">
              <span class="material-symbols-outlined">
                monitoring
              </span>
            </div>
            <p>Monitoramento de fluxo de caixa</p>
          </div>
          <div class="service-item">
            <div class="icon-circle">
              <span class="material-symbols-outlined">
                description
              </span>
            </div>
            <p>Relatórios Estratégicos</p>
          </div>
          <div class="service-item">
            <div class="icon-circle">
              <span class="material-symbols-outlined">inventory_2</span>
            </div>
            <p>Controle de Produtos</p>
          </div>
        </div>
      </section>

      <section class="plano">
        <h3>Plano</h3>
        <p><strong>Plano Essencial – R$ 49/mês</strong></p>
        <p>Ideal para pequenas empresas que precisam do básico para manter o controle financeiro.</p>
      </section>
    </div>
    <footer>
      <h3>Contate-nos</h3>
      <div class="telefone">
        <p>Telefone: (87) 98874-5577</p>
      </div>
      <p>Email: <a href="mailto:Fintrack@gmail.com">Fintrack@gmail.com</a></p>
      <div class="copyright">
        &copy; 2025 - Todos os direitos reservados.
      </div>
    </footer>
  </main>
</body>

</html>
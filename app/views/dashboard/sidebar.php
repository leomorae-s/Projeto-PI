
    <style>
        /* Sidebar fixa */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            height: 100vh;
            background-color: #1e8449;
            padding-top: 80px;
        }

        .sidebar a {
            display: block;
            color: #ecf0f1;
            padding: 25px 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #14c560;
        }

        /* Conteúdo principal */
        .main-content {
            margin-left: 220px;
            padding: 20px;
            background-color: #f4f4f4;
            min-height: 100vh;
        }

        /* Cards */
        .stats-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            flex: 1 1 200px;
        }

        /* Extra Elements */
        .extra-elements {
            margin-top: 40px;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .sidebar {
                width: 180px;
            }

            .main-content {
                margin-left: 180px;
            }
        }


    </style>
        <h2>Bem-vindo, <?= htmlspecialchars($_SESSION['usuario']['nome']) ?></h2>
        <p>Tipo: <?= $_SESSION['usuario']['tipo'] ?></p>

        <div id="sidebar" class="sidebar">
            <a href="/controlerFinanceiro"><span>📊</span>Controle Financeiro</a>
            <a href="/despesas"><span>💸</span>Despesas</a>
            <a href="/vendas"><span>💰</span>Vendas</a>
            <a href="/produtos"><span>📦</span>Produtos</a>
            <a href="/cliente"><span>👥</span>Clientes</a>
            <a href="/verFuncionarios"><span>🧑‍💼</span>Funcionários</a>
        </div>




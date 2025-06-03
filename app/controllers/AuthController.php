<?php

require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/GerenteModel.php';
require_once __DIR__ . '/../helpers/Redirect.php';


class AuthController
{

    public function showInicio() {
        require_once __DIR__ . '/../views/home.php';
    }

    public function showLogin()
    {
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function login()
    {
        session_start();

        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $db = new Database();
        $pdo = $db->connect();

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario'] = [
                'id' => $usuario['id'],
                'nome' => $usuario['nome'],
                'tipo' => $usuario['tipo'],
                'salario' => $usuario['salario'],
            ];
            header('Location: /controlerFinanceiro');
        } else {
            header('Location: /login?erro=1');
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
    }

    public function showRegister() {
        require_once __DIR__ . '/../views/auth/cadastro.php';
    }

    public function register() {
        $nomeEmpresa = $_POST['empresa'];
        $tipo_empresa = $_POST['tipo_empresa'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cnpj = $_POST['cnpj'];
        $local = $_POST['local'];
        $telefone = $_POST['telefone'];

        $db = new Database();
        $pdo = $db->connect();

        $sql = "INSERT INTO empresas (nome, tipo, email, senha, cnpj, localizacao, telefone) 
        VALUES (:nome, :tipo, :email, :senha, :cnpj, :local, :telefone)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nomeEmpresa,
            ':tipo' => $tipo_empresa,
            ':email' => $email,
            ':senha' => password_hash($senha, PASSWORD_DEFAULT),
            ':cnpj' => $cnpj,
            ':local' => $local,
            ':telefone' => $telefone,
        ]);

        Redirect::redirect("/funcionario");
    }

    public static function listarEmpresas() {
        $db = new Database();
        $pdo = $db->connect();

        $sql = "SELECT DISTINCT nome, id, cnpj FROM empresas";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function listarUsuarios() {
        $db = new Database();
        $pdo = $db->connect();

        $stmt = $pdo->prepare("SELECT nome, id FROM usuarios WHERE cargo = ?");
        $stmt->execute(['Vendedor']);
        return $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showCadastroFuncionario() {
        require_once __DIR__ . '/../views/auth/cadastro_funcionario.php';
    }

    public function salvarFuncionario() {
        $dados = [
            'nome'     => $_POST['nome'],
            'telefone' => $_POST['telefone'],
            'email'    => $_POST['email'],
            'cargo'    => $_POST['cargo'],
            'regiao'   => $_POST['regiao'],
            'salario'  => $_POST['salario'],
            'senha'    => password_hash($_POST['senha'], PASSWORD_DEFAULT)
        ];

        try {
            if (\models\GerenteModel::salvarGerente($dados)) {
                Redirect::redirect("/funcionario");
            } else {
                echo "Erro ao cadastrar funcionário.";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function showFuncionario() {
        require_once __DIR__ . '/../views/ver_funcionario.php';
    }
}

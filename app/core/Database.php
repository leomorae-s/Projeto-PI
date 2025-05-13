<?php

class Database
{
    private $host;
    private $dbname;
    private $user;
    private $pass;
    private $pdo;

    public function __construct()
    {
        $env = parse_ini_file(__DIR__ . '/../../.env');

        $this->host = $env['DB_HOST'];
        $this->dbname = $env['DB_NAME'];
        $this->user = $env['DB_USER'];
        $this->pass = $env['DB_PASS'];
    }

    public function connect()
    {
        if (!$this->pdo) {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
                $this->pdo = new PDO($dsn, $this->user, $this->pass);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro na conexão com o banco de dados: ' . $e->getMessage());
            }
        }

        return $this->pdo;
    }
}

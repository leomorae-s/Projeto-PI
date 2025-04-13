<?php

require_once __DIR__ . "/env.php";
loadEnv(__DIR__ . "/../../.env");

$host = getenv("DB_HOST");
$db = getenv("DB_NAME");
$user = getenv("DB_USER");
$password = getenv("DB_PASS");
class Database {

    private $host;
    private $db;
    private $user;
    private $password;

    private $pdo;

    public function __construct() {
        $this->host = getenv("DB_HOST");
        $this->db = getenv("DB_NAME");
        $this->user = getenv("DB_USER");
        $this->password = getenv("DB_PASS");

        try {

            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro ao conectar:" . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }

    public function closeConnection() {

        $this->pdo = null;
    }

    public function findBy($nomeTabela, $nomeCampoBusca, $valorBusca, $colunasSelecionadas = '*') {
        try {
            $conexao = $this->getConnection();

            // Prepara a consulta SQL
            $sql = "SELECT {$colunasSelecionadas} FROM {$nomeTabela} WHERE {$nomeCampoBusca} = :valor";
            $stmt = $conexao->prepare($sql);

            // Faz o binding do valor
            $stmt->bindValue(':valor', $valorBusca);

            // Executa a consulta
            $stmt->execute();

            // Retorna o resultado da consulta
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            echo "Erro ao executar consulta: " . $erro->getMessage();
        }
    }



}

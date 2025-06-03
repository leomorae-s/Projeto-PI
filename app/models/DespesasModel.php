<?php

namespace models;
use PDO;

require_once __DIR__ . '/../core/Database.php';

class DespesasModel
{
    private $categoria;
    private $subcategoria;
    private $valor;
    private $data;

    /**
     * @param $categoria
     * @param $subcategoria
     * @param $valor
     * @param $data
     */
    public function __construct($categoria, $subcategoria, $valor, $data)
    {
        $this->categoria = $categoria;
        $this->subcategoria = $subcategoria;
        $this->valor = $valor;
        $this->data = $data;
    }

    public static function listar() {
        $db = new \Database();
        $pdo = $db->connect();

        $sql = "SELECT DISTINCT categoria, id, subcategoria FROM despesas";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editar($id) {
        $db = new \Database();
        $pdo = $db->connect();

        $sql = "SELECT * FROM despesas WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($categoria) {
            echo json_encode($categoria);
        } else {
            echo json_encode(['error' => 'Categoria não encontrada']);
        }
    }




}
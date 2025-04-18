<?php

namespace controllers;
require_once '../config/database.php';
use PDO;
class VendaController
{
    private $db;

    public function __construct()
    {
        $this->db = (new \Database())->getConnection();
    }

    public function index()
    {
        $sql = "SELECT * FROM vendas";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($id)
    {
        $sql = "SELECT * FROM vendas WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store($data)
    {
        $sql = "INSERT INTO vendas (id_vendedor, data_venda,valor_total, descricao)
                VALUES (:id_vendedor, :data_venda, :valor_total, :descricao)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id_vendedor' => $data['id_vendedor'],
            'data_venda' => $data['data_venda'],
            'valor_total' => $data['valor_total'],
            'descricao' => $data['descricao']
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE vendas 
                SET id_vendedor = :id_vendedor, data_venda = :data_venda, valor_total = :valor_total, descricao = :descricao
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'id_vendedor' => $data['id_vendedor'],
            'data_venda' => $data['data_venda'],
            'total' => $data['valor_total'],
            'descricao' => $data['descricao']
        ]);


    }

    public function delete($id) {
        $sql = "DELETE FROM vendas WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

}

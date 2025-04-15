<?php

namespace models;


require_once "../config/database.php";

class VendaModel
{


   private  ProdutoModel $produto;
   private $valor;

   private $vendedor;

   private $data_venda;

   private $descricao;

   private $banco;

   private $pdo;
   private $id_vendedor;

   public function __construct(ProdutoModel $produto, $valor, $vendedor, $descricao, $id_vendedor){
       $this->produto = $produto;
       $this->valor = $valor;
       $this->vendedor = $vendedor;
       $this->data_venda = date("Y-m-d");
       $this->descricao = $descricao;
       $this->banco = new \Database();
       $this->pdo = $this->banco->getConnection();
       $this->id_vendedor = $id_vendedor;

   }


   public function salvarVenda(){
       try {
           $pdo = $this->pdo;
           $sql = "INSERT INTO vendas (valor_total, descricao, id_vendedor) VALUES (?, ?,?)";
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(1, $this->valor);
           $stmt->bindParam(2, $this->descricao);
           $stmt->bindParam(3, $this->vendedor);
           $stmt->execute();

           return $stmt->rowCount();
       } catch (\PDOException $e) {
           throw new \PDOException($e->getMessage(), (int)$e->getCode());
       } finally {
           if (isset($banco)){
               $banco->closeConnection();
           }
       }
   }



}
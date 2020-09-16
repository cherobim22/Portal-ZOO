<?php
 require_once('../src/utils/ConnectionFactory.php');

 class CategoriaDAO{
     public static function getAll(){
       
        $con = ConnectionFactory::getConnection();
        
        $stmt = $con->prepare("SELECT * FROM categorias");
        $stmt->execute();

        return $stmt;
     }
   
     
     public static function create($nome){
        $con = ConnectionFactory::getConnection();
        $stmt = $con->prepare("INSERT INTO categorias (nome) VALUES (:nome)");
        $stmt->bindParam(":nome", $nome);
        $stmt->execute();

        return $stmt;
     }

     public static function update($id, $nome){

        $con = ConnectionFactory::getConnection();

        $stmt = $con->prepare("UPDATE categorias SET nome=:nome WHERE id_categoria = :id");
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt;
     }

     public static function delete($id){
        $con = ConnectionFactory::getConnection();

        $stmt = $con->prepare("DELETE FROM categorias WHERE id_categoria = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
     }

 }
?>
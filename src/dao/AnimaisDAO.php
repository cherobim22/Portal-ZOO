<?php
 require_once('../src/utils/ConnectionFactory.php');

 class AnimaisDAO{
     public static function getAll(){
       
        $con = ConnectionFactory::getConnection();
        
        $stmt = $con->prepare("SELECT a.id as id, a.nome as nome, a.img_animal, a.peso , a.alimentacao , a.longevidade, a.categoria_id, c.nome as categoria_nome_ab FROM animaisdd a JOIN portal_zoo.categorias c ON (a.categoria_id = c.id_categoria)");
        $stmt->execute();

        return $stmt;
     }
     public static function getById($id){
       
      $con = ConnectionFactory::getConnection();
      
      $stmt = $con->prepare("SELECT * FROM animaisdd WHERE id = :id");
      $stmt->bindParam(":id", $id);
      $stmt->execute();

      return $stmt;
   }
   
     
     public static function create($nome, $imagem, $alimentacao, $categoria, $peso, $longevidade){
        $con = ConnectionFactory::getConnection();
        $stmt = $con->prepare("INSERT INTO animaisdd (img_animal, nome, categoria_id, peso, alimentacao, longevidade) 
                                                VALUES ( :imagem, :nome, :categoria_id, :peso, :alimentacao, :longevidade)");
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":imagem", $imagem);
        $stmt->bindParam(":categoria_id", $categoria);
        $stmt->bindParam(":alimentacao", $alimentacao);
        $stmt->bindParam(":peso", $peso);
        $stmt->bindParam(":longevidade", $longevidade);
        $stmt->execute();

        return $stmt;
     }

     public static function update($id, $nome, $alimentacao, $categoria, $peso, $longevidade){

        $con = ConnectionFactory::getConnection();

        $stmt = $con->prepare("UPDATE animaisdd SET nome=:nome,  peso=:peso, alimentacao=:alimentacao, longevidade=:longevidade, categoria_id=:categoria_id WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $nome);
       
        $stmt->bindParam(":alimentacao", $alimentacao);
        $stmt->bindParam(":categoria_id", $categoria);
        $stmt->bindParam(":peso", $peso);
        $stmt->bindParam(":longevidade", $longevidade);
        $stmt->execute();


        return $stmt;
     }

     public static function delete($id){
        $con = ConnectionFactory::getConnection();

        $stmt = $con->prepare("DELETE FROM animaisdd WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
     }

     public static function getByCategory($categoria_id){
         $con = ConnectionFactory::getConnection();
         $stmt =  $con->prepare("SELECT a.id as id, a.nome as nome, a.img_animal, a.peso , a.alimentacao , a.longevidade, a.categoria_id, c.nome as categoria_nome_ab FROM animaisdd a JOIN portal_zoo.categorias c ON (a.categoria_id = c.id_categoria) WHERE categoria_id=:id ");
         $stmt->bindParam(":id", $categoria_id);
         $stmt->execute();
         return $stmt;
     }

 }
?>
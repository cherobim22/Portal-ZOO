<?php
require_once('../src/dao/CategoriaDAO.php');


$cat_stmt = CategoriaDAO::getAll();
?>

<style>
    .teste{
        display: flex;
        flex-direction: column;
        padding: 5px;
    }
    a{
        margin-top: 5px;
    }
    h2{
        margin-left: 25%;
    }
</style>
<aside class="col-md-3" >
                    <h2>Categorias</h2>
                    <div class="teste">
                    <?php while($row = $cat_stmt->fetch(PDO::FETCH_OBJ)) : ?>
                        <!-- <li><a href="/app/?categoria_id=<?= $row->id_categoria ?>"><?= $row->nome ?></a></li> -->
                        <a type="button" href="../app/?categoria_id=<?= $row->id_categoria ?>" class="btn btn-outline-info"><?= $row->nome ?> </a>
                    <?php endwhile?>
                    </div>
               
                   
</aside>



<?php
require_once('../src/dao/CategoriaDAO.php');


$cat_stmt = CategoriaDAO::getAll();
?>
<aside class="col-md-3" >
                    <h2>Categorias</h2>
                    <ul>
                    <?php while($row = $cat_stmt->fetch(PDO::FETCH_OBJ)) : ?>
                        <li><a href="/app/?categoria_id=<?= $row->id_categoria ?>"><?= $row->nome ?></a></li>
                    <?php endwhile?>
                    </ul>
</aside>



<?php
require_once('../src/dao/CategoriaDAO.php');
require_once('../src/utils/FlashMessages.php');



if(! $_SESSION['logado']) {
    FlashMessages::setMessages("Voce precisa estar logado", "error");
    header("Location: ../login/login.php");
    exit(0);
}

$stmt = CategoriaDAO::getAll();

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include("../partials/__head.php") ?>
    <title>Portal ZOO - Cadastro de Categorias </title>
</head>
<style>
/* .categorias{
    padding: 2px;
    border: 1px solid #ccc;
} */

</style>
<body>
<?php include("../partials/__navbar.php") ?>

    <section id="content">
        <div class="container">
            <div class="row">
                <!-- sempre somar 12 -->
                <?php include("../partials/__sidebar.php") ?>
                <div class="col-md-9 categorias">
                    <h2>Cadastro de Categorias <a href="../categorias/new.php" class="btn btn-success float-right">Nova Categoria</a></h2>

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>AÇÕES</th>
                       
                            <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                               </tr> 
                                    <td><?= $row->id_categoria ?></td>
                                    <td><?= $row->nome ?></td>
                                    <td>
                                        <a href="../categorias/edit.php?id=<?= $row->id_categoria ?>" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="../categorias/delete.php?id=<?= $row->id_categoria ?>" class="btn btn-sm btn-danger" onclick="return confirm('Você realmente quer excluir esta categoria: <?= $row->nome ?>')">Excluir</a>

                                    </td>
                                <tr>
                            <?php endwhile?>
                        
                           
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <?php include("../partials/__js_imports.php") ?>
</body>
</html>
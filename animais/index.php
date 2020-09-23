<?php
require_once('../src/dao/AnimaisDAO.php');
require_once('../src/utils/FlashMessages.php');


if(! $_SESSION['logado']) {
    FlashMessages::setMessages("Voce precisa estar logado", "error");
     header("Location: ../login/login.php");
    exit(0);
}

$stmt = AnimaisDAO::getAll();


?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include("../partials/__head.php") ?>
    <title>Portal ZOO - Cadastro de Animais </title>
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
                    <h2>Cadastro de Animais <a href="../animais/new.php" class="btn btn-success float-right">Novo Animal</a></h2>

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>IMAGEM</th>
                            <th>ESPÉCIE</th>
                            <th>PESO</th>
                            <th>ALIMENTAÇÃO</th>
                            <th>LONGEVIDADE</th>
                            <th>AÇÕES</th>
                       
                            <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                               </tr> 
                                    <td><?= $row->id ?></td>
                                    <td><?= $row->nome ?></td>
                                    <td><?= $row->img_animal ?></td>
                                    <td><?= $row->categoria_nome ?></td>
                                    <td><?= $row->peso ?> Kg</td>
                                    <td><?= $row->alimentacao ?></td>
                                    <td><?= $row->longevidade ?> Anos</td>
                                    <td>
                                        <a href="../animais/edit.php?id=<?= $row->id ?>" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="../animais/delete.php?id=<?= $row->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Você realmente quer excluir este Animal: <?= $row->nome ?>')">Excluir</a>

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
<?php

require_once('../src/dao/AnimaisDAO.php');
require_once('../src/dao/CategoriaDAO.php');
require_once('../src/utils/FlashMessages.php');


if(! $_SESSION['logado']) {
    FlashMessages::setMessages("Voce precisa estar logado", "error");
    header("Location: ../login/login.php");
    exit(0);
}

        $id = $_GET['id'];
        $stmt = AnimaisDAO::getById($id);
        $cat_stmt = CategoriaDAO::getAll();

        $animais = $stmt->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include("../partials/__head.php") ?>
    <title>Portal ZOO - Cadastro de Animais </title>
</head>
<body>
<?php include("../partials/__navbar.php") ?>

    <section id="content">
        <div class="container">
            <div class="row">
                <!-- sempre somar 12 -->
                <?php include("../partials/__sidebar.php") ?>
                <div class="col-md-9">
                    <h2>Cadastro de Animais </h2>
                    
                    <form action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?= $animais->id ?>"/>
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" id="nome" name="nome" value="<?= $animais->nome ?>"/>
                            </div>
                        </div>  

                         <div class="form-group row">
                            <label for="imagem" class="col-sm-2 col-form-label">Imagem</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" id="imagem" name="imagem" disabled value="<?= $animais->img_animal ?>"/>
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="alimentacao" class="col-sm-2 col-form-label">Alimentação</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" id="alimentacao" name="alimentacao" value="<?= $animais->alimentacao ?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="peso" class="col-sm-2 col-form-label">Peso</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" id="peso" name="peso" value="<?= $animais->peso ?>"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
                            <div class="col-sm-10">
                               
                                <select class="form-control" id="categoria_id" name="categoria_id" >
                                <option value="<?=$animais->categoria_id ?>"><?= $animais->categoria_id ?></option>
                                <option></option>
                                 <?php while($row = $cat_stmt->fetch(PDO::FETCH_OBJ)) : ?>
                                    <option value="<?= $row->id_categoria ?>"><?= $row->nome ?></option>
                                <?php endwhile?>
                                   
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="longevidade" class="col-sm-2 col-form-label">Longevidade</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" id="longevidade" name="longevidade" value="<?= $animais->longevidade ?>">
                            </div>
                        </div>

                        <button style="margin-top: 5px;" type="submit" class="btn btn-primary mb-2 float-right">Salvar</button>
                    </form>
                    <a  type="submit" href="../animais" class="btn btn-danger mb-2 float-right">Cancelar</a>
                </div>
            </div>
        </div>
    </section>

    <?php include("../partials/__js_imports.php") ?>
</body>
</html>
<?php

require_once('../src/dao/CategoriaDAO.php');

$stmt = CategoriaDAO::getAll();

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
                    
                    <form action="create.php" method="POST">
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" id="nome" name="nome"/>
                            </div>
                        </div>    

                        <div class="form-group row">
                            <label for="alimentacao" class="col-sm-2 col-form-label">Alimentação</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" id="alimentacao" name="alimentacao"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="peso" class="col-sm-2 col-form-label">Peso</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" id="peso" name="peso"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
                            <div class="col-sm-10">
                               
                                <select class="form-control" id="categoria_id" name="categoria_id">
                                <option disabled selected >Selecione uma categoria</option>
                                <option ></option>
                                 <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                                    <option value="<?= $row->id_categoria ?>"><?= $row->nome ?></option>
                                <?php endwhile?>
                                   
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="longevidade" class="col-sm-2 col-form-label">Longevidade</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" id="longevidade" name="longevidade">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2 float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include("../partials/__js_imports.php") ?>
</body>
</html>
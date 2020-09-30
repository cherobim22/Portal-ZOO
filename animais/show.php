<?php

require_once('../src/dao/AnimaisDAO.php');
require_once('../src/dao/CategoriaDAO.php');
require_once('../src/utils/FlashMessages.php');

session_start();

if(! $_SESSION['logado']) {
    FlashMessages::setMessages("Voce precisa estar logado", "error");
    header("Location: ../login/login.php");
    exit(0);
}

        $id = $_GET['id'];

        $stmt = AnimaisDAO::getAll();
        $cat_stmt = CategoriaDAO::getAll();

        $animais = $stmt->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include("../partials/__head.php") ?>
    <title>Portal ZOO - Vizualização de Animais </title>
</head>
<style>

    dd {
    margin-left: 2%; 
    }
</style>
<body>
<?php include("../partials/__navbar.php") ?>

    <section id="content">
        <div class="container">
            <div class="row">
                <?php include("../partials/__sidebar.php") ?>
                <div class="col-md-9">
                    <h2><?= $animais->nome ?> </h2>
                    <dl>
                        <dt>Alimentação</dt>
                        <dd><?= $animais->alimentacao ?></dd>

                        <dt>Peso</dt>
                        <dd><?= $animais->peso ?> Kg</dd>

                        <dt>Categoria</dt>
                        <dd><?= $animais->categoria_nome ?></dd>

                        <dt>Longevidade</dt>
                        <dd><?= $animais->longevidade ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>

    <?php include("../partials/__js_imports.php") ?>
</body>
</html>
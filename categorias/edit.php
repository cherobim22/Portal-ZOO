<?php
require_once('../src/utils/ConnectionFactory.php');

session_start();

if(! $_SESSION['logado']) {
    $_SESSION['flash']['error'] = "Você precisa estar logado para executar essa ação.";
    header("Location: login/login.php");
    exit(0);
}

$id = $_GET['id'];

        $con = ConnectionFactory::getConnection();

        $stmt = $con->prepare("SELECT * FROM categorias WHERE id_categoria = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

$categoria = $stmt->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include("../partials/__head.php") ?>
    <title>Mini OLX - Edição de Categorias </title>
</head>
<body>
<?php include("../partials/__navbar.php") ?>

    <section id="content">
        <div class="container">
            <div class="row">
                <!-- sempre somar 12 -->
                <?php include("../partials/__sidebar.php") ?>
                <div class="col-md-9">
                    <h2>Edição de Categorias </h2>
                    
                    <form action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?= $categoria->id_categoria ?>"/>
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" id="nome" name="nome" value="<?= $categoria->nome?>"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mb-2 float-right">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include("../partials/__js_imports.php") ?>
</body>
</html>
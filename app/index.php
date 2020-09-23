<?php
require_once('../src/dao/AnimaisDAO.php');
require_once('../src/utils/ConnectionFactory.php');
require_once('../src/utils/FlashMessages.php');


    if(isset($_GET['categoria_id'])){
        $stmt = AnimaisDAO::getByCategory($_GET['categoria_id']);
    }else{
        $stmt = AnimaisDAO::getALL();
    }

    if(! $_SESSION['logado']) {
        FlashMessages::setMessages("Voce precisa estar logado", "error");
         header("Location: ../login/login.php");
        exit(0);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../partials/__head.php") ?>
    <title>Portal ZOO</title>
</head>
<style>
   
    
</style>
<body>
    
<?php include("../partials/__navbar.php") ?>
    <section id="content">
        <div class="container">
            <div class="row">
                <?php include("../partials/__sidebar.php") ?>
                <div class="col-md-9">
          <br>
                    <div class="row">
                    
                        <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                        <div class="col-sm-4 animais">
                            <div class="bordered">
                                <h3><?= $row->nome ?></h3>

                                <?php if( $row->img_animal != null){ ?>
                                    <img src="<?= $row->img_animal ?>" alt="">
                                <?php }else{ ?>
                                     <img src="../images/not.png" alt="">
                                <?php }  ?>

                               <ul>
                                   <li><b>Categoria: </b><?= $row->categoria_nome ?></li>
                                   <li><b>Alimentação: </b><?= $row->alimentacao ?></li>
                                   <li><b>Longevidade: </b><?= $row->longevidade ?> Anos</li>
                                   <li><b>Peso: </b><?= $row->peso ?> Kg</li>
                               </ul>
                              
                        
                            </div>
                        </div>
                        <?php endwhile?>
                    </div>
                </div>
            </div>
        </div>     
    </section>
    <?php include("../partials/__js_imports.php") ?>
    
</body>
</html>


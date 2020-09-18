<?php
require_once('../src/dao/AnimaisDAO.php');
$stmt = AnimaisDAO::getALL();

  session_start();

  if(! $_SESSION['logado']) {
      $_SESSION['flash']['error'] = "Você precisa estar logado para executar essa ação.";
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
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php include("../partials/__navbar.php") ?>
    </div>    
    <br>
    <div class="info">
        <div style="border: 1px solid; width: 20%; height: 200px;">
        <?php include("../partials/__sidebar.php") ?>
        </div>

        <div style="border: 1px solid; width: 65%; margin-left: 4.5%; height: 160px;">

        </div>
    </div>
              
        

    <?php include("../partials/__js_imports.php") ?>
    
</body>
</html>


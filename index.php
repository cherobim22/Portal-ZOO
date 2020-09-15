<?php
  session_start();

  if(! $_SESSION['logado']) {
      $_SESSION['flash']['error'] = "Você precisa estar logado para executar essa ação.";
      header("Location: sign_in.php");
      exit(0);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("partials/__head.php") ?>
    <title>Document</title>
</head>
<body>
   
<?php include("partials/__navbar.php") ?>

    <section id="content" >
    
        <div class="container">
       
            <div class="row" >
                <!-- sempre somar 12 -->
                <?php include("partials/__sidebar.php") ?>
              
                <div class="col-md-9" >
                    <div>
                        <h2>Produtos
                            <?php if($_SESSION['admin'] == 1) : ?>
                                <a href="#" class="btn btn-success float-right">Cadastrar Novo</a>
                            <?php endif ?>
                        </h2>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4 produto">
                            <div class="bordered">
                                <h3>Arara</h3>
                                <img src="/images/arara.jpg" alt="Apartamento">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac lectus sed diam commodo venenatis ac non est. Quisque volutpat lacinia ante, eu semper ligula lobortis at.</p>
                                <p><a href="#" class="btn btn-success">Ver mais</a></p>
                            </div>
                        </div>

                        <div class="col-md-4 produto">
                            <div class="bordered">
                                <h3>Vaca</h3>
                                <img src="/images/vaca.jpg" alt="Apartamento">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac lectus sed diam commodo venenatis ac non est. Quisque volutpat lacinia ante, eu semper ligula lobortis at.</p>
                                <p><a href="#" class="btn btn-success">Ver mais</a></p>
                            </div>
                        </div>

                        <div class="col-md-4 produto">
                            <div class="bordered">
                                <h3>Peixe Palhaço</h3>
                                <img src="/images/peixe_palhaço.jpg" alt="Apartamento">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac lectus sed diam commodo venenatis ac non est. Quisque volutpat lacinia ante, eu semper ligula lobortis at.</p>
                                <p><a href="#" class="btn btn-success">Ver mais</a></p>
                            </div>
                        </div>
                    </div>
                 </div>
                 
            </div>
        </div>
    </section>

    <?php include("partials/__js_imports.php") ?>
    
</body>
</html>


<?php


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include("partials/__head.php") ?>
    <link rel="stylesheet" href="login.css" class="">
    <title>LOGIN </title>
</head>
<body>
    
        <div class="container login-container">
            <div class="row">
               
                <div class="col-md-6 login-form-1">
                    <h3>Portal ZOO</h3>
                    <form action="sign_in.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Digite seu usuario" value="" name="log[usuario]"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Digite sua senha" value="" name="log[senha]"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">
                            <a href="register.php" class="ForgetPwd" data-toggle="modal" data-target="#exampleModal">Registre-se</a>
                        </div>
                    </form>
                  
                </div>
            
                <div class="col-md-6 img-amz">
                    <img src="images/amazonas.jpg" alt="" id="img_amazonas" width="100%" height="100%">
                </div>
                
                
            </div>
        </div>
    
    
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registre-se</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/register.php" method="POST">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Usuário: </label>
                        <input type="text" class="form-control" id="email" name="user[usuario]">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email: </label>
                        <input type="text" class="form-control" id="email" name="user[email]">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Senha: </label>
                        <input type="password" class="form-control" id="senha" name="user[senha]">
                    </div>
                    <button type="submit" class="btn btn-primary float-right" >Salvar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

    <?php include("partials/__js_imports.php") ?>
</body>
</html>
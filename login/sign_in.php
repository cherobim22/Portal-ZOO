<?php 
    session_start();
    require_once('../src/utils/FlashMessages.php');
    require_once('../src/utils/ConnectionFactory.php');

    $con = ConnectionFactory::getConnection();

    $usuario = $_REQUEST['log']['usuario'];
    $senha = $_REQUEST['log']['senha'];

    $stmt = $con->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if($user) {
        if(password_verify($senha, $user->senha)) {
            $_SESSION['user'] = $usuario;
            $_SESSION['logado']['message'] = "Logado com sucesso";
            $_SESSION['admin'] = $user->portal_admin;
            header("Location: ../app/index.php");
        } else {
            FlashMessages::setMessages("Senha Incorreta, Tente Novamente!", "error");
            header("Location: login.php");
        }

    } else {
        FlashMessages::setMessages("Usuario Incorreto, Tente Novamente!", "error");
        header("Location: login.php");
    }
?>
<?php
    require_once('../src/utils/FlashMessages.php');
    require_once('../src/utils/ConnectionFactory.php');
    $con = ConnectionFactory::getConnection();

    $user = $_REQUEST['user'];
    $admin = 0;
    $hashed_password = password_hash($user['senha'], PASSWORD_DEFAULT);

    $stmt = $con->prepare("INSERT INTO usuarios (usuario, email, senha, portal_admin) 
                           VALUES (:usuario, :email, :senha, :portal_admin)");
    $stmt->bindParam(':usuario', $user['usuario']);
    $stmt->bindParam(':email', $user['email']);
    $stmt->bindParam(':senha', $hashed_password);
    $stmt->bindParam(':portal_admin', $admin);
    $stmt->execute();
   
        FlashMessages::setMessages("Login realizado com sucesso", "success");
    
    header("location: login.php");

?>


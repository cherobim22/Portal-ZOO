<?php 
    session_start();

    unset($_SESSION['logado']);
    unset($_SESSION['user']);
    unset($_SESSION['admin']);

    $_SESSION['flash']['message'] = 'Você se desconectou com sucesso.';

    header("Location: login.php");
?>
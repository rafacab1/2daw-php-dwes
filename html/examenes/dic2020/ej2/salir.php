<?php
    session_start();
    $_SESSION['usuario'] = 'invitado';
    $_SESSION['psw'] = '';
    $_SESSION['perfil'] = 'invitado';
    header('Location: index.php');
?>
<?php
    session_start();
    // session_unset($_SESSION['horaInicio']);
    // session_unset($_SESSION['mensaje']);
    // session_unset($_SESSION['perfil']);
    session_destroy();
    session_start();
    session_regenerate_id(true);
    header("Location: sesiones_ej1.php");
?>
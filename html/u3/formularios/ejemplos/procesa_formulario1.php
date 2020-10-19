<?php 
/**
    *   Prueba con POST
    *
    *   @author Rafa Caballero
    */

    if (!isset($_POST["enviar"])) {
        // echo ("Acceso no autorizado");
        header("Location: ejemplo1.php");
        exit();
    }

    echo $_POST["nombre"] . " " . $_POST["apellidos"];    
?>
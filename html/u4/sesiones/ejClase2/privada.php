<?php
/**
 * 
 * @author Rafa Caballero
 */
session_start();

$aut = $_SESSION['aut'] ?? false; // aut y si no false

if (!$aut) {
    header("Location: index.php?error=1");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta author="Rafa Caballero">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privada</title>
</head>
<body>
<?php
    // Esto es privado
    echo("<h1>Zona privada.</h1>");
    echo ("<a href=\"salir.php\">Cerrar sesión</a><br/>");
?>
    
</body>
</html>
<?php
/**
 * Ejemplo de uso de sesiones para conservar datos entre docs
 */
session_start();
if ($_SESSION['perfil'] != "admin") {
    header('Location: http://iesgrancapitan.org');
}
$_SESSION['mensaje'] = "Hola mundo script2";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Sesiones</title>
</head>
<body>
    <?php
        echo "<h1>Página 2</h1>";
        echo "<p>Bienvenido " . $_SESSION['perfil'] . "</p>";
        echo time() . "<br/>";
        echo session_id() . "<br/>";
        echo $_SESSION['mensaje'];
        echo "<br/><a href=\"sesiones_ej1.php\">Página 1</a>";
    ?>
</body>
</html>
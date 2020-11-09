<?php
/**
 * Ejemplo de uso de sesiones para conservar datos entre docs
 */
session_start();
if (!isset($_SESSION['mensaje']) || !isset($_SESSION['perfil']) || !isset($_SESSION['horaInicio'])) {
    $_SESSION['mensaje'] = "Hola mundo script 1";
    $_SESSION['perfil'] = "admin";
    $_SESSION['horaInicio'] = time(); // Sólo cuando no exista
    $_SESSION['contador'] = 0;
}
$tiempoActual = time();
$tiempoTranscurrido = $tiempoActual - $_SESSION['horaInicio'];
if ($tiempoTranscurrido > 20) { // Si el tiempo transcurrido 
                                // son mas de 20 segundos
                                // cierro la sesión
    header('Location: salir.php');
}
// Sumo uno al contador
$_SESSION['contador']++;
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
        echo "<h1>Página 1</h1>";
        echo session_id() . "<br/><br/>";
        echo "Hora de inicio: " . $_SESSION['horaInicio'] . "<br/>";
        echo "Hora actual: " . $tiempoActual . "<br/>";
        echo "Tiempo transcurrido: " . $tiempoTranscurrido . "<br/>";
        echo "Contador: " . $_SESSION['contador'] . "<br/>";

        echo "<br/>" . $_SESSION['mensaje'] . "<br/>";
        echo "<br/><a href=\"sesiones_ej2.php\">Página 2</a>";
        echo "<br/><a href=\"sesiones_ej1.php\">Recarga</a>";
        echo "<br/><a href=\"salir.php\">Cerrar sesión</a>";
    ?>
</body>
</html>
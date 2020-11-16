<?php
/**
 * 
 * @author Rafa Caballero
 */
session_start();
if (!isset($_SESSION['agenda'])) {
    $_SESSION['agenda'] = array();
}

$nombre = $telefono = "";
$procesado = false;

function clearData($cadena) {
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena;
}

if (isset($_POST['enviar'])) {
    $nombre = clearData($_POST['nombre']);
    $telefono = clearData($_POST['tlf']);

    // Meter datos a array
    array_push($_SESSION['agenda'], array($nombre => $telefono));
    $procesado = true;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body> 
<?php
    echo "<form method=\"post\" action=\"" . $SERVER['PHP_SELF'] . "\">";
        echo "<input type=\"text\" name=\"nombre\"/>";
        echo "<input type=\"text\" name=\"tlf\"/>";
        echo "<input type=\"submit\" name=\"enviar\" value=\"Añadir\"/>";
    echo "</form>";

    foreach ($_SESSION['agenda'] as $persona) {
        foreach ($persona as $clave => $valor) {
            echo "Nombre → " . $clave . " | Telefono → " . $valor . "<br/>";
        }
    }
?>
<br/><a href="salir.php">Borrar agenda</a>
</body>
</html>
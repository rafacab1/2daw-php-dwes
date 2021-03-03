<?php
include("Superheroe.php");

session_start();

$sh = Superheroe::getInstancia();

// Limpieza de datos
function clearData($cadena) {
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superhéroes</title>
    <script src="js/main.js"></script>
</head>
<body>
<h1>Gestión de Superhéroes</h1>
<?php

if (isset($_SESSION['userrole'])) {
    echo "<p>Hola, <b>" . $_SESSION['username'] . "</b></p>";
    if ($_SESSION['userrole'] == "admin") {
        echo "<a href=\"addSh.php\">Añadir superheroe</a></br>";
    }
    echo "<a href=\"logout.php\">Cerrar sesión</a>";
} else {
    echo "</br><a href=\"login.php\">Iniciar sesión</a>";
}
echo "<form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">";
echo "<input type=\"text\" name=\"nombre\" placeholder=\"Escribe para buscar\" autocomplete=\"off\" onkeyup=\"resultados(this.value)\">";
echo "</form>";

echo "<span id=\"resultados\"></span>";

    echo "<br/>";
    echo "<h3>Lista de superhéroes</h3>";
    foreach ($sh->getAll() as $superh) {
        echo $superh['nombre'] . " ~ "  . $superh['velocidad'];
        if (isset($_SESSION['username'])) {
            if ($_SESSION['userrole'] == "admin" || strtolower($superh['nombre']) == $_SESSION['username']) {
                echo " <a href=\"addSh.php?id=" . $superh['id'] . "\">Modificar</a> <a href=\"delSh.php?id=" . $superh['id'] . "\">Borrar</a></br>";
            } else {
                echo "<br/>";
            }
        } else {
            echo "<br/>";
        }
    }
?>
</body>
</html>
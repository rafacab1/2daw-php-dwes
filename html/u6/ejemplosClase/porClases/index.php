<?php
include("Superheroe.php");
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
</head>
<body>
<h1>Gestión de Superhéroes</h1>
<?php

    if (isset($_POST['buscar'])) {
        $superheroes = $sh->getByNombre(clearData($_POST['nombre']));
        if (count($superheroes) == 0) {
            echo "<p>No se han encontrado superhéroes</p>";
        } else {
            foreach ($superheroes as $superh) {
                echo $superh['nombre'] . " ~ "  . $superh['velocidad'] . " <a href=\"addSh.php?id=" . $superh['id'] . "\">Modificar</a> <a href=\"delSh.php?id=" . $superh['id'] . "\">Borrar</a></br>";    
            }
        }
    }

    echo "</br><a href=\"addSh.php\">Añadir superheroe</a>";
    echo "<form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">";
    echo "<input type=\"text\" name=\"nombre\" placeholder=\"Nombre\">";
    echo "<input type=\"submit\" name=\"buscar\" value=\"Buscar\">";
    echo "</form>";
    echo "<br/>";
    echo "<h3>Lista de superhéroes</h3>";
    foreach ($sh->getAll() as $superh) {
        echo $superh['nombre'] . " ~ "  . $superh['velocidad'] . " <a href=\"addSh.php?id=" . $superh['id'] . "\">Modificar</a> <a href=\"delSh.php?id=" . $superh['id'] . "\">Borrar</a></br>";    
    }
?>
</body>
</html>
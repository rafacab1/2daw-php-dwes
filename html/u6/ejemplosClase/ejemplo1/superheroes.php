<?php

// Limpieza de datos
function clearData($cadena) {
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena;
}

// Conexión con la base de datos
function conectaDB() {
    try {
        $db = new PDO("mysql:host=localhost;dbname=db_superheroes",'root', 'root');
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , 'SET NAMES utf8');
        return($db);
    }
    catch (PDOException $e) {
        print_r($e);
        echo "Error conexión";
        exit();
    }
}

$db = conectaDB();

if (isset($_POST['buscar'])) {
    // Limpieza del nombre
    $nombre = clearData($_POST['nombre']);

    // Busqueda
    $nombre = $nombre ?? 'C%';
    $sql = "SELECT * FROM superheroes WHERE nombre LIKE :nombre";

    $consulta = $db->prepare($sql);
    $aParametros = array(":nombre"=>$nombre);
    $consulta->execute($aParametros);
    $resultado = $consulta->fetchAll();
    $numeroRegistros = $consulta->rowCount();
    echo "Listado de Superhéroes: " . $numeroRegistros . "</br>";
    foreach ($resultado as $superh) {
        echo $superh['nombre'] . " ~ "  . $superh['velocidad'] . " <a href=\"superheroe.php?id=" . $superh['id'] . "\">Modificar</a> <a href=\"borrarsuperh.php?id=" . $superh['id'] . "\">Borrar</a></br>";
    }
} else {
    $sql = "SELECT * FROM superheroes";
    $consulta = $db->prepare($sql);
    $consulta->execute($aParametros);
    $resultado = $consulta->fetchAll();
    $numeroRegistros = $consulta->rowCount();
    echo "Listado de Superhéroes: " . $numeroRegistros . "</br>";
    foreach ($resultado as $superh) {
        echo $superh['nombre'] . " ~ "  . $superh['velocidad'] . " <a href=\"superheroe.php?id=" . $superh['id'] . "\">Modificar</a> <a href=\"borrarsuperh.php?id=" . $superh['id'] . "\">Borrar</a></br>";
    }
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
<?php
    echo "</br><a href=\"superheroe.php\">Añadir superheroe</a>";
    echo "<form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">";
        echo "<input type=\"text\" name=\"nombre\" placeholder=\"Nombre\">";
        echo "<input type=\"submit\" name=\"buscar\" value=\"Buscar\">";
    echo "</form>";
?>
</body>
</html>
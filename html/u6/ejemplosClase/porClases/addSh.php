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

if (isset($_GET['id'])) {
    if (is_numeric($_GET['id'])) {
        // Busqueda
        $resultado = $sh->get($_GET['id']);
    } else {
        header("Location: superheroes.php");
    }
}

// Crear un SH
if (isset($_POST['nuevo']) || isset($_POST['editar'])) {
    // Limpieza del nombre y validación de que la velocidad es un número
    $nombre = clearData($_POST['nombre']);
    if (is_numeric($_POST['velocidad'])) {
        $velocidad = $_POST['velocidad'];
    } else {
        $velocidad = 0;
    }
    if (isset($_POST['editar'])) {
        if (is_numeric($_POST['id'])) {
            $sh->edit(array("id"=> $_POST['id'],"nombre"=>$nombre, "velocidad"=>$velocidad));
        } else {
            header("Location: index.php");
        }
        header("Location:addSh.php?id=" . $_POST['id'] . "&editado");
    } else {
        $sh->set(array("nombre"=>$nombre, "velocidad"=>$velocidad));
        header("Location:addSh.php?id=" . $sh->lastInsert() . "&creado");
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superheroe</title>
</head>
<body>
<h1>Gestión de Superhéroes</h1>
<?php
    echo "<form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">";
        if (isset($resultado)) {
            // Formulario con los datos del superheroe
            echo "<h2>" . $resultado[0]['nombre'] . "</h2>";
            echo "<input type=\"text\" name=\"nombre\" placeholder=\"Nombre\" value=\"" . $resultado[0]['nombre'] . "\"></br>";
            echo "<input type=\"text\" name=\"velocidad\" placeholder=\"Velocidad\" value=\"" . $resultado[0]['velocidad'] . "\"></br>";
            echo "<input type=\"hidden\" name=\"id\" value=\"" . $resultado[0]['id'] . "\">";
            echo "<input type=\"submit\" name=\"editar\" value=\"Editar superheroe\"></br>";
            if (isset($_GET['editado'])) {
                echo "<p>Superhéroe editado.</p>";
            }
            if (isset($_GET['creado'])) {
                echo "<p>Superhéroe creado.</p>";
            }
        } else {
            // Nuevo superheroe
            echo "<h2>Nuevo superheroe</h2>";
            echo "<input type=\"text\" name=\"nombre\" placeholder=\"Nombre\"></br>";
            echo "<input type=\"text\" name=\"velocidad\" placeholder=\"Velocidad\"></br>";
            echo "<input type=\"submit\" name=\"nuevo\" value=\"Añadir superheroe\"></br>";
        }
        echo "<a href=\"index.php\">Volver</a>";
    echo "</form>";
?>
</body>
</html>
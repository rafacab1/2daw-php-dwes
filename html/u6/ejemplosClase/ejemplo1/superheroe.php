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

    // Venimos de superheroes.php con un id, vamos a buscarlo
    if (isset($_GET['id'])) {
        if (is_numeric($_GET['id'])) {
            // Busqueda
            $db = conectaDB();
            $id = $_GET['id'] ?? 'C%';
            $sql = "SELECT * FROM superheroes WHERE id LIKE :id";
            $consulta = $db->prepare($sql);
            $aParametros = array(":id"=>$id);
            $consulta->execute($aParametros);
            $resultado = $consulta->fetchAll();
        } else {
            header("Location: superheroes.php");
        }
    }

    // Venimos del mismo sitio y queremos editar o crear un superheroe
    if (isset($_POST['editar']) || isset($_POST['nuevo'])) {
        // Limpieza del nombre y validación de que la velocidad es un número
        $nombre = clearData($_POST['nombre']);
        if (is_numeric($_POST['velocidad'])) {
            $velocidad = $_POST['velocidad'];
        } else {
            $velocidad = 0;
        }

        if (isset($_POST['editar'])) {
            // Compruebo la ID si lo que quiero es editar, y ya de paso
            // defino la consulta
            if (is_numeric($_POST['id'])) {
                $id = $_POST['id'];
            } else {
                exit();
            }
            $id = $id ?? 0; // Fallo porque no hay id 0
            $sql = "UPDATE superheroes SET nombre = :nombre, velocidad = :velocidad WHERE id = :id";
            $aParametros = array(":nombre"=>$nombre,":velocidad"=>$velocidad,":id"=>$id);
        } else {
            $sql = "INSERT INTO superheroes(nombre, velocidad) VALUES (:nombre, :velocidad)";
            $aParametros = array(":nombre"=>$nombre,":velocidad"=>$velocidad);
        }

        $db = conectaDB();
        $nombre = $nombre ?? 'C%';
        $velocidad = $velocidad ?? 0;
        
        $consulta = $db->prepare($sql);
        if ($consulta->execute($aParametros)) {
            if (isset($_POST['nuevo'])) {
                $id = $db->lastInsertId();
            }
            header("Location:superheroe.php?id=" . $id);
        } else {
            echo "Error al editar";
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
<?php
    echo "<form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">";
        if (isset($resultado)) {
            // Formulario con los datos del superheroe
            echo "<h1>" . $resultado[0]['nombre'] . "</h1>";
            echo "<input type=\"text\" name=\"nombre\" placeholder=\"Nombre\" value=\"" . $resultado[0]['nombre'] . "\"></br>";
            echo "<input type=\"text\" name=\"velocidad\" placeholder=\"Velocidad\" value=\"" . $resultado[0]['velocidad'] . "\"></br>";
            echo "<input type=\"hidden\" name=\"id\" value=\"" . $resultado[0]['id'] . "\">";
            echo "<input type=\"submit\" name=\"editar\" value=\"Editar superheroe\"></br>";
        } else {
            // Nuevo superheroe
            echo "<h1>Nuevo superheroe</h1>";
            echo "<input type=\"text\" name=\"nombre\" placeholder=\"Nombre\"></br>";
            echo "<input type=\"text\" name=\"velocidad\" placeholder=\"Velocidad\"></br>";
            echo "<input type=\"submit\" name=\"nuevo\" value=\"Añadir superheroe\"></br>";
        }
        echo "<a href=\"superheroes.php\">Volver</a>";
    echo "</form>";
?>
</body>
</html>
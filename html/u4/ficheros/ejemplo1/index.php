<?php
/**
 * Subida de archivos
 * 
 * @author Rafa Caballero
 */

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
    <title>Subida de archivos</title>
</head>
<body>
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <label for="file">Filename:</label>
        <input type="file" name="file" id="file"><br/>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <a href="verfotos.php">Ver mis fotos</a>
</body>
</html>
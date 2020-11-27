<?php
/**
 *   @author Rafa Caballero
 */

$imagenes = scandir("upload/");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tus fotos</title>
</head>
<body>
<?php
    foreach ($imagenes as $foto) {
        if ($foto != "." && $foto != "..") {
            echo "<img src=\"upload/" . $foto . "\" width=\"1000px\" height=\"600px\"></img>";
        }
    }
?>
    
</body>
</html>
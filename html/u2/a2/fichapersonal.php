<!DOCTYPE html>
<html>
<head>
	<title>Ficha personal - Actividad 2.2.1</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
/**
    *   Muestra una pequeña ficha personal usando variables
    *
    *   @author Rafa Caballero
    */
$nombre = "Rafael Alberto";
$apellido = "Caballero Osuna";
echo("<h1>" . $nombre . " " . $apellido . "</h1>");
$imagen = "img/foto.png";
echo("<img src='" . $imagen . "'/>");
?>
</body>
</html>

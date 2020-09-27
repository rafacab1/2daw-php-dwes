<!DOCTYPE html>
<html>
<head>
	<title>Edad - Actividad 2.3.3</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
/**
    *   Cargar fecha de nacimiento en una variable y calcular la edad
    *
    *   @author Rafa Caballero
    */
$fecha = "26-10-2001";
$hoy = date("d-m-Y");
$edad = date_diff(date_create($fecha), date_create($hoy));
echo("La edad es: " .$edad->format('%y'));
?>
</body>
</html> 
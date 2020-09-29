<!DOCTYPE html>
<html>
<head>
	<title>Tabla de multiplicar - Actividad 2.3.8</title>
	<meta charset="UTF-8">
</head>
<body>
<table border>
<?php
/**
    *   Tabla de multiplicar del 1 al 10
    *
    *   @author Rafa Caballero
    */
for ($i = 1; $i <= 10; $i++) {
    echo("<tr>");
    for ($j = 1; $j <= 10; $j++) {
        echo("<td>". $i . "*" . $j . "= " . $i*$j . "</td>");
    }
    echo("</tr>");
}
?>
</table>
</body>
</html>
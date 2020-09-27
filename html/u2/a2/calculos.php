<!DOCTYPE html>
<html>
<head>
	<title>Cálculos con variables - Actividad 2.2.4</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
/**
    *   Hace varios cálculos con dos números almacenados en variables
    *
    *   @author Rafa Caballero
    */
$x = 10;
$y = 7;
echo("<p>" . $x . " + " . $y . " = " . ($x+$y) . "</p>");
echo("<p>" . $x . " - " . $y . " = " . ($x-$y) . "</p>");
echo("<p>" . $x . " * " . $y . " = " . ($x*$y) . "</p>");
echo("<p>" . $x . " / " . $y . " = " . ($x/$y) . "</p>");
echo("<p>" . $x . " % " . $y . " = " . ($x%$y) . "</p>");
?>
</body>
</html>

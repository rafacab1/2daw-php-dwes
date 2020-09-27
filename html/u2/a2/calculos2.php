<!DOCTYPE html>
<html>
<head>
	<title>Cálculos con variables 2 - Actividad 2.2.5</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
/**
    *   Hace varios cálculos con una variable que se irá cambiando
    *
    *   @author Rafa Caballero
    */
$valor = 8;
echo("<p>Valor actual " . $valor . "</p>");
$valor += 2;
echo("<p>Suma 2. Valor ahora " . $valor . ".</p>");
$valor -= 4;
echo("<p>Resta 4. Valor ahora " . $valor . ".</p>");
$valor *= 5;
echo("<p>Multiplica por 5. Valor ahora " . $valor . ".</p>"); 
$valor /= 3;
echo("<p>Divide por 3. Valor ahora " . $valor . ".</p>"); 
$valor++;
echo("<p>Incrementa el valor en 1. Valor ahora " . $valor . ".</p>");
$valor--;
echo("<p>Decrementa el valor en 1. Valor ahora " . $valor . ".</p>");
?>
</body>
</html>

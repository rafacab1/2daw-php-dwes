<?php
/**
    * Dado un array 10 elementos de números enteros 
    * (sin coma decimal), encontrar el máximo, y la media
    * de los valores almacenados.
    *
    *   @author Rafa Caballero
    */
$numeros = array(25, 37, 15, 73, 19, 97, 54, 18, 44, 2);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Mayor y Media</title>
	<meta charset="UTF-8">
</head>
<body>
<?php

echo("<p>El máximo es el: " . max($numeros) . "</p>");
echo("<p>La media es: " . array_sum($numeros) / count($numeros) . "</p>");

?>
</body>
</html>
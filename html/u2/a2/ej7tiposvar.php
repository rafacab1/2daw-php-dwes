<!DOCTYPE html>
<html>
<head>
	<title>Tipos de variables - Actividad 2.2.7</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
/**
    *   Informa acerca de una variable que cambia
    *
    *   @author Rafa Caballero
    */
$valor = "";
echo("<p>Valor es " . gettype($valor) . "</p>");
$valor = 3.14;
echo("<p>Valor es " . gettype($valor) . "</p>");
$valor = true;
echo("<p>Valor es " . gettype($valor) . "</p>");
$valor = 2;
echo("<p>Valor es " . gettype($valor) . "</p>");
$valor = NULL;
echo("<p>Valor es " . gettype($valor) . "</p>");
?>
</body>
</html>

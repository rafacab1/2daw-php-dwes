<!DOCTYPE html>
<html>
<head>
	<title>Número mayor - Actividad 2.3.1</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
/**
    *   Muestra el número mayor
    *
    *   @author Rafa Caballero
    */
$a = 3;
$b = 4;
if ($a > $b):
    echo("El número mayor es el " . $a);
elseif ($a == $b):
    echo("Los dos números son iguales (" . $a . ").");
else:
    echo("El número mayor es el " . $b);
endif;
?>
</body>
</html>
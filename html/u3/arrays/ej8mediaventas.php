<?php
/**
    * Dado un array de 20 elementos que consiste en números reales
    * (con coma decimal) y que cada elemento representa la venta del 
    * día de un comercio. Calcular el promedio de venta por día utilizando
    * alguna estructura iterativa. Mostrar el resultado por pantalla.
    *
    *   @author Rafa Caballero
    */
$ventas = array(7.4, 8.2, 3.6, 3.7, 2.5, 8.2, 3.6, 7.2, 12.4, 5.5, 7.9, 2.9, 6.8, 9.4, 10.2, 5.1, 6.7);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ventas</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
$acumulado = 0;
foreach ($ventas as $ventadia) {
    $acumulado += $ventadia;
}

$media = $acumulado / count($ventas);

echo("La media de ventas es: " . $media);

?>
</body>
</html>
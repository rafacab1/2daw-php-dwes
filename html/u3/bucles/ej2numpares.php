<!DOCTYPE html>
<html>
<head>
	<title>Números pares - Actividad 2.3.7</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
/**
    *   Sumar los 3 primeros números pares
    *
    *   @author Rafa Caballero
    */
$i = 1;
$num = 0;
$num_sum = 0;
do {
    $i++;
    $num += 2;
    $num_sum += $num;
    echo("<p>".$num."</p>");   
} while ($i <= 3);
echo("<p>Suma: ".$num_sum."</p>");  
?>
</body>
</html>
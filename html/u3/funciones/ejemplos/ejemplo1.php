<?php
/**
 * Ejemplo funciones anónimas
 * 
 * @author Rafa Caballero
 */

 $enteros = [23, 74, 12, 4, 16, 84, 19, 20, 64, 34, 81, 69, 51];

 $cuadrados = array_map(function ($enteros) {
    return pow($enteros, 2);
 }, $enteros);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 1 Funciones</title>
</head>
<body>
<?php
foreach ($cuadrados as $c) {
    echo ($c);
    echo ("<br/>");
}
?>
</body>
</html>
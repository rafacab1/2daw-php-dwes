<?php
/**
 * 4. Función recursiva que permita sumar los dígitos de un número pasado por la URL.
 * 
 * @author Rafa Caballero
 */


function sumalos($numero) {
    if ($numero == 0) {
        return false;
    } else {
        return sumalos($numero/10) + $numero%10;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 Sumar dígitos</title>
</head>
<body>
<?php
if (isset($_GET['num'])) {
    echo("<p>La suma de todos los dígitos de " . $_GET['num'] . " es " . sumalos($_GET['num']) . "</p>");
} else {
    echo("<p>Indica el número añadiendo ?num=1234 a la URL</p>");
}
?>
</body>
</html>
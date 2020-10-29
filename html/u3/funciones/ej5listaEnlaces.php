<?php
/**
 * 5. Escribir un script que muestre una lista de enlaces.
 *  Los enlaces serán creados por una función que recibirá 
 * como como parámetro un array con las opciones necesarias.
 * 
 * @author Rafa Caballero
 */

$enlaces = array(
    array("url" => "https://www.google.com", "nombre" => "Google"),
    array("url" => "https://moodle.iesgrancapitan.org", "nombre" => "Moodle Gran Capitán"),
    array("url" => "https://www.iesgrancapitan.org", "nombre" => "Web del IES Gran Capitán"),
    array("url" => "https://www.youtube.com", "nombre" => "YouTube")
);


function verEnlaces($enlaces) {
    echo ("<ul>");
    foreach ($enlaces as $enlace) {
        echo ("<li><a href=\"" . $enlace['url'] . "\">" . $enlace['nombre'] . "</a></li>");
    }
    echo ("</ul>");
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
<p>Nota: El funcionamiento de este ejercicio también está aplicado en la página principal</p>
<?php
    verEnlaces($enlaces);
?>
</body>
</html>
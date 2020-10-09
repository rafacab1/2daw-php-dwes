<?php
/**
    *   Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres.
    *   Almacenar información incluyendo foto y mostrar los menús disponibles.
    *   Mostrar el precio del menú suponiendo que éste se calcula sumando el 
    *   precio de cada uno de los platos incluidos y con un descuento del 20 %.
    *
    *   @author Rafa Caballero
    */
$restaurante = array(
    "primeros"=>array(
        array("plato"=>"Lentejas", "precio"=>"2", "foto"=>"img/restaurante/lentejas.jpg"),
        array("plato"=>"Sopa de pollo", "precio"=>"3", "foto"=>"img/restaurante/sopa.jpg"),
        array("plato"=>"Sopa de macaco", "precio"=>"5", "foto"=>"img/restaurante/sopa2.jpg"),
    ),
    "segundos"=>array(
        array("plato"=>"Solomillo de cerdo", "precio"=>"10", "foto"=>"img/restaurante/solomillo.png"),
        array("plato"=>"Croquetas de pollo", "precio"=>"6", "foto"=>"img/restaurante/croquetas.jpg"),
        array("plato"=>"Lomo a la pimienta", "precio"=>"8", "foto"=>"img/restaurante/lomo.jpg"),
        array("plato"=>"Flamenquín", "precio"=>"5", "foto"=>"img/restaurante/flamenquin.jpg"),
        array("plato"=>"Hamburguesa", "precio"=>"3", "foto"=>"img/restaurante/hamburguesa.jpg"),
    ),
    "postres"=>array(
        array("plato"=>"Mousse de Limón", "precio"=>"2", "foto"=>"img/restaurante/mousse.jpg"),
        array("plato"=>"Tarta de la abuela", "precio"=>"1", "foto"=>"img/restaurante/tartaabuela.jpg"),
        array("plato"=>"Tarta de queso", "precio"=>"2", "foto"=>"img/restaurante/tartaqueso.jpg"),
    )
)
?>
<!DOCTYPE html>
<html>
<head>
	<title>Restaurante</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
$primeros = $restaurante["primeros"];
$segundos = $restaurante["segundos"];
$postres = $restaurante["postres"];

foreach ($primeros as $plato1) {
    echo("<table border>");
    foreach($segundos as $plato2) {
        foreach($postres as $postre) {
            $precio = 0;
            echo("<tr>");
            echo("<td>" . $plato1["plato"] . "<img src=\"". $plato1["foto"] . "\" width=\"300\" height=\"200\"></td>");
            echo("<td>" . $plato2["plato"] . "<img src=\"". $plato2["foto"] . "\" width=\"300\" height=\"200\"></td>");
            echo("<td>" . $postre["plato"] . "<img src=\"". $postre["foto"] . "\" width=\"300\" height=\"200\"></td>");

            // Precio 
            $precio = $plato1["precio"] + $plato2["precio"] + $postre["precio"];
            $precio = ($precio/20*100);
            echo("<td>Precio: " . $precio . "€</td>");

            echo("</tr>");
        }
    }
    echo("</table>");
    echo("<br>");
}

?>
</body>
</html>
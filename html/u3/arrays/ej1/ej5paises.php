<?php
/**
    *   Información sobre continentes, países, capitales y banderas.
    *
    *   @author Rafa Caballero
    */

$continentes = array(
    array("continente"=>"Europa", "paises"=>array(array("pais"=>"España", "capital"=>"Madrid", "bandera"=>"img/espana.png"), array("pais"=>"Reino Unido", "capital"=>"Londres", "bandera"=>"img/reinounido.png"), array("pais"=>"Suecia", "capital"=>"Estocolmo", "bandera"=>"img/suecia.png"))),
    array("continente"=>"América", "paises"=>array(array("pais"=>"Perú", "capital"=>"Lima", "bandera"=>"img/peru.png"), array("pais"=>"Canadá", "capital"=>"Ottawa", "bandera"=>"img/canada.png"))),
    array("continente"=>"África", "paises"=>array(array("pais"=>"Chad", "capital"=>"Yamena", "bandera"=>"img/chad.png"), array("pais"=>"Uganda", "capital"=>"Kampala", "bandera"=>"img/uganda.png"))),
    array("continente"=>"Asia", "paises"=>array(array("pais"=>"China", "capital"=>"Pekín", "bandera"=>"img/china.png"), array("pais"=>"Japón", "capital"=>"Tokio", "bandera"=>"img/japon.png"))),
    array("continente"=>"Oceanía", "paises"=>array(array("pais"=>"Australia", "capital"=>"Canberra", "bandera"=>"img/australia.png")))
);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Continentes, países, capitales y banderas</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
foreach ($continentes as $continente) {
    echo("<h1>" . $continente["continente"] . "</h1>");
    echo("<table border>");
    echo("<tr><th>País</th><th>Capital</th><th>Bandera</th></tr>");
    foreach ($continente["paises"] as $pais) {
        echo("<tr><td>" . $pais["pais"] . "</td><td>" . $pais["capital"] . "</td><td><img src=\"" . $pais["bandera"] . "\"/>");
    }
    echo("</table>");
}
?>
</table>
</body>
</html>
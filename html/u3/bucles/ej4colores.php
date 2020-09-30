<!DOCTYPE html>
<html>
<head>
	<title>Paleta de colores - Actividad 2.3.9</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
/**
    *   Mostrar una paleta de colores
    *
    *   @author Rafa Caballero
    */
$red = 0;
$green = 0;
$blue = 0;

while ($red <= 255) {
    $red += 50;
    while ($green <= 255) {
        $green += 50;
        while ($blue <= 255) {
            $blue += 50;
            echo("<div style=\"background-color:rgb(" . $red . "," . $green . "," . $blue . ");height:60px;width:60px;display:inline-block;\"></div>");
        }
        $blue = 0;
        echo("<div style=\"background-color:rgb(" . $red . "," . $green . "," . $blue . ");height:60px;width:60px;display:inline-block;\"></div>");
    }
    echo("<div style=\"background-color:rgb(" . $red . "," . $green . "," . $blue . ");height:60px;width:60px;display:inline-block;\"></div>");
    $green = 0;
}
?>
</body>
</html>
<?php
/**
    *   Nota de los alumnos de 2º DAW para el módulo DWES.
    *
    *   @author Rafa Caballero
    */
$notas = array(
    array("alumno"=>"Rafa", "notas"=>array(5, 6, 7, 10)),
    array("alumno"=>"Juan", "notas"=>array(4, 3, 7, 6)),
    array("alumno"=>"Pepe", "notas"=>array(1, 7, 3, 3)),
    array("alumno"=>"Antonio", "notas"=>array(2, 4, 1, 4)),
    array("alumno"=>"Pedro", "notas"=>array(5, 8, 7, 6))
);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Notas DWES</title>
	<meta charset="UTF-8">
</head>
<body>
<h1>Notas DWES - 2º DAW</h1>
<?php
foreach ($notas as $aNotas) {
    echo("<h3>".$aNotas["alumno"]."</h3>");
    foreach ($aNotas["notas"] as $nota) {
        echo($nota . " ");
    }
}
?>
</body>
</html>
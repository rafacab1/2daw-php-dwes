<!DOCTYPE html>
<html>
<head>
	<title>Cabecera - Actividad 2.3.4</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
/**
    *   Cabecera en función de la estación del año.
    *
    *   @author Rafa Caballero
    */

$anno = date("Y");

// Para pruebas
$hoy = date_create("27-09-". $anno);
// Para producción
// $hoy = date_create(date("d-m-Y"));


#Otoño
$otonno_inicio = date_create("21-09-". $anno);
$otonno_final = date_create("20-12-". $anno);

#Invierno
$invierno_inicio = date_create("21-12-". $anno);
$invierno_final = date_create("20-03-". $anno);

# Verano
$verano_inicio = date_create("21-06-". $anno);
$verano_final = date_create("20-09-". $anno);

# Primavera
$primavera_inicio = date_create("21-03-". $anno);
$primavera_final = date_create("20-06-". $anno);

$ruta = "img/ej4/invierno.png";

if ($hoy > $otonno_inicio && $hoy < $otonno_final):
    $ruta = "img/ej4/otonno.png";
elseif ($hoy > $primavera_inicio && $hoy < $primavera_final):
    $ruta = "img/ej4/primavera.png";
elseif ($hoy > $verano_inicio && $hoy < $verano_final):
    $ruta = "img/ej4/verano.png";
elseif ($hoy > $primavera_inicio && hoy < $primavera_final):
    $ruta = "img/ej4/primavera.png";
endif;

echo("<header><img src=\"". $ruta ."\"/></header>");
?>
</body>
</html> 
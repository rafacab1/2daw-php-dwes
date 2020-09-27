<!DOCTYPE html>
<html>
<head>
	<title>Calcular días mes - Actividad 2.3.2</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
/**
    *   Cargar en variables mes y año e indicar
    *   el número de días del mes 
    *
    *   @author Rafa Caballero
    */
$mes = 2;
$anno = 2020;
$bisiesto = false;

if ($mes == 1 || $mes == 3 || $mes == 5 || $mes == 7 || $mes == 8 || $mes == 10 || $mes ==12 ):
    echo("<p>El mes " . $mes . " del " . $anno . " tiene " . 31 . " días</p>");
elseif ($mes == 2):
    // Si es febrero calculo si el año es bisiesto
    if ($anno % 4 == 0):
        if ($anno % 100 == 0):
            if ($anno % 400 == 0):
                $bisiesto = true;
            else:
                $bisiesto = false;
            endif;
        else:
            $bisiesto = true;
        endif;
    else:
        $bisiesto = false;
    endif;

    if ($bisiesto):
        echo("<p>El mes " . $mes . " del " . $anno . " tiene " . 29 . " días</p>");
    else:
        echo("<p>El mes " . $mes . " del " . $anno . " tiene " . 28 . " días</p>");
    endif;
else:
    echo("<p>El mes " . $mes . " del " . $anno . " tiene " . 30 . " días</p>");
endif;
?>
</body>
</html>
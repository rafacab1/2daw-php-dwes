<!DOCTYPE html>
<html>
<head>
	<title>Calendario - Actividad 2.3.10</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
/**
    *   Dado un mes y un año, mostrar el calendario del mes.  Marcar el día actual en verde y los festivos en rojo
    *
    *   @author Rafa Caballero
    */
$dia = 26; // Entero
$mes = 10; // Entero
$anno = 2020; // Entero
$dias_mes = 0; // Entero
$nombre_mes = ""; // String
$color = ""; // String
$festivos =  array(12, 24);  // Array

$bisiesto = false;

// Primero calculo cuantos días tiene ese mes
if ($mes == 1 || $mes == 3 || $mes == 5 || $mes == 7 || $mes == 8 || $mes == 10 || $mes ==12 ):
    $dias_mes = 31;
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
        $dias_mes = 29;
    else:
        $dias_mes = 28;
    endif;
else:
    $dias_mes = 30;
endif;

switch ($mes) {
    case 1 :
        $nombre_mes = "enero";
        break;

    case 2:
        $nombre_mes = "febrero";
        break;
    
    case 3:
        $nombre_mes = "marzo";
        break;

    case 4:
        $nombre_mes = "abril";
        break;
    
    case 5:
        $nombre_mes = "mayo";
        break;

    case 6:
        $nombre_mes = "junio";
        break;

    case 7:
        $nombre_mes = "julio";
        break;

    case 8:
        $nombre_mes = "agosto";
        break;

    case 9:
        $nombre_mes = "septiembre";
        break;

    case 10:
        $nombre_mes = "octubre";
        break;

    case 11:
        $nombre_mes = "noviembre";
        break;

    case 12:
        $nombre_mes = "diciembre";
        break;

    default:
        $nombre_mes = "enero";
        $mes = 1;
        break;
}

$j = 0;
echo("<table border><tr><th colspan=\"7\">". $nombre_mes . " ". $anno . "</th></tr>");
for ($i = 1; $i <= $dias_mes; $i++) {

    // Color blanco por defecto
    $color = "white";

    // Si $i es hoy que el fondo sea verde
    if ($i == $dia) {
        $color = "green";
    }

    // Si $i es festivo que el fondo sea rojo
    // https://www.php.net/manual/es/function.in-array.php
    if (in_array($i, $festivos)) {
        $color = "red";
    }

    // Empiezo la fila
    if ($j == 0) {
        echo("<tr>");
    }

    echo("<td style=\"background-color:" . $color . ";\">" . $i . "</td>");
    $j++;

    // Si el número llega a 7 acabo la fila
    if ($j >= 7) {
        echo("</tr>");
        $j = 0;
    }
}
echo("</table>")

?>
</body>
</html>
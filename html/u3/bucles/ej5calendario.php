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
$dia = 2; // Entero
$mes = 10; // Entero
$anno = 2020; // Entero
$dias_mes = 0; // Entero
$nombre_mes = ""; // String
$color = ""; // String
$festivosAutonomicos = array();
$festivosNacionales = array();
$festivosLocales = array();

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
        $festivosNacionales = array(1, 6);
        break;

    case 2:
        $nombre_mes = "febrero";
        $festivosAutonomicos = array(28);
        break;
    
    case 3:
        $nombre_mes = "marzo";
        break;

    case 4:
        $nombre_mes = "abril";
        $festivosNacionales = array(10);
        break;
    
    case 5:
        $nombre_mes = "mayo";
        $festivosNacionales = array(1);
        break;

    case 6:
        $nombre_mes = "junio";
        break;

    case 7:
        $nombre_mes = "julio";
        break;

    case 8:
        $nombre_mes = "agosto";
        $festivosNacionales = array(15);
        break;

    case 9:
        $nombre_mes = "septiembre";
        $festivosLocales = array(8);
        break;

    case 10:
        $nombre_mes = "octubre";
        $festivosNacionales = array(12);
        $festivosLocales = array(24);
        break;

    case 11:
        $nombre_mes = "noviembre";
        $festivosNacionales = array(1);
        break;

    case 12:
        $nombre_mes = "diciembre";
        $festivosNacionales = array(6, 8, 25);
        break;

    default:
        $nombre_mes = "enero";
        $festivosNacionales = array(1, 6);
        $mes = 1;
        break;
}

// Calculo que día de la semana es el primero
$primerdia = date("w", mktime(0, 0, 0, $mes, 1, $anno));


$j = 0; // Con esta variable controlo en que posición del calendario estoy
        // para saber cuando debo saltar de fila en la tabla

echo("<table border><tr><th colspan=\"7\">". $nombre_mes . " ". $anno . "</th></tr>");
echo("<tr>
        <th>L</th>
        <th>M</th>
        <th>X</th>
        <th>J</th>
        <th>V</th>
        <th>S</th>
        <th>D</th>
    </tr>");

// Si el primer día del mes cae en domingo $primerdia es 0, lo hago a parte para dejar 6 huecos y no 0
if ($primerdia == 0) {
    for ($a = 1; $a < 7; $a++) {
        if ($j == 0) {
            echo("<tr>");
        }
    
        echo("<td></td>");
    
        // Si el número llega a 7 acabo la fila
        if ($j >= 7) {
            echo("</tr>");
            $j = 0;
        }
        $j++;
    }
} else {
    for ($a = 1; $a < $primerdia; $a++) { // Dejo tantos huecos como la posición del día de la semana
        if ($j == 0) {
            echo("<tr>");
        }
    
        echo("<td></td>");
    
        // Si el número llega a 7 acabo la fila
        if ($j >= 7) {
            echo("</tr>");
            $j = 0;
        }
        $j++;
    }
}

for ($i = 1; $i <= $dias_mes; $i++) {

    // Color blanco por defecto
    $color = "white";

    // Si $i es festivo nacional que el fondo sea rojo
    // https://www.php.net/manual/es/function.in-array.php
    if (in_array($i, $festivosNacionales)) {
        $color = "red";
    }

    // Si es festivo autonómico naranja... (Andalucía)
    if (in_array($i, $festivosAutonomicos)) {
        $color = "orange";
    }

    // Si es festivo local azul... (Córdoba)
    if (in_array($i, $festivosLocales)) {
        $color = "blue";
    }

    // Si $i es hoy que el fondo sea verde
    if ($i == $dia) {
        $color = "green";
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
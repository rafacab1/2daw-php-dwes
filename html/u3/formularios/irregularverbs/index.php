<?php
/**
 * Irregular verbs
 * 
 * @author Rafa Caballero
 * github.com/rafacab1
 * 
 * Vistas:
 * - Inicial, en la que se pregunta al usuario cuandos verbos quiere y el nivel de dificultad
 *      Fácil -> Un hueco vacío
 *      Medio -> Dos huecos vacíos
 *      Difícil -> Tres huecos vacíos
 * - Principal, aparece la actividad como tal
 */

 // infinitive[0] - past simple[1] - past participle[2] - spanish[3]
 // TODO: http://www.english-area.com/paginas/irregulares.pdf
 
 // Variable que controla si estamos dentro de la actividad
 $enActividad = false;

 // Array para mostrar las dificultades con un bucle
 $dificultades = array("Fácil", "Medio", "Difícil");

 // Datos introducidos por el usuario
 $nVerbosEsc;
 $difEsc;

 // Array con los verbos que se usarán
 $verbosUsados = array();

 // Array con las respuestas
 $respuestas = array();

 // Array con TODOS los verbos
 $verbos = array(
    array("arise", "arose", "arisen", "levantarse"),
    array("awake", "awoke", "awoken", "despertarse"),
    array("be", "was/were", "been", "ser"),
    array("bear", "bore", "born", "soportar"),
    array("beat", "beat", "beaten", "golpear"),
    array("become", "became", "become", "llegar a ser"),
    array("begin", "began", "begun", "empezar"),
    array("bend", "bent", "bent", "doblar"),
    array("bet", "bet", "bet", "apostar"),
    array("bind", "bound", "bound", "vendar"),
    array("bite", "bit", "bitten", "morder"),
    array("bleed", "bled", "bled", "sangrar"),
    array("blow", "blew", "blown", "soplar"),
    array("break", "broke", "broken", "romper"),
    array("bring", "brought", "brought", "traer"),
    array("broadcast", "broadcast", "broadcast", "emitir"),
    array("build", "built", "built", "construir"),
    array("buy", "bought", "bought", "comprar"),
    array("cast", "cast", "cast", "echar"),
    array("catch", "caught", "caught", "coger"),
    array("choose", "chose", "chosen", "elegir"),
    array("cling", "clung", "clung", "aferrarse")
);

 // Función para limpiar los datos introducidos en la actividad
 function clearData($cadena) {
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena;
}

// Función para validar que el número introducido en la vista inicial
// es realmente un número
 function esNumeroValido($numero) {
    global $verbos; // https://www.geeksforgeeks.org/php-variables/
    if ($numero >= 1 && $numero <= count($verbos)) {
        return true;
    } else {
        return false;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Irregular Verbs!</title>
</head>
<body>

<header>
    <h1>Irregular Verbs!</h1>
</header>
<?php
//////////////////////////////////////////////////////////////////////////
//////////////////////////////VISTA INICIAL///////////////////////////////
//////////////////////////////VISTA INICIAL///////////////////////////////
//////////////////////////////VISTA INICIAL///////////////////////////////
//////////////////////////////////////////////////////////////////////////


// Validación datos iniciales
if (isset($_POST['comenzar'])) {
    $enActividad = true;

    if (empty($_POST['nVerbos'])) {
        $enActividad = false; // Entrada incorrecta
    } elseif (esNumeroValido($_POST['nVerbos'])) {
        $nVerbosEsc = $_POST['nVerbos']; // Entrada correcta
    } else {
        $enActividad = false;  // Entrada incorrrecta
        // TODO: Definir errores
    }

    if (empty($_POST['dificultad'])) {
        $enActividad = false; // Entrada incorrecta
        // TODO: Definir errores
    } else {
        $difEsc = $_POST['dificultad'];
    }
}

// Vista inicial
if (!$enActividad) {
    // Número de verbos
    echo ("<form method=\"post\" action=\"" . $SERVER['PHP_SELF'] . "\">");
    echo ("<input type=\"number\" name=\"nVerbos\" placeholder=\"Introduce el número de verbos\" min=\"1\" max=\"" . count($verbos) .  "\" value=\"1\">");

    // Nivel de dificultad
    echo ("<select name=\"dificultad\">");
    foreach ($dificultades as $df) {
        echo ("<option value=\"" . $df . "\">" . $df . "</option>");
    }
    echo ("</select>");

    // Botón
    echo ("<input type=\"submit\" name=\"comenzar\" value=\"Comenzar\">");
    echo ("</form>");
} else {
    //////////////////////////////////////////////////////////////////////////
    //////////////////////////////VISTA PRINCIPAL/////////////////////////////
    //////////////////////////////VISTA PRINCIPAL/////////////////////////////
    //////////////////////////////VISTA PRINCIPAL/////////////////////////////
    //////////////////////////////////////////////////////////////////////////

    if ($enActividad) {
        // Un bucle, de 1 a número de verbos indicados, que genera números
        // aleatorios y así selecciona los verbos
        for ($i = 0; $i<$nVerbosEsc; $i++) {
            $random = rand(0, count($verbos));
            $verbosUsados[$i] = $verbos[$random];
            // TODO: Controlar que no se repitan los verbos
        }

        echo ("<form method=\"post\" action=\"" . $SERVER['PHP_SELF'] . "\">");
        foreach ($verbosUsados as $vbjg) {
            if ($difEsc == "Fácil") {
                // Número aleatorio del 0 al 3
                $randomFac = rand(0, 3);
                foreach ($vbjg as $indice => $verbo) {
                        if ($indice == $randomFac) {
                            array_push($respuestas, $verbo[$i]);
                            echo ("<input type=\"text\" name=\"respuesta\">");
                        } else {
                            echo ("<input type=\"text\" value=\"" . $verbo . "\">");
                        }
                }
                echo ("<br>");
            }
            if ($difEsc == "Medio") {
                // Dos números aleatorios del 0 al 3 que no se repiten
                $randomMed1 = rand(0, 3);
                $randomMed2 = rand(0, 3);
                while ($randomMed1 == $randomMed2) {
                    $randomMed2 = rand(0, 3);
                }
                foreach ((array) $vbjg as $indice => $verbo) {
                    if ($indice == $randomMed1 || $indice == $randomMed2) {
                        array_push($respuestas, $verbo[$i]);
                        echo ("<input type=\"text\" name=\"respuesta\">");
                    } else {
                        echo ("<input type=\"text\" value=\"" . $verbo . "\">");
                    }
                }
                echo ("<br/>");
            }
            if ($difEsc == "Difícil") {
                // Tres números aleatorios del 0 al 3 que no se repiten
                $randomDif1 = rand(0, 3);
                $randomDif2 = rand(0, 3);
                $randomDif3 = rand(0, 3);
                while ($randomDif1 == $randomDif2 && $randomDif2 == $randomDif3 && $randomDif1 == $randomDif3) {
                    $randomDif2 = rand(0, 3);
                    $randomDif3 = rand(0, 3);
                }
                // TODO: Comprobar porque en ocasiones salen 2 huecos en vez de 3
                foreach ((array) $vbjg as $indice => $verbo) {
                    if ($indice == $randomDif1 || $indice == $randomDif2 || $indice == $randomDif3) {
                        array_push($respuestas, $verbo[$i]);
                        echo ("<input type=\"text\" name=\"respuesta\">");
                    } else {
                        echo ("<input type=\"text\" value=\"" . $verbo . "\">");
                    }
                }
                echo ("<br/>");
            }
        }
        echo ("<br><input type=\"submit\" name=\"enviar\" value=\"Enviar\">");
        echo ("</form>");
    }   
}
?>
</body>
</html>
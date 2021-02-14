<?php
include 'config/arrayPreguntas.php';


// Si no existen las cookies las creo en false
// false => Test no realizado
// numero aciertos => Test realizado
if (!isset($_COOKIE['t1'])) {
    setcookie('t1', 'false', time()+3600*24*365);
    $_COOKIE['t1'] = 'false';
}
if (!isset($_COOKIE['t2'])) {
    setcookie('t2', 'false', time()+3600*24*365);
    $_COOKIE['t2'] = 'false';
}
if (!isset($_COOKIE['t3'])) {
    setcookie('t3', 'false', time()+3600*24*365);
    $_COOKIE['t3'] = 'false';
}

/**
 * Función que muestra los tests
 * 
 * @param int $nTest
 * @param array $aTests
 */
function mostrarTest($nTest, $aTests) {
    $images = scandir('img' . $nTest);

    // Títulos
    echo ("<h1>". $aTests[$nTest-1]['Categoria'] . ". Test " . $aTests[$nTest-1]['idTest'] ."</h1>");
    echo ("<h3>". $aTests[$nTest-1]['Permiso'] . "</h3>");
    echo ("<a href=\"?reiniciarTests\">Reiniciar tests...</a>");

    // Preguntas
    echo "<form method=\"post\" action=\"" . $SERVER['PHP_SELF'] . "\">";
    foreach ($aTests[$nTest-1]['Preguntas'] as $pregunta) {
        if (in_array($pregunta['idPregunta'], $images)) {
            echo "<img src=\"img" . $nTest . "/" . $pregunta['idPregunta'] . "\">";
        }
        echo "<p>" . $pregunta['Pregunta'] . "</p>";
        foreach ($pregunta['respuestas'] as $respuesta) {
            // value = $respuesta[0] == a | b | c
            // name = 1|2|3|4...
            echo "<input type=\"radio\" name=\"" . $pregunta['idPregunta'] . "\" value=\"" . $respuesta[0] . "\">";
            echo "<label for=\"respuestaTest\">" . $respuesta . "</label>";
            echo "<br>";
        }
        echo "<br>";       
    }
    echo "<input type=\"submit\" name=\"corregir" . $nTest . "\" value=\"Corregir\">";
    echo "</form>";
}

/** 
 * Función que corrige los tests
 * 
 * @param int $nTest
 * @param array $aTests
 */
function corregirTest($nTest, $aTests) {
    $corregidas = 1;
    $aciertos = 0;
    $cookie = 't' . $nTest;

    foreach($aTests[$nTest - 1]['Corrector'] as $correcta) {
        if ($correcta == $_POST[$corregidas]) {
            $aciertos++;
        }
        $corregidas++;
    }
    if ($aciertos>=8) {
        $corregidas = 1;
        setcookie($cookie, strval($aciertos), time()+3600*24*365);
        $_COOKIE[$cookie] = strval($aciertos);
        echo ("<h1 style=\"color:green;\">Enhorabuena, has completado el primer test.</h1>");
        echo ("<h3>Aciertos: " . $aciertos . "</h3>");
        foreach($aTests[$nTest - 1]['Corrector'] as $correcta) {
            if ($correcta == $_POST[$corregidas]) {
                echo ("<p style=\"color:green;\">". $corregidas .". Respuesta correcta: " . $correcta . " Tu respuesta: " . $_POST[$corregidas] . "</p>");
            } else {
                echo ("<p style=\"color:red;\">". $corregidas .". Fallo, respuesta correcta: " . $correcta . " Tu respuesta: " . $_POST[$corregidas] . "</p>");
            }
            $corregidas++;
        }
    } else {
        echo ("<h1>Vaya...</h1>");
        echo ("<h3 style=\"color:red;\">Has suspendido el primer test porque has tenido " . $aciertos . " aciertos y necesitas 8.</h3>");
    } 
}

// CORREGIR PRIMER TEST
if (isset($_POST['corregir1'])) {
    corregirTest(1, $aTests);
}

// CORREGIR SEGUNDO TEST
if (isset($_POST['corregir2'])) {
    corregirTest(2, $aTests);
}

// CORREGIR TERCER TEST
if (isset($_POST['corregir3'])) {
    corregirTest(3, $aTests);
}

if (isset($_GET['reiniciarTests'])) {
    setcookie('t1', 'false', time()+3600*24*365);
    $_COOKIE['t1'] = 'false';
    setcookie('t2', 'false', time()+3600*24*365);
    $_COOKIE['t2'] = 'false';
    setcookie('t3', 'false', time()+3600*24*365);
    $_COOKIE['t3'] = 'false';
    header('Location: .');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Autoescuela - Rafael Alberto Caballero Osuna</title>
</head>
<body>
<?php

// Si aún no he realizado el n test
if ($_COOKIE['t1'] == 'false') {
    mostrarTest(1, $aTests);
} elseif ($_COOKIE['t2'] == 'false') {
    echo "<p>Último test realizado... 1, con " . $_COOKIE['t1']  . " aciertos.</p>";
    mostrarTest(2, $aTests);
} elseif ($_COOKIE['t3'] == 'false') {
    echo "<p>Último test realizado... 2, con " . $_COOKIE['t2'] . " aciertos.</p>";
    mostrarTest(3, $aTests);
} else {
    echo "<h1 style=\"color:green;\">Enhorabuena, has superado todos los tests.</h1>";
    echo "<p>Test 1: " . $_COOKIE['t1'] . " aciertos.</p>";
    echo "<p>Test 2: " . $_COOKIE['t2'] . " aciertos.</p>";
    echo "<p>Test 3: " . $_COOKIE['t3'] . " aciertos.</p>";
    echo ("<a href=\"?reiniciarTests\">Reiniciar tests...</a>");
}
?>
    
</body>
</html>
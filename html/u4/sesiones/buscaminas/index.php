<?php
/**
 * Buscaminas en PHP
 * 
 * 
 * @author Rafa Caballero
 */

// Inicio de sesión
session_start();

// TODO: Cambiar por formulario inicial
const NUMEROFILAS = 10;
const NUMEROCOLUMNAS = 10;
const NUMEROMINAS = 10;
const debugTrampa = true;

/**
 * iniciarTableros()
 * 
 * Inicializa ambos tableros con 0.
 */
function iniciarTableros() {
    for ($i=1; $i<NUMEROFILAS; $i++) {
        for ($j=1; $j<NUMEROCOLUMNAS; $j++) {
            $_SESSION['tablero'][$i][$j] = 0;
            $_SESSION['tableroVisible'][$i][$j] = 0;
        }
    }
    colocarMinas();
}

/**
 * colocarMinas()
 * 
 * Reparte minas por el campo.
 */
function colocarMinas() {
    $numMinas = 0;
    do {
        $numFila = rand(0, NUMEROFILAS);
        $numCol = rand(0, NUMEROCOLUMNAS);
        if ($_SESSION['tablero'][$numFila][$numCol] != 9) { // Si en esta posición no hay mina
            $_SESSION['tablero'][$numFila][$numCol] = 9; // Añado la mina
            $numMinas++;
            // Sumo uno alrededor para indicar que está cerca la mina
            for ($i=max($numFila-1, 0); $i<=min($numFila+1, 9); $i++) {
                for ($j=max($numCol-1, 0); $j<=min($numCol+1, 9); $j++) {
                    if ($_SESSION['tablero'][$i][$j] != 9) { // Si no hay mina...
                        $_SESSION['tablero'][$i][$j]++;
                    }
                }
            }
        }
    } while ($numMinas <= NUMEROMINAS);
}

/**
 * mostrarTablero()
 * 
 * Muestra el tablero
 */
function mostrarTablero() {
    for ($i=1; $i<NUMEROFILAS; $i++) {
        for ($j=1; $j<NUMEROCOLUMNAS; $j++) {
            if ($_SESSION['tableroVisible'][$i][$j] == 1 || strval($_SESSION['tableroVisible'][$i][$j]) == "#") {
                echo ($_SESSION['tableroVisible'][$i][$j] . "\t");
            } else {
                echo ("<a href=\"?fila=" . $i . "&columna=" . $j . "\">" . $_SESSION['tableroVisible'][$i][$j] . "</a>\t");
            }
        }
        echo ("<br/>");
    }
}

/**
 * mostrarTableroRelleno()
 * 
 * Muestra el tablero en el que se puede ver todo.
 */
function mostrarTableroRelleno() {
    for ($i=1; $i<NUMEROFILAS; $i++) {
        for ($j=1; $j<NUMEROCOLUMNAS; $j++) {
            if ($_SESSION['tablero'][$i][$j] == 1) {
                echo ($_SESSION['tablero'][$i][$j] . "\t");
            } else {
                echo ("<a href=\"?fila=" . $i . "&columna=" . $j . "\">" . $_SESSION['tablero'][$i][$j] . "</a>\t");
            }
        }
        echo ("<br/>");
    }
    echo ("<br/>");
}

/**
 * juegoFinalizado
 * 
 * Muestra el Game Over o cuando ganas.
 * $resultado => false si pierde, true si gana
 */
function juegoFinalizado($resultado) {
    if (!$resultado) {
        echo ("<h1>GAME OVER</h1>");
    } else {
        // TODO: Mostrar que ha ganado
    }
}

/**
 * clickCasilla()
 * 
 * Función que se ejecuta al hacer click
 */
function clickCasilla($f, $c) {
    if($_SESSION['tablero'][$f][$c] == 9) {
        $_SESSION['tableroVisible'][$f][$c] = 9;
        juegoFinalizado(false); // Ha pisado mina
    } elseif ($_SESSION['tablero'][$f][$c] != 0) { // Cerca de mina
        $_SESSION['tableroVisible'][$f][$c] = $_SESSION['tablero'][$f][$c];
    } else { // Es cero
        // Click casilla con lo que hay alrededor
        for ($i=max($f-1, 0); $i<=min($f+1, 9); $i++) {
            for ($j=max($c-1, 0); $j<=min($c+1, 9); $j++) {
                $_SESSION['tableroVisible'][$f][$c] = "#";
                if ($_SESSION['tablero'][$i][$j] != $_SESSION['tablero'][$f][$c]) {
                    clickCasilla($i, $j);
                }
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta author="Rafa Caballero">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscaminas</title>
</head>
<body>
    <h1>Buscaminas</h1>
<?php

echo "<a href=\"salir.php\">Reiniciar</a><br/>";

if (!isset($_SESSION['tablero']) || !isset($_SESSION['tableroVisible'])) {
    $_SESSION['tablero'] = array();
    $_SESSION['tableroVisible'] = array();
    iniciarTableros();
}

if (debugTrampa) {
    mostrarTableroRelleno();
}

if (!isset($_GET['fila']) && !isset($_GET['columna'])) {
    mostrarTablero();
}

if (isset($_GET['fila']) && isset($_GET['columna'])) {
    clickCasilla($_GET['fila'], $_GET['columna']);
    mostrarTablero();
}


?>
</body>
</html>
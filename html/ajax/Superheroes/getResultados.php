<?php
/**
 * 
 * @author Rafa Caballero
 */
require('Superheroe.php');
// Obtengo los superhéroes de la BD
$sh = Superheroe::getInstancia();

$str = $_REQUEST["q"];

$resultado = "";

if ($str !== "") {
    $str = strtolower($str);
    $len = strlen($str);
    foreach ($sh->getAll() as $superh) {
        if (stristr($str, substr($superh['nombre'], 0, $len))) {
            $resultado .= $superh['nombre'] . " ~ "  . $superh['velocidad'] . " <a href=\"addSh.php?id=" . $superh['id'] . "\">Modificar</a> <a href=\"delSh.php?id=" . $superh['id'] . "\">Borrar</a></br>";
        }
    }
}

echo $resultado == "" ? "No hay resultados" : $resultado;

?>
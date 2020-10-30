<?php
/**
 * Crear un script para sumar una serie de números. 
 * El número de números a sumar será introducido en un formulario.
 * 
 * @author Rafa Caballero
 */

 $cantidad;
 $error;
 $procesar = false;
 $num;
 $acumulado = 0;

 if (isset($_POST["enviar"])) {
     if (intval($_POST["cantidad"]) >= 1) {
         $cantidad = $_POST["cantidad"];
         $procesar = true;
     } else {
         $error = "Número inválido";
     }
 }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma números - Formularios</title>
</head>
<body>
    <?php
    echo "<form method=\"post\" action=\"" . $SERVER['PHP_SELF'] . "\">";
        echo ("<input type=\"number\" name=\"cantidad\" value=\"1\" min=\"1\">");
        if (isset($error)) {
            echo($error);
        }
    echo ("<input type=\"submit\" name=\"enviar\" value=\"Sumar\">");
    echo "</form>";

    if ($procesar) {
        for ($i=0; $i<=$cantidad; $i++) {
            $num = rand(1, 100);
            $acumulado += $num;
        }
        echo ($acumulado);
    }
    ?>
</body>
</html>
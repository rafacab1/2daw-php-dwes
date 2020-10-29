<?php
/**
 * PH → POR HACER
 * 
 * 2. Escribe un script que permita factorizar 
 * un número pasado por la URL. 
 * Muestra el resultado en dos columnas.
 * 
 * @author Rafa Caballero
 */

 $numeroIntroducido;
 $num;
 function factoriza($numeroIntroducido) {
     if ($numeroIntroducido > 1) {
         $factor = 2;
         $num = $numeroIntroducido;
         echo ($num . "<br/>");
         while ($num > $factor) {
             if ($num % $factor == 0) {
                 $num /= $factor;
                 echo($num . " | " . $factor . " <br/> ");
             } else {
                 $factor++;
             }
         }
     }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 Factorizar</title>
</head>
<body>
<?php
if (isset($_GET['num'])) {
    echo("<p>" . factoriza($_GET['num']) . "</p>");
} else {
    echo("<p>Indica el número añadiendo ?num=123 a la URL</p>");
}
?>
</body>
</html>
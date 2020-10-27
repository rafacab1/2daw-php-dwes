<?php
/**
 * Ejemplo de funciones
 * 
 * @author Rafa Caballero
 */

 function manejoVariablesEstaticas() {
     static $varEstatica = 0;
     $variable = 0;
     $varEstatica++;
     $variable++;
     echo $varEstatica;
     echo "<br/>";
     echo $variable;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 0 Variables Estáticas</title>
</head>
<body>

<?php
    manejoVariablesEstaticas();
?>

    
</body>
</html>
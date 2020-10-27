<?php
/**
 * 3. Supongamos el siguiente array
 * $aUsuarios = array(
 *     array('nombre'=>'Jesús','apellido1'=>'Martínez','apellido2'=>'García'),
 *     array('nombre'=>'Mercedes','apellido1'=>'Calamaro','apellido2'=>'Pedrajas'),
 *     array('nombre'=>'Elena','apellido1'=>'Pérez','apellido2'=>''),
 * );
 * 
 * Crea un script que utilice una función anónima para generar los nombres de usuarios. 
 * El nombre de usuario se forma concatenadndo las dos primeras letras del primer apellido,
 * las dos primeras letras del segundo apellido y la inicial del nombre.
 * 
 * @author Rafa Caballero
 */

$aUsuarios = array(
    array('nombre'=>'Jesús','apellido1'=>'Martínez','apellido2'=>'García'),
    array('nombre'=>'Mercedes','apellido1'=>'Calamaro','apellido2'=>'Pedrajas'),
    array('nombre'=>'Elena','apellido1'=>'Pérez','apellido2'=>''),
);

$nombres = array_map(function ($aUsuarios) {
    return strtolower(substr($aUsuarios['apellido1'], 0, 2) . substr($aUsuarios['apellido2'], 0, 2) . substr($aUsuarios['nombre'], 0, 1));
}, $aUsuarios);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 Generar nombres</title>
</head>
<body>
<?php
foreach ($nombres as $user) {
    echo($user);
    echo("<br/>");
}
?>
</body>
</html>
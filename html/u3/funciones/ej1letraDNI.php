<?php
/**
 * 1.- Escribe un script en php para calcular la letra del NIF 
 * a partir del número del DNI enviado en la URL: http://dominio.local/calculaletra?dni=30182410.
 * 
 * La letra se obtiene calculando el resto de la división del número del DNI por 23. 
 * A cada resultado le corresponde una letra.
 * 
 * 0=T; 1=R; 2=W; 3=A; 4=G; 5=M; 6=Y; 7=F; 8=P; 9=D; 10=X; 11=B; 12=N; 13=J; 14=Z; 
 * 15=S; 16=Q; 17=V; 18=H; 19=L; 20=C; 21=K; 22=E.
 * 
 * Utiliza un array para almacenar la relación letra, número.
 * 
 * @author Rafa Caballero
 */
 function calculaLetra($numero) {
    $letras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
    return $letras[$numero % 23];
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 DNI</title>
</head>
<body>
<?php
if (isset($_GET['dni'])) {
    echo("<p>Tu DNI es " . $_GET['dni'] . calculaLetra($_GET['dni']) . "</p>");
} else {
    echo("<p>Indica tu número del DNI añadiendo ?dni=12345678 a la URL</p>");
}
?>
</body>
</html>
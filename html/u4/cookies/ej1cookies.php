<?php
/**
 * 
 * 
 * @author Rafa Caballero
 */

 $cookie = $_COOKIE["user"];
 if (isset($_COOKIE["user"])) {
     // Recuperar una cookie
     echo ($_COOKIE["user"]);
 } else {
     // Generar una cookie
    setcookie("user", "Rafa Caballero", time()+1000);
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Cookies</title>
</head>
<body>
<?php

?>
</body>
</html>
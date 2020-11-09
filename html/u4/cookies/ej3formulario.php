<?php
/**
 * Formulario de login con checkbox para recordar el usuario y
 * la contraseña
 * 
 * @author Rafa Caballero
 */

 $cookieEnabled = false;

 if ($_POST["recordar"] == "on") {
    $cookieEnabled = true;
    if (isset($_POST["user"])) {
        setcookie("user", $_POST["user"], time()+1000);
    }

    if (isset($_POST["pass"])) {
        setcookie("pass", $_POST["pass"], time()+1000);
    }
 } elseif ($_POST["recordar"] == "off") {
    setcookie("user", $_COOKIE["user"], time()-1000);
    setcookie("pass", $_COOKIE["pass"], time()-1000);
    $cookieEnabled = false;
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 Formulario</title>
</head>
<body>
<?php
    echo "<form method=\"post\" action=\"" . $SERVER['PHP_SELF'] . "\">";
    if ($cookieEnabled) {
        echo "<input type=\"text\" name=\"user\" placeholder=\"Usuario\" value=\"" . $_COOKIE["user"] . "\"><br/>";
        echo "<input type=\"password\" name=\"pass\" placeholder=\"Contraseña\" value=\"" . $_COOKIE["pass"] . "\"><br/>";
        echo "<input type=\"checkbox\" name=\"recordar\" value=\"true\"/>";
    } else {
        echo "<input type=\"text\" name=\"user\" placeholder=\"Usuario\"><br/>";
        echo "<input type=\"password\" name=\"pass\" placeholder=\"Contraseña\"><br/>";
        echo "<input type=\"checkbox\" name=\"recordar\"/>";
    }
    echo "<label for=\"recordar\">Recordar</label><br/>";
    echo ("<input type=\"submit\" name=\"enviar\" value=\"Iniciar sesión\">");
    echo "</form>";


?>
</body>
</html>
<?php
/**
 * 
 * @author Rafa Caballero
 */
session_start();
if (!isset($_SESSION['aut'])) {
    $_SESSION['aut'] = false;
    $_SESSION['user'] = 'invitado';
    $_SESSION['cont'] = 0;
}

$usuario = "";
$pass = "";
$procesaFormulario = false;

function clearData($cadena) {
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena;
}

if (isset($_POST['enviar'])) {
    $usuario = clearData($_POST['usuario']);
    $pass = clearData($_POST['pass']);
    $procesaFormulario = true;
}

// Procesamiento formulario
if ($procesaFormulario) {
    // TODO: Cambiar $_POST por las variables con los datos pasados por clearData
    if ($usuario == "admin" and $pass == "admin" and $_SESSION["cont"] <= 3) {
        $_SESSION["aut"] = true;
        $_SESSION['user'] = $usuario;
    } else {
        $_SESSION["cont"]++;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta author="Rafa Caballero">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
<?php
    
    echo("<h1>Autenticación</h1>");
    echo("Bienvenido al sistema, <i>" . $_SESSION['user'] . ".</i>");
    echo("<br/>");
    if ($_SESSION['aut']) {
        // Cambiar por mostrarMenú
        echo ("<a href=\"privada.php\">Privado</a><br/>");
        echo ("<a href=\"publica.php\">Público</a><br/>");
        echo ("<a href=\"salir.php\">Cerrar sesión</a><br/>");
    } elseif ($_SESSION["cont"] <= 3) {
        // Formulario - mostrarFormulario()
        echo ("<form method=\"post\" action=\"" . $SERVER['PHP_SELF'] . "\">");
            echo ("<input type=\"text\" name=\"usuario\" placeholder=\"Usuario\"></br>");
            echo ("<input type=\"password\" name=\"pass\" placeholder=\"Contraseña\"></br>");
            echo ("<input type=\"submit\" name=\"enviar\" value=\"Iniciar sesión\">");
        echo ("</form>");
    } else {
        echo ("<p>Máximo de intentos de inicio de sesión alcanzado.</p>");
    }
?>
</body>
</html>
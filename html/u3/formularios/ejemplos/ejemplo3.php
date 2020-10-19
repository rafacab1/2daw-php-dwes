<?php
/**
 * Hacer formulario con validación
 * 
 * @author Rafa Caballero
 */
     
    // Datos iniciales
    $nombre=$apellidos=$email = "";
    $msgErrorNombre=$msgErrorApellidos=$msgErrorEmail = "";
    $procesaFormulario = false;

    $datosPersonales = array("nombre", "apellidos", "email");

    function clearData($cadena) {
        $cadena_limpia = trim($cadena);
        $cadena_limpia = htmlspecialchars($cadena_limpia);
        $cadena_limpia = stripslashes($cadena_limpia);
        return $cadena;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo formulario 3</title>
</head>
<body>

<?php

    // Validación
    if (isset($_POST["enviar"])) {
        $nombre = clearData($_POST["nombre"]);
        $apellidos = clearData($_POST["apellidos"]);
        $email = clearData($_POST["email"]);
        $ProcesaFormulario = true;

        // Validar nombre
        if (empty($nombre)) {
            $msgErrorNombre = "Nombre requerido";
            $ProcesaFormulario = false;
        }

        // Validar apellidos
        if (empty($apellidos)) {
            $msgErrorApellidos = "Apellidos requeridos";
            $ProcesaFormulario = false;
        }

        // Validar email
        if (empty($email)) {
            $msgErrorEmail = "Email requerido";
            $ProcesaFormulario = false;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msgErrorEmail = "Email incorrecto";
            $ProcesaFormulario = false;
            $_POST['email'] = "";
        }   
    }

    if ($ProcesaFormulario) {
        echo ("Tu nombre es " . $nombre . " " . $apellidos . ". Tu correo es ". $email);
    } else {
        echo "<form method=\"post\" action=\"" . $SERVER['PHP_SELF'] . "\">";
        foreach ($datosPersonales as $campo) {
            echo "<input type=\"text\" name=\"" . $campo . "\" placeholder=\"" . $campo . "\" value=\"" . $_POST[$campo] . "\">";
        }
        echo ("<input type=\"submit\" name=\"enviar\" value=\"Enviar\">");
        echo ("<br>" . $msgErrorNombre . "<br>" . $msgErrorApellidos . "<br>" . $msgErrorEmail);
        echo "</form>";
    }

?>
</body>
</html>
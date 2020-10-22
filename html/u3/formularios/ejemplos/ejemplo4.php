<?php
/**
 * Hacer formulario con validación que tenga:
 * - Nombre 
 * - email
 * - URL
 * - Comentarios (textarea)
 * - Género (radiogroup)
 * - Transporte (checkbox)
 * - Selección opción única
 * - Selección opción múltiple
 * - Enviar
 * 
 * @author Rafa Caballero
 */
     
    // Datos iniciales
    $nombre=$email=$url=$comentarios=$generoSelect=$transporteSelect=$opcionUnica = "";
    $marcaCoche = array();
    $msgErrorNombre=$msgErrorEmail = "";
    $procesaFormulario = false;
    $errorNombre = false;
    $errorEmail = false;

    // Arrays
    $genero = array("Hombre", "Mujer", "Otro");
    $transporte = array("Bicicleta", "Coche", "Otro");
    $opcionesUni = array("o1" => "Opción 1", "o2" => "Opción 2", "o3" => "Opción 3", "o4" => "Opción 4");
    $opcionesMul = array("Opel", "BMW", "Citroen", "Toyota");


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
    <title>Ejemplo formulario 4</title>
</head>
<body>
<h1>Validación formulario. PHP</h1>

<?php

    // Validación
    if (isset($_POST["enviar"])) {
        // Limpieza de datos
        $nombre = clearData($_POST["nombre"]);
        $email = clearData($_POST["email"]);
        $url = clearData($_POST["url"]);
        $comentarios = clearData($_POST["comentarios"]);
        $generoSelect = clearData($_POST["genero"]);
        $transporteSelect = clearData($_POST["transporte"]);
        $opcionUnica = clearData($_POST["opcion"]);
        if (!empty($_POST['opcionMul'])) {
            for ($i=0;$i<count($_POST['opcionMul']);$i++) { 
                $marcaCoche[$i] = clearData($_POST['opcionMul'][$i]); 
            }
        }

        $ProcesaFormulario = true;
        $errorNombre = false;
        $errorEmail = false;

        // Validar nombre
        if (empty($nombre)) {
            $msgErrorNombre = "Nombre requerido";
            $errorNombre = true;
            $ProcesaFormulario = false;
        }

        // Validar email
        if (empty($email)) {
            $msgErrorEmail = "Email requerido";
            $errorEmail = true;
            $ProcesaFormulario = false;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msgErrorEmail = "Email incorrecto";
            $errorEmail = true;
            $ProcesaFormulario = false;
            $_POST['email'] = "";
        }        
    }

    if ($ProcesaFormulario) {
        echo($nombre . "<br>");
        echo($email . "<br>");
        echo($url . "<br>");
        echo($comentarios . "<br>");
        echo($generoSelect . "<br>");
        echo($transporteSelect . "<br>");
        echo($opcionUnica . "<br>");
        for ($i=0;$i<count($marcaCoche);$i++) { 
      	echo "<br>" . $marcaCoche[$i]; 
      	} 
    } else {
        echo ("<h5>* Campos requeridos</h5>");
        echo "<form method=\"post\" action=\"" . $SERVER['PHP_SELF'] . "\">";
        // Nombre
        if ($errorNombre) {
            echo "Nombre <input type=\"text\" name=\"nombre\" placeholder=\"Nombre\" value=\"" . $_POST['nombre'] . "\" style=\"border: 1px solid red\">* " . $msgErrorNombre . "<br>";
        } else {
            echo "Nombre <input type=\"text\" name=\"nombre\" placeholder=\"Nombre\" value=\"" . $_POST['nombre'] . "\">*<br>";
        }
        // Email
        if ($errorEmail) {
            echo "Email <input type=\"text\" name=\"email\" placeholder=\"Email\" value=\"" . $_POST['email'] . "\" style=\"border: 1px solid red\">* " . $msgErrorEmail . "<br>";
        } else {
            echo "Email <input type=\"text\" name=\"email\" placeholder=\"Email\" value=\"" . $_POST['email'] . "\">*<br>";
        }

        // URL
        echo ("URL <input type=\"url\" name=\"url\" placeholder=\"URL\" value=\"" . $_POST['url'] . "\"><br>");
        // Comentarios
        echo ("Comentarios <br><textarea name=\"comentarios\" placeholder=\"Comentarios...\" rows=\"4\" cols=\"50\">" . $_POST['comentarios'] . "</textarea>");
        // Género (radio)
        echo("<br><p>Género</p>");
        foreach ($genero as $gen) {
            echo ("<input type=\"radio\" id=\"" . strtolower($gen) . "\" value=\"" . $gen . "\" name=\"genero\"><label for=\"" . strtolower($gen) . "\">" . $gen . "</label><br>");
        }
        // Transporte (checkbox)
        echo("<br><p>Transporte</p>");
        foreach ($transporte as $veh) {
            echo ("<input type=\"checkbox\" id=\"" . strtolower($veh) . "\" value=\"" . $veh . "\" name=\"transporte\"><label for=\"" . strtolower($veh) . "\">" . $veh  . "</label><br>");
        }

        // Selección opción única
        echo("<br><p>Seleccione una opción</p>");
        echo("<select name=\"opcion\" id=\"opcion\">");
        foreach ($opcionesUni as $idUni => $unica) {
            echo("<option value=\"" . $unica . "\">" . $unica . "</option>");
        }
        echo("</select>");

        // Selección opción múltiple
        echo("<br><p>Seleccione las opciones que quiera</p>");
        echo("<select name=\"opcionMul[]\" id=\"opcionMul\" multiple>");
        foreach ($opcionesMul as $multiple) {
            echo("<option value=\"" . $multiple . "\">" . $multiple . "</option>");
        }
        echo("</select>");

        // Botón enviar
        echo ("<br><input type=\"submit\" name=\"enviar\" value=\"Enviar\">");
        echo "</form>";
    }

?>
</body>
</html>
<?php
/**
 * Ejercicio 2 Examen DWES
 * 
 * Sistema de control de multas con distintos perfiles de usuario.
 *  
 * @author Rafa Caballero
 */

// Sesión
session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = 'invitado';
    $_SESSION['psw'] = '';
    $_SESSION['perfil'] = 'invitado';
    $_SESSION['id'] = 0;
}

/**
 * ćlearData
 * 
 * Función que limpia una cadena
 * 
 * @param str $cadena 
 * @return str
 */
function clearData($cadena) {
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena;
}

// Array de usuarios
$usuarios = array(
    array("usuario"=>"admin", "psw"=>"admin", "nombre"=>"Administrador", "perfil"=>"administrador"),
    array("usuario"=>"agente1", "psw"=>"agente1", "nombre"=>"Agente 1", "perfil"=>"agente"),
    array("usuario"=>"agente2", "psw"=>"agente2", "nombre"=>"Agente 2", "perfil"=>"agente")
);

// Login
if (isset($_POST['enviarLogin'])) {
    $usuario = clearData($_POST['usuario']);
    $psw = clearData($_POST['psw']);
    $invalido = true;
    $id = 0;
    foreach ($usuarios as $user) { 
        if ($usuario == $user['usuario'] && $psw == $user['psw']) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['psw'] = $psw;
            $_SESSION['perfil'] = $user['perfil'];
            $_SESSION['id'] = $id;
            $invalido = false;
        }
        $id++;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta author="Rafa Caballero">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Multas - Rafael Alberto Caballero Osuna</title>
</head>
<body>
<?php

    echo "<h3>Bienvenido " . $_SESSION['usuario'] . "</h3>";

    // Formulario login
    if ($_SESSION['perfil'] == 'invitado') {
        echo "<form method=\"post\" action=\"" . $SERVER['PHP_SELF'] . "\">";
            echo "<label for=\"usuario\">Usuario </label>";
            echo "<input type=\"text\" name=\"usuario\" placeholder=\"Usuario\"/><br>";
            echo "<label for=\"psw\">Contraseña </label>";
            echo "<input type=\"text\" name=\"psw\" placeholder=\"Contraseña\"/><br>";
            echo "<input type=\"submit\" name=\"enviarLogin\" value=\"Iniciar sesión\"/>";
        echo "</form>";
    }

    // Inicio no válido
    if ($invalido) {
        echo "<p style=\"color:red;\">Datos de inicio de sesión incorrectos</p>";
    }

    // Enlaces agente
    if ($_SESSION['perfil'] == 'agente') {
        echo "<a href=\"index.php\">Inicio</a> | ";
        echo "<a href=\"agente.php\">Gestión de multas</a> | ";
        echo "<a href=\"salir.php\">Cerrar sesión de " . $_SESSION['perfil'] . "</a><br>";
    }

    // Enlaces administrador
    if ($_SESSION['perfil'] == 'administrador') {
        echo "<a href=\"index.php\">Inicio</a> | ";
        echo "<a href=\"admin.php\">Resumen de multas</a> | ";
        echo "<a href=\"salir.php\">Cerrar sesión de " . $_SESSION['perfil'] . "</a><br>";
    }

    // Mostrar multas
    if (isset($_SESSION['multas'])) {
        echo "<p>Puedes buscar multas pulsando F3.</p>";
        echo "<p>Puedes pagar una multa pendiente pulsando en Pendiente.</p>";
        echo "<table border>";
        echo "<tr>";
            echo "<th>Matrícula</th>";
            echo "<th>Descripción</th>";
            echo "<th>Fecha</th>";
            echo "<th>Importe</th>";
            echo "<th>Estado</th>";
        echo "</tr>";
        $indice = 0;
        foreach ($_SESSION['multas'] as $multa) {
            echo "<tr>";
                echo "<td>" . $multa['matricula'] . "</td>";
                echo "<td>" . $multa['descripcion'] . "</td>";
                echo "<td>" . $multa['fecha'] . "</td>";
                echo "<td>" . $multa['importe'] . "</td>";
                if ($multa['estado'] == 'Pendiente') {
                    echo "<td><a href=\"pagamulta.php?id=" . $indice . "\" title=\"Pagar multa\">" . $multa['estado'] . "</a></td>";
                } else {
                    echo "<td>" . $multa['estado'] . "</td>";
                }
            echo "</tr>";
            $indice++;   
        }
        echo "</table>";
    }



?>
    
</body>
</html>
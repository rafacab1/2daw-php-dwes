<!DOCTYPE html>
<html>
<head>
	<title>Edad - Actividad 2.3.3</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
/**
    *   Lista de enlaces en función del perfil de usuario
    *
    *   @author Rafa Caballero
    */
// $usuario = "alumno";
// $usuario = "profesor";
$usuario = "admin";

if ($usuario == "alumno"):
    echo("<p><a href=\"https://moodle.iesgrancapitan.org\" target=\"__blank\">Moodle</a></p>");
elseif ($usuario == "profesor"):
    echo("<p><a href=\"https://moodle.iesgrancapitan.org\" target=\"__blank\">Moodle</a></p>");
    echo("<p><a href=\"https://www.google.com\" target=\"__blank\">Recursos</a></p>");
    echo("<p><a href=\"https://www.juntadeandalucia.es/educacion/portalseneca/web/seneca/inicio\" target=\"__blank\">Séneca</a></p>");
elseif ($usuario == "admin"):
    echo("<p><a href=\"https://moodle.iesgrancapitan.org\" target=\"__blank\">Moodle</a></p>");
    echo("<p><a href=\"https://www.google.com\" target=\"__blank\">Recursos</a></p>");
    echo("<p><a href=\"https://www.juntadeandalucia.es/educacion/portalseneca/web/seneca/inicio\" target=\"__blank\">Séneca</a></p>");
    echo("<p><a href=\"http://localhost:5000\" target=\"__blank\">PhpMyAdmin</a></p>");
endif;
?>
</body>
</html> 
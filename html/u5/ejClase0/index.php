<?php
require_once("app/model/Persona.php");
require_once("app/model/Alumno.php");

$alumno1 = new Persona("Rafa", "Caballero", "Osuna");
$alumno2 = new Persona("R", "C", "O");
$alumnoVd = new Alumno("Rafa", "Caballero", "Osuna");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase Persona</title>
</head>
<body>
<?php echo ($alumno1->nombre()); 
echo ($alumno2->nombre());
//var_dump($alumno2); destructor
echo ($alumnoVd->saluda());
?>
</body>
</html>
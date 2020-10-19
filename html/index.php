<?php
/** 
 * Ejercicios DWES
 * 
 * @author Rafa Caballero
 */

$ejercicios = array(
	// UNIDAD 2
	array("unidad"=>"2", "categoría"=> "", "ejercicios"=>array(
		array("ejercicio"=>"Ficha personal", "direccion"=>"u2/a2/fichapersonal.php"),
		array("ejercicio"=>"2 Area", "direccion"=>"u2/a2/area.php"),
		array("ejercicio"=>"3 Suma", "direccion"=>"u2/a2/suma.php"),
		array("ejercicio"=>"4 Cálculos con variables", "direccion"=>"u2/a2/calculos.php"),
		array("ejercicio"=>"5 Cálculos con variables 2", "direccion"=>"u2/a2/calculos2.php"),
		array("ejercicio"=>"6 Información de variables", "direccion"=>"u2/a2/ej6contenidovar.php"),
		array("ejercicio"=>"7 Información de variables 2", "direccion"=>"u2/a2/ej7tiposvar.php")
	)),
	// UNIDAD 3 - Estructuras de control
	array("unidad"=>"3", "categoría"=> "Estructuras de control", "ejercicios"=>array(
		array("ejercicio"=>"1 Número mayor", "direccion"=>"u3/estructurascontrol/ej1nmayor.php"),
		array("ejercicio"=>"2 Días mes", "direccion"=>"u3/estructurascontrol/ej2calcdiames.php"),
		array("ejercicio"=>"3 Edad", "direccion"=>"u3/estructurascontrol/ej3edad.php"),
		array("ejercicio"=>"4 Cabecera", "direccion"=>"u3/estructurascontrol/ej4cabecera.php"),
		array("ejercicio"=>"5 Perfiles de usuario", "direccion"=>"u3/estructurascontrol/ej5usuarios.php")
	)),
	// UNIDAD 3 - Bucles
	array("unidad"=>"3", "categoría"=> "Bucles", "ejercicios"=>array(
		array("ejercicio"=>"1 Números del 1 al 10", "direccion"=>"u3/bucles/ej1num110.php"),
		array("ejercicio"=>"2 Números pares", "direccion"=>"u3/bucles/ej2numpares.php"),
		array("ejercicio"=>"3 Tabla de multiplicar", "direccion"=>"u3/bucles/ej3tmultiplicar.php"),
		array("ejercicio"=>"4 Paleta de colores", "direccion"=>"u3/bucles/ej4colores.php"),
		array("ejercicio"=>"5 Calendario", "direccion"=>"u3/bucles/ej5calendario.php")
	)),
	// UNIDAD 3 - Arrays
	array("unidad"=>"3", "categoría"=> "Arrays", "ejercicios"=>array(
		array("ejercicio"=>"0 Comunidades y Casos", "direccion"=>"u3/arrays/ej0comunidades.php"),
		array("ejercicio"=>"3.1 Meses", "direccion"=>"u3/arrays/ej3/ej1meses.php"),
		array("ejercicio"=>"3.2 Tablero", "direccion"=>"u3/arrays/ej3/ej2tablero.php"),
		array("ejercicio"=>"3.3 Notas", "direccion"=>"u3/arrays/ej3/ej3notas.php"),
		array("ejercicio"=>"3.4 Verbos Irregulares", "direccion"=>"u3/arrays/ej3/ej4verbos.php"),
		array("ejercicio"=>"3.5 Países", "direccion"=>"u3/arrays/ej3/ej5paises.php"),
		array("ejercicio"=>"6 Restaurante", "direccion"=>"u3/arrays/ej6restaurante.php"),
		array("ejercicio"=>"7 Calendario", "direccion"=>"u3/bucles/ej5calendario.php"),
		array("ejercicio"=>"8 Ventas", "direccion"=>"u3/arrays/ej8mediaventas.php"),
		array("ejercicio"=>"9 Máximo y media", "direccion"=>"u3/arrays/ej9mayormedia.php"),

	)),
	// UNIDAD 3 - Formularios
	array("unidad"=>"3", "categoría"=> "Formularios", "ejercicios"=>array(
		array("ejercicio"=>"Ejemplo 1", "direccion"=>"u3/formularios/ejemplos/ejemplo1.php"),
		array("ejercicio"=>"Ejemplo 2", "direccion"=>"u3/formularios/ejemplos/ejemplo2.php"),
		array("ejercicio"=>"Ejemplo 3", "direccion"=>"u3/formularios/ejemplos/ejemplo3.php"),
		array("ejercicio"=>"Ejemplo 4", "direccion"=>"u3/formularios/ejemplos/ejemplo4.php")
	))
);

?>

<!DOCTYPE html>
<html>
<head>
	<title>DWES - Rafa C.</title>
	<meta charset="UTF-8">
	<link href="css/main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC|Rubik&display=swap" rel="stylesheet">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<h1>Desarrollo Web en Entorno Servidor</h1>
<h3>de Rafa Caballero</h3>

<p><a href="info.php">Info PHP</a></p>
<br>
<?php

foreach (array_reverse($ejercicios) as $unidad) {
	echo("<h1>Unidad " . $unidad["unidad"] . "</h1>");
	echo("<h3>" . $unidad["categoría"] . "</h3>");
	foreach ($unidad["ejercicios"] as $ejercicio) {
		echo("<p><a href=\"" . $ejercicio["direccion"] . "\">" . $ejercicio["ejercicio"] . "</a></p>");
	}
}
?>
<br>
<p><a href="portfoliopruebas/index.php">Proyecto ejemplo portfolio</a></p>
</body>
</html>

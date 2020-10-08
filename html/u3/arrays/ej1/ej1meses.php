<?php
/**
    *   Meses del año
    *
    *   @author Rafa Caballero
    */
$meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Meses del año</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
foreach ($meses as $mes) {
    echo("<p>" . $mes . "</p>");
}
?>
</body>
</html>
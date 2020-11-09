<?php
/**
 * Prueba sesiones con Postman
 * 
 * @author Rafa Caballero
 */

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo sesiones</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
echo session_id();
if (isset($_SESSION["mensaje"])) {
	echo "<br/>" . $_SESSION["mensaje"];
} else {
	$_SESSION["mensaje"] = "Hola mundo";
}
?>
</body>
</html>

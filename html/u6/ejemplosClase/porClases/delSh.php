<?php
include("Superheroe.php");
$sh = Superheroe::getInstancia();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $resultado = $sh->get($_GET['id']);
} else if (isset($_POST['confirmo'])) {
    echo "borrando";
    $sh->delete($_POST['id']);
    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Rafa Caballero">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar superhéroe</title>
</head>
<body>
<h1>Gestión de Superhéroes</h1>
<?php
echo "<p>¿Realmente quieres borrar a " . $resultado[0]['nombre'] . "?</p>";
echo "<form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">";
    echo "<input type=\"submit\" name=\"confirmo\" value=\"Si\">";
    echo "<input type=\"submit\" name=\"noConfirmo\" value=\"No\">";
    echo "<input type=\"hidden\" name=\"id\" value=\" " . $resultado[0]['id'] . "\">";
echo "</form>";
?>
</body>
</html>
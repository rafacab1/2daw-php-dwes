<?php
/**
 * pagamulta
 * 
 * Parte del sistema de multas para pagarlas
 *  
 * @author Rafa Caballero
 */

if (!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    session_start();
    $id = $_GET['id'];
    if ($_SESSION['multas'][$id]['estado'] == 'Pagada') {
        $pagada = true;
    }
}

if (isset($_GET['pagar'])) {
    $_SESSION['multas'][$id]['estado'] = 'Pagada';
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta author="Rafa Caballero">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar multa - Rafael Alberto Caballero Osuna</title>
</head>
<body>
<?php
    echo "<h3>Hola " . $_SESSION['usuario'] . "</h3>";

    echo "<a href=\"index.php\">Volver a inicio</a>";

    echo "<p>ID Multa: " . $id . "</p>";
    echo "<p>Matrícula: " . $_SESSION['multas'][$id]['matricula'] . "</p>";
    echo "<p>Importe: " . $_SESSION['multas'][$id]['importe'] . "</p>";
    if (!$pagada) {
        echo "<a href=\"?id=" . $id . "&pagar\">Pagar multa</a>";
    } else {
        echo "<p>Esta multa ya está pagada.</p>";
    }

?>
</body>
</html>
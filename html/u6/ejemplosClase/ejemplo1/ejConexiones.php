<?php

function conectaDB()
{
    try {
        $dsn = "mysql:host=localhost;dbname=bd_superheroes";
        $db =new PDO("mysql:host=localhost;dbname=bd_superheroes",'root', 'root');
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , 'SET NAMES utf8');
        return($db);
    }
    catch (PDOException $e) {
        echo "Error conexión";
        exit();
    }
}

/* $db = conectaDb();
$sql = "SELECT * FROM superheroes";
$consulta = $db->prepare($sql);
$consulta->execute();
$resultado = $consulta-> fetchAll();
foreach ($resultado as $valor) {
    echo $valor['nombre'];
} */

/* 1. Con las interrogaciones */
/* $db = conectaDB();
$campo = $_POST['busqueda'] ?? 'C%';
$velocidad = $_POST['velocidad'] ?? 3;
$sql = "SELECT * FROM superheroes WHERE nombre LIKE ? AND velocidad > ?";

$consulta = $db->prepare($sql);
$consulta->execute(array($campo,$velocidad));
$resultado = $consulta->fetchAll();
$numeroRegistros = $consulta->rowCount();
echo "Listado de superhéroes: " . $numeroRegistros . "</br>";

if (!resultado) {
    echo "Consulta vacía";
} else {
    // Mostrar los datos
} */

/* 2. Uso de parámetros */
$db = conectaDB();
$campo = $_POST['busqueda'] ?? 'C%';
$velocidad = $_POST['velocidad'] ?? 3;
$sql = "SELECT * FROM superheroes WHERE nombre LIKE :nombre AND velocidad > :velocidad";

$consulta = $db->prepare($sql);
$aParametros = array(":nombre"=>$campo,":velocidad"=>$velocidad);
$consulta->execute($aParametros);
$resultado = $consulta->fetchAll();
$numeroRegistros = $consulta->rowCount();
echo "Listado de Superhéroes: " . $numeroRegistros . "</br>";
?>
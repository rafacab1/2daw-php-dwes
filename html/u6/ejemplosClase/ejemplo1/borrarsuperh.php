<?php
// Conexión con la base de datos
function conectaDB() {
    try {
        $db = new PDO("mysql:host=localhost;dbname=db_superheroes",'root', 'root');
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , 'SET NAMES utf8');
        return($db);
    }
    catch (PDOException $e) {
        print_r($e);
        echo "Error conexión";
        exit();
    }
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $db = conectaDB();
    $sql = "DELETE FROM superheroes WHERE id=:id";
    $consulta = $db->prepare($sql);
    $aParametros = array(":id"=>$_GET['id']);
    $consulta->execute($aParametros);
}

header("Location:superheroes.php");
?>
<?php

include("DBAbstractModel.php");
include("Superheroe.php");

$datos = array("nombre"=>"Hulk",
                "velocidad"=>25);

// Probamos el funcionamiento singleton
/* echo "Clases sin instanciar <br/>";
$sh_sing1 = Superheroe::getInstancia(); 
var_dump($sh_sing1);
echo ("<br>");
echo ("<br>");
$sh_sing2 = Superheroe::getInstancia();
var_dump($sh_sing2);
echo ("<br>");
echo ("<br>");
$sh_sing2 = Superheroe::getInstancia();
var_dump($sh_sing2);

echo ("<br>");
echo ("<hr>");

echo "Con new Superheroe()";
echo ("<br>");

$sh_sing1 = new Superheroe();
var_dump($sh_sing1);
echo ("<br>");
echo ("<br>");
$sh_sing2 = new Superheroe();
var_dump($sh_sing2);
echo ("<br>");
echo ("<br>");
$sh_sing2 = new Superheroe();
var_dump($sh_sing2); */


$sh = Superheroe::getInstancia();
$sh->set($datos);
echo "----" . $sh->getMensaje() . "<br>";
// Recuperamos el registro introducido
$id = $sh->lastInsert();
$datos = $sh->get($id);
foreach ($datos as $elemento) {
    foreach ($elemento as $key => $valor) {
        echo "$key: $valor</br>";
    }
}

// Modificar un registro
echo "Modificamos un registro<br/>";

?>
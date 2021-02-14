<?php
require_once("vendor/autoload.php");

use App\Models\Persona;
use App\Models\Mascota;

$persona = new Persona("Rafa", "Caballero", "Osuna");
$mascota = new Mascota("Don Gato");

echo ($persona->saluda());
echo ($mascota->saluda());
?>
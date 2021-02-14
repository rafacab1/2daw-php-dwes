<?php
require_once("app/models/Persona.php");
require_once("app/models/Mascota.php");

use App\Models\Persona;
use App\Models\Mascota;

$persona = new Persona("Rafa", "Caballero", "Osuna");
$mascota = new Mascota("Don Gato");

echo ($persona->saluda());
echo ($mascota->saluda());
?>
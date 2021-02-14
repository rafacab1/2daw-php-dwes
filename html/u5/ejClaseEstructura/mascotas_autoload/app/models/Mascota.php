<?php
namespace App\Models;
class Mascota {
    private $_nombre;

    public function __construct($nombre) {
        $this->_nombre = $nombre;
    }

    public function __destruct() {
        //echo "<br><br>" . $this->_nombre . " destruido.";
    }

    public function saluda() {
        echo "Miau miau<br>";
    }

    public function nombre() {
        return $this->_nombre . "<br>";
    }

}
?>
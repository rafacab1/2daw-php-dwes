<?php
/**
 * Baraja de cartas, depende de Carta
 */
namespace App\Models;
use Carta;
class Baraja {
    private $_baraja = array();

    public function __construct() {
        $this->_baraja = $_baraja;
        array_push($this->_baraja, new Carta());
    }

    /**
     * getCartaBaraja()
     * 
     * Devuelve la n carta de la baraja
     */
    public function getCartaBaraja($n) {
        return $this->_baraja[$n];
    }

    /**
     * Añade una nueva carta a la baraja
     */
    public function nuevaCarta($palo, $numero) {
        $carta = new Carta;
        $carta->setPalo($palo);
        $carta->setNumero($numero);
        array_push($this->_baraja, $carta);
    }

    /**
     * Añade una nueva carta aleatoria a la baraja
     */
    public function nuevaCartaRandom() {
        array_push($this->_baraja, new Carta());
    }
}
?>
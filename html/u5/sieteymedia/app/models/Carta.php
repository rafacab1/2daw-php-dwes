<?php
/** 
 * Clase Carta.
 * 
 * @author Rafa Caballero
 */
namespace App\Models;
class Carta {
    private $_palo; // oros - bastos - copas - espadas
    private $_numero;
    private $palos = array("oros", "bastos", "copas", "espadas");

    /**
     * Crea una nueva carta random
     */
    public function __construct() {
        $this->_palo = $palos[rand(0, 3)];
        do {
            $nGen = rand(1, 12);
        } while ($nGen == 8 || $nGen == 9);
        $this->_numero = $nGen;
    }

    /**
     * setPalo()
     * 
     * Cambia el palo de la carta
     */
    public function setPalo($palo) {
        if (in_array($palo, $palos)) {
            $this->_palo = $palo;
            return true;
        } else {
            return false;
        }
    }

    /**
     * setNumero()
     * 
     * Cambia el número de la carta.
     */
    public function setNumero($n) {
        if ($n <= 12) {
            if ($n == 8 || $n == 9) {
                return false;
            } else {
                $this->_numero = $n;
                return true;
            }
        }
    }

    /**
     * getPalo()
     * 
     * Devuelve el palo de la carta
     */
    public function getPalo() {
        return $this->_palo;
    }

    /**
     * getNumero()
     * 
     * Devuelve el número de la carta
     */
    public function getNumero() {
        return $this->_numero;
    }
}
?>
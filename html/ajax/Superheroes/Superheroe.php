<?php
// Importar modelo de abstracción de base de datos
require_once('DBAbstractModel.php');
class Superheroe extends DBAbstractModel {
    /* Construcción del modelo Singleton */
    private static $instancia;
    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function __clone() {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private $id;
    private $nombre;
    private $velocidad;
    private $created_at;
    private $updated_at;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setVelocidad($velocidad) {
        $this->velocidad = $velocidad;
    }

    public function set($user_data=array()) {
        foreach ($user_data as $campo=>$valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO superheroes(nombre, velocidad) VALUES(:nombre, :velocidad)";
        // $this->parametros['id']=$id;
        $this->parametros['nombre']=$nombre;
        $this->parametros['velocidad']=$velocidad;
        $this->get_results_from_query();
        // $this->execute_single_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function get($id='') {
        if($id != '') {
            $this->query = "SELECT * FROM superheroes WHERE id = :id";
            // Cargamos los parámetros
            $this->parametros['id']=$id;

            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'SH encontrado';
        } else {
            $this->mensaje = 'SH no encontrado';
        }
        return $this->rows;
    }

    // Modificar
    public function edit($user_data=array()) {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE superheroes SET nombre=:nombre, velocidad=:velocidad WHERE id = :id";
        $this->parametros['id']=$id;
        $this->parametros['nombre']=$nombre;
        $this->parametros['velocidad']=$velocidad;
        $this->get_results_from_query();
        $this->mensaje = 'SH Modificado';
    }

    // Eliminar
    public function delete($id='') {
        $this->query = "DELETE FROM superheroes WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado';
    }

    /* Método para ver la implementación utilizando
    el mecanismo de cargar los datos en la entidad y luego
    persistirlos. */
    public function guardarenBD() {
        $this->query = "INSERT INTO superheroes(nombre, velocidad) VALUES (:nombre, :velocidad)";
        // $this->parametros['id']=$id;
        $this->parametros['nombre']=$this->nombre;
        $this->parametros['velocidad']=$this->velocidad;
        $this->get_results_from_query();
        $this->execute_single_query();
        $this->mensaje = 'Superhéroes añadido';
    }

    /* Método que obtiene todos los superhéroes */
    public function getAll() {
        $this->query = "SELECT * FROM superheroes";
        // Ejecutamos consulta que devuelve registros
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'SH encontrados';
        } else {
            $this->mensaje = 'SH no encontrados';
        }
        return $this->rows;
    }

    /** 
     * Función para buscar superhéroes por nombre
     */
    public function getByNombre($nombre='') {
        if($nombre != '') {
            $this->query = "SELECT * FROM superheroes WHERE nombre = :nombre";
            // Cargamos los parámetros
            $this->parametros['nombre']=$nombre;

            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'SH encontrados';
        } else {
            $this->mensaje = 'SH no encontrados';
        }
        return $this->rows;
    }

    // Método constructor
    function __construct() {
        // Singleton no recomienda parámetros ya que
        // podría dificultar 
    }
}
?>
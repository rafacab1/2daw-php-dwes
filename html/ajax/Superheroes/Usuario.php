<?php
require_once("DBAbstractModel.php");

class Usuario extends DBAbstractModel {
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
    private $user;
    private $pass;
    private $role;
    private $created_at;
    private $updated_at;

    public function setUser($user) {
        $this->user = $user;
    }

    public function setVelocidad($pass) {
        $this->pass = $pass;
    }

    public function set($user_data=array()) {
        foreach ($user_data as $campo=>$valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO usuarios(user, pass, role) VALUES(:nombre, :velocidad, :role)";
        // $this->parametros['id']=$id;
        $this->parametros['nombre']=$nombre;
        $this->parametros['velocidad']=$velocidad;
        $this->parametros['role']=$role;
        $this->get_results_from_query();
        // $this->execute_single_query();
        $this->mensaje = 'Usuario agregado correctamente';
    }

    public function get($id='') {
        if($id != '') {
            $this->query = "SELECT * FROM usuarios WHERE id = :id";
            // Cargamos los parámetros
            $this->parametros['id']=$id;

            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Usuario encontrado';
        } else {
            $this->mensaje = 'Usuario no encontrado';
        }
        return $this->rows;
    }

    // Modificar
    public function edit($user_data=array()) {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE usuarios SET user=:user, pass=:pass WHERE id = :id";
        $this->parametros['id']=$id;
        $this->parametros['user']=$user;
        $this->parametros['pass']=$pass;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario Modificado';
    }

    // Eliminar
    public function delete($id='') {
        $this->query = "DELETE FROM usuarios WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario eliminado';
    }

    /* Método para ver la implementación utilizando
    el mecanismo de cargar los datos en la entidad y luego
    persistirlos. */
    public function guardarenBD() {
        $this->query = "INSERT INTO usuarios(user, pass, role) VALUES (:user, :pass, :role)";
        // $this->parametros['id']=$id;
        $this->parametros['user']=$this->user;
        $this->parametros['pass']=$this->pass;
        $this->parametros['role']=$this->role;
        $this->get_results_from_query();
        $this->execute_single_query();
        $this->mensaje = 'Usuario añadido';
    }

    /* Método que obtiene todos los superhéroes */
    public function getAll() {
        $this->query = "SELECT * FROM usuarios";
        // Ejecutamos consulta que devuelve registros
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Usuarios encontrados';
        } else {
            $this->mensaje = 'Usuarios no encontrados';
        }
        return $this->rows;
    }

    /** 
     * Función para buscar usuarios por nombre
     */
    public function getByUser($user='') {
        if($user != '') {
            $this->query = "SELECT * FROM usuarios WHERE user = :user";
            // Cargamos los parámetros
            $this->parametros['user']=$user;

            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Usuarios encontrados';
        } else {
            $this->mensaje = 'Usuarios no encontrados';
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
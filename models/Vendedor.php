<?php 

namespace Model;

class Vendedor extends ActiveRecord {

    protected static $tabla = 'vendedores'; // Nombre de la tabla de la Base de Datos
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono']; // Columnas de la Base de Datos.

    //Atributos
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    //Constructor

    public function __construct($argc = [])
    {
        $this->id = $argc['id'] ?? null;
        $this->nombre = $argc['nombre'] ?? '';       
        $this->apellido = $argc['apellido'] ?? '';
        $this->telefono = $argc['telefono'] ?? '';     
    }

    // Validaciones

    public function validar() {

        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre";
        }

        if (!$this->apellido) {
            self::$errores[] = "Debes añadir un apellido";
        }

        if (!$this->telefono) {
            self::$errores[] = "Debes añadir un telefono";
        }

        // Expresión regular puede ser para validar un email, telefono, número de tarjeta de crédito, etc.

        if(!preg_match('/[0-9]{9,10}/', $this->telefono)) {
            self::$errores[] = "El telefono solo puede contener numeros y debe tener 10 digitos";

        }

        return self::$errores;
    }


}

?>
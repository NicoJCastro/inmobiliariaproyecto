<?php

namespace Model;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

//Active Record: Es un patrón de diseño que nos permite trabajar con la base de datos de una manera más sencilla y rápida. 

class Propiedad extends ActiveRecord {

    protected static $tabla = 'propiedades'; // Nombre de la tabla de la Base de Datos
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];


    //Atributos

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    //Constructor

    public function __construct($argc = [])
    {
        $this->id = $argc['id'] ?? null;
        $this->titulo = $argc['titulo'] ?? '';
        $this->precio = $argc['precio'] ?? '';
        $this->imagen = $argc['imagen'] ?? '';
        $this->descripcion = $argc['descripcion'] ?? '';
        $this->habitaciones = $argc['habitaciones'] ?? '';
        $this->wc = $argc['wc'] ?? '';
        $this->estacionamiento = $argc['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $argc['vendedores_id'] ?? '';
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un título";
        }

        if (!$this->precio) {
            self::$errores[] = "El Precio es Obligatorio";
        }

        if (!$this->descripcion) {
            self::$errores[] = "La descripción es obligatoria";
        } elseif (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripción debe tener al menos 50 caracteres";
        }

        if (!$this->habitaciones) {
            self::$errores[] = "El número de habitaciones es obligatorio";
        } elseif (!is_numeric($this->habitaciones) || $this->habitaciones <= 0) {
            self::$errores[] = "El número de habitaciones debe ser un número positivo";
        }

        if (!$this->wc) {
            self::$errores[] = "El número de baños es obligatorio";
        } elseif (!is_numeric($this->wc) || $this->wc <= 0) {
            self::$errores[] = "El número de baños debe ser un número positivo";
        }

        if (!$this->estacionamiento) {
            self::$errores[] = "El número de lugares de estacionamiento es obligatorio";
        } elseif (!is_numeric($this->estacionamiento) || $this->estacionamiento <= 0) {
            self::$errores[] = "El número de lugares de estacionamiento debe ser un número positivo";
        }

        if (!$this->vendedores_id) {
            self::$errores[] = "Elige un vendedor";
        }

        if (!$this->imagen) {
            self::$errores[] = "La imagen de la Propiedad es obligatoria";
        }

        //## COMO APLICAMOS YA UN RESIZE A LA IMAGEN, NO NECESITAMOS VALIDAR EL TAMAÑO DE LA IMAGEN ##

        //Validar por tamaño (1MB máximo)
        // $medida = 1000 * 1000;

        // if ($this->imagen['size'] > $medida) {
        //     self::$errores[] = "La imagen es muy pesada";
        // }

        return self::$errores;
    }



}

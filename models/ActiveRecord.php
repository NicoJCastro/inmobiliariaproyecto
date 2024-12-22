<?php 

namespace Model;

class ActiveRecord {
    
    //Base de Datos 

    protected static $db; // Variable estática para la conexión a la Base de Datos 
    //Definir las columnas de la Base de Datos identificamos las columnas de la Base de Datos
    protected static $columnasDB = []; // Columnas de la Base de Datos que vamos a definir en las clases hijas.
    protected static $tabla = ''; // Nombre de la tabla de la Base de Datos, que vamos a definir en las clases hijas y luego modificamos la consulta SQL en el metodo all().

    //Errores

    protected static $errores = []; 

    //Definir la conexión a la Base de Datos
    public static function setDB($database){
        self::$db = $database; // Asignar la conexión a la variable estática. usamos self para referirnos a la misma clase. Como todo usa la misma bd no hace falta hacer con static.
    }

    public function guardar(){
        if (!is_null($this->id)) {
            //actualizar
            $this->actualizar();
        } else {
            // se crea un nuevo registro
            $this->crear();
        }
    }

    public function crear()
    {

        //Sanitizar los datos
        $atributos = $this->sanitizarDatos();

        //Insertar en la Base de Datos
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos)); // join() une los elementos de un array en un string separados por comas. Keys devuelve los nombres de las columnas de la Base de Datos
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos)); // Values devuelve los valores de las columnas de la Base de Datos
        $query .= " ') ";

        $resultado = self::$db->query($query); // Ejecutar la consulta. vemos true si se ejecuta correctamente y false si no se ejecuta correctamente.

        //Mensaje de exito o error
        if ($resultado) {
            header('Location: /bienesraicesMVC/admin/index.php?resultado=1');
            exit;
        }

    }

    public function actualizar()
    {
        //Sanitizar los datos
        $atributos = $this->sanitizarDatos();        

        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key} = '{$value}'";
        }            

            $query = " UPDATE " . static::$tabla . " SET ";
            $query .=  join(', ', $valores);
            $query .= " WHERE id = '";
            $query .= self::$db->escape_string($this->id) . "' ";
            $query .= " LIMIT 1 ";

           $resultado = self::$db->query($query);

           if ($resultado) {
            header('Location: /bienesraicesMVC/admin/index.php?resultado=2');
            exit;
        }
    }

    // Eliminar un Registro

    public function eliminar()  {
    // Eliminar la propiedad
       $query = "DELETE FROM " . static::$tabla  . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado) {
            $this->borrarImagen();
            header('Location: /bienesraicesMVC/admin/index.php?resultado=3');
        }
    }

    //identificar y unir los atributos de la clase con los datos de la Base de Datos
    public function atributos()
    {
        $atributos = [];

        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarDatos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //Subida de archivos (imagenes)

    public function setImage($imagen)
    {
        //Elimina la imagen previa
        if (!is_null($this->id)) {
           $this->borrarImagen();
        }

        //Asignar al atributo imagen el nombre de la imagen que se sube

        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Eliminar Archivo (imagen)

    public function borrarImagen()
    {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    //Validación de los errores

    public static function getErrores(){
        return static::$errores;
    }

    public function validar(){
        static::$errores= [];
        return static::$errores;
    }

    //Listar todas los registros
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla;

        $resutlado = self::consultarSQL($query);

        return $resutlado;
    }

    // Obtiene deterinada cantidad de registros
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;

        $resutlado = self::consultarSQL($query);

        return $resutlado;
    }

    //Buscar una registro por su ID

    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = {$id}";
        $resutlado = self::consultarSQL($query);

        return array_shift($resutlado); //Retorno el primer elemento del array
    }


    public static function consultarSQL($query)
    {

        //Consultar la Base de Datos
        $resultado = self::$db->query($query);

        //Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        //liberar memoria
        $resultado->free();

        //retornar los resutados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static; // Seria como crear new Propiedad() pero porque es la clase padre se usa self;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario

    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}



?>
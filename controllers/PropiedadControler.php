<?php 


namespace Controllers;

error_reporting(E_ALL);
ini_set('display_errors', '1');

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadControler {

    public static function index(Router $router) {

        $propiedades = Propiedad::all();

        $vendedores = Vendedor::all();
        
        $resultado = $_GET['resultado'] ?? null;

        // Llama a la función render que se encuentra en el archivo Router.php. propiedades/admin.php es la vista que se va a mostrar ($view)
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]); 
    }

    public static function crear(Router $router) {

        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Crear una nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);   
        
            // ### SUBIDA DE ARCHIVOS ###
            //En funciones.php se definió la constante CARPETA_IMAGENES
        
            //Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
            //Setear la imagen
        
            //Realiza un resize a la imagen con intervention image
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImage($nombreImagen);
            }          
        
            //Validar
        
            $errores = $propiedad->validar();
        
            // Revisar que el arreglo de errores esté vacío
        
            if (empty($errores)) {
        
        
                //Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
        
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen); //Primero la carpeta y luego el nombre de la imagen
        
                //Guarda en la Base de Datos
                $propiedad->guardar();
        
                
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarORedireccionar('admin');

        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        // Metodo POST para Actualizar!!!
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {    

            //Asignar los atributos
            $args = $_POST['propiedad'];
        
            $propiedad->sincronizar($args);
        
            //Validación subida de archivos
        
            $errores = $propiedad->validar();
        
            //Subida de archivos
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImage($nombreImagen);
            }
        
            if (empty($errores)) {
                // Almacenar la imagen
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
            
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            //Validar id 
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if ($id) {
        
                $tipo = $_POST['tipo'];
                
                if(validarTipoContenido($tipo)) {                  
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();

                    // Redirigir después de eliminar
                    header('Location: /bienesraicesMVC/admin?resultado=3');
                    exit;
                }               
            }
        }
    }


}



?>
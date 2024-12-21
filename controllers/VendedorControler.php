<?php 

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorControler {

    public static function crear(Router $router) {

        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
            //Validar que no haya campos vacios
            $errores = $vendedor->validar();

            //No hay errores
            if(empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor

        ]);
        
    }

    public static function actualizar(Router $router) {

        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('admin');

        // Obtener el vendedor a actualizar

        $vendedor = Vendedor::find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos
        
            $args = $_POST['vendedor'];
        
            // Sincronizar el objeto en memoria con lo que el usuario escribió
            $vendedor->sincronizar($args);
        
            // Validación
            $errores = $vendedor->validar();
        
            if(empty($errores)) {
                $vendedor->guardar();
            }
        
        }
        
        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);

    }

    public static function eliminar() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            //Validar id 
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if ($id) {
        
                $tipo = $_POST['tipo'];
                
                if(validarTipoContenido($tipo)) {                  
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();

                    // Redirigir después de eliminar
                    header('Location: /bienesraicesMVC/admin?resultado=3');
                    exit;
                }               
            }
        }
        
    }


}

?>
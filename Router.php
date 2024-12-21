<?php 
namespace MVC;

class Router { 
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn) {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->rutasPOST[$url] = $fn;
    }
    
    public function comprobarRutas() {
        // Debug
        error_log("Comprobando rutas...");

        session_start();

        $auth = $_SESSION['login'] ?? null;

        //Arreglo de rutas protegidas

        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar' ];
        
        // Obtener la ruta actual
        $urlActual = $_SERVER['REQUEST_URI'];
        $urlActual = parse_url($urlActual, PHP_URL_PATH);
        
        $basePath = '/bienesraicesMVC';
        $urlActual = str_replace([$basePath, '/index.php'], '', $urlActual);
        
        // Si la URL está vacía, establecerla como '/'
        if (empty($urlActual)) {
            $urlActual = '/';
        }
        
        // Debug
        error_log("URL procesada: " . $urlActual);
        error_log("Rutas disponibles: " . print_r($this->rutasGET, true));
        
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
           $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //Progeter las rutas

        if(in_array($urlActual, $rutas_protegidas) && !$auth) {
            
            header('Location: /bienesraicesMVC/index');
        }

        if ($fn) {
            // La URL existe
            if(is_array($fn)) {
                $controller = new $fn[0];
                $action = $fn[1];
                call_user_func([$controller, $action], $this);
            } else {
                call_user_func($fn, $this);
            }
        } else {
            echo 'Página no encontrada. URL solicitada: ' . $urlActual;
            error_log("Ruta no encontrada: " . $urlActual);
        }
    }

    public function render($view, $datos = []) {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();
        include __DIR__ . "/views/layout.php";
    }
}
?>
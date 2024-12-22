<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

define('TEMPLATE_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/bienesraicesMVC/public/imagenes/');


function incluirTemplate(string $nombre, bool $inicio = false)
{
    include  TEMPLATE_URL . "/$nombre.php";
}

function estaAutenticado()
{
    session_start();
    if (!($_SESSION['login'])) {  // Redirigir solo si no está autenticado
        header('Location: /bienesraicesMVC/index');
    }
}


function debuguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML

function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}


// Validar tipo de contenido

function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

// Muestra los mensajes 

function mostrarNotificacion($codigo)
{
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = "Creado Correctamente";
            break;
        case 2:
            $mensaje = "Actualizado Correctamente";
            break;
        case 3:
            $mensaje = "Eliminado Correctamente";
            break;

        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar(string $url){
    // Obtener el ID de la URL para Actualizar
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT); // Validamos que sea un entero
    if (!$id) {
        header("Location: /bienesraicesMVC/public/${url}");
    }

    return $id;
}

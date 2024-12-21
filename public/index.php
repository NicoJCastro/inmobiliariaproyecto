<?php 
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;
use Controllers\PaginasControler;
use Controllers\VendedorControler;
use Controllers\PropiedadControler;

$router = new Router();

// Rutas propiedades
$router->get('/admin', [PropiedadControler::class, 'index']);
$router->get('/propiedades/crear', [PropiedadControler::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadControler::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadControler::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadControler::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadControler::class, 'eliminar']);

// Rutas vendedores
$router->get('/vendedores/crear', [VendedorControler::class, 'crear']);
$router->post('/vendedores/crear', [VendedorControler::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorControler::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorControler::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorControler::class, 'eliminar']);


$router->get('/index', [PaginasControler::class, 'index']);
$router->get('/nosotros', [PaginasControler::class, 'nosotros']);
$router->get('/propiedades', [PaginasControler::class, 'propiedades']);
$router->get('/propiedad', [PaginasControler::class, 'propiedad']);
$router->get('/blog', [PaginasControler::class, 'blog']); // Probar hacer dinámico el blog
$router->get('/entrada', [PaginasControler::class, 'entrada']);
$router->get('/contacto', [PaginasControler::class, 'contacto']);
$router->post('/contacto', [PaginasControler::class, 'contacto']);

// Login y autenticación

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);



$router->comprobarRutas();

?>
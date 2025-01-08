<?php
use Dotenv\Dotenv;
use Model\ActiveRecord;
require __DIR__ . '/../vendor/autoload.php';


require 'funciones.php';
require 'config/database.php';

try {
    // Obtener la ruta correcta al archivo .env
    $rootPath = __DIR__;
    
    // Crear instancia de Dotenv y cargar variables
    $dotenv = Dotenv::createImmutable($rootPath);
    

    $dotenv->load();
    
    // Requerir que las variables existan y no estén vacías
    $dotenv->required([
        'MYSQL_HOST',
        'MYSQL_USERNAME',
        'MYSQL_PASSWORD',
        'MYSQL_DATABASE',
        'MYSQL_PORT'

    ])->notEmpty();
    
    // Conectar a la Base de Datos usando los valores de $_ENV
    $db = conectarDb(); 

    if ($db->connect_error) {
        throw new Exception("Error de conexión a la base de datos: " . $db->connect_error);
    }
    
    // Configurar la conexión para ActiveRecord
    ActiveRecord::setDB($db);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
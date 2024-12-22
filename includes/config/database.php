<?php 

function conectarDb() : mysqli {
    // Obtener las variables de entorno
    $host = getenv('MYSQL_HOST');  // Dirección del host
    $username = getenv('MYSQL_USERNAME');  // Nombre de usuario
    $password = getenv('MYSQL_PASSWORD');  // Contraseña
    $database = getenv('MYSQL_DATABASE');  // Nombre de la base de datos
    $port = getenv('MYSQL_PORT');  // Puerto de conexión

    // Crear la conexión a la base de datos
    $db = new mysqli($host, $username, $password, $database, $port);

    // Verificar si la conexión fue exitosa
    if ($db->connect_error) {
        echo "Error: No se pudo conectar a la base de datos. " . $db->connect_error;
        exit;
    }

    return $db;
}

?>

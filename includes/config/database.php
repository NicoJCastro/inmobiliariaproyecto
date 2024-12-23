<?php 

function conectarDb() : mysqli {    

    $db = new mysqli(
        $_ENV['MYSQL_HOST'],
        $_ENV['MYSQL_PASSWORD'],
        $_ENV['MYSQL_PORT'],
        $_ENV['MYSQL_USERNAME'],
        $_ENV['MYSQL_DATABASE'],

    );

    if ($db->connect_error) {
        echo "Error no se pudo conectar: " . $db->connect_error;
        exit;
    } 
    return $db;
}

?>
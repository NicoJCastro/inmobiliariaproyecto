<?php 

function conectarDb() : mysqli {

    $db_host = getenv('MYSQL_HOST');
    $db_user = getenv('MYSQL_USERNAME');
    $db_pass = getenv('MYSQL_PASSWORD');
    $db_name = getenv('MYSQL_DATABASE');
    $db_port = getenv('MYSQL_PORT');
    


    $db = new mysqli ($db_host, $db_user, $db_pass, $db_name, $db_port);

   if (!$db) {
       echo "Error no se pudo conectar";
        exit;
   } 
   return $db;
}

?>
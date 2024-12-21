<?php 

function conectarDb() : mysqli {
    $db = new mysqli ("localhost", "root", "nina1436", "bienesraices_crud");

   if (!$db) {
       echo "Error no se pudo conectar";
        exit;
   } 
   return $db;
}

?>
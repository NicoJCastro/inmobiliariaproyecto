<?php

//funciones-baseDedatos-clases

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//Conectar a la Base de Datos
$db = conectarDB();

use Model\ActiveRecord;

ActiveRecord::setDB($db);

?>
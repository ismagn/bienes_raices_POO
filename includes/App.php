<?php
//este archivo se encargará de llamar a todos los documentos, es como un main

require 'database.php';
require 'funciones.php';
require __DIR__ . '/../vendor/autoload.php';

$db=conexionDB ();

use App\MainClass;
MainClass::setDB($db);
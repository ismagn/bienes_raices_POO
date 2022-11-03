<?php


function conexionDB (){
    $db = new mysqli('localhost','root','Yamil2013','bienesRaices_crud');
    $db->set_charset('utf8');

    if (!$db) {
        echo "error en la conexion";
        exit;
    }
    return $db;
    
    }

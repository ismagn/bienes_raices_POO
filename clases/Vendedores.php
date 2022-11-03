<?php

namespace App;

class Vendedores extends MainClass{
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($post = []){
        //variables que almacenan los datos enviados por el usuario desde el formulario
        $this->id = $post['id'] ?? '';
        $this->nombre = $post['nombre'] ?? '';
        $this->apellido = $post['apellido'] ?? '';
        $this->telefono = $post['telefono'] ?? '';
    }

    public function validar(){
        $error=false;
        if (!$this->nombre | !$this->apellido | !$this->telefono ) {
            $error = true;
        }
        return $error;
    }

    public function crear(){
        //agregando datos a la base de datos
    $query="INSERT INTO vendedores(nombre,apellido,telefono) VALUES ('$this->nombre','$this->apellido','$this->telefono')";

        $respuesta = self::$db->query($query);

        return $respuesta;
    }
}
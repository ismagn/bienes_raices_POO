<?php

namespace App;


class Propiedad extends MainClass {

    public $id;
    public $titulo;
    public $precio;
    protected $imagen;
    public $descripcion;
    public $habitaciones;
    public $WC;
    public $estacionamiento;
    public $creado;
    public $vendedor_id;
    public function __construct($post = [])
    {
        //variables que almacenan los datos enviados por el usuario desde el formulario
        $this->id = $post['id'] ?? '';
        $this->titulo = $post['titulo'] ?? '';
        $this->precio = $post['precio'] ?? '';
        $this->imagen = $post['imagen'] ?? '';
        $this->descripcion = $post['descripcion'] ?? '';
        $this->habitaciones = $post['habitaciones'] ?? '';
        $this->WC = $post['baños'] ?? '';
        $this->estacionamiento = $post['estacionamiento'] ?? '';
        $this->creado = date('y/m/d');
        $this->vendedores_id = $post['vendedor'] ?? '';

    }
    
    
}
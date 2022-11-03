<?php


namespace App;

class MainClass{
    protected static $db;
    
    public static function setDB($database){
        self::$db = $database;
    }

    public function validar(){
        $error=false;
        if (!$this->titulo | !$this->precio | !$this->descripcion | !$this->habitaciones | !$this->WC | !$this->estacionamiento ) {
            $error = true;
        }
        return $error;
    }

    public function setImagen($imagen){
        //asignamos el atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public function crear(){
        //agregando datos a la base de datos
    $query="INSERT INTO propiedades(titulo,precio,imagen,descripcion,habitaciones,WC,estacionamiento,creado,vendedores_id) VALUES ('$this->titulo','$this->precio','$this->imagen','$this->descripcion','$this->habitaciones','$this->WC','$this->estacionamiento', '$this->creado', '$this->vendedores_id')";

        $respuesta = self::$db->query($query);
        
        return $respuesta;
    }

    public function actualizar($id){
        $query="UPDATE propiedades SET
    titulo='$this->titulo',
    precio='$this->precio',
    imagen='$this->imagen',
    descripcion='$this->descripcion',
    habitaciones=$this->habitaciones,
    WC=$this->WC,
    estacionamiento=$this->estacionamiento,
    vendedores_id='$this->vendedores_id' where id=${id}";
    $respuesta = self::$db->query($query);
    
    return $respuesta;
    
    }

    // metodo para listar todas las propiedades
    public static function All($tabla){
        $query="SELECT * FROM ${tabla} ;" ;
        
        //se le manda al metodo el query para hacer la consulta
        $res=self::consultarSQL($query);
        return $res; 
    }

    public static function find($id,$tabla){
        $query="SELECT * FROM ${tabla} WHERE id= ${id}";
        $res=self::consultarSQL($query);
        return $res;
    }

    public static function borrar($id,$tabla){
        $query="DELETE FROM ${tabla} where id=${id}";
        $res=self::$db->query($query);
        return $res;
    }

    public static function consultarSQL($query){
        //consultar base de datos
        $res=self::$db->query($query);

        //iterar los resultados
        $array=[];
        while ($row=$res->fetch_assoc()) {
            $array[]= $row;
        }
        
        return $array;
    }
}
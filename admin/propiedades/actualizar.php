<?php



require '../../includes/App.php';
use App\Propiedad;
use App\Vendedores;



$tablaPropiedades='propiedades';
$tablaVendedores='vendedores';

$auth=autenticado();
if (!$auth) {
    header('location: /');
}
//consulta para crear los select
$vendedores=Vendedores::All($tablaVendedores);
?>

<?php
//peticion para prellenar celdas
$id=$_GET['id'];



//obtenemos los datos de la propiedad seleccionada
$propiedad = Propiedad::find($id,$tablaPropiedades);


foreach($propiedad as $row){

    $titulo=$row['titulo'];
    $precio=$row['precio'];
    $descripcion=$row['descripcion'];
    $habitaciones=$row['habitaciones'];
    $WC=$row['WC'];
    $estacionamiento=$row['estacionamiento'];
    $vendedorId=$row['vendedores_id'];
    $img_actual=$row['imagen'];

}



if ($_SERVER['REQUEST_METHOD']==='POST') {

//variables que almacenan los datos enviados por el usuario desde el formulario
$imagen=$_FILES['imagen'];

$propiedad = new Propiedad($_POST);
$error=$propiedad->validar();
//evaluando si el usuario agrego los datos en el formulario
if($error===true){
    $error="*faltan campos*";
}else{

//creado carpeta donde se subiran
$carpetaImagenes = '../../imagenes/';

if (!is_dir($carpetaImagenes)) {
    mkdir($carpetaImagenes);
}

$nombreImagen="";
    
//si hay algo en el [name] de $imagen al enviar por post significa q se agrego una nueva imagen, entonces se borra la imagen actual de la carpeta de imagenes y se agrega la nueva imagen a esa misma carpeta
if ($imagen['name']) {
    
    unlink($carpetaImagenes . $img_actual);

//creado id unico para la imagen y moviendola a la carpeta imagenes
$nombreImagen=md5(uniqid(rand(),true)) . ".jpg";
move_uploaded_file($imagen['tmp_name'],$carpetaImagenes . $nombreImagen);

}else{
    $nombreImagen=$img_actual;
}

$propiedad->setImagen($nombreImagen);

$propiedad->actualizar($id);

if ($propiedad) {
    header('Location: /admin?msj=2');
}

}
}

include '../../includes/templates/header_admin.php';  

?>



<main>
    <h1 class="text-center" >Actualizar Propiedad</h1>
    <div class="row d-flex justify-content-center mt-5">
        <a href="../index.php" class="btn btn-primary col-4">Regresar</a>
    </div>
    

    <div class=" mt-2 mx-auto fs-5 fw-bold w-25 text-center text-danger"><?php echo $error ?></div>

    <section class="cont_formulario ">
            <form action="" method="POST" class="form" enctype="multipart/form-data">
                
            <div class="info_personal mt-5 pt-2">
                    <div class=" titulos_formularios text-muted">
                        <h3 >INFORMACION GENERAL</h3>
                        </div>
                        <div class="input my-5">
                            <label for="titulo" class="form-label">Titulo</label>
                            <input type="text" id="titulo" class="form-control" placeholder="" name="titulo" value="<?php echo $titulo; ?>">
                        </div>
                        <div class="input my-5">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" id="precio" name="precio" class="form-control" value="<?php echo $precio; ?>" >
                        </div>
                        <div class="input my-5">
                            <label for="img" class="form-label">Imagen</label>
                            <input type="file" id="img" name="imagen" class="form-control"   accept="image/jpg,image/png,image/jpeg">
                            <div class=" col-2">
                                <img class="img-fluid" src="/imagenes/<?php echo $img_actual ?>"  alt="">
                            </div>
                            

                        </div>
                        <div class="input my-5">
                            <label for="descripcion" class="form-label" id="descripcion">Descripcion</label>
                            <textarea  id="descripcion" cols="30" rows="10" class="form-control" name="descripcion"><?php echo $descripcion; ?> </textarea>
                        </div>
                </div>

                <div class="info_propiedad mt-5 pt-2">
                    <div class="titulos_formularios text-muted">
                        <h3 >INFORMACION PROPIEDAD</h3>
                    </div>
                        <div class="input my-5">
                            <label for="habitaciones" class="form-label">HABITACIONES</label>
                            <input type="number" id="habitaciones" name="habitaciones" class="form-control" value="<?php echo $habitaciones; ?>" >
                        </div>
                        <div class="input my-5">
                            <label for="baños" class="form-label">Baños</label>
                            <input type="number" id="baños" name="baños" value="<?php echo $WC; ?>" class="form-control" >
                        </div>
                        <div class="input my-5">
                            <label for="estacionamiento" class="form-label">Estacionamiento</label>
                            <input type="number" id="estacionamiento" name="estacionamiento" value="<?php echo $estacionamiento; ?>"  class="form-control" >
                        </div>
                </div>

                <div class="info_propiedad mt-5 pt-2">
                    <div class="titulos_formularios text-muted">
                        <h3 >VENDEDOR</h3>
                    </div>
                    <div class="input my-5">
                        <select name="vendedor"  class="form-select">
                            <?php foreach($vendedores as $row) {?>
                                <option  value="<?php echo $row['id']; ?>"  ><?php echo $row['nombre'] . " " . $row['apellido']; ?></option>
                            <?php }//endWhile ?>
                        </select>
                    </div>
                </div>

                <div class="enviar">
                    <input type="submit" value="actualizar propiedad" class="btn ">
                </div>
            </form>

            <?php echo $error ?>
        </section>

</main>

<?php include '../../includes/templates/footer.php' ?>
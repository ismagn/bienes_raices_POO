<?php
require '../../includes/App.php';
use App\Propiedad;
use App\Vendedores;



$tablaPropiedades='propiedades';
$tablaVendedores='vendedores';
//consulta para crear el select
$vendedores=Vendedores::All($tablaVendedores); 


if ($_SERVER['REQUEST_METHOD']==='POST') {

    $imagen=$_FILES['imagen'];

    $propiedad = new Propiedad($_POST);
    $error=$propiedad->validar();
//evaluando si el usuario agrego los datos en el formulario
    if($error===true){
        $error="*faltan campos*";
    }else if(!$imagen['name']){
        $error = "*falta agregar una imagen*";
    }else{

    //creado carpeta donde se subiran
    $carpetaImagenes = '../../imagenes/';

    if (!is_dir($carpetaImagenes)) {
        mkdir($carpetaImagenes);
    }

    //creado id unico para la imagen y moviendola a la carpeta imagenes
    $nombreImagen=md5(uniqid(rand(),true)) . ".jpg";
    move_uploaded_file($imagen['tmp_name'],$carpetaImagenes . $nombreImagen);
    $propiedad->setImagen($nombreImagen);

    $propiedad->crear();

    if ($propiedad) {
        header('Location: /admin?msj=1');
    }

    }
}


include '../../includes/templates/header_admin.php';

?>



<main>
    <h1 class="text-center" >Crear</h1>

    <a href="../index.php" class="btn btn-primary ms-5">Regresar</a>

    <div class=" mt-2 mx-auto fs-5 fw-bold w-25 text-center text-danger"><?php echo $error ?></div>

    <section class="cont_formulario ">
            <form action="/admin/propiedades/crear.php" method="POST" class="form" enctype="multipart/form-data">
                
            <?php include '../../includes/templates/formularios_propiedades.php' ?>

                <div class="enviar">
                    <input type="submit" value="crear propiedad" class="btn ">
                </div>
            </form>

            <?php echo $error ?>
        </section>

</main>

<?php include '../../includes/templates/footer.php' ?>
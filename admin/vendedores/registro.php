<?php
require '../../includes/App.php';
use App\Vendedores;

if ($_SERVER['REQUEST_METHOD']==='POST') {
$vendedor=new Vendedores($_POST);



$error=$vendedor->validar();
//evaluando si el usuario agrego los datos en el formulario
    if($error===true){
        $error="*faltan campos*";
    }else{
        
        $sss=$vendedor->crear();
    }

}

include '../../includes/templates/header_admin.php';

?>

<main>
    <h1 class="text-center" >REGISTRO VENDEDOR</h1>
    <div class="row d-flex justify-content-center mt-5">
        <a href="../index.php" class="btn btn-primary col-4">Regresar</a>
    </div>
    

    <div class=" mt-2 mx-auto fs-5 fw-bold w-25 text-center text-danger"><?php echo $error ?></div>

    <section class="cont_formulario ">
            <form action="" method="POST" class="form" enctype="multipart/form-data">
                
            <div class="info_personal mt-5 pt-2">
                    <div class=" titulos_formularios text-muted">
                        <h3 >INFORMACION VENDEDOR</h3>
                        </div>
                        <div class="input my-5">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" class="form-control" placeholder="" name="nombre" value="<?php echo $vendedor->nombre; ?>">
                        </div>
                        <div class="input my-5">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $vendedor->apellido; ?>" >
                        </div>
                        <div class="input my-5">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $vendedor->telefono; ?>" >
                        </div>

                <div class="enviar">
                    <input type="submit" value="actualizar propiedad" class="btn ">
                </div>
            </form>

            
        </section>

</main>

<?php include '../../includes/templates/footer.php' ?>


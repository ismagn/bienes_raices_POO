<?php

use App\Propiedad;
use App\Vendedores;

require '../../includes/App.php';



$auth=autenticado();
if (!$auth) {
    header('location: /');
}
?>

<?php

$id=$_GET['id'];
$vendedor=$_GET['vendedor'];
$tablaPropiedades='propiedades';
$tablaVendedores='vendedores';
$valor_borrable="";


if ($vendedor==1) {
    $vendedor = Vendedores::find($id,$tablaVendedores);
    foreach($vendedor as $row){
        $nombre=$row['nombre'];
    }
    $valor_borrable="al vendedor";
}else{
$propiedad = Propiedad::find($id,$tablaPropiedades);
foreach($propiedad as $row){
    $img_actual=$row['imagen'];
    $nombre=$row['titulo'];
}
    $valor_borrable="la propiedad";
}

$carpetaImagenes = '../../imagenes/';


if ($_SERVER['REQUEST_METHOD']==='POST') {

$propiedad = Propiedad::borrar($id,$tablaPropiedades);
$vendedor = Vendedores::borrar($id,$tablaVendedores);

if ($propiedad) {
    unlink($carpetaImagenes . $img_actual);
    header('Location: /admin?msj=3');
}

}

?>
<?php include '../../includes/templates/header_admin.php'  ?>

<main>
    <!-- <h1 class="text-center">Borrar</h1> -->

    

    <form action="" method="POST" class="">
        <div class="row d-flex justify-content-center py-5  m-auto rounded-4 ">
        <h3 class=" fw-bold  col-12 text-center text-danger" for="">Seguro que desea borrar <?php echo $valor_borrable ?>: <br> <span class="text-white fw-bold fs-2"><?php echo $id . ".- " . $nombre ?></span> </h3>
        </div>
        
        <div class="row text-center d-flex justify-content-center">
            <input class="btn bg-danger fw-bold col-10 my-1 col-md-2 ms-1" type="submit" value="CONFIRMAR">
            <a href="../index.php" class="ms-1 btn bg-primary fw-bold col-10 my-1 col-md-2 pt-2">CANCELAR</a>
        </div>
        
    </form>
</main>

<?php include '../../includes/templates/footer.php' ?>
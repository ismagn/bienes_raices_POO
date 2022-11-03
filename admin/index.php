
<?php include '../includes/templates/header_admin.php'  ?>
<?php include '../includes/App.php';

$auth=autenticado();
if (!$auth) {
    header('location: /');
}
?>
<!--variable que almacena el valor de la url para mostrar mensaje temporal -->
<?php   $mensaje=$_GET['msj']  ?>

<?php
use App\Propiedad;
use App\Vendedores;

//implementamos un metodo para obtener las propiedades
$tablaPropiedades='propiedades';
$tablaVendedores='vendedores';
$propiedades = Propiedad::All($tablaPropiedades);
$vendedores = Vendedores::All($tablaVendedores);

?>

<main class="main_admin">
    <h1 class="text-center fs-1 fw-bold">Administrador de Bienes Raices</h1>

    <!--muestra un mensaje temporal -->
    <?php if ($mensaje == 1) { ?>
            <p id="msj" class="p-2 bg-success m-auto text-center col-3 rounded-5">PROPIEDAD AGREGADA CORRECTAMENTE</p>
    <script>
        $('#msj').delay(2500).fadeOut(1500);
    </script>
    <?php }elseif ($mensaje == 2) { ?>
        <p id="msj" class="p-2 bg-success m-auto text-center col-3 rounded-5">PROPIEDAD ACTUALIZADA CORRECTAMENTE</p>
    <script>
        $('#msj').delay(2500).fadeOut(1500);
    </script>
    <?php }elseif ($mensaje == 3) { ?>
        <p id="msj" class="p-2 bg-success m-auto text-center col-3 rounded-5">PROPIEDAD ELIMINADA CORRECTAMENTE</p>
    <script>
        $('#msj').delay(2500).fadeOut(1500);
    </script>
    <?php }  ?>
    <!-- -->

    <div class="mt-5 d-flex justify-content-around">
    <a href="/admin/propiedades/crear.php" class="btn btn-primary">Nueva Propiedad</a>
    </div>
    
    
    <div class="lista_admin table-responsive">
    <table class="table table-bordered text-center table align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>TITULO</th>
                <th>IMAGEN</th>
                <th>PRECIO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($propiedades as $row) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><img src="/imagenes/<?php echo $row['imagen']; ?>" class="img_propiedades" alt=""></td>
                <td><?php echo $row['precio'] ?></td>
                <td>
                    <div class="d-flex flex-column align-items-center ">
                    <a href="/admin/propiedades/actualizar.php?id=<?php echo $row['id'];?>" class=" mb-2 btn btn-success btn-sm col-sm-8 col-lg-6">Actualizar Propiedad</a>
                    <a href="/admin/propiedades/borrar.php?id=<?php echo $row['id'];?>" class="btn btn-danger  col-sm-8 col-lg-6">Eliminar Propiedad</a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
    </div>

    <div class="mt-5 d-flex justify-content-around">
    <a href="/admin/vendedores/registro.php" class="btn btn-primary">Registrar vendedor</a>
    </div>

    <div class="lista_admin table-responsive">
    <table class="table table-bordered text-center table align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>TELEFONO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($vendedores as $row) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellido'] ?></td>
                <td><?php echo $row['telefono'] ?></td>
                <td>
                    <div class="d-flex flex-column align-items-center ">
                    <a href="/admin/propiedades/borrar.php?id=<?php echo $row['id'];?>&vendedor=1" class="btn btn-danger  col-sm-8 col-lg-6">Eliminar vendedor</a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
    </div>
    
</main>

<?php include '../includes/templates/footer.php' ?>
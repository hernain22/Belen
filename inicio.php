<?php 
include('template/cabecera.php'); 
$nombreUsuario=$_SESSION["nUsuario"];
?>
<div class="col-md-12">
    <div class="jumbotron">
        <h1 class="display-3">Sistema de Administracion de Funeraria Belen Ltda</h1>
        <p class="lead">Bienvenido <?php echo $nombreUsuario; ?></p>
        <hr class="my-2">
        <p class="lead">
        <!--<a class="btn btn-info btn-lg" href="seccion/registro.php" role="button">Ingresar al sistema</a>-->
        </p>
    </div>    
</div>
<?php include('template/pie.php'); ?>

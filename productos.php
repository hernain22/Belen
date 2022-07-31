<?php 
include("template/cabecera.php");

include ("administrador/config/bd.php");

$sentenciaSql=$conexion->prepare("SELECT * FROM libros");
$sentenciaSql->execute();
$listaLibros=$sentenciaSql->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($listaLibros as $libro){ ?>
<div class="col-md-3">
    <div class="card">
        <img class="card-img-top" src="img/<?php echo $libro['imagen']; ?>" alt="">
        <div class="card-body">
            <h4 class="card-title">Title</h4>
            <a name="" id="" class="btn btn-primary" href="https://goalkicker.com/" role="button">Ver más</a>
        </div>
    </div>
</div>
<?php } ?>



<?php include("template/pie.php"); ?>
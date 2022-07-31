<?php
session_start();
if($_POST){
  include("config/bd.php");
  $txtRut=(isset($_POST['txtRut']))?$_POST['txtRut']:"";
  $txtclave=(isset($_POST['contrasena']))?$_POST['contrasena']:"";
  $sentenciaSql=$conexion->prepare("SELECT * FROM usuarios WHERE rut=:rut");
  $sentenciaSql->bindParam(':rut',$txtRut);
  $sentenciaSql->execute();
  $usuario=$sentenciaSql->fetch(PDO::FETCH_LAZY);

  if($usuario){
    $bdClave=$usuario['clave'];
    $bdnombre=$usuario['nombre'];
    $bdrol=$usuario['rol'];
    if($txtclave==$bdClave){
      $_SESSION['nUsuario']=$bdnombre;
      $_SESSION['rUsuario']=$bdrol;
      header('Location:inicio.php');
    }else{
      $mensaje="ERROR Contraseña incorrecta...";
    }
  }else{
    $mensaje="ERROR Usuario no existe...";
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    
    <div class="container">
        <div class="row">
          <!-- Centra el cuadro -->
        <div class="col-md-4">
        </div>
            <!-- md-4 deja el cuadro mas angosto que si fuera md-12 -->
            <div class="col-md-4">
              <!-- br que separan el cuadro de la cabecera -->
            <br/><br/><br/>
                <div class="card">
                  <div class="card-header">
                    Login
                  </div>
                  <div class="card-body">
                      <?php if(isset($mensaje)){ ?>
                          <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                      <?php } ?>
                  <form method="POST">
                  <div class = "form-group">
                  <label>Usuario</label>
                  <input type="text" class="form-control" name="txtRut" id="txtRut" placeholder="Rut">
                  <!--
                  <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
                      -->  
                </div>
                  <div class="form-group">
                  <label>Contraseña:</label>
                  <input type="password" class="form-control" name="contrasena"  placeholder="Escribe tu Contraseña">
                  </div>
                  <button type="submit" name="accion" value="inicio" class="btn btn-info">Iniciar Sesion</button>
                  </form>        
                  </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>
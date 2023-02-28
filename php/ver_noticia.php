<?php
  session_start();
  include "dbconnect.php";
  include "class/usuario.php";
  include "class/administrador.php";
  include "class/inmueble.php";
  include "class/noticia.php";
  include "funciones.php";

  if (isset($_POST['ver'])) {
    $id = $_POST['id'];
    $conexion = abrirConexion();
    $consulta = "SELECT * FROM tbl_noticias WHERE id='$id'";
    $noticia = mysqli_query($conexion,$consulta);

    if (!$noticia) {
      echo "¡Error! No se ha podido acceder a la noticia :(";
    } else {
      while ($fila = mysqli_fetch_array($noticia, MYSQLI_ASSOC)) {
        $titular = $fila['titular'];
        $contenido = $fila['contenido'];
        $imagen = $fila['imagen'];
        $fecha = $fila['fecha'];
      }
    }
    mysqli_close($conexion);
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver Noticia</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
      <!-- Mi CSS -->
      <link rel="stylesheet" href="../css/estilos.css" media="screen">
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php mostrarMenu(); ?>
    
    <!-- Recojo datos de la noticia -->
    <div class='container-fluid cabecera-menu-inicio'>
      <div class='row'>
        <div class='col-sm-8 col-sm-offset-2'>
          <center><img src='../media/img/img_noticias/<?=$imagen?>' alt='img-inmueble' img-align='center' width='60%'></center>
          <div class='contenido-noticia tnoticias'>
            <h1><b> <?=$titular?></b></h1>
            <p align='justify'><?=$contenido?> </p>
            <p><b>Fecha de publicación: </b><?=$fecha?></p>
            <a class='btn btn-theme' href='./home.php'>Volver a <b>Inicio</b></a>
          </div>
        </div>
      </div>
    </div>
    <!-- footer -->
    <?php footer(); ?> 
  </body>
</html>




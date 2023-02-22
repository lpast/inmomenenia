<?php 
  session_start();
  require "dbconnect.php";
  require "class/interfaz.php";
  require "class/usuario.php";
  require "class/noticia.php";

  $menu = Interfaz::mostrarMenu();
  $noticia = Noticia::datos_noticia();
  $footer = Interfaz::footer();

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
    
    <!-- Menú de navegación -->
    <?php $menu ?>
    
    <!-- Recojo y muestro datos de la noticia -->
    <?php $noticia ?>
    <div class='container-fluid cabecera-menu-inicio'>
      <div class='row'>
      <div class='col-sm-8 col-sm-offset-2'>
            <center><img src='../media/img/img_noticias/$imagen' alt='img-inmueble' img-align='center' width='60%'></center>
            <div class='contenido-noticia'>
              <h1><b> <?php echo $titular ?></b></h1>
                <p align='justify'><?php echo $contenido ?></p>
                <p><b>Fecha de publicación: </b><?php echo $fecha ?></p>
                <a class='btn btn-theme' href='./home.php'>Volver a <b>Inicio</b></a>
            </div>
          </div>
      </div>
    </div>
    <!-- footer -->
    <?php $footer ?> 
  </body>
</html>




<?php
  session_start();
  require "../../../php/dbconnect.php";
  require "../../../php/class/interfaz.php";
  require "../../../php/class/inmueble.php";
  require "../../../php/class/administrador.php";
  require "../../../php/funciones.php";

  $menu = Administrador::menuAdmin();
  $botones = Administrador::gestion_inmuebles();
  $footer = Interfaz::footer(); 
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inmuebles</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <!-- Mi CSS -->
    <link rel="stylesheet" href="../../../css/estilos.css" media="screen">
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php $menu ?>
    <?php $botones ?>
    <!-- Listamos inmuebles -->
    <div class='col-xs-12 col-sm-8 col-sm-offset-2 tnoticias'>
      <h2 class='margen-noticias tnoticias' align='center'>Aquí tienes los inmuenles de tu búsqueda</h2>
    </div>
    <div class='col-xs-12 col-sm-8 col-sm-offset-2 tnoticias'>;
      <?php Inmueble::listar_inmuebles(); ?>
    </div>
    <!-- footer -->
    <?php Interfaz::footer();  ?> 
  </body>
</html>
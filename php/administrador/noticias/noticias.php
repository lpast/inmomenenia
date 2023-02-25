<?php 
  session_start(); 
  require "../../../php/dbconnect.php";
  require "../../../php/class/interfaz.php";
  require "../../../php/class/usuario.php";
  require "../../../php/class/administrador.php";
  require "../../../php/class/cita.php";
  require "../../../php/funciones.php";

  comprobarAdmin();

  $menu = Administrador::menuAdmin();
  $botones = Administrador::gestion_citas();
  $nueva_cita = Cita::nueva_cita(); 
  $footer = Interfaz::footer();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Noticias</title>
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
   <!-- Menú de navegación -->
   <?php $menu ?>

    <!-- Botones de funciones añadir, borrar, buscar -->
    <?php $botones ?>
    
    <!-- Muestro calendario y muestro las citas y opción de modificar -->
    <?php $noticias = Interfaz::mostrar_noticias(); ?>

    <!-- footer -->
    <?php $footer = Interfaz::footer(); ?> 
  </body>
</html>
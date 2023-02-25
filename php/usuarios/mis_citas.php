<?php
  session_start(); 
  require "../../php/dbconnect.php";
  require "../../php/class/interfaz.php";
  require "../../php/class/usuario.php";
  require "../../php/class/inmueble.php";

  $menu = Usuario::mostrarMenu();
  $botones = Usuario::gestion_usuario();
  $footer = Interfaz::footer();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis citas</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <!-- Mi CSS -->
    <link rel="stylesheet" href="../../css/estilos.css" media="screen">
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Librería jQuery requerida por los plugins de JavaScript -->
      <script src="http://code.jquery.com/jquery.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   </head>
   <body>
    <?php $menu ?>
    <?php $botones ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
          <div class='tnoticias'>
            <h1 align='center'>Echa un vistazo a tus citas</h1>
          </div>
        </div>
        <!-- Se muestran los datos del usuario -->
        <?php Usuario::mis_citas(); ?>
        
        
      </div>
    </div>
    <?php $footer ?>
  </body>
</html>
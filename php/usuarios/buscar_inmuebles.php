<?php
  session_start(); 
  require "../../php/dbconnect.php";
  require "../../php/class/interfaz.php";
  require "../../php/class/usuario.php";
  require "../../php/class/inmueble.php";

  $menu = Usuario::mostrarMenu();
  $aleatoria = Usuario::img_aleatoria();
  $formulario = Inmueble::form_busca_inmueble();
  $inmuebles = Inmueble::buscar_Inmueble();
  $footer = Interfaz::footer();
  
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar Inmuebles</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <!-- Mi CSS -->
    <link rel="stylesheet" href="../../css/estilos.css" media="screen">
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php $menu ?>
    
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'> <!-- cabecera alargada -->
          <!-- Muestro imagen de un inmueble aleatorio -->
          <?php $aleatoria ?>
          <?php $formulario ?>
        </div>
      </div>
    </div>
   <!-- footer -->
   <?php $footer ?> 
  </body>
</html>
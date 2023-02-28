<?php
  session_start(); 
  include "../../php/dbconnect.php";
  include "../../php/class/usuario.php";
  include "../../php/class/inmueble.php";
  include "../../php/funciones.php";
  comprobarUsuario();
 ?>
<!DOCTYPE html>
<html lang="es">
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
    <?php menuTipo(); ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
          <h1 class='margen-noticias ' align='center'>Agenda</h1>
          <?php Usuario::gestion_usuario(); ?>
        </div>
      </div>
    </div>
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
    <div class="col-xs-4 col-md-6 col-sm-10">
      <p align='center'><a class='btn btn-theme' href='citas.php'>Volver a Área Personal</b></a></p>
    </div>
    <?php footer(); ?>
  </body>
</html>
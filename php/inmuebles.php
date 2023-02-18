<?php 
    session_start();
    include "dbconnect.php";
    include "class/interfaz.php";
    include "funciones.php";
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
      <link rel="stylesheet" href="../css/estilos.css" media="screen">
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="../js/favoritos.js"></script>
  </head>
  <body>
    <?php $tipoMenu = Interfaz::mostrarMenu();  ?>
    <div class="container-fluid">
      <div class="row">
        <!-- Mostramos los inmuebles disponibles -->
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio tinmuebles'>
          <h1 align="center">Ahora mismo, estos son los inmuebles están disponibles</h1>
        </div>
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
       <?php $disponibles = Interfaz::inmuebles_disponibles(); ?>
        </div>
      </diV>
    </diV>

    <?php $footer = Interfaz::footer();   ?> 
  </body>
</html>
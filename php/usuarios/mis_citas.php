<?php
  require_once "../../php/dbconnect.php";
  require_once "../../php/class/interfaz.php";
  require_once "../../php/funciones.php";
  session_start(); 
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
    <!-- Menú de navegación -->
    <?php $menu = Interfaz::mostrarMenu(); ?>

     <!-- Se muestran las citas comprados por el usuario -->
    <?php $botones = Interfaz::citas_usuario(); ?>

    <footer>
      <?php $footer = Interfaz::footer(); ?>
    </footer>
  </body>
</html>
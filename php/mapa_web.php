<?php
  require_once "dbconnect.php";
  require_once "class/interfaz.php";
  require_once "funciones.php";
  session_start(); 
  comprobarIndex();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mapa Web</title>
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
  <body>
    <head>
        <!-- Menú de navegación -->
        <?php $menuHome = Interfaz::mostrarMenuHome(); ?>
    </head>
    
    
    <!-- Mapa web -->
    <?php $mapa = Interfaz::mapaWeb(); ?>
    
    <!-- footer -->
    <?php $footer = Interfaz::footer(); ?> 
  </body>
</html>
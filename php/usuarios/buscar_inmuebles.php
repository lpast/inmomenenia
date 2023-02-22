<?php 
  session_start();
  require_once "../../php/dbconnect.php";
  require_once "../../php/class/interfaz.php";
  require_once "../../php/class/interfaz.php";
  require_once "../../php/funciones.php";
  
  $menu = Interfaz::mostrarMenu();
  $aleatoria = Usuario::img_aleatoria();
  $formulario = Usuario::form_buscar_Inmuebles();
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
    <!-- Menú de navegación -->
    <?php $menu ?>

    <!-- Muestro imagen de un inmueble aleatorio -->
    <?php $aleatoria ?>

    <?php $formulario ?>
   
   <!-- footer -->
   <?php $footer ?> 
  </body>
</html>
<?php
  include "includes/dbconnect.php";
  include "class/interfaz.php";
  include "funciones.php";
  session_start(); 
  comprobarIndex();
  $menu = Interfaz::mostrarMenu();
  $footer = Interfaz::footer();
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
    <!-- Menú de navegación -->
    <?php mostrarMenu(); ?>
        
    <!-- Mapa web --><div class='container-fluid'>
      <div class='row'>
      <div class='col-xs-12 cabecera-menu-inicio' align='center'>
        <h1>Mapa web</h1>
        <h3 class='tmapa'><a href='../php/home.php'>Inicio</a></h3>
        <h3 class='tmapa'><a href='../php/usuarios/buscar_inmuebles.php'>Buscar Inmuebles</a></h3>
        <h3 class='tmapa'><a href='../php/inmuebles.php'>Cartera de Inmuebles</a></h3>
        <h3 class='tmapa'><a href='../php/hipotecas.php'>Calcula tu hipoteca</a></h3>
        <h3 class='tmapa'><a href='../php/contacto.php'>Contacto</a></h3>
        <h3 class='tmapa'><a href='../php/usuarios/area_personal.php'>Área Personal</a></h3>
        </div>
      </div>
    
    <!-- footer -->
    <?php $footer ?> 
  </body>
</html>
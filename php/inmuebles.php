<?php 
     include "../php/dbconnect.php";
     include "../php/class/interfaz.php";
     include "../php/funciones.php";
     session_start(); 

  ?>
<!DOCTYPE html>
<html lang="es">
  <head>
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
    <!-- Menú de navegación -->
    <?php $tipoMenu=Interfaz::mostrarMenu(); ?>

    <!-- Se muestran los inmuebles disponibles -->
    <?php Interfaz::inmuebles_disponibles();?>

    <!-- footer -->
    <footer class="navbar-nav navbar-inverse">
      <p align="center"><a class="aweb" href="../inmomenenia/php/mapa_web.php">Mapa web</a> |  Teléfono: 692605414 | Email: info@inmomenenia.com</p>
    </footer>
  </body>
</html>
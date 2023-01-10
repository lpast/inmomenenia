<?php 
     include "../php/dbconnect.php";
     include "../php/funciones.php";
     include "../php/class/interfaz.php";
     session_start()
?>
<!DOCTYPE html>
<html lang="es">
  <head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacto</title>
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
  </head>
  <body>

    <!-- Menú de navegación -->
    <?php $menu = Interfaz::mostrarMenu(); ?>

     <!-- Muestra contacto -->
     <?php $contacto = Interfaz::muestra_contacto(); ?>

    <!-- Formulario de contacto -->
    <?php $menu = Interfaz::formulario_contacto(); ?>

    <footer class="navbar-nav navbar-inverse">
    <p align="center">Copyright Menenia's Digital 2022</p>
    </footer>
        
  </body>
</html>
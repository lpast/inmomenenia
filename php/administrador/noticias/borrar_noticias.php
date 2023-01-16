<?php 
    require_once "../../../php/dbconnect.php";
    require_once "../../../php/class/interfaz.php";
    require_once "../../../php/funciones.php";
    session_start(); 
    comprobarAdmin();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Borrar Noticias</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <!-- Mi CSS -->
    <link rel="stylesheet" href="../../../css/estilos.css" media="screen">
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body style="background-color: #f5f1e7; background-image:none;">
    
   <!-- Menú de navegación -->
   <?php $menu = Interfaz::mostrarMenu(); ?>

    <!-- Botones de funciones añadir, borrar, buscar -->
    <?php $botones = Interfaz::gestion_noticias(); ?>

    <!-- Mostramos noticias para borrar -->
    <?php $menu = Interfaz::form_borrar_noticias(); ?>

    <!-- Botones de funciones añadir, borrar, buscar -->
    <?php borrar_noticias(); ?>

    <!-- footer -->
    <footer class="navbar-nav navbar-inverse">
    </footer>
  </body>
</html>
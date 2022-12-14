<?php 
 require_once "../../php/dbconnect.php";
 require_once "../../php/class/interfaz.php";
 require_once "../../php/funciones.php";
session_start(); 
comprobarAdmin();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Borrar Inmueble Nuevo</title>
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
    <script src='/js/validar_nuevo_inmueble.js'></script>
</head>
<body>
    <!-- Menú de navegación -->
    <?php $menu = Interfaz::mostrarMenu(); ?>

    <!-- Botones de funciones añadir, borrar, buscar -->
    <?php $botones = Interfaz::gestion_inmuebles(); ?>
  
    <?php $menu = Interfaz::form_borrar_inmueble(); ?>

   <!-- Código PHP para añadir un nuevo inmueble -->
   <?php borrar_inmueble(); ?>

    <!-- footer -->
    <footer class="navbar-nav navbar-inverse">
      <p align="center">Estamos en Av. Doctor Oloriz, 6 (Granada) | Teléfono: 611622633 | Email: info@inmobiliaria.com</p>
    </footer>
</body>
</html>



    <!-- Código PHP que muestra inmubles con las opción de borrar -->
    <?php $menu = Interfaz::form_borrar_inmueble();?>

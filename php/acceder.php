<?php 
include "../php/dbconnect.php";
include "../php/class/interfaz.php";
include "../php/funciones.php";
session_start();
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acceso</title>
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
    <style>
      body{
        background-image: url("../media/img/img_inmuebles/buhardilla_0890.jpeg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
      </style>
  </head>
  <body>

    
    <head>
      <?php abrirConexion();?>
      <!-- Menú de navegación --> 
      <?php $menu = Interfaz::mostrarMenu(); ?>
    </head>

   
      <div class="acceso">
        <!-- Formulario de acceso -->
        <?php $form_acceso= Interfaz::formulario_acceso();?>
        <!-- Accedemos a la aplicacón -->
        <?php iniciar_sesion();?>
      </div>
   

    <footer>
      <?php $footer = Interfaz::footer(); ?>
      <!-- footer -->
      <footer class="navbar-nav navbar-inverse">
          <p align="center"><a class="aweb" href="../inmomenenia/php/mapa_web.php">Mapa web</a> |  Teléfono: 692605414 | Email: info@inmomenenia.com</p>
        </footer>
    </footer>
    
          
   
  </body>
</html>
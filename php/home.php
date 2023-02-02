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
    <title>InmoMenenia</title>
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
        background-image: url("../../media/img/img_inmuebles/fachada_0533.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
      </style>
  </head>
  <body>
    <head>
        <!-- Menú de navegación -->
        <?php $menuHome = Interfaz::mostrarMenuHome(); ?>
    </head>

     <section>
       <?php $home = Interfaz::mostrar_home(); ?> 
     </section>

    <!-- footer -->
    <footer class="navbar-nav navbar-inverse">
      <p align="center"><a class="aweb" href="../inmomenenia/php/mapa_web.php">Mapa web</a> |  Teléfono: 692605414 | Email: info@inmomenenia.com</p>
    </footer>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
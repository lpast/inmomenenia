<?php
  include "../../php/dbconnect.php";
  include "../../php/class/interfaz.php";
  include "../../php/funciones.php";
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
      <?php Interfaz::mostrarMenu(); ?>

      <!-- Botones de funciones añadir, borrar, buscar -->
      <?php Interfaz::gestion_inmuebles(); ?>

      <!-- mostrar formulario de busqueda-->
      <?php Interfaz::form_buscar_inmueble_admin(); ?>
      <!-- buscar inmuebles-->
      <?php buscar_inmuebles_admin (); ?>
      </div>
      </div>
      </div>
      <footer class="navbar-nav navbar-inverse">
        <p align="center">Copyright Menenia's Digital 2022</p>
      </footer>
    </body>

  </html>
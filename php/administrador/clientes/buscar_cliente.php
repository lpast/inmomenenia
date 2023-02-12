<?php 
       include "../../../php/dbconnect.php";
       include "../../../php/class/interfaz.php";
       include "../../../php/funciones.php";
      session_start(); 
      comprobarAdmin();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar Clientes</title>
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

    <body>
      <!-- Menú de navegación -->
      <?php Interfaz::menuAdmin(); ?>

      <!-- Botones de funciones añadir, borrar, buscar -->
      <?php Interfaz::gestion_clientes(); ?>

      <!-- mostrar formulario de busqueda-->
      <?php Interfaz::form_buscar_cliente(); ?>
     
      <!-- footer -->
      <?php Interfaz::footer(); ?>
    </body>

  </html>
<?php
  session_start();
  include "dbconnect.php";
  include "class/interfaz.php";
  include "funciones.php";

  if (!isset($_SESSION['tipo'])) {
    $tipo = $_SESSION['tipo'];
    if( $tipo == 'u' && $tipo == 'a')  {
      $nombre = $_SESSION['nombre'];
    }
     
  }

  $menuHome = Interfaz::mostrarMenuHome();
  $home = Interfaz::mostrar_home();
  $footer = Interfaz::footer();

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
    </head>
  <body>
    <?php $menuHome ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
          <?php $home ?>
        </div>
      </div>
    </div>

    <?php $footer ?> 
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
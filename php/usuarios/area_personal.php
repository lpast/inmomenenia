<?php
  session_start(); 
  require "../../php/dbconnect.php";
  require "../../php/class/interfaz.php";
  require "../../php/class/usuario.php";
  require "../../php/class/inmueble.php";

  $menu = Usuario::mostrarMenu();
  $footer = Interfaz::footer();
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Área Personal</title>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <?php $menu ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
          <div class='container-fluid'>
            <div class='col-xs-12 col-sm-8 col-sm-offset-2 tnoticias'>
              <?php
                if (isset($_SESSION['tipo'])) {
                  $tipo_usuario = $_SESSION['tipo'];
                  if ($tipo_usuario == 'u') {
                    $nombre = $_SESSION['nombre'];
                  }
                }
                echo "<h1 align='center'> ¡ Hola $nombre ! </h1>
                  <h2 align='center'> ¿Qué quieres hacer?</h2>";
              ?>
            </div>
            <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio '>
              <div class ='col-md-6'>
                <ul>
                  <lo><a href='../usuarios/mis_datos.php'><img src='../../media/iconos/mis-datos.png' alt='logo-mis-datos' width='150px' align='center'>
                    <h2> Ver mis datos </h2></a></lo>
                  <lo><a href='../usuarios/mis_inmuebles.php'><img src='../../media/iconos/house.png' alt='logo-mis-inmuebles' width='150px' align='center'>
                    <h2> Ver mis inmuebles </h2></a></lo>
                </ul>
              </div>
              <div class ='col-md-6'>
                <ul>
                  <lo><a href='../usuarios/mis_citas.php'><img src='../../media/iconos/calendar.png' alt='logo-mis-citas' width='150px' align='center'>
                    <h2>Ver mis citas </h2></a></lo>
                  <lo><a href='../usuarios/mis_favoritos.php'><img src='../../media/iconos/mis-favoritos.png' alt='logo-mis-favoritos' width='150px' align='center'>
                    <h2>Ver mis favoritos </h2></a></lo>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php $footer ?>
  </body>
</html>
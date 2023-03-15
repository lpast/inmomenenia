<?php
  session_start(); 
  include "../../php/includes/dbconnect.php";
  include "../../php/class/usuario.php";
  include "../../php/class/inmueble.php";
  include "../../php/funciones.php";
  comprobarUsuario();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis datos personales</title>
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
  </head>
  <body>
    <?php menuTipo(); ?><div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
          <h1 class='margen-noticias ' align='center'>Datos de usuario</h1>
          <?php Usuario::gestion_usuario(); ?>
        </div>
      </div>
    </div>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu'>
          <h2 align='center' style='margin-top: 50px;'>Estos son tus datos de usuario</h2>
          <p align='center'><b>Podrás modificar tu dirección, teléfono o contraseña</b></p>          
          <?php
            Usuario::mis_datos();
            Usuario::modificar_datos();
          ?>
        </div>
      </div>
      <div class="col-xs-4 col-md-6 col-sm-10">
      <p align='center'><a class='btn btn-theme' href='area_personal.php'>Volver a Área Personal</b></a></p>
    </div>
    <?php footer(); ?>
  </body>
</html>
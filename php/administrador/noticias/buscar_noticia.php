<?php 
  session_start(); 
  include "../../../php/includes/dbconnect.php";
  include "../../../php/class/usuario.php";
  include "../../../php/class/administrador.php";
  include "../../../php/class/noticia.php";
  include "../../../php/funciones.php";
  comprobarAdmin();
  $menu = Administrador::menuAdmin();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Añadir Noticias</title>
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
    <?php $menu ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
          <h1 class='margen-noticias ' align='center'> Actualidad Inmobiliaria</h1>
          <?php Administrador::gestion_noticias(); ?>
        </div>
      </div>
    </div>
    <div class='container-fluid menu-inicio'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
        <div class='panel-group'>
          <div class=' panel panel-default' action='#' method='post'>
            <div class='panel-heading'>
              <h2 align='center'>Buscar noticias</h2>
            </div>
            <div class='panel-body'>
              <p align='center'>Rellene el campo para realizar la búsqueda</p>
              <form class='form-horizontal' action='#' method='post' accept-charset='utf-8'>
                <div class='form-group'>
                  <label class=' col-sm-3'>Titular de la noticia:</label>
                  <div class='col-sm-9'>
                    <input class='form-control' type='text' id='titular' name='titular' autofocus> <span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-12'>
                    <input id='buscar' class='form-control btn-theme' type='submit' name='buscar' value='Buscar' >
                  </div> 
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php Noticia::buscar_noticia(); ?> 
    <div class="col-xs-4 col-md-6 col-sm-10">
      <p align='center'><a class='btn btn-theme' href='noticias.php'>Volver a Agenda</b></a></p>
    </div>
    <?php footer(); ?> 
    <!-- Validación javascript -->
    <script src="../../../js/validar_buscar_noticia.js"></script>
  </body>
</html>
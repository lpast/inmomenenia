<?php 
  session_start(); 
  include "../../../php/dbconnect.php";
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
    <title>Nueva Noticia</title>
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
    <div class='container-fluid cabecera-menu-inicio'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
          <div class='panel-group'>
            <div class='panel panel-default'>
              <div class='panel-heading'>
                <h2 align='center'>Añadir noticias</h2>
              </div>
            <div class='panel-body'>
              <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                <div class='form-group'>
                  <label class=' col-sm-3'>ID:</label>
                  <div class='col-sm-9'>
                    <?php
                      $con = abrirConexion();
                      $consulta = "SELECT auto_increment from information_schema.tables WHERE table_schema='dbbrhgswov0fge' and table_name='tbl_noticias'";

                      $datos = mysqli_query($con, $consulta);
                      $array = mysqli_fetch_array($datos, MYSQLI_NUM);
                    
                      echo "<td><input class='form-control' type='text' name='id' value ='$array[0]'></td>";
                    ?>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3'>Titular:</label>
                  <div class='col-sm-9'>
                    <input class='form-control' id='titular' type='text' name='titular' autofocus><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3'>Contenido:</label>
                  <div class='col-sm-9'>
                    <textarea class='form-control' id='contenido' name='contenido' rows='5'></textarea><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3'>Imagen:</label>
                  <div class='col-sm-9'>
                    <input class='form-control' id='imagen' type='file' name='imagen'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3'>Fecha de publicación:</label>
                  <div class='col-sm-5'>
                    <input class='form-control' id='fecha' type='date' name='fecha'><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-12 col-sm-offset-4'>
                    <div class='col-sm-2'>
                      <input class='form-control btn-theme' id='nueva_noticia' type='submit' name='nueva_noticia' value='Añadir'>
                    </div>
                    <div class='col-sm-2'>
                      <a href='noticias.php' class='btn btn-danger'>Cancelar</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php Noticia::nueva_noticia();?>
      </div>
    </div>
    <div class="col-xs-4 col-md-6 col-sm-10">
      <p align='center'><a class='btn btn-theme' href='citas.php'>Volver a Agenda</b></a></p>
    </div>
    <?php footer(); ?> 
  </body>
</html>
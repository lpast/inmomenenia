<?php
  session_start(); 
  include "../../../php/dbconnect.php";
  include "../../../php/class/usuario.php";
  include "../../../php/class/administrador.php";
  include "../../../php/class/cliente.php";
  include "../../../php/funciones.php";
  comprobarAdmin();
  $menu = Administrador::menuAdmin();
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
    <?php $menu ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
          <h1 class='margen-noticias' align='center'>Cartera de Clientes</h1>
          <?php Administrador::gestion_clientes(); ?>
        </div>
      </div>
    </div>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'><!-- cabecera ajustada -->
          <div class='panel-group menu-inicio'>
            <div class='panel panel-default'>
              <div class='panel-heading'>
                <h2 align='center'>Buscar un cliente</h2>
              </div>
              <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post'>
                  <div class='form-group'>
                    <label class=' col-sm-2'>ID:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='id' autofocus>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class=' col-sm-2'>Nombre:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='nombre' autofocus>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class=' col-sm-2'>Apellidos:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='apellidos'>
                    </div>
                  </div>
                  <div class='form-group'>
                  <label class=' col-sm-2'>Teléefono:</label>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='telefono'>
                  </div>
                
                  <div class='form-group' style='padding-top:'15px'>
                    <div class='col-sm-offset-2 col-sm-5 col-lg-offset-4'>
                      <input class='form-control btn-theme' type='submit' name='buscar' value='Buscar'>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php Cliente:: buscar_cliente(); ?>
    <div class="col-xs-4 col-md-6 col-sm-10">
      <p align='center'><a class='btn btn-theme' href='clientes.php'>Volver a Clientes</b></a></p>
    </div>
    <?php footer(); ?>
  </body>
</html>
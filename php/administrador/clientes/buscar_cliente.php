<?php session_start(); 
  require "../../../php/dbconnect.php";
  require "../../../php/class/interfaz.php";
  require "../../../php/class/usuario.php";
  require "../../../php/class/administrador.php";
  require "../../../php/class/cliente.php";
  require "../../../php/funciones.php";
  comprobarAdmin();
  $menu = Administrador::menuAdmin();
  $botones = Administrador::gestion_clientes();
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
  <body><?php $menu ?>
    <!-- Botones de funciones añadir, borrar, buscar -->
    <?php $botones ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'><!-- cabecera ajustada -->
          <div class='panel-group menu-inicio'>
            <div class='panel panel-default'>
              <div class='panel-heading'>
                <h2 align='center'> Buscar un cliente</h2>
              </div>
              <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post'>
                  <div class='form-group'>
                    <label class=' col-sm-2'> ID:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='id' autofocus>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Tipo</label>
                    <div class='col-sm-2'>
                      <input class='form-control' id='tipo' name='tipo'>
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
                  <label class=' col-sm-2'>Localidad:</label>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='localidad'>
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
      <div class='col-xs-12 col-md-8 col-md-offset-2'>
        <?php Cliente:: buscar_cliente(); ?>
      </div>
    </div>
    
           
     
      <!-- footer -->
      <?php Interfaz::footer(); ?>
    </body>

  </html>
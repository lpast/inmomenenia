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
    <title>Añadir Cliente</title>
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
  <div class='container-fluid menu-inicio'>
    <div class='row'>
      <div class='col-xs-12 col-md-8 col-md-offset-2'>
        <div class='panel-group'>
          <div class='panel panel-default'>
            <div class='panel-heading'>
              <h2 align='center'>Nuevo cliente</h2>
            </div>
            <div class='panel-body'>
              <form class='form-horizontal' action='#' method='post'>
                <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>ID:</label>
                  </div>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='id'>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Tipo:</label>
                  </div>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='tipo'>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Nombre:</label>
                  </div>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='nombre'>
                  </div>
                </div>   
                <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Apellidos:</label>
                  </div>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='apellidos'>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Calle:</label>
                  </div>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='calle'>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Portal:</label>
                  </div>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='portal'>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Piso:</label>
                  </div>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='piso'>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Puerta:</label>
                  </div>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='puerta'>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>CP:</label>
                  </div>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='cp'>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Localidad:</label>
                  </div>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='localidad'>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Teléfono:</label>
                  </div>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='telefono'>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Email:</label>
                  </div>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='email'>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-12 col-sm-offset-4'>
                    <div class='col-sm-2'>
                      <input class='form-control btn-thene' id='nuevo_cliente' type='submit' name='nuevo_cliente' value='Añadir Cliente'>
                    </div>
                    <div class='col-sm-2'>
                      <a href='../php/clientes.php' class='btn btn-danger'>Cancelar</a>
                    </div>
                  </div>
                </div> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php Cliente::nuevo_cliente();?>
  <div class="col-xs-4 col-md-6 col-sm-10">
      <p align='center'><a class='btn btn-theme' href='clientes.php'>Volver a Clientes</b></a></p>
    </div>
    <?php footer(); ?>
  </body>
</html>
 
 

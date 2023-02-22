<?php
  session_start(); 
  require "../../php/dbconnect.php";
  require "../../php/class/interfaz.php";
  require "../../php/class/usuario.php";
  require "../../php/class/inmueble.php";

  $menu = Usuario::mostrarMenu();
  $aleatoria = Usuario::img_aleatoria();
  $footer = Interfaz::footer();
  
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar Inmuebles</title>
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
    <!-- Menú de navegación -->
    <?php $menu ?>
    
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
          <!-- Muestro imagen de un inmueble aleatorio -->
          <?php $aleatoria ?>
          <div class='panel-group'>
            <div class='panel panel-default cabecera-inicio'>
                  <div class='panel-heading'>
                    <h2 align='center'><img src='/./media/iconos/buscar.png' alt='metros-inmueble' width='40px' style='margin-right:15px'>Encuentra lo que buscas</h2>
                  </div>
                <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post'>
                <div class='form-group'>
                  <label class='col-sm-2'>Tipo</label>
                  <div class='col-sm-5 col-lg-offset-2'>
                    <select class='form-control' id='tipo' name='tipo' required>
                      <option value=''>Seleccione el tipo de vivienda</option>
                      <option value='alquiler'>Alquilar</option>
                      <option value='venta'>Venta</option>
                    </select><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-2'>Localidad</label>
                  <div class='col-sm-5 col-lg-offset-2'>
                    <select class='form-control' id='localidad' name='localidad'>
                      <option value=''>Seleccione la localidad</option>
                      <option value='puebla'>La Puebla de Alfindén</option>
                      <option value='pastriz'>Pastriz</option>
                    </select><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-2'>Nº de habitaciones:</label>
                  <div class='col-sm-5 col-lg-offset-2'>
                    <input class='form-control' type='text' id='num_hab' name='num_hab' placeholder='Nº de habitaciones'><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-2'>Metros<sup>2</sup>:</label>
                  <div class='col-sm-5 col-lg-offset-2'>
                    <input class='form-control' type='text' id='metros' name='metros' placeholder='metros'><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-2'>Precio:</label>
                  <div class='col-sm-5  col-lg-offset-2'>
                    <input class='form-control' type='text' id='precio' name='precio'  placeholder='€'><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-offset-2 col-sm-5 col-lg-offset-4'>
                    <input class='form-control btn-theme' type='submit' id='buscar_inm' name='buscar_inm' value='Buscar'><span></span>
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
          <?php Inmueble::buscar_Inmueble(); ?>
        </div>
      </div>
    </div>

    <?php $footer?> 
   


    

    

    <div class='panel-group'>
      <div>
      </div>
    </div>

    
   
   <!-- footer -->
   <?php $footer ?> 
  </body>
</html>
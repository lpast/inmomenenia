<?php
  session_start(); 
  include "../php/dbconnect.php";
  include "../php/class/interfaz.php";
  include "../php/class/usuario.php";
  include "../php/funciones.php";

  $menu = Interfaz::mostrarMenu();
  $footer = Interfaz::footer();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calcula Hipoteca</title>
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
  <body>
    <?php $menu ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-menu-inicio'>
          <div class='panel-group'>
            <h1 align ='center'>Cálcula tu hipoteca o préstamo</h2>
          </div>
        </div>
        <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera'>
          <div class='panel panel-default'>
            <div class='panel-body'>
              <form class='form-horizontal' action='#' method='post'>
                <div class='form-group'>
                  <span><label class='col-md-12 col-sm-2' style='margin-bottom:10px'> Importe: </label></span>
                  <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                    <span><input class='form-control' type='text' name='importe' maxlength=9 value=1000 autofocus></span>
                  </div>
                </div>
                <div class='form-group'>
                  <span><label class='col-md-12 col-sm-2' style='margin-bottom:10px'> Años: </label></span>
                  <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                    <span><input class='form-control' type='text' name='anios' maxlength=2 value=1 autofocus></span>
                  </div>
                </div>
                <div class='form-group'>
                  <span><label class='col-md-12 col-sm-2' style='margin-bottom:10px'> Interés: </label></span>
                  <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                    <span><input class='form-control' type='text' name='interes' maxlength=9 value=3.6 autofocus></span>
                  </div>
                <div>
                <div class='form-group'>
                  <div class='col-sm-offset-2 col-sm-5 col-lg-offset-4'>
                    <p><input class='form-control btn-theme' type='button' value='Calcular' onclick='calcular()'</p>
                  </div>
                </div>  
              </form>
            </div>
          </div>
        </div>
        <div id='resultado'></div>
      </div>
      <div class='jumbotron'>
        <h3 align ='center'>Si quieres más información no dudes en ponerte en contacto con nosotros</h3>
        <h3 align ='center'>Trataremos de responderte lo antes posible</h3>
      </div>
      <div class='boton'>
        <p align='center'><a class='btn btn-theme' href='../php/contacto.php'>Solicitar <b>una cita</b></a></p>
    </div>
    </div>

     <?php $footer ?> 

     <script src="../js/calcula_hipoteca.js"></script>
  </head>
  </body>
</html>
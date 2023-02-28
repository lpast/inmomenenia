<?php 
  session_start();
  include "../php/dbconnect.php";
  include "../php/funciones.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarse</title>
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
    <style>
      body{
        background-image: url("../media/img/img_inmuebles/bbk_buhardilla_0890.jpeg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
      </style>
  </head>
  <body>
      <!-- Menú de navegación --> 
      <?php mostrarMenu(); ?>

      <!-- Formulario de registro -->
      <div class='container-fluid'>
        <div class='row'>
          <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
            <div class='jumbotron'>
              <h1 style='margin-bottom:35px' align='center'>Registro</h1>
              <div class='panel panel-default'>
                <div class='panel-body'>
                  <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                    <div class='form-group'>
                      <label class='col-sm-2'>DNI:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' type='text' id='id' name='id' placeholder='aqui tu Dni'><span></span>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Nombre:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' id='nombre' name='nombre' placeholder='aqui tu nombre'><span></span>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Apellidos:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' id='apellidos' name='apellidos' placeholder='aqui tus apellidos'><span></span>
                        </div>
                      </div>
                      <div class='form-group'>
                      <label class='col-sm-2'>Teléfono:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' id='telefono' name='telefono' placeholder='aqui tu teléfono'><span></span>
                        </div>
                      </div>
                      <div class='form-group'>
                      <label class='col-sm-2'>Email:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' id='email' name='email' placeholder='aqui tu email'><span></span>
                        </div>
                      </div>
                      <div class='form-group'>
                      <label class='col-sm-2'>Fecha actual:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='date' id='fecha' name='fecha_alta'> <span></span>
                        </div>
                      </div>
                      <div class='form-group'>
                      <label class='col-sm-2'>Nombre de usuario:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' id='nom_user' name='nom_user' placeholder='aqui tu nombre de usuario'><span></span>
                        </div>
                      </div>
                      <div class='form-group'>
                      <label class='col-sm-2'>Contraseña:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' id='pass' name='pass' placeholder='aqui tu contraseña'><span></span>
                        </div>
                      </div>
                    <div class='form-group'>
                      <div class='checkbox'>
                        <input class='form-control' type='checkbox' id='privacidad' name='privacidad' value='aceptar'><span></span>
                      </div>
                      <div>
                        <h4><label class='col-sm-4 col-sm-offset-2'> Acepto los términos de privacidad</label></h4>
                      </div>
                    </div>
                    <div class='form-group'>
                      <div class='col-sm-5'>
                        <input class='form-control btn-theme' type='submit' id='nuevo_usuario' name='nuevo_usuario' value='Aceptar'>
                      </div>
                      <div class='col-sm-2' >
                        <a type='button' href='../php/home.php' class='btn btn-danger' >Cancelar</a>
                      </div> 
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    
      <!-- footer -->
      <?phpfooter();  ?> 

    <script src="../js/validar_registro.js"></script>
  </body>
</html>
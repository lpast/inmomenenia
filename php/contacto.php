<?php 
  session_start();
  include "dbconnect.php";
  include "class/interfaz.php";
  include "funciones.php";

  $menu = Interfaz::mostrarMenu();
  $footer = Interfaz::footer(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacto</title>
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
    <?php 
      abrirConexion();
      $menu;
    ?>

    <div class='container-fluid'>
      <div class='row'>
        <div class='jumbotron'>
          <h2 align ='center'>Si quieres ponerte en contacto con nosotros puedes rellenar el siguiente formulario</h2>
          <h2 align ='center'>Trataremos de responderte lo antes posible</h3>
        </div>
        <div class='col-md-6 col-md-offset-3'>
          <div class='panel panel-default'>
            <div class='panel-body'>
              <form id='contacto' action='#' method='post' accept-charset='utf-8'>
                <div class='form-group'>
                  <label class='col-md-12 col-sm-2' style='margin-bottom:10px'> Nombre * </label>
                  <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                    <input class='form-control' type='text' id='nombre' name='nombre' placeholder='escribe aqui tu nombre' autofocus><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-md-12 col-sm-2' style='margin-bottom:10px'> Email *</label>
                  <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                    <input class='form-control' type='text' id='email' name='email' placeholder='escribe aqui tu email'><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-md-12 col-sm-2' style='margin-bottom:10px'> Teléfono</label>
                  <div class='col-md-5 col-sm-2' style='margin-bottom:15px'>
                    <input class='form-control' type='text' id='telefono' name='telefono' placeholder='escribe aqui tu teléfono'><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <label <div class='col-md-12 col-sm-2' style='margin-bottom:10px'> Asunto</label>
                  <div <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                    <label class='radio-inline'>
                      <input type='radio' name='asunto' id=asunto1' value='informacion'>Pedir información
                    </label>
                    <label class='radio-inline'>
                    <input type='radio' name='asunto' id=asunto2' value='consulta'>Consulta
                    </label>
                    <label class='radio-inline'>
                    <input type='radio' name='asunto' id=asunto3' value='sugerencia'>Sugerencia 
                    </label>
                    <label class='radio-inline'>
                    <input type='radio' name='asunto' id=asunto4' value='cita'>Pedir cita
                  </div>
                </div>
                <br>
                <div class='form-group'>
                  <label class='col-md-12 col-sm-2' style='margin-bottom:10px'> Mensaje *</label>
                  <div <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                    <textarea id='mensaje' class='form-control' name='mensaje' rows='5'></textarea><span></span>
                  </div>
                </div>
                <br>
                <div class='form-group'>
                <div class='col-sm-offset-2 col-sm-5 col-lg-offset-4'>
                  <input class='form-control btn-theme' align=center' style='margin-bottom:30px' type='submit' id='contacto' name='contacto' value='Enviar'>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> 

    <section>
      <!-- Muestra contacto -->
      <?php $contacto = Interfaz::muestra_contacto(); ?>
      
      <!-- Muestra contacto -->
      <?php $contacto = Interfaz::contacto_RRSS(); ?>

      <!-- Formulario de contacto -->
      <?php $formulario = Interfaz::formulario_contacto(); ?>

    </section>

    
      <!-- footer -->
      <?php $footer ?> 
  </body>
</html>
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver Inmueble</title>
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
  </head>
  <body>
    
    <!-- Menú de navegación -->
    <?php $menu ?>
    <div class='container-fluid'>
    <div class='row'>
        <div class='col-xs-12 col-sm-offset-1 col-sm-10 col-sm-offset-1 cabecera-menu-inicio'>
          <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 tinmuebles'>
            <h1 style='padding-bottom:55px' align ='center'>CONTACTO</h1>
            
          </div>

          <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 tinmuebles'>
            <h1 style='padding-bottom:55px' align ='center'>CÓMO LLEGAR</h1>
           
          </div>
        </div>
      </div>
      <div class='row'>
        <div class='col-xs-12 col-sm-offset-1 col-sm-10 col-sm-offset-1'>
          <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 tinmuebles'>
            
            <div class='jumbotron'>
              <h2><a href='https://lapuebladealfinden.es/'><img src='../media/iconos/location.png' alt='location-inmomenenia' width='80px'></a> C/San Blas 41, La Puebla de Alfindén </h2>
              <h2><a href='+34692605414'><img src='../media/iconos/telephone.png' alt='telefono-inmomenenia' width='80px'></a>  692.60.14.54</h2>
              <h2><a href='contacto@inmomenenia.es'><img src='../media/iconos/mail.png' alt='contacto-inmomenenia' width='80px'></a> contacto@inmomenenia.es</h2>
              <h2><a href='https://lapuebladealfinden.es/horarios-de-autobus-linea-211/'><img src='../media/iconos/bus.png' alt='bus-inmomenenia' width='80px'></a>  Línea 211 </h2>
            </div>
          </div>
          <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 tinmuebles'>
            <div class='jumbotron'>
              <p align ='right'><iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2982.119915259742!2d-0.7502616847277431!3d41.63153937924263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd59182ed7c6ceb3%3A0x345da3b45c8c7af0!2sC.%20San%20Blas%2C%2050171%20La%20Puebla%20de%20Alfind%C3%A9n%2C%20Zaragoza!5e0!3m2!1ses!2ses!4v1670877551410!5m2!1ses!2ses' width='600' height='450' style='border:solid 2px'  allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe></p>
            </div>
          </div>
        </div>
      </div>

      <div class='jumbotron'>
        <h2 align ='center'>Si quieres conocernos un poco más</h2>
        <div class ='iconos' align ='center' style='padding-top:15px'>
          <a href='https://www.facebook.com/'><img src='../media/iconos/facebook.png' alt='facebook-inmomenenia' width='70px'></a>
          <a href='https://www.instagram.com/'><img src='../media/iconos/instagram.png' alt='instagram-inmomenenia' width='70px'></a>
          <a href='https://wa.me/######?text=¡Estoy+interesado!'><img src='../media/iconos/whatsapp.png' alt='whatsapp-inmomenenia' width='70px'></a>
          <a href='https://twitter.com/'><img src='../media/iconos/twitter.png' alt='twitter-inmomenenia' width='70px'></a>
        </div>
      </div>
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
                  <input class='form-control' type='text' name='nombre' placeholder='escribe aqui tu nombre' autofocus>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-md-12 col-sm-2' style='margin-bottom:10px'> Email *</label>
                <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                  <input class='form-control' type='text' name='email' placeholder='escribe aqui tu email'>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-md-12 col-sm-2' style='margin-bottom:10px'> Teléfono</label>
                <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                  <input class='form-control' type='number' name='telefono' placeholder='escribe aqui tu teléfono'>
                </div>
              </div>
              <div class='form-group'>
                <label <div class='col-md-12 col-sm-2' style='margin-bottom:10px'> Asunto</label>
                <div <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                  <label class='radio-inline'>
                    <input type='radio' name='asunto'>Pedir información
                  </label>
                  <label class='radio-inline'>
                    <input type='radio' name='asunto'>Consulta
                  </label>
                  <label class='radio-inline'>
                    <input type='radio' name='asunto'>Sugerencia
                  </label>
                  <label class='radio-inline'>
                  <input type='radio' name='asunto'>Solicitar cita
                </div>
              </div>
              <br>
              <div class='form-group'>
                <label class='col-md-12 col-sm-2' style='margin-bottom:10px'> Mensaje *</label>
                <div <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                  <textarea id='mensaje' class='form-control' name='mensaje' rows='5'></textarea>
                </div>
              </div>
              <br>
              <div class='form-group'>
              <div class='col-sm-offset-2 col-sm-5 col-lg-offset-4'>
                    <input class='form-control btn-theme' align=center' type='submit' name='Enviar' value='Enviar'>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php $footer ?> 
  </body>
</html>
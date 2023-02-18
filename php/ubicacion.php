<?php
  session_start()
  include "../php/dbconnect.php";
  include "../php/funciones.php";
  include "../php/class/interfaz.php";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubicación</title>
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
    <?php $menu = Interfaz::mostrarMenu();?>
    <div class="container-fluid">
      <div class="row">
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio jumbotron' style='margin-top:135px'>
          <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
            <h1 style='padding-bottom:55px' align ='center'>CONTACTO</h1>
            </br>
            <h2><a href='https://lapuebladealfinden.es/'><img src='../media/iconos/location.png' alt='location-inmomenenia' width='80px'></a> C/San Blas 41, La Puebla de Alfindén </h2>
            <h2><a href='+34692605414'><img src='../media/iconos/telephone.png' alt='telefono-inmomenenia' width='80px'></a>  692.60.14.54</h2>
            <h2><a href='contacto@inmomenenia.es'><img src='../media/iconos/mail.png' alt='contacto-inmomenenia' width='80px'></a> contacto@inmomenenia.es</h2>
            <h2><a href='https://lapuebladealfinden.es/horarios-de-autobus-linea-211/'><img src='../media/iconos/bus.png' alt='bus-inmomenenia' width='80px'></a>  Línea 211 </h2>
          </div>
          <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
            <h1 align ='center'>CÓMO LLEGAR</h1>
            </br>
            <p align ='right'><iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2982.119915259742!2d-0.7502616847277431!3d41.63153937924263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd59182ed7c6ceb3%3A0x345da3b45c8c7af0!2sC.%20San%20Blas%2C%2050171%20La%20Puebla%20de%20Alfind%C3%A9n%2C%20Zaragoza!5e0!3m2!1ses!2ses!4v1670877551410!5m2!1ses!2ses' width='500' height='450' style='border:solid 2px'  allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe></p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 menu-inicio">
          <h1 align="center" style="margin-top: 50px;"> Localizanos </h1>
        </div>
        <div class="col-md-offset-2 col-md-5">
          <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2982.119915259742!2d-0.7502616847277431!3d41.63153937924263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd59182ed7c6ceb3%3A0x345da3b45c8c7af0!2sC.%20San%20Blas%2C%2050171%20La%20Puebla%20de%20Alfind%C3%A9n%2C%20Zaragoza!5e0!3m2!1ses!2ses!4v1670877551410!5m2!1ses!2ses' width='600' height='450' style='border:solid 2px'  allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>
        </div>
        <div class="col-md-5 ">
          <h2 style="margin-top: 50px;"> Estaremos encantados de atenderte en: </h2>
          <h3><img src='../iconos/location.png' alt='inmomenenia' width='40px'> C/San Blas 41, La Puebla de Alfinén, Zaragoza</h3>
          <h3><img src='../iconos/mail.png' alt='inmomenenia' width='40px'> contacto@inmomenenia.es</h3>
          <h3><img src='../iconos/telephone.png' alt='inmomenenia' width='40px'> 692.60.14.54</h3>
          </br>
          <h2 style="margin-top: 50px;"> Cómo llegar </h2>
          <h3><img src='../iconos/bus.png' alt='inmomenenia' width='40px'>Línea 211</h3> 
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
      </div>
    </div>
    <!-- footer -->
    <?php $footer = Interfaz::footer(); ?> 
  </body>
</html>
        
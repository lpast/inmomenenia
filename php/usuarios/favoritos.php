




<!DOCTYPE html>
    <html>
    <head>
    <title>me gusta</title>


    <script type="text/javascript" src="../../js/favoritos.js"></script>
   </head>
   <style>
      body{
        background-image: url("../../media/img/img_inmuebles/bbk_fachada_0533.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
      </style>
   <body>

    <button id="favoritos" onClick="like()">LIKE</button>
    <p type="text" style="color:blue; "id="show"></p>
    <h2>LIKES</h2>

    <footer>
      <?php $footer = Interfaz::footer(); ?>
    </footer>
    </body>
    </html>
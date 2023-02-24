<?php
  session_start(); 
  require "../../../php/dbconnect.php";
  require "../../../php/class/interfaz.php";
  require "../../../php/class/usuario.php";
  require "../../../php/class/administrador.php";
  require "../../../php/class/inmueble.php";
  require "../../../php/class/citas.php";
  require "../../../php/funciones.php";

  comprobarAdmin();

  $menu = Usuario::mostrarMenu();
  $botones = Administrador::gestion_citas();
  $footer = Interfaz::footer();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Citas</title>
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

    <!-- Botones de funciones añadir, borrar, buscar -->
    <?php $botones ?>
         
    <div class="col-xs-12 col-md-6">
      <h2 class="margen-citas" align="center">Calendario</h2>
      <!-- PHP que muestra el calendario del mes pedido -->
      <?php 
        if(isset($_GET['mes']))
        {
          $dia = "01";
          $mes = $_GET['mes'];
          if($mes == 0)
          {
            $mes = 12;
            $anio = $_GET['anio']-1;
          }
          elseif($mes == 13)
          {
            $mes=1;
            $anio = $_GET['anio']+1;
          }
          else
            $anio = $_GET['anio'];
        }
        else
        {
          $mes = date('m');
          $anio = date('Y');
          $dia = date('d');
        }
        if($mes < 10) $mes = "0$mes";
        $mostrarCalendario = Citas::mostrarCalendario($dia, $mes, $anio);?>
    </div>

    <!-- Muestro calendario y muestro las citas y opción de modificar -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <h2 class="margen-citas" align="center">Próximas citas</h2>
          <? Citas::mostrar_ProximasCitas(); ?>
      </div>
    </div>
  </div>
      

    <!-- footer -->
   <?php $footer?>

    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
          });
    </script>
  </body>
</html>
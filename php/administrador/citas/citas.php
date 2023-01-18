<?php 
    require_once "../../../php/dbconnect.php";
    require_once "../../../php/class/interfaz.php";
    require_once "../../../php/funciones.php";
    session_start(); 
    comprobarAdmin();
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
  <body style="background-color: #f5f1e7; background-image:none;">
    
   <!-- Menú de navegación -->
   <?php $menu = Interfaz::mostrarMenu(); ?>

    <!-- Botones de funciones añadir, borrar, buscar -->
    <?php $botones = Interfaz::gestion_citas(); ?>
    
    <!-- Muestro calendario y muestro las citas y opción de modificar -->
    <? $calendario = Interfaz::mostrar_ProximasCitas(); ?>

    <!-- Script que ejecuta el popover del ojo para ver las citas de ese día -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
          });
    </script>
            
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
        $mostrarCalendario = Interfaz::mostrarCalendario($dia, $mes, $anio);?>
    </div>

    <!-- footer -->
   <footer class="navbar-nav navbar-inverse">
      <p align="center"><a class="aweb" href="../inmomenenia/php/mapa_web.php">Mapa web</a> |  Teléfono: 692605414 | Email: info@inmomenenia.com</p>
    </footer>
  </body>
</html>
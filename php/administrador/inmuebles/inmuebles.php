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
    <title>Inmuebles</title>
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
    <?php $botones = Interfaz::gestion_inmuebles(); ?>

    
    <!-- Muestra una tabla con los inmuebles almacenados en la BD -->
    <div class="container-fluid ">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="margen-citas" align="center">Inmuebles almacenados</h2>
          <div class="panel-group">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="table-responsive">
                <div class="table table-hover">
                  <!-- Listamos inmuebles -->
                  <?php $lista_inmuebles = Interfaz::listar_inmuebles(); ?>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- footer -->
   <footer class="navbar-nav navbar-inverse">
      <p align="center"><a class="aweb" href="../inmomenenia/php/mapa_web.php">Mapa web</a> |  Teléfono: 692605414 | Email: info@inmomenenia.com</p>
    </footer>
  </body>
</html>
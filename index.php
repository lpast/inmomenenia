<?php
  include "php/dbconnect.php";
  include "./php/class/interfaz.php";
  include "php/funciones.php";
  session_start(); 
  comprobarIndex();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InmoMenenia</title>
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- Mi CSS -->
    <link rel="stylesheet" href="./css/estilos.css" media="screen">
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (se pueden
         incluir archivos JavaScript individuales de los únicos
         pluginps que se utilicen) -->
         <scrit src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
  </head>
  <body>
    <!-- Menú de navegación -->
    <?php
    $menuIndex = Interfaz::mostrarMenuIndex(); ?>
    <!-- Muestro imagen de un inmueble aleatorio -->
    <div class="container-fluid ">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 menu-inicio">
          <h1 align="center"> Encuentra tu nuevo hogar</h1>
          <!-- conexion a db-->
          <?php 
            $conexion = abrirConexion();
            $coge_imagen = "SELECT imagen FROM tbl_inmuebles";
            $imagenes = array();

            $imagen = mysqli_query($conexion,$coge_imagen);
            
            if (!$imagen) {
              echo "Se ha producido un error al cargar las imagenes";
            } else {
              while ($fila = mysqli_fetch_array($imagen,MYSQLI_ASSOC)) {
                array_push($imagenes,$fila['imagen']);
              }
            }
            mysqli_close($conexion);

            $max = count($imagenes);
            $azar = rand(0,$max);
            echo "<img src='./php/$imagenes[$azar]' class='img-rounded img-responsive' style='width:100%; align:center; border:solid 0.5px' > ";
          ?> 
          <!-- codigo php  busqueda-->

          <div class="container-fluid menu-inicio col-sm-8 col-sm-offset-2">
      <div class="row">
        <div class="col-xs-12">
        <div class="col-xs-12">
          <div class="panel-group">
            <div class="panel panel-default">
              
              <div class="panel-body">
                <p align="center">Rellene el campo o campos por los que quiere realizar la búsqueda</p>
                <form class="form-horizontal" action="#" method="post">
                  <div class="form-group">
                    <label class=" col-sm-2">Código Postal:</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="cp" autofocus>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class=" col-sm-2">Disponibilidad:</label>
                    <div class="col-sm-5 col-lg-offset-1">
                        <select class="form-control" name="disp">
                          <option value="si">Disponible</option>
                          <option value="no">No disponible</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class=" col-sm-2">Precio:</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="precio">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <input class="form-control btn-primary" type="submit" name="buscar_inm" value="Buscar">
                    </div> 
                  </div>
                </form>

                <?php buscar_Inmuebles();?>

          

        </div>
      </div>     
</div>

    <footer class="navbar-nav navbar-inverse">
    <p align="center">Copyright Menenia's Digital 2022</p>
    </footer>
        
  </body>
</html>
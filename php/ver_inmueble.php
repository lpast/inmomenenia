<?php 
include "../php/dbconnect.php";
include "../php/class/interfaz.php";
include "../php/funciones.php";
session_start(); 
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver Inmuebles</title>
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
    <?php $menu = Interfaz::mostrarMenu(); ?>
	
    <!-- Recojo en variables los datos a mostrar mediante PHP -->
    <?php 
      if (isset($_POST['ver'])) {
        $id = $_POST['id'];

        $conexion = abrirConexion();
        $consulta = "SELECT * FROM tbl_inmuebles where id='$id'";

        $datos = mysqli_query($conexion,$consulta);

        if (!$datos) {
          echo "Error, no se ha podido consultar los datos del inmueble";
        } else {
          while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
            $id = $fila['id'];
            $tipo = $fila['tipo'];
            $calle = $fila['calle'];
            $portal = $fila['portal'];
            $piso = $fila['piso'];
            $puerta = $fila['puerta'];
            $cp = $fila['cp'];
            $localidad = $fila['localidad'];
            $metros = $fila['metros'];
            $num_hab = $fila['num_hab'];
            $num_banos = $fila['num_banos'];
            $garaje = $fila['garaje'];
            $jardin = $fila['jardin'];
            $piscina = $fila['piscina'];
            $estado = $fila['estado'];
            $titular = $fila['titular'];
            $descripcion = $fila['descripcion'];
            $fecha_alta = $fila['fecha_alta'];
            $precio = $fila['precio'];
            $imagen = $fila['imagen'];
          }
        }
        mysqli_close($conexion);
      }
    ?>

    
	<!-- Muestro los datos del inmueble -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio">
          <div class='jumbotron'>
                <h1 align ='center'><?php echo $titular; ?></h1>
          </div>
        </div>
        <div class="col-md-offset-2 col-md-5">
          <ul>
            <lo><img class='img-responsive' src='../media/img/img_inmuebles/<?php echo $imagen; ?>' width='700' height='400'></lo>
          </ul>
        </div>
        <div class="col-md-5 ">
          <div class='jumbotron'>
            <?php
              if (isset($_POST['id_cliente'])) {
                if ($id_cliente== 0 ) {
                  echo "<p><button type='button' class='btn btn-success bt-ver'>Disponible</button></p>";
                } else {
                  echo "<p><button type='button' class='btn btn-danger bt-ver'>No disponible</button></p>";
                }
              }

              if (isset($_SESSION['tipo']) == 'u') {
              echo "<div class ='iconos' align ='center' style='padding-top:5px  font-size:30px' padding-bottom:'50px'>
                <h3><img src='/inmomenenia/media/iconos/ubicacion.png' alt='calle-inmueble' width='50px' style='margin-right:5px' <b> $calle</b>
                <img src='/inmomenenia/media/iconos/pin.png' alt='localidad-inmueble' width='50px'  'margin-right:15px'><b> $localidad</b><h3>
                  <h3><img src='/inmomenenia/media/iconos/ducha.png' alt='banos-inmueble' width='50px' style='margin-right:5px'><b> $num_banos</b>
                  <img src='/inmomenenia/media/iconos/dormitorio.png' alt='habitaciones-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $num_hab</b><h3>
                  <h3><img src='/inmomenenia/media/iconos/garaje.png' alt='garaje-inmueble' width='50px' style='margin-right:5px'><b> $garaje</b>
                  <img src='/inmomenenia/media/iconos/jardin.png' alt='jardin-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $jardin</b>
                  <img src='/inmomenenia/media/iconos/piscina.png' alt='piscina-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $piscina</b><h3>
                  <h3><img src='/inmomenenia/media/iconos/estado.png' alt='estado-inmueble' width='50px' style='margin-right:5px'><b> $estado</b>
                  <img src='/inmomenenia/media/iconos/tipo.png' alt='tipo-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $tipo</b><h3>
                  <h3><img src='/inmomenenia/media/iconos/metros.png' alt='metros-inmueble' width='50px' style='margin-right:5px'><b> $metros m<sup>2</sup></b>
                  <img src='/inmomenenia/media/iconos/euro.png' alt='precio-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $precio €</b><h3>
                  </div>
              <div class='jumbotron'>
                <h3 align ='center'>Si quieres más información no dudes en ponerte en contacto con nosotros</h3>
                <h3 align ='center'>Trataremos de responderte lo antes posible</h3>
              </div>
              <a class='btn btn-theme' href='/inmomenenia/php/inmuebles.php'>Volver a <b>Cartera de Inmuebles</b></a>";
              } else if (isset($_SESSION['tipo']) == 'a') {
              echo "<div class ='iconos' align ='center' style='padding-top:5px  font-size:30px' padding-bottom:'50px'>
                <h3><img src='/inmomenenia/media/iconos/ubicacion.png' alt='calle-inmueble' width='50px' style='margin-right:5px'><b> $calle</b>
                <img src='/inmomenenia/media/iconos/pin.png' alt='localidad-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $localidad</b><h3>
                  <h3><img src='/inmomenenia/media/iconos/ducha.png' alt='banos-inmueble' width='50px' style='margin-right:5px'><b> $num_banos</b>
                  <img src='/inmomenenia/media/iconos/dormitorio.png' alt='habitaciones-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $num_hab</b><h3>
                  <h3><img src='/inmomenenia/media/iconos/garaje.png' alt='garaje-inmueble' width='50px' style='margin-right:5px'><b> $garaje</b>
                  <img src='/inmomenenia/media/iconos/jardin.png' alt='jardin-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $jardin</b>
                  <img src='/inmomenenia/media/iconos/piscina.png' alt='piscina-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $piscina</b><h3>
                  <h3><img src='/inmomenenia/media/iconos/estado.png' alt='estado-inmueble' width='50px' style='margin-right:5px'><b> $estado</b>
                  <img src='/inmomenenia/media/iconos/tipo.png' alt='tipo-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $tipo</b><h3>
                  <h3><img src='/inmomenenia/media/iconos/metros.png' alt='metros-inmueble' width='50px' style='margin-right:5px'><b> $metros m<sup>2</sup></b>
                  <img src='/inmomenenia/media/iconos/euro.png' alt='precio-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $precio €</b><h3>
                  <h3><img src='/inmomenenia/media/iconos/codigo-de-barras.png' alt='id-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $$id €</b><
                  <img src='/inmomenenia/media/iconos/calendario.png' alt='fecha-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $fecha_alta</b><h3>
                  </div>";
              } else {
                echo "<h3 align='center'><img src='/inmomenenia/media/iconos/ubicacion.png' alt='ubicacion-inmueble' width='50px'>$localidad</h3>
                <div class ='iconos' align ='center' style='padding-top:5px  font-size:30px'>
                  <h3><img src='/inmomenenia/media/iconos/ducha.png' alt='banos-inmueble' width='50px' style='margin-right:5px'><b> $num_banos</b>
                  <img src='/inmomenenia/media/iconos/dormitorio.png' alt='habitaciones-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $num_hab</b><h3>
                  <h3><img src='/inmomenenia/media/iconos/metros.png' alt='metros-inmueble' width='50px' style='margin-right:5px'><b> $metros m<sup>2</sup></b>
                  <img src='/inmomenenia/media/iconos/euro.png' alt='precio-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $precio €</b><h3>
                </div>
                <div class='jumbotron'>
                  <h3 align ='center'>Si quieres más información no dudes en ponerte en contacto con nosotros</h3>
                  <h3 align ='center'>Trataremos de responderte lo antes posible</h3>
                </div>";
              }
            ?>
            </div>
          </div>
        </div>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
              <h2 align="center">Descripción</h1>
              <?php

                if (isset($_SESSION['tipo']) == 'u') {
                  echo "<div class='jumbotron'>
                    <h3><b>$descripcion </b></h3>
                  </div>";
               
                      
                } else if (isset($_SESSION['tipo']) == 'a') {
                  echo "<div class='jumbotron'>
                    <h3><b>$descripcion </b></h3>
                  </div>";
                } else {
                  echo "<div class='jumbotron'>
                    <h3> Si quieres obtener información más detallada, puedes registrarte como usuario </h3>
                    <p align='center'><a class='btn btn-success bt-ver' href='/inmomenenia/php/registro.php'><b> Registrarse</b></a></p>

                  </div>
                  <p align='center'><a class='btn btn-theme' href='/inmomenenia/php/inmuebles.php'>Volver a <b>Cartera de Inmuebles</b></a></p>";
                }
              ?>
            </div>
          </div>
        </div>
  
        <!-- footer -->
        <?php $footer = Interfaz::footer(); ?> 
  </body>
</html>
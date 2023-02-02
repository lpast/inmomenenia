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
        $consulta = "SELECT tipo, direccion, cp, metros, num_hab, garaje, descripcion, precio, imagen FROM tbl_inmuebles where id='$id'";

        $datos = mysqli_query($conexion,$consulta);

        if (!$datos) {
          echo "Error, no se ha podido consultar los datos del inmueble";
        } else {
          while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
            //$id=$fila['id'];
            $tipo=$fila['tipo'];
            $direccion = $fila['direccion'];
            $cp = $fila['cp'];
            $metros = $fila['metros'];
            $num_hab = $fila['num_hab'];
            $garaje = $fila['garaje'];
            $descripcion = $fila['descripcion'];
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
                <h1 align ='center'>INFORMACIÓN DEL INMUEBLE</h3>
          </div>
        </div>
        <div class="col-md-offset-2 col-md-5">
          <ul>
            <lo><img class='img-responsive' src='../media/img/img_inmuebles/<?php echo $imagen; ?>' width='700' height='400'></lo>
          </ul>
          </div>
        <div class="col-md-5 ">
          <div class='jumbotron'>
            <h2 align ='center'>CARACTERÍSTICAS</h2>
            <?php
              if (isset($_POST['id_cliente'])) {
                if ($id_cliente== 0 ) {
                  echo "<p><button type='button' class='btn btn-success bt-ver'>Disponible</button></p>";
                } else {
                  echo "<p><button type='button' class='btn btn-danger bt-ver'>No disponible</button></p>";
                }
              }

              if (isset($_SESSION['tipo']) == 'u') {
              echo "<p align='center'><button type='button' class='btn btn-success bt-ver'>Disponible</p>
                <h3 align='center'><b>Dirección: </b>$direccion</h3>
                <h3 align='center'><b>Código Postal: </b>$cp </h3>
                <h3 align='center'><b>Número de Habitaciones: </b>$num_hab </h3>
                <h3 align='center'><b>Metros: </b> $metros </h3>
                <h3 align='center'><b>Garaje: </b>$garaje </h3>
                <h3 align='center'><b>Precio: </b>$precio €</h3>";
               
              } else if (isset($_SESSION['tipo']) == 'a') {
                echo "<h3 align='center'><button type='button' class='btn btn-success bt-ver'>Disponible</button></h3>
                <h3 align='center'><b>Dirección: </b>$direccion</h3>
                <h3 align='center'><b>Código Postal: </b>$cp </h3>
                <h3 align='center'><b>Número de Habitaciones: </b>$num_hab </h3>
                <h3 align='center'><b>Metros: </b> $metros </h3>
                <h3 align='center'><b>Garaje: </b>$garaje </h3>
                <h3 align='center'><b>Precio: </b>$precio €</h3>";
              } else {
                echo "<p align='center'><button type='button' class='btn btn-success bt-ver'>No Disponible</button></p>
                <p align='center'><b>Dirección: </b>$direccion</p><br>
                <p align='center'><b>Metros: </b>$metros</p><br>
                <p align='center'><b>Garaje: </b>$garaje</p><br>
                <p align='center'><b>Precio: </b>$precio €</p>";
              }
            ?>
            </div>
            <div class='jumbotron'>
              <h3 align ='center'>Si quieres más información no dudes en ponerte en contacto con nosotros</h3>
              <h3 align ='center'>Trataremos de responderte lo antes posible</h3>
            </div>
        </div>
      </div>

	<!-- Muestro los datos del inmueble -->
  <div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
        <h2 align="center">Descripción</h1>
        <?php

          if (isset($_SESSION['tipo']) == 'u') {
          echo "<p><b>Descripción: </b>$descripcion</p>";
                 
          } else if (isset($_SESSION['tipo']) == 'a') {
            echo "<p><b>Descripción: </b>$descripcion</p>";
          } else {
            echo "<h3> Si quieres obtener información más detallada, puedes registrarte como usuario </h3>
            <p><button type='button' class='btn btn-success bt-ver'>Resgistrarse</button></p>";
          }
        ?>
      </div>
  </div>
  
  <!-- footer -->
  <footer class="navbar-nav navbar-inverse">
      <p align="center">Copyright Menenia's Digital 2022</p>
    </footer> 
  </body>
</html>
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
			$consulta = "SELECT tipo, direccion, cp, metros, num_hab, garaje, descripcion,precio,imagen FROM tbl_inmuebles where id='$id'";

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
  echo "<div class='container-fluid'>
            <div class='row'>
              <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
              <h1 align="center">Información del inmueble</h1>
                  <div class='col-xs-12 col-sm-12 col-md-6' col-lg-6'>
                    <h1 align ='center'>---</h1>
                    <ul><img src="<?php echo $imagen; ?>" width='600' height='450'></ul>
                  </div>
                  </br>
                  <div class='col-xs-12 col-sm-12 col-md-6' col-lg-6'>
                    <h1 align ='center'>CÓMO LLEGAR</h1>
                  </br>
                  <p align ='right'><iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2982.119915259742!2d-0.7502616847277431!3d41.63153937924263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd59182ed7c6ceb3%3A0x345da3b45c8c7af0!2sC.%20San%20Blas%2C%2050171%20La%20Puebla%20de%20Alfind%C3%A9n%2C%20Zaragoza!5e0!3m2!1ses!2ses!4v1670877551410!5m2!1ses!2ses' width='600' height='450' style='border:solid 2px'  allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe></p>
                  </div>
                </div>
            </div>
          </div>";
  
  
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-10 col-md-offset-1 cabecera-menu-inicio">
					<h1 align="center">Información del inmueble</h1>
          <div class="row justify-content-around">
            <div class="col-4">
              <img src="<?php echo $imagen; ?>" style="width:50%;border-radius: 0.5%;border: solid 0.5px black;"></center>
            </div>
            <div class="col-4">
              <div class="ver-inm" align="center">
              <?php
              if (isset($_POST['id_cliente'])) {
                if($id_cliente== 0 ){
                  echo "<p><button type='button' class='btn btn-success bt-ver'>Disponible</button></p>";
                } else {
                  echo "<p><button type='button' class='btn btn-danger bt-ver'>No disponible</button></p>";
                }
              }

              if (isset($_SESSION['tipo']) == 'u') {
                echo "<p><button type='button' class='btn btn-success bt-ver'>Disponible</button></p>
                      <p><b>Dirección: </b>$direccion</p><br>
                      <p><b>Código Postal: </b>$cp </p><br>
                      <p><b>Número de Habitaciones: </b>$num_hab </p><br>
                      <p><b>Metros: </b> $metros </p><br>
                      <p><b>Garaje: </b>$garaje </p><br>
                      <p><b>Descripción: </b> $descripcion </p><br>
                      <p><b>Precio: </b>$precio €</p><br>";
              } else if (isset($_SESSION['tipo']) == 'a') {
                  echo "<p><button type='button' class='btn btn-success bt-ver'>Disponible</button></p>
                        <p><b>Dirección: </b>$direccion </p><br>
                        <p><b>Código Postal: </b> $cp </p><br>
                        <p><b>Número de Habitaciones: </b>$num_hab </p><br>
                        <p><b>Metros: </b>$metros</p><br>
                        <p><b>Garaje: </b>$garaje </p><br>
                        <p><b>Descripción: </b> $descripcion </p><br>
                        <p><b>Precio: </b>$precio €</p><br>";
                } else {
                  echo "<p><button type='button' class='btn btn-success bt-ver'>No Disponible</button></p>
                        <p><b>Dirección: </b>$direccion</p><br>
                        <p><b>Metros: </b>$metros</p><br>
                        <p><b>Garaje: </b>$garaje</p><br>
                        <p><b>Precio: </b>$precio €</p><br>";
                }
                ?>
					  </div>
          </div>
			</div>
		</div>
	</div>

  
  <!-- footer -->
  <footer class="navbar-nav navbar-inverse">
      <p align="center">Copyright Menenia's Digital 2022</p>
    </footer> 
  </body>
</html>
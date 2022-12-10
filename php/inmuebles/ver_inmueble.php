<?php 
include "../../php/dbconnect.php";
include "../../php/class/interfaz.php";
include "../../php/funciones.php";
session_start(); 
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
    <link rel="stylesheet" href="../../css/estilos.css" media="screen">
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
    <?php $menu = Interfaz::mostrarMenu(); ?>
	
	<!-- Recojo en variables los datos a mostrar mediante PHP -->
	<?php 
		if (isset($_POST['ver'])) {
			$id = $_POST['id'];

			$conexion = abrirConexion();
			$consulta = "SELECT direccion,descripcion,precio,id_cliente,imagen FROM tbl_inmuebles where id='$id'";

			$datos = mysqli_query($conexion,$consulta);

			if (!$datos) {
				echo "Error, no se ha podido consultar los datos del inmueble";
			} else {
				while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
					$direccion = $fila['direccion'];
					$descripcion = $fila['descripcion'];
					$precio = $fila['precio'];
					$id_cliente = $fila['id_cliente'];
					$imagen = $fila['imagen'];
				}
			}
			mysqli_close($conexion);
		}
	 ?>

	<!-- Muestro los datos del inmueble -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-10 col-md-offset-1 menu-inicio">
					<h3 align="center">Información del inmueble</h3>
          <center><img src="<?php echo $imagen; ?>" style="width:50%;border-radius: 0.5%;border: solid 0.5px black;"></center>
						<div class="ver-inm" align="center">
					      	<?php 
                    if ($id_cliente == 0) {
                      echo "<p><button type='button' class='btn btn-success bt-ver'>Disponible</button></p>";
                    } else {
                      echo "<p><button type='button' class='btn btn-danger bt-ver'>No disponible</button></p>";
                    }
                   ?>
					      	<p><b>Dirección: </b><?php echo $direccion ?></p><br>
					      	<p><b>Descripción: </b><?php echo $descripcion ?></p><br>
					      	<p><b>Precio: </b><?php echo $precio ?> €</p><br>
                  <?php 
                    if (isset($_SESSION['tipo']) == 'u') {
                      echo "<a class='btn btn-info' href='../../php/galeria.php'>Volver a <b>inmuebles </b></a>";
                    } else if (isset($_SESSION['tipo']) == 'a') {
                      echo "<a class='btn btn-info' href='./inmuebles.php'>Volver a <b>inmuebles</b></a>";
                    } else {
                      echo "<a class='btn btn-info' href='./galeria.php'>Volver a <b>inmuebles</b></a>";
                    }
                   ?>
					  </div>
			</div>
		</div>
	</div>
  
  <!-- footer -->
    <footer class="navbar-nav navbar-inverse">
  </body>
</html>
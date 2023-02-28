<?php
 session_start();
 include "../../../php/dbconnect.php";
 include "../../../php/class/interfaz.php";
 include "../../../php/class/administrador.php";
 include "../../../php/class/inmueble.php";
 include "../../../php/funciones.php";
 comprobarAdmin();
 $menu = Administrador::menuAdmin();

  /** Recojo en variables los datos a mostrar mediante PHP */
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
        $id_cliente = $fila['id_cliente'];
      }
    }
    mysqli_close($conexion);
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles Inmueble</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
      <!-- Mi CSS -->
      <link rel="stylesheet" href="../../../css/estilos.css" media="screen">
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php $menu ?>
	  <!-- Muestro los datos del inmueble -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio">
          <div class='jumbotron'>
            <h1 align ='center'><?php echo $titular ?></h1>
          </div>
        </div>
        <div class="col-md-offset-2 col-md-5">
          <ul>
            <lo><img class='img-responsive' src='../../../media/img/img_inmuebles/<?php echo $imagen; ?>' width='700' height='400'></lo>
          </ul>
        </div>
        <div class="col-md-5 ">
          <div class='jumbotron'>
            <div class ='iconos' align ='center' style='padding-top:5px  font-size:30px' padding-bottom:'50px'>
                <h3><img src='../../../media/iconos/ubicacion.png' alt='calle-inmueble' width='50px' style='margin-right:5px'><b><?php echo $calle ?></b>
                <img src='../../../media/iconos/pin.png' alt='localidad-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b><?php echo $localidad ?></b><h3>
                <h3><img src='../../../media/iconos/ducha.png' alt='banos-inmueble' width='50px' style='margin-right:5px'><b><?php echo $num_banos ?></b>
                <img src='../../../media/iconos/dormitorio.png' alt='habitaciones-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b><?php echo $num_hab ?></b><h3>
                <h3><img src='../../../media/iconos/garaje.png' alt='garaje-inmueble' width='50px' style='margin-right:5px'><b><?php echo $garaje ?></b>
                <img src='../../../media/iconos/jardin.png' alt='jardin-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b><?php echo  $jardin ?></b>
                <img src='../../../media/iconos/piscina.png' alt='piscina-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b><?php echo $piscina ?></b></h3>
                <h3><img src='../../../media/iconos/estado.png' alt='estado-inmueble' width='50px' style='margin-right:5px'><b><?php echo $estado ?></b>
                <img src='../../../media/iconos/tipo.png' alt='tipo-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b><?php echo $tipo ?></b></h3>
                <h3><img src='../../../media/iconos/metros.png' alt='metros-inmueble' width='50px' style='margin-right:5px'><b><?php echo "$metros m<sup>2</sup>" ?></b>
                <img src='../../../media/iconos/euro.png' alt='precio-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b><?php echo"  $precio €" ?></b></h3>
                <h3><img src='../../../media/iconos/calendario.png' alt='fecha-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b><?php echo $fecha_alta ?></b><h3>
                <h3><img src='../../../media/iconos/codigo-de-barras.png' alt='id-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b><?php echo $id ?></b></h3>
                <h3><img src='../../../media/iconos/nombre.png' alt='id_propietario' width='50px' style='margin-left:55px' 'margin-right:15px'><b><?php echo $id_cliente ?></b><h3>
              </div>
            </div>
          </div>
        </div>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
              <h2 align="center">Descripción</h1>
              <div class='jumbotron'>
                <h3><b><?php echo $descripcion ?></b></h3>
                </div>
                <div>
                  <p align='center'><a class='btn btn-theme' href='inmuebles.php'<Volver a <b>Cartera de Inmuebles</b></a></p>
                </div>
              
            </div>
          </div>
        </div>
  
        <!-- footer -->
        <?php footer(); ?> 
  </body>
</html>
<?php
  session_start();
  include "../../../php/dbconnect.php";
  include "../../../php/class/interfaz.php";
  include "../../..//php/funciones.php";
   
  comprobarAdmin();
  $menu = Administrador::menuAdmin();
  $botones = Administrador::gestion_citas();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Borrar Cita</title>
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
    
   <!-- Menú de navegación -->
   <?php $menu ?>

    <!-- Botones de funciones añadir, borrar, buscar -->
    <?php $botones ?>

    <!-- Botones de funciones añadir, borrar, buscar -->
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-form'>
          <div class='panel-group menu-inicio'>
            <div class='panel panel-default'>
              <div class='panel-heading'>
                <h2 align='center'>Borrar una cita</h2>
              </div>
              <div class='panel-body'>
                <p align='center'>Seleccione la cita que desea borrar</p>
                <?php
                  try {
                    //fecha actual para controlar que no se borra una cita ya pasada
                    $fecha_actual = date('Y-m-d');
    
                    $conexion = abrirConexion();
                    $consulta = "SELECT * from tbl_citas where fecha >= '$fecha_actual' order by fecha asc";

                    $datos = mysqli_query($conexion,$consulta);

                    if (!$datos) {
                      echo "Error, no se han podido cargar los datos de las citas";
                    } else {
                      echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2'>";
                      echo "<div class='table-responsive'>";
                      echo "<table class='table table-striped'";
                      echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th><th>Cliente</th><th>¿Eliminar?</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($datos,MYSQLI_ASSOC)) {
                        if ($fila['fecha'] >= $fecha_actual) {
                          
                        }
                        echo "<tbody><tr><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[id_cliente]</td>
                        <td><form action='#' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-danger' type='submit' name='borrar' value='Eliminar'></form></td></tr></tbody>";
                      }
                      echo "</table></div></div>";
                    }
                    throw new Exception ('Usuario o contraseña incorrectos');
                  }  catch (Exception $e) {
                    die ('Error' . $e->GetMessage());
                  }
                 
                  mysqli_close($conexion);

                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   <!-- footer -->
   <?php $footer ?> 
  </body>
</html>
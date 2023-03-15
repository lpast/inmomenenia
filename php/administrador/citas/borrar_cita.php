<?php 
  session_start();
  include "../../../php/includes/dbconnect.php";
  include "../../../php/class/interfaz.php";
  include "../../../php/class/administrador.php";
  include "../../../php/class/cita.php";
  include "../../..//php/funciones.php";
  comprobarAdmin();
  $menu = Administrador::menuAdmin();
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
    <?php $menu ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
          <h1 class='margen-noticias' align='center'>Agenda</h1>
          <?php Administrador::gestion_citas(); ?>
        </div>
      </div>
    </div>
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
                  //fecha actual para controlar que no se borra una cita ya pasada
                  $fecha_actual = date('Y-m-d');
    
                  $conexion = abrirConexion();
                  $consulta = "SELECT tbl_citas.id, tbl_citas.fecha, tbl_citas.hora, tbl_citas.motivo, tbl_citas.lugar, tbl_clientes.id as id_cliente, tbl_clientes.nombre, tbl_clientes.telefono
                  from tbl_citas inner join tbl_clientes on tbl_citas.id_cliente = tbl_clientes.id WHERE fecha >= '$fecha_actual' order by fecha asc";
                  $datos = mysqli_query($conexion,$consulta);

                  if (!$datos) {
                    echo "Error, no se han podido cargar los datos de las citas";
                  } else {
                    echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2'>";
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-striped'";
                    echo "<thead><tr><th>ID</th><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th><th>Cliente</th><th>Contacto</th><th>Eliminar</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($datos,MYSQLI_ASSOC)) {
                      if ($fila['fecha'] >= $fecha_actual) {                      
                        }
                        echo "<tbody><tr><td>$fila[id]</td><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>$fila[telefono]</td></td>
                        <td><form action='#' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-danger' type='submit' name='borrar' value='Eliminar'></form></td></tr></tbody>";
                      }
                      echo "</table></div></div>";
                    }
                    mysqli_close($conexion);
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php Cita::borrar_cita();?>
    <div class="col-xs-4 col-md-6 col-sm-10">
      <p align='center'><a class='btn btn-theme' href='citas.php'>Volver a Agenda</b></a></p>
    </div>
   <?php footer();?> 
  </body>
</html>
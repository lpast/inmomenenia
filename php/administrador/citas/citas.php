<?php
  session_start(); 
  include "../../../php/dbconnect.php";
  include "../../../php/class/interfaz.php";
  include "../../../php/class/usuario.php";
  include "../../../php/class/administrador.php";
  include "../../../php/class/cita.php";
  include "../../../php/funciones.php";

  comprobarAdmin();

  $menu = Administrador::menuAdmin();
  $botones = Administrador::gestion_citas();
  $footer = Interfaz::footer();

  $actual = date('Y-m-d');
  $marca_actual = strtotime($actual);

  $conexion = abrirConexion();
  $sql = "SELECT tbl_citas.id, tbl_citas.fecha, tbl_citas.hora, tbl_citas.motivo, tbl_citas.lugar, tbl_clientes.id as id_cliente, tbl_clientes.nombre, tbl_clientes.telefono
        from tbl_citas inner join tbl_clientes on tbl_citas.id_cliente = tbl_clientes.id order by fecha desc";
        
  $mostrar = mysqli_query($conexion, $sql);

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
  <body>
    <?php $menu ?>

    <!-- Botones de funciones añadir, borrar, buscar -->
    <?php $botones ?>
         
    <div class="col-xs-12 col-md-6">
      <h2 class="margen-citas" align="center">Calendario</h2>
      <!-- PHP que muestra el calendario del mes pedido -->
      <?php 
        if(isset($_GET['mes'])) {
          $dia = "01";
          $mes = $_GET['mes'];
         
          if($mes == 0) {
            $mes = 12;
            $anio = $_GET['anio']-1;
          } elseif($mes == 13) {
            $mes=1;
            $anio = $_GET['anio']+1;
          } else
            $anio = $_GET['anio'];
           
        } else {
          $mes = date('m');
          $anio = date('Y');
          $dia = date('d');
        }
        if($mes < 10) $mes = "0$mes";
        Cita::mostrarCalendario($dia, $mes, $anio);
      ?>
    </div>

    <!-- Muestro citas y opción de modificar -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-md-6 col-sm-10">
          <h2 class="margen-citas" align="center"> Próximas citas</h2>
          <div class='col-xs-12 col-sm-12 col-md-12  tnoticias'>
            <?php
              if (!$mostrar) {
                echo "Error al hacer la consulta a la BD";
              } else {
                $num_filas = mysqli_num_rows($mostrar);
                if ($num_filas == 0) {
                  echo "No hay citas para mostrar";
                } else {
                  echo "<p align='center'><b>Se han listado $num_filas citas</b></p>";
                  echo "<div class='table-responsive'>";
                  echo "<table class='table table-striped table-hover'";
                  echo "<thead><tr><th>ID</th><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th><th>Cliente</th><th>Contacto</th><th>Modificar</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($mostrar, MYSQLI_ASSOC)) {
                    $marca_cita = strtotime($fila['fecha']);
                    $marca_hora = strtotime($fila['hora']);
                    $f_formateada = date("d-m-Y", $marca_cita);
                    $h_formateada = date("G:i", $marca_hora);
          
                    if ($marca_cita > $marca_actual) {
                      echo "<tbody><tr class='success'><td>$fila[id]</td><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>$fila[telefono]</td>
                        <td><form action='modificar_cita.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-theme' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
                    } else {
                      echo "<tbody><tr class='warning'><td>$fila[id]</td><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>$fila[telefono]</td><td>No se puede modificar</td></tr></tbody>";
                    }
                  }
                  echo "</table>
                  </div>";
                }
              }
            ?>
        </div>
      </div>
    </div>
      

    <!-- footer -->
   <?php $footer?>

    <script>
        $(document).ready(function(){
          $('[data-toggle="popover"]').popover();   
        });
    </script>
  </body>
</html>
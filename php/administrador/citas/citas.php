<?php
  session_start();
  include "../../../php/dbconnect.php";
  include "../../../php/class/interfaz.php";
  include "../../../php/class/administrador.php";

  include "../../../php/funciones.php";
  comprobarAdmin();
  $menu = Administrador::menuAdmin();
  $botones = Administrador::gestion_citas();
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
    
   <!-- Menú de navegación -->
   <?php $menu ?>

    <!-- Botones de funciones añadir, borrar, buscar -->
    <?php $botones ?>
         
    <div class="col-xs-12 col-md-6">
      <h2 class="margen-citas" align="center">Calendario</h2>
      <!-- PHP que muestra el calendario del mes pedido -->
      <?php 
        if (isset($_GET['mes'])) {
          $dia = "01";
          $mes = $_GET['mes'];
          if ($mes == 0) {
            $mes = 12;
            $anio = $_GET['anio']-1;
          }
          elseif ($mes == 13) {
            $mes=1;
            $anio = $_GET['anio']+1;
          }
          else
            $anio = $_GET['anio'];
        }
        else {
          $mes = date('m');
          $anio = date('Y');
          $dia = date('d');
        }
        if ($mes < 10) $mes = "0$mes";
          switch ($mes) {
            case 1:
              $nombre_mes = 'Enero';
              break;
            case 2:
              $nombre_mes = 'Febrero';
              break;
            case 3:
              $nombre_mes = 'Marzo';
              break;
            case 4:
              $nombre_mes = 'Abril';
              break;
            case 5:
              $nombre_mes = 'Mayo';
              break;
            case 6:
              $nombre_mes = 'Junio';
              break;
            case 7:
              $nombre_mes = 'Julio';
              break;
            case 8:
              $nombre_mes = 'Agosto';
              break;
            case 9:
              $nombre_mes = 'Septiembre';
              break;
            case 10:
              $nombre_mes = 'Octubre';
              break;
            case 11:
              $nombre_mes = 'Noviembre';
              break;
            case 12:
              $nombre_mes = 'Diciembre';
              break;

            default:
              $nombre_mes = '';
              break;
          }
          // guardo el mes por semanas en un array
          $semana = 1;

          for ($i = 1; $i <= date('t', strtotime($anio . "-" . $mes . "-" . $dia)); $i++) { // dia 1 al numero de dias del mes
            $dia_semana = date('N', strtotime($anio . "-" . $mes . "-" . $i)); // numero del dia
            $calendario[$semana][$dia_semana] = $i; //Guardo el mes en un array
            if ($dia_semana == 7) // si el dia de la semana es 7 cambio de semana
              $semana++;
          }

          // consulto las citas del mes
          /* por cada fecha, cojo el mes y si es igual al actual lo guardo en un array (la fecha entera)
          y cuando muestro el calendario compara si hay un dia del array igual al dia del mes que pasa
          y si es así lo marco el calendario (background-color) */
          $citas_mes = array();
          $conexion = abrirConexion();
          $consulta = "SELECT fecha from tbl_citas WHERE fecha like '$anio-$mes-%'";
          $fechas = mysqli_query($conexion, $consulta);
          if (!$fechas) {
            echo "Error al cargar las fechas de las citas...";
          } else {
            echo "<p align='center'><b>Las citas del mes aparecen marcadas</b></p>";
            while ($fila = mysqli_fetch_array($fechas, MYSQLI_ASSOC)) {
              $fe_marca = strtotime($fila['fecha']);
              $mesA = date('n', $fe_marca);
              $dia = date('d', $fe_marca);
              if ($mesA == date('n')) {
                array_push($citas_mes, $dia);
              }
            }
          }

          // muestro el calendario del mes
          echo "<h4>$nombre_mes</h4>";
          echo "<table class='table'>";
          echo "<tbody>";
          echo "<tr bgcolor='#b2b6b9'><th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th></tr>"; //Días de la semana
          foreach ($calendario as $dias_mes) { // cojo los días del mes almacenados en el array
            echo "<tr>";
            for ($i = 1; $i <= 7; $i++) {

              if (isset($dias_mes[$i])) {
                //busca en el array citas el día por el que va i para comprobar si hay alguna
                if (in_array($dias_mes[$i], $citas_mes)) { //busca en el array citas el numero del dia / aqui si hay cita
                  $con = abrirConexion();
                  $sql = "SELECT motivo, hora, lugar from tbl_citas WHERE fecha='$anio-$mes-$dias_mes[$i]'";
                  $cons_citas = mysqli_query($con, $sql);

                  if ($cons_citas) {

                    $num_filas = mysqli_num_rows($cons_citas);

                    if ($num_filas == 1) { // hay 1 cita
                      while ($fila = mysqli_fetch_array($cons_citas, MYSQLI_ASSOC)) {
                        //$fila = mysqli_fetch_array($consultar_citas,MYSQLI_ASSOC);
                        $marca_hora = strtotime($fila['hora']);
                        $h_formateada = date("G:i", $marca_hora);
                        echo "<td bgcolor='#baa35f'>
                              <a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$anio'>" . $dias_mes[$i] . "</a><br>
                              <a href='#' data-toggle='popover' title='Citas del día' data-content='· $fila[motivo] a las $h_formateada en $fila[lugar]'><span class='glyphicon glyphicon-eye-open'></span></a>
                            </td>";
                      }
                    } else { // hay mas de una cita
                      $contenido = "";
                      while ($fila = mysqli_fetch_array($cons_citas, MYSQLI_ASSOC)) {
                        //$fila = mysqli_fetch_array($consultar_citas,MYSQLI_ASSOC);
                        $marca_hora = strtotime($fila['hora']);
                        $h_formateada = date("G:i", $marca_hora);
                        $contenido .= " · $fila[motivo] a las $h_formateada en $fila[lugar] &#013";
                      }

                      echo "<td bgcolor='#baa35f'>
                              <a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$anio'>" . $dias_mes[$i] . "</a><br>
                              <a href='#' data-toggle='popover' title='Citas del día' data-content='" . $contenido . "'><span class='glyphicon glyphicon-eye-open'></span></a>
                            </td>";
                    }
                  } else {
                    echo "¡ERROR! no se ha podido conectar con la BD...";
                  }
                } else { // Día sin cita
                  echo "<td bgcolor='white'><a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$anio'>" . $dias_mes[$i] . "</a></td>";
                }
              } else {
                echo "<td></td>";
              }

            }
            echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";

          $mes_antes = $mes - 1;
          $mes_despues = $mes + 1;
          echo "<ul class='pager'>
            <li><a class='btn btn-warnig' role='button' href='citas.php?mes=$mes_antes&anio=" . $anio . "'>Atrás</a></li>
            <li><a class='btn btn-warnig' role='button' href='citas.php?mes=$mes_despues&anio=" . $anio . "'>Siguiente</a></li>
          </ul>";
      ?>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <h2 class="margen-citas" align="center">Próximas citas</h2>';
          <?php
    $actual = date('Y-m-d');
    $marca_actual = strtotime($actual);

    $conexion = abrirConexion();
    $sql = "SELECT tbl_citas.id, tbl_citas.fecha, tbl_citas.hora, tbl_citas.motivo, tbl_citas.lugar, tbl_clientes.id, tbl_clientes.nombre
          from tbl_citas inner join tbl_clientes on tbl_citas.id_cliente = tbl_clientes.id order by fecha desc";

    $mostrar = mysqli_query($conexion, $sql);

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
        echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th><th>Cliente</th><th>Modificar</th></tr></thead>";
        while ($fila = mysqli_fetch_array($mostrar, MYSQLI_ASSOC)) {
          $marca_cita = strtotime($fila['fecha']);
          $marca_hora = strtotime($fila['hora']);
          $f_formateada = date("d-m-Y", $marca_cita);
          $h_formateada = date("G:i", $marca_hora);

          if ($marca_cita > $marca_actual) {
            echo "<tbody><tr class='success'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td>
              <td><form action='modificar_cita.php' method='post'>
              <input type='hidden' name='id' value='$fila[id]'>
              <input type='hidden' name='fecha' value='$f_formateada'>
              <input type='hidden' name='hora' value='$h_formateada'>
              <input type='hidden' name='motivo' value='$fila[motivo]'>
              <input type='hidden' name='lugar' value='$fila[lugar]'>              
              <input class='form-control btn btn-md btn-theme' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
          } else {
            echo "<tbody><tr class='warning'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>No se puede modificar</td></tr></tbody>";
          }
        }
        echo "</table>
              </div>";
      }
    }
    ?>
    </div>
      

    <!-- footer -->
   <?php Interfaz::footer();?>

    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
          });
    </script>
  </body>
</html>
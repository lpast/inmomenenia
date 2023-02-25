<?php
class Cita {
    
  static public function nueva_cita(): bool {
    if (isset($_POST['cancelar'])) {
      header('Location: citas.php');
    }
    if (isset($_POST['nueva_cita'])) {

      $mes = $_GET['mes'];
      $anio= $_GET['anio'];
      $dia = $_GET['dia'];

      // si isset de mes o dia pongo la fecha pasada por enlace, si no la del date de html
      if (isset($_GET['mes'])) {
          $fecha = $anio."/".$mes."/".$dia;
      } else {
          $fecha = $_POST['fecha'];
      }
      
      $hora = $_POST['hora'];
      $motivo = $_POST['motivo'];
      $lugar = $_POST['lugar'];
      $id_cliente = $_POST['id_cliente'];

      // fecha actual
      $actual = date('Y-m-d');
      $marca_actual = strtotime($actual);
      $marca_fecha = strtotime($fecha);

      // hago la inserción si la fecha de la cita no es un día ya pasado
      if ($marca_fecha >= $marca_actual) {
          
          $conexion = abrirConexion();

          $sql = "INSERT INTO tbl_citas (id,fecha,hora,motivo,lugar,id_cliente) VALUES
          (null,'$fecha','$hora','$motivo','$lugar','$id_cliente')";

          if (mysqli_query($conexion,$sql)) {
          echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
                          <strong>Cita añadida correctamente</strong> 
                          </div>";
              echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=citas.php'>";
          } else {
              echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                          <h4><strong>¡Error!</strong>No se ha podido añadir la cita</h4>
                          </div></div></div>";
              echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=citas.php'>";
          }

          mysqli_close($conexion);
      } else {
        echo "La fecha introducída no es una fecha válida";
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=citas.php'>";
      }
    }
    return  true;
  }
  
  static public function buscar_cita(): bool {
    if (isset($_POST['buscar_cita'])) {
      $fecha = $_POST['fecha'];
      $id_cliente = $_POST['id_cliente'];
  
      if ($fecha == "") {
        if ($id_cliente == "") {
          // No se realiza ninguna búsqueda porque no ha seleccionado nada
          echo "No ha seleccionado ningún criterio de búsqueda, vuelva a intentarlo";
        } else {
          // Aquí busco solo por el id del cliente
          $conexion = abrirConexion();
          $sql_id = "SELECT tbl_citas.id, tbl_citas.fecha, tbl_citas.hora, tbl_citas.motivo, tbl_citas.lugar, tbl_clientes.id as id_cliente, tbl_clientes.nombre, tbl_clientes.telefono
          from tbl_citas inner join tbl_clientes on tbl_citas.id_cliente = tbl_clientes.id order by fecha desc";
          
          $busca_cliente = mysqli_query($conexion,$sql_id);
  
          if (!$busca_cliente) {
            echo "Error al conectar BD";
          } else {
            $num_filas = mysqli_num_rows($busca_cliente);
  
            if ($num_filas == 0) {
              echo "No se han encontrado citas";
            } else {
              echo "<table class='table table-striped tnoticias'>";
              echo "<thead><tr><th>ID</th><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th><th>Cliente</th><th>Contacto</th></tr></thead>";
              while ($fila = mysqli_fetch_array($busca_cliente,MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[id]</td><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>$fila[telefono]</td></tr></tbody>";
              }
              echo "</table>";
            }
          }
          mysqli_close($conexion);
        }
      } else {
        echo $fecha;
        if ($id_cliente == "") {
          // aqui busco solo por la fecha
          $conexion = abrirConexion();
          $sql_fecha = "SELECT tbl_citas.id, tbl_citas.fecha, tbl_citas.hora, tbl_citas.motivo, tbl_citas.lugar, tbl_clientes.id as id_cliente, tbl_clientes.nombre, tbl_clientes.telefono
          from tbl_citas inner join tbl_clientes on tbl_citas.id_cliente = tbl_clientes.id WHERE fecha='$fecha order by fecha desc";
          
  
          $busca_fecha = mysqli_query($conexion,$sql_fecha);
  
          if (!$busca_fecha) {
            echo "Error al conectar BD-2";
          } else {
            $num_filas = mysqli_num_rows($busca_fecha);
  
            if ($num_filas == 0) {
              echo "No se han encontrado citas";
            } else {
              echo "<table class='table table-striped tnoticias'>";
              echo "<thead><tr><th>ID</th><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th><th>Cliente</th><th>Contacto</th></tr></thead>";
              while ($fila = mysqli_fetch_array($busca_fecha,MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[id]</td><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>$fila[telefono]</td></tr></tbody>";
              }
              echo "</table>";
            }
          }
          mysqli_close($conexion);
  
        } else {
          // Aquí busco por FECHA y CLIENTE
          $conexion = abrirConexion();
          $sql_fe_cli = "SELECT tbl_citas.id, tbl_citas.fecha, tbl_citas.hora, tbl_citas.motivo, tbl_citas.lugar, tbl_clientes.id as id_cliente, tbl_clientes.nombre, tbl_clientes.telefono
          from tbl_citas inner join tbl_clientes on tbl_citas.id_cliente = tbl_clientes.id WHERE fecha='$fecha' and id_cliente='$id_cliente'";
  
          $busca_fe_cli = mysqli_query($conexion,$sql_fe_cli);
  
          if (!$busca_fe_cli) {
            echo "Error al conectar BD-3";
          } else {
            $num_filas = mysqli_num_rows($busca_fe_cli);
  
            if ($num_filas == 0) {
              echo "No se han encontrado citas";
            } else {
              echo "<table class='table table-striped tnoticias'>";
              echo "<thead><tr><th>ID</th><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th><th>Cliente</th><th>Contacto</th></tr></thead>";
              while ($fila = mysqli_fetch_array($busca_fe_cli,MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[id]</td><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>$fila[telefono]</td></tr></tbody>";
              }
               echo "</table>";
            }
          }
        }
        
      } 
    }
    return true;
  }
  
  static public function borrar_cita(): bool {
    if (isset($_POST['borrar'])) {
      $id = $_POST['id'];
      $conexion = abrirConexion();
      $borrar = "DELETE FROM tbl_citas where id='$id'";
      if (mysqli_query($conexion,$borrar)) {
        echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
            <strong>Cita borrada correctamente</strong> 
          </div>";
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=citas.php'>";
      } else {
        echo "<p>¡Error! No se ha podido borrar la cita...</p>";
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=citas.php'>";
      }
      mysqli_close($conexion);
    }
    return true;

  }

  static public function mostrarCalendario($dia, $mes, $anio): bool {
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

    /** consulto las citas del mes
    * por cada fecha, cojo el mes y si es igual al actual lo guardo en un array (la fecha entera)
    * y cuando muestro el calendario compara si hay un dia del array igual al dia del mes que pasa
    * y si es así lo marco el calendario (background-color)
    */
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
    return true;
  }


}
?>
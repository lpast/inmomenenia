<?php
class Cita {
  function nueva_cita(){
    if (isset($_POST['cancelar'])) {
      header('Location: citas.php');
    }
    if (isset($_POST['nueva_cita'])) {
  
      $mes = $_GET['mes'];
      $año= $_GET['año'];
      $dia = $_GET['dia'];
  
      // si isset de mes o dia pongo la fecha pasada por enlace, si no la del date de html
      if (isset($_GET['mes'])) {
        $fecha = $año."/".$mes."/".$dia;
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
  }
  
  function buscar_cita() {
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
          $sql_id = "SELECT * FROM tbl_citas WHERE id_cliente='$id_cliente' order by fecha asc";
  
          $busca_cliente = mysqli_query($conexion,$sql_id);
  
          if (!$busca_cliente) {
            echo "Error al conectar BD-1";
          } else {
            $num_filas = mysqli_num_rows($busca_cliente);
  
            if ($num_filas == 0) {
              echo "No se han encontrado citas";
            } else {
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th></tr></thead>";
              while ($fila = mysqli_fetch_array($busca_cliente,MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td></tr></tbody>";
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
          $sql_fecha = "SELECT * FROM tbl_citas WHERE fecha='$fecha'";
  
          $busca_fecha = mysqli_query($conexion,$sql_fecha);
  
          if (!$busca_fecha) {
            echo "Error al conectar BD-2";
          } else {
            $num_filas = mysqli_num_rows($busca_fecha);
  
            if ($num_filas == 0) {
              echo "No se han encontrado citas";
            } else {
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th></tr></thead>";
              while ($fila = mysqli_fetch_array($busca_fecha,MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td></tr></tbody>";
              }
              echo "</table>";
            }
          }
          mysqli_close($conexion);
  
        } else {
          // Aquí busco por FECHA y CLIENTE
          $conexion = abrirConexion();
          $sql_fe_cli = "SELECT * FROM tbl_citas WHERE fecha='$fecha' and id_cliente='$id_cliente'";
  
          $busca_fe_cli = mysqli_query($conexion,$sql_fe_cli);
  
          if (!$busca_fe_cli) {
            echo "Error al conectar BD-3";
          } else {
            $num_filas = mysqli_num_rows($busca_fe_cli);
  
            if ($num_filas == 0) {
              echo "No se han encontrado citas";
            } else {
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th></tr></thead>";
              while ($fila = mysqli_fetch_array($busca_fe_cli,MYSQLI_ASSOC)) {
              echo "<tbody><tr><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td></tr></tbody>";
              }
               echo "</table>";
            }
          }
        }
        
      } 
    }
  }
  
  function borrar_cita() {
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
  }

  static public function citas_usuario(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
          <div class='tnoticias'>
            <h1 align='center''>Echa un vistazo a tus citas</h1>
            <p align='center'><b>Tus próximas citas aparecen marcadas en <span style='color:green'>verde</span> y la pasadas en <span style='color:#baa35f'>amarillo</span></b></p>
          </div>;
        </div>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2  tnoticias'>";
            $actual = date('Y-m-d');
            $marca_actual = strtotime($actual);
  
            $id_cliente = $_SESSION['id_usuario'];
            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_citas WHERE id_cliente='$id_cliente' order by fecha desc";
  
            $consulta = mysqli_query($con, $sql);
  
            if (!$consulta) {
              echo "Error al realizar la consulta sql...";
            } else {
              $num_filas = mysqli_num_rows($consulta);
  
              if ($num_filas == 0) {
                echo "<div class='alert alert-warning warning-new col-sm-6 col-sm-offset-3' align='center'>
                              <h2>No tienes ninguna cita programada</h2>
                      </div>";
              } else {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-hover'>";
                echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th></tr></thead>";
                echo "<tbody>";
                while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                  $marca_cita = strtotime($fila['fecha']);
                  $marca_hora = strtotime($fila['hora']);
                  $f_formateada = date("d-m-Y", $marca_cita);
                  $h_formateada = date("G:i", $marca_hora);
                  if ($marca_cita >= $marca_actual) { // en verde las futuras citas)
                    echo "<tr class='success'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td></tr>";
                  } else { // en amarillo las citas pasadas)
                    echo "<tr class='warning'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td></tr>";
                  }
                }
                echo "</tbody>";
                echo "</table></div>"; //responsive, table-hover
              }
              
            }
              mysqli_close($con);
              echo "</div>
              </div>";
              echo "<div style='padding-top:15px'>
                <p align='center'><a class='btn btn-theme' href='../../php/contacto.php'>Solicitar <b>nueva cita</b></a></p>
              </div>";
      echo "</div>
    </div>";
      return true;
  }
}
?>



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
  $nueva_cita = Cita::nueva_cita(); 
  $footer = Interfaz::footer();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Añadir citas</title>
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

  <!-- Menú con opciones de administracion-->
  <?php $botones ?>

  <div class='container-fluid'>
    <div class='row'>
    <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
      <div class='panel-group'>
        <div class='panel panel-default menu-inicio'>
          <div class='panel-heading'>
            <h2 align='center'>Añadir cita</h2>
          </div>
          <form class='form-horinzontal panel-body' action='#' method='post'>
              <div class='form-group'>
                <label class=' col-sm-2'>ID:</label>
                <div class='col-sm-10'>
                  <?php
                    $con = abrirConexion();
                    $consulta = "SELECT auto_increment from information_schema.tables where table_schema='dbbrhgswov0fge' and table_name='tbl_citas'";
                    $datos = mysqli_query($con, $consulta);
                    $array = mysqli_fetch_array($datos, MYSQLI_NUM);
                    echo "<td><input class='form-control' type='text' name='id' value ='$array[0]' readonly></td>";
                  ?>
                </div>
              </div>
              <?php
                // aquí compruebo si me han pasado mes por el enlace, si es así muestro la fecha pasada si no se muestra un date para seleccionarla
                if (isset($_GET['mes'])) {
                  $mes = $_GET['mes'];
                  $anio= $_GET['anio'];
                  $dia = $_GET['dia'];
                
              echo "<div class='form-group'>
                <label class=' col-sm-2'>Fecha:</label>
                <div class='col-sm-10'>
                  <input id='fecha' class='form-control' type='text' name='fecha' value='$dia/$mes/$anio' readonly><span></span>
                </div>
              </div>";
              } else {
                echo "<div class='form-group'>
                  <label class=' col-sm-2'>Fecha:</label>
                  <div class='col-sm-10'>
                    <input id='fecha' class='form-control' type='date' name='fecha' autofocus><span></span>
                  </div>
                </div>";
              }
              ?>
              
            <div class='form-group'>
              <label class='col-sm-2'>Hora:</label>
              <div class='col-sm-10'>
                <input id='hora' class='form-control' type='time' name='hora'><span></span>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2'>Motivo:</label>
              <div class='col-sm-10'>
                <input id='motivo' class='form-control' type='text' name='motivo'><span></span>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2'>Lugar</label>
              <div class='col-sm-10'>
                <input id='lugar' class='form-control' type='text' name='lugar'><span></span>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2'>ID Cliente:</label>
              <div class='col-sm-10'>
                <select class='form-control' name='id_cliente'>
                  <?php
                    $conexion = abrirConexion();
                    $consulta = "SELECT id, nombre, apellidos from tbl_clientes";
                    $clientes = mysqli_query($conexion,$consulta);
                    
                    if (!$clientes) {
                      echo "Error al ajecutar la consulta";
                    } else {
                      while ($fila = mysqli_fetch_array($clientes,MYSQLI_ASSOC)) {
                        if ($fila['nombre'] != 'disponible') {
                          echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                        }
                      }
                    }                     
                    mysqli_close($conexion);
                  ?>
                </select>
              </div>
            </div>
            <div class='form-group'>
              <div class='col-sm-12'>
                <input class='form-control btn-theme' type='submit' id='nueva_cita' name='nueva_cita' value='Añadir cita'>
              </div>
              <div class='col-sm-2'>
                <a href='citas.php' class='btn btn-danger'>Cancelar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
  <?php $nueva_cita ?> 
   <!-- footer -->
   <?php $footer ?> 

      <!-- Validación javascript -->
      <script src="/./js/validar_nueva_cita.js"></script>
  </body>
</html>

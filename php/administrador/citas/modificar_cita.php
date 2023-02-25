<?php
  session_start();
  include "../../../php/dbconnect.php";
  include "../../../php/class/interfaz.php";
  include "../../../php/class/administrador.php";
  include "../../../php/class/cita.php";
  include "../../..//php/funciones.php";

  comprobarAdmin();
  $menu = Administrador::menuAdmin();
  $botones = Administrador::gestion_citas();
  $footer = Interfaz::footer();

  if (isset($_POST['modificar'])) {
    $id = $_POST['id'];

    $conexion = abrirConexion();
    $sql = "SELECT fecha, hora, motivo, lugar, id_cliente FROM tbl_citas WHERE id='$id'";

    $datos = mysqli_query($conexion,$sql);

    if (!$datos) {
      echo "Error al consultar datos a la BD";
    } else {
        while ($fila = mysqli_fetch_array($datos,MYSQLI_ASSOC)) {
          $fecha = $fila['fecha'];
          $hora = $fila['hora'];
          $motivo = $fila['motivo'];
          $lugar = $fila['lugar'];
          $id_cliente = $fila['id_cliente'];
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar Cita</title>
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
    <div class="container-fluid menu-inicio">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 cabecera-form">
          <div class="panel-group">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 align="center">Modificar Cita</h4>
              </div>
              <div class="panel-body">
                <form class="form-horizontal" action="#" method="post">
                 <div class="form-group">
                   <label class=" col-sm-2">ID:</label>
                   <div class="col-sm-10">
                    <input class="form-control" type="text" name="id_new" value="<?php echo $id; ?>" readonly >
                   </div>
                 </div>
                 <div class="form-group">
                   <label class=" col-sm-2">Fecha:</label>
                   <div class="col-sm-10">
                    <input class="form-control" type="date" name="fecha_new" value="<?php echo $fecha; ?>">
                   </div>
                 </div>
                 <div class="form-group">
                   <label class=" col-sm-2">Hora:</label>
                   <div class="col-sm-10">
                    <input class="form-control" type="time" name="hora_new" value="<?php echo $hora; ?>">
                   </div>
                 </div>
                 <div class="form-group">
                   <label class=" col-sm-2">Motivo:</label>
                   <div class="col-sm-10">
                    <input class="form-control" type="text" name="motivo_new" value="<?php echo $motivo; ?>">
                   </div>
                 </div>
                 <div class="form-group">
                   <label class=" col-sm-2">Lugar:</label>
                   <div class="col-sm-10">
                    <input class="form-control" type="text" name="lugar_new" value="<?php echo $lugar; ?>">
                   </div>
                 </div>
                 <div class="form-group">
                   <label class=" col-sm-2">Cliente:</label>
                   <div class="col-sm-10">
                     <select class="form-control" name="id_cliente_new">
                       <?php 
                         $conexion = abrirConexion();
                         $consulta = "SELECT id, nombre FROM tbl_clientes";
                         $clientes = mysqli_query($conexion,$consulta);
                         
                         if (!$clientes) {
                           echo "Error al ajecutar la consulta";
                         } else {
                           while ($fila = mysqli_fetch_array($clientes,MYSQLI_ASSOC)) {
                               echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                           }
                         }                     
                         mysqli_close($conexion);
                       ?>
                     </select>
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="col-sm-12 col-sm-offset-4">
                     <div class="col-sm-2">
                       <input class="form-control btn-primary" type="submit" name="mod_cita" value="Modificar">
                     </div>
                     <div class="col-sm-2">
                       <a href="./citas.php" class="btn btn-danger">Cancelar</a>
                     </div>
                   </div>
                 </div>
               </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      
    <!-- PHP que modifica las citas en la BD -->
    <?php 
      if (isset($_POST['mod_cita'])) {
        $id_new = $_POST['id_new'];
        $fecha_new = $_POST['fecha_new'];
        $hora_new = $_POST['hora_new'];
        $motivo_new = $_POST['motivo_new'];
        $lugar_new = $_POST['lugar_new'];
        $id_cliente_new = $_POST['id_cliente_new'];

        $con = abrirConexion();
        $sql = "UPDATE  tbl_citas set fecha='$fecha_new',hora='$hora_new',motivo='$motivo_new',lugar='$lugar_new',id_cliente='$id_cliente_new' where id='$id_new'";

        $actualizar = mysqli_query($con,$sql);

        if (!$actualizar) {
          echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
            <strong>Cita modificada correctamente</strong> 
          </div>";
          echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=citas.php'>";
        } else {
          echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
            <h4><strong>¡Error!</strong>No se ha podido modificar la cita</h4>
          </div></div></div>";
          echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=citas.php'>";
        }
        mysqli_close($con);
      }
    ?>
   <!-- footer -->
   <?php $footer ?> 
  </body>
</html>
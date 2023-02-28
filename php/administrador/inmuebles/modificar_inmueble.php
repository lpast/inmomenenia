<?php
 session_start();
 include "../../../php/dbconnect.php";
 include "../../../php/class/interfaz.php";
 include "../../../php/class/administrador.php";
 include "../../../php/class/inmueble.php";
 include "../../../php/funciones.php";
 comprobarAdmin();
 $menu = Administrador::menuAdmin();

  if (isset($_POST['modificar'])) {
    $id = $_POST['id'];

    $conexion = abrirConexion();
    $consulta = "SELECT * FROM tbl_inmuebles WHERE id='$id'";

    $sql = mysqli_query($conexion,$consulta);

    if (!$sql) {
      echo "¡ERROR! No hay datos en la consulta";
      header("location:inmuebles.php");
    } else {
      $num_filas = mysqli_num_rows($sql);
      if ($num_filas == 0) {
        echo "No hay datos de inmueble almacenados";
      } else {
        while ($fila = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
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
          $precio = $fila['precio'];
          $fecha_alta = $fila['fecha_alta'];
          $id_cliente = $fila['id_cliente'];
          $imagen = $fila['imagen'];
        }
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
    <title>Modificar Inmueble </title>
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
          <h1 class='margen-noticias' align='center'>Cartera de Inmuebles</h1>
          <?php Administrador::gestion_inmuebles();?>
        </div>
      </div>
    </div>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
          <div class='panel-group'>
            <div class='panel panel-default menu-inicio'>
              <div class='panel-heading'>
                <h2 align='center'>Modificar inmueble</h2>
              </div>
              <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                  <div class='form-group'>
                    <label class='col-sm-2'>ID:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' name='id' type='number' value ='<?php echo $id?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Tipo:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' name='tipo' type='text' value ='<?php echo $tipo?>'></td>
                      </select>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Calle:</label>
                    <div class='col-sm-10'>
                    <input class='form-control'  name='calle' type='text'value ='<?php echo $calle?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Portal:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='number' name='portal' value ='<?php echo $portal?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Piso:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='piso'value ='<?php echo $piso?>'></td>
                    </div>
                  </div>
                    <div class='form-group'>
                    <label class='col-sm-2'>Puerta:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='puerta'value ='<?php echo $puerta?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Código Postal:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='number' name='cp' value ='<?php echo $cp?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Localidad:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='localidad' value ='<?php echo $localidad?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Metros:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='number' name='localidad' value ='<?php echo $metros?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Núm. de habitaciones:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='number' name='num_hab' value ='<?php echo $num_hab?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Núm. de baños:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='number' name='num_banos' value ='<?php echo $num_banos?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2' >Garaje:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='garaje' value ='<?php echo $garaje?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Jardín:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='jardin' value ='<?php echo $jardin?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Piscina:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='piscina' value ='<?php echo $piscina?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Estado:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='estado' value ='<?php echo $estado?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Titular:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='titular' value ='<?php echo $titular?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Descripción:</label>
                    <div class='col-sm-10'>
                      <textarea class='form-control' id='descripcion' name='descripcion' rows='5'><?php echo $descripcion?></textarea>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Precio:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='precio' name='precio' type='number' value ='<?php echo $precio?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Imagen:</label>
                    <div class='col-sm-5'>
                      <?php
                        $conexion = abrirConexion();
                        $consulta = "SELECT id, imagen from tbl_inmuebles where id='$id'";
                        $imagen = mysqli_query($conexion, $consulta);
                        if (!$imagen) {
                          echo "error al cargar la miniatura...";
                        } else {
                          while($fila = mysqli_fetch_array($imagen,MYSQLI_ASSOC)) {
                            echo "<p><img src='../../../media/img/img_inmuebles/$fila[imagen]' width='150px'></p>";
                          }
                        }
                        mysqli_close($conexion);
                      ?>
                      <input class='form-control' id='imagen' name='imagen' type='file'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Fecha de alta:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='fecha_alta' name='fecha_alta' type='date' value ='<?php echo $fecha_alta?>'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class=' col-sm-2'>ID Cliente:</label>
                    <div class='col-sm-10'>
                      <select class='form-control' id='id_cliente' name='id_cliente'>
                        <?php
                          $conexion = abrirConexion();
                          $consulta = "SELECT id, nombre, apellidos from tbl_clientes";
                          $sql = mysqli_query($conexion, $consulta);
                      
                          if (!$sql) {
                            echo 'Error al ajecutar la consulta';
                          } else {
                            while ($fila = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                              echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                            }
                          }
                          mysqli_close($conexion);
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-12 col-sm-offset-4'>
                      <div class='col-sm-2'>
                        <input class='form-control btn-theme' type='submit' name='guardar' value='guardar'>
                      </div>
                      <div class='col-sm-2'>
                        <a href='inmuebles.php' class='btn btn-danger'>Cancelar</a>
                      </div>
                    </div>
                  </div>
                </form>
              <div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php Inmueble::modificar_inmueble();?>
    <?php footer(); ?> 
  </body>
</html>
 
 

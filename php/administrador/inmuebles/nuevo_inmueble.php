<?php
 session_start();
 include "../../../php/includes/dbconnect.php";
 include "../../../php/class/administrador.php";
 include "../../../php/class/inmueble.php";
 include "../../../php/funciones.php";
 comprobarAdmin();
 $menu = Administrador::menuAdmin();
 $inmueble = Inmueble::nuevo_inmueble();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Inmueble</title>
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
                <h2 align='center'>Nuevo inmueble</h2>
              </div>
              <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                  <div class='form-group'>
                    <label class='col-sm-2'>ID:</label>
                    <div class='col-sm-10'>
                      <?php
                        $con = abrirConexion();
                        $consulta = "SELECT auto_increment from information_schema.tables WHERE table_schema='dbbrhgswov0fge' and table_name='tbl_inmuebles'";
                        $datos = mysqli_query($con, $consulta);
                        $array = mysqli_fetch_array($datos, MYSQLI_NUM);
                        echo "<td><input class='form-control' name='id' type='number' value = '$array[0]'></td>";
                      ?>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Tipo:</label>
                    <div class='col-sm-10'>
                      <select class='form-control' name='tipo' id='tipo'>
                        <option value='alquiler'>Selecciona una opcion</option>
                        <option value='alquiler'>Alquilar</option>
                        <option value='compra'>Vender</option>
                      </select>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Calle:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='calle' name='calle' type='text'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Portal:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='portal' name='portal' type='number'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Piso:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='piso' name='piso' type='text'><span></span>
                    </div>
                  </div>
                    <div class='form-group'>
                    <label class='col-sm-2'>Puerta:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='puerta' name='puerta' type='text'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Código Postal:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='cp' name='cp' type='number'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Localidad:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='localidad' name='localidad' type='text'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Metros:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='metros' name='metros' type='number'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Núm. de habitaciones:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='num_hab' name='num_hab' type='number'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Núm. de baños:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='num_banos' name='num_banos' type='number'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2' >Garaje:</label>
                    <div class='col-sm-10'>
                      <label class='radio-inline'>
                        <input type='radio' name='garaje' value='si' id= 'Si'> Si <span></span>
                      </label>
                      <label class='radio-inline'>
                        <input type='radio' name='garaje' value='no' id='No'> No <span></span>
                      </label>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Jardín:</label>
                    <div class='col-sm-10 '>
                      <label class='radio-inline'>
                        <input type='radio' name='jardin' value='si' id= 'Si'> Si
                      </label>
                      <label class='radio-inline'>
                        <input type='radio' name='jardin' value='no' id='No'> No<span></span>
                      </label>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Piscina:</label>
                    <div class='col-sm-10 '>
                      <label class='radio-inline'>
                        <input type='radio' name='piscina' value='si' id= 'Si'> Si<span></span>
                      </label>
                      <label class='radio-inline'>
                        <input type='radio' name='piscina' value='no' id='No'> No
                      </label>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class=' col-sm-2'>Estado:</label>
                    <div class='col-sm-10'>
                      <select class='form-control' id='estado' name='estado'>
                        <option value=''>Selecciona una opcion</option>
                        <option value='0'>Nuevo</option>
                        <option value='1'>Segunda mano</option>
                      </select><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class=' col-sm-2'>Titular:</label>
                    <div class='col-sm-10'>
                      <textarea class='form-control' id='titular' name='titular' rows='3'></textarea><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class=' col-sm-2'>Descripción:</label>
                    <div class='col-sm-10'>
                      <textarea class='form-control' id='descripcion' name='descripcion' rows='5'></textarea><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Precio:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='precio' name='precio' type='number'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class=' col-sm-2'>Imagen:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='imagen' name='imagen' type='file'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class=' col-sm-2'>Fecha de alta:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='fecha_alta' name='fecha_alta' type='date'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class=' col-sm-2'>ID Cliente:</label>
                    <div class='col-sm-10'>
                      <select class='form-control' id='id_cliente' name='id_cliente'>
                        <?php   
                          $conexion = abrirConexion();
                          $consulta = 'SELECT id, nombre, apellidos from tbl_clientes';
                          $clientes = mysqli_query($conexion, $consulta);
                          if (!$clientes) {
                            echo 'Error al ajecutar la consulta';
                          } else {
                            while ($fila = mysqli_fetch_array($clientes, MYSQLI_ASSOC)) {
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
                        <input type='submit' class='form-control btn-theme' id='nuevo_inmueble' name='nuevo_inmueble' value='Añadir'>
                      </div>
                      <div class='col-sm-2'>
                        <button class='form-control btn-theme' id='btnLimpiar'>Limpiar</button>
                      </div>
                      <div class='col-sm-2'>
                        <a href='../php/inmuebles.php' class='btn btn-danger'>Cancelar</a>
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
    <?php $inmueble ?>
    <?php footer(); ?>
    <!-- Validación javascript -->
    <script src="../../../js/validar_nuevo_inmueble.js"></script>
  </body>
</html>
 

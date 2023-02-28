<<?php
  session_start(); 
  include "../../../php/dbconnect.php";
  include "../../../php/class/usuario.php";
  include "../../../php/class/administrador.php";
  include "../../../php/class/cliente.php";
  include "../../../php/funciones.php";
  comprobarAdmin();
  $menu = Administrador::menuAdmin();

  if (isset($_POST['modificar'])) {
    $id = $_POST['id'];

    // almaceno en variables los datos para mostrarlas después en los 'value' del formulario
    $conexion = abrirConexion();
    $sql = "SELECT * FROM tbl_clientes WHERE id='$id'";

    $datos = mysqli_query($conexion, $sql);
      if (!$datos) {
        echo "No se han encontrado los datos del usuario en la BD";
        header("location:clientes.php");
      } else {
        $num_filas = mysqli_num_rows($datos);
        while ($fila = mysqli_fetch_array($datos,MYSQLI_ASSOC)) {
          $tipo = $fila['tipo'];
          $nombre = $fila['nombre'];
          $apellidos = $fila['apellidos'];
          $calle = $fila['calle'];
          $portal = $fila['portal'];
          $piso = $fila['piso'];
          $puerta = $fila['puerta'];
          $cp = $fila['cp'];
          $localidad = $fila['localidad'];
          $telefono = $fila['telefono'];
          $email = $fila['email'];
        }
      }
      mysqli_close($conexion);
  }
  Cliente::modificar_cliente();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Cliente </title>
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
  <body><?php $menu ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
          <h1 class='margen-noticias' align='center'> Cartera de Clientes</h1>
          <?php Administrador::gestion_clientes(); ?>
        </div>
      </div>
    </div>
    <div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
        <h2 align='center'>Estos son los datos de cliente</h2>
          <p align='center'><b>Aquí puedes modificar los datos del cliente</b></p>
      </div>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
        <form action='#' method='post' accept-charset='utf-8'>
          <div class='panel panel-default'>
            <div class='panel-body'>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>ID:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='id' value='<?php echo $id ?>' readonly>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Tipo:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='tipo' value='<?php echo $tipo ?>' >
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Nombre:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='nombre' value='<?php echo $nombre ?>'>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Apellidos:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='apellidos' value='<?php echo $apellidos ?>'>
                </div>
              </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Calle:</label>
                    </div>
                    <div class='col-sm-10'>
                     <input class='form-control' type='text' name='calle' value='<?php echo $calle ?>'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Portal:</label>
                    </div>
                    <div class='col-sm-10'>
                    <input class='form-control' type='text' name='portal' value='<?php echo $portal ?>'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Piso:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='piso' value='<?php echo $piso ?>'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Puerta:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='puerta' value='<?php echo $puerta ?>'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>CP:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='cp' value='<?php echo $cp ?>'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Localidad:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='localidad' value='<?php echo $localidad ?>'>
                    </div>
                  </div>
    
                  <div class='form-group'>
                      <div class='col-sm-2'>
                        <label>Teléfono:</label>
                      </div>
                      <div class='col-sm-10'>
                      <input class='form-control' type='text' name='telefono' value='<?php echo $telefono ?>'>
                      </div>
                  </div>
                  <div class='form-group'>
                      <div class='col-sm-2'>
                        <label>Email:</label>
                      </div>
                      <div class='col-sm-10'>
                      <input class='form-control' type='text' name='email' value='<?php echo $email ?>'>
                      </div>
                  </div>
                  <div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-12 col-sm-offset-4' style='padding-top:15px'>
                    <div class='col-sm-2'>
                      <input class='form-control btn-theme' type='submit' name='guardar' value='Modificar'>
                    </div>
                    <div class='col-sm-2'>
                      <a href='clientes.php' class='btn btn-danger'>Cancelar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div><div class="col-xs-4 col-md-6 col-sm-10">
      <p align='center'><a class='btn btn-theme' href='clientes.php'>Volver a Clientes</b></a></p>
    </div>
    <?php footer(); ?>
  </body>
</html>
 

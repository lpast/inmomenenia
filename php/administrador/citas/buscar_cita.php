<?php 
  session_start();
  include "../../../php/dbconnect.php";
  include "../../../php/class/interfaz.php";
  include "../../../php/class/administrador.php";
  include "../../../php/class/cita.php";
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
   <?php $menu ?>
    <!-- Botones de funciones añadir, borrar, buscar -->
    <?php $botones ?>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'><!-- cabecera ajustada -->
          <div class='panel-group menu-inicio'>
            <div class='panel panel-default'>
              <div class='panel-heading'>
                <h2 align='center'>Buscar citas</h2>
              </div>
              <div class='panel-body'>
                <p align='center'>Rellene el campo o campos por los que quiere realizar la búsqueda</p>
                  <form class='form-horizontal' action='#' method='post' accept-charset='utf-8'>
                    <div class='form-group'>
                      <label class=' col-sm-3'>Fecha:</label>
                      <div class='col-sm-7'>
                        <input class='form-control' type='date' name='fecha' autofocus>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-4'>Nombre del cliente:</label>
                      <select class='form-control' name='id_cliente'>
                      <?php 
                          $conexion = abrirConexion();
                          $consulta = "SELECT id, nombre, apellidos FROM tbl_clientes";
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
                    <div class='form-group'>
                      <div class='col-sm-12'>
                        <input class='form-control btn-theme' type='submit' name='buscar_cita' value='Buscar'>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
       
         
        </div>
        <div class='col-xs-12 col-md-8 col-md-offset-2'>
        <?php Cita::buscar_cita(); ?>
        </div>
      </div>
    </div>
  
   

    <!-- footer -->
    <?php Interfaz::footer();?>

    <script src="../js/validar_buscar_noticia.js"></script>
  </body>
</html>
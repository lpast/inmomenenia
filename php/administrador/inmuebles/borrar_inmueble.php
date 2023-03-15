<?php
 session_start();
 include "../../../php/includes/dbconnect.php";
 include "../../../php/class/administrador.php";
 include "../../../php/class/inmueble.php";
 include "../../../php/funciones.php";
 comprobarAdmin();
 $menu = Administrador::menuAdmin();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Borrar Inmueble </title>
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
          <?php Administrador::gestion_inmuebles(); ?>
        </div>
      </div>
    </div>
  <div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
        <div class='panel-group'>
          <div class='panel panel-default menu-inicio'>
            <div class='panel-heading'>
              <h2 align='center'>Borrar inmueble</h2>
              <p align='center'>Seleccione el inmueble que desea borrar</p>
            </div>
            <div class='panel-body'>
              <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                <div class='form-group'>
                  <div class='col-xs-12'>
                    <?php
                      $conexion = abrirConexion();
                      $consulta = "SELECT id, calle, portal, imagen FROM tbl_inmuebles";

                      $datos = mysqli_query($conexion, $consulta);

                      if (!$datos) {
                        echo "Error!! No se han podido cargar los datos del inmueble";
                      } else {
                        echo "<div class='col-xs-12'>";
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-striped tnoticias'";
                        echo "<thead><tr><th>id</th><th>Dirección</th><th>Imagen</th><th>¿Eliminar?</th></tr></thead>";
                        while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
                          echo "<tbody><tr><td>$fila[id]</td><td>$fila[calle], $fila[portal]</td><td><img src='../../../media/img/img_inmuebles/$fila[imagen]' style='width:150px'></td>
                          <td><form action='#' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-danger' type='submit' name='borrar' value='Eliminar'></form></td></tr></tbody>";
                        }
                        echo "</div></table></div>";
                      }
                      mysqli_close($conexion);
                    ?>
                  </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php Inmueble::borrar_inmueble(); ?>
    <div class="col-xs-4 col-md-6 col-sm-10">
      <p align='center'><a class='btn btn-theme' href='clientes.php'>Volver a Cartera de Inmuebles</b></a></p>
    </div>
    <?php footer(); ?> 
</body>
</html>

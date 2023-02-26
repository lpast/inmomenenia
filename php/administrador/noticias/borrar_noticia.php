<?php 
   session_start();
   include "../../../php/dbconnect.php";
   include "../../../php/class/interfaz.php";
   include "../../../php/class/administrador.php";
   include "../../../php/class/noticia.php";
   include "../../..//php/funciones.php";
 
   comprobarAdmin();
   $menu = Administrador::menuAdmin();
   $botones = Administrador::gestion_noticias();
   $footer = Interfaz::footer();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Borrar Cita</title>
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
    <div class='container-fluid cabecera-menu-inicio'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
          <div class='panel-group'>
            <div class='panel panel-default'>
              <div class='panel-heading'>
                <h2 align='center'>Borrar una noticia</h2>
              </div>
              <div class='panel-body'>
                <p align='center'>Seleccione el inmueble que desea borrar</p>
                <?php
                  $conexion = abrirConexion();
                  $consulta = "SELECT id, titular from tbl_noticias";

                  $datos = mysqli_query($conexion, $consulta);

                  if (!$datos) {
                    echo "Error, no se han podido cargar los datos de las noticas";
                  } else {
                    echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2'>";
                    echo "<table class='table table-striped'";
                    echo "<thead><tr><th>ID</th><th>Titular</th><th>¿Eliminar?</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[id]</td><td>$fila[titular]</td>
                      <td><form action='#' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-danger' type='submit' name='borrar' value='Eliminar'></form></td></tr></tbody>";
                    }
                    echo "</table>
                      <a align='center' href='noticias.php' class='btn btn-danger'>Cancelar</a>
                    </div>";
                  }
                  mysqli_close($conexion);
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php Noticia::borrar_noticia(); ?>

   <!-- footer -->
   <?php $footer?> 
  </body>
</html>
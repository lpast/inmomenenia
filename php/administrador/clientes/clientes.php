<?php session_start(); 
  include "../../../php/dbconnect.php";
  include "../../../php/class/interfaz.php";
  include "../../../php/class/usuario.php";
  include "../../../php/class/administrador.php";
  include "../../../php/class/cliente.php";
  include "../../../php/funciones.php";

  comprobarAdmin();

  $menu = Administrador::menuAdmin();
  $botones = Administrador::gestion_clientes();
 
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes</title>
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
    
    <!-- Muestra una tabla con los clientes almacenados en la BD -->
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 lista-clientes'>
          <h2 class='margen-citas' align='center'>Listado de clientes</h2>
          <div class='panel panel-default'>
            <div class='panel-body'>
              <div class='table-responsive'>
                <div class='table table-striped'>
                  <?php
                    $conexion = abrirConexion();
                    $consulta = "SELECT id, tipo, nombre, apellidos  ,telefono, email, localidad from tbl_clientes order by id";
                    $datos = mysqli_query($conexion, $consulta);

                    if (!$datos) {
                      echo "No hay datos que mostrar";
                    } else {
                      $num_filas = mysqli_num_rows($datos);

                      if ($num_filas == 0) {
                        echo "No hay clientes";
                      } else {
                        $clientes_registrados = $num_filas;
                        echo "<p><strong>Número de clientes:</strong> $clientes_registrados</p>";
                        echo "<table class='table table-hover'";
                        echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Contacto</th><th>Modificar</th></tr></thead>";
                        while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
                          echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td>
                              <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                        }
                      }
                    }
                    mysqli_close($conexion);
                    
                  ?>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
    <?php  $footer = Interfaz::footer(); ?>
  </body>
</html>
    
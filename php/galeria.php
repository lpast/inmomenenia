<?php 
     include "../php/dbconnect.php";
     include "../php/class/interfaz.php";
     include "../php/funciones.php";
     session_start(); 

  ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InmoMenenia</title>
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- Mi CSS -->
    <link rel="stylesheet" href="../css/estilos.css" media="screen">
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (se pueden
         incluir archivos JavaScript individuales de los únicos
         pluginps que se utilicen) -->
         <scrit src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
  </head>
  <body>
    
    <!-- Menú de navegación -->
    <?php $tipoMenu=Interfaz::mostrarTipoMenu(); ?>

    <!-- Se muestran los inmuebles comprados por el usuario -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 menu-inicio">
          <h2 align="center" style="margin-top: 50px;">Todos estos inmuebles están disponibles</h2>
          <?php 
            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_inmuebles";
            $consulta = mysqli_query($con,$sql);

            if (!$consulta) {
              echo "Error al realizar la consulta";
            } else {
              $num_filas = mysqli_num_rows($consulta);
              if ($num_filas == 0) {
                echo "<div class='alert alert-warning warning-new col-sm-6 col-sm-offset-3' align='center'>
                        <h2>Ups... ahora mismo no tenemos ningún inmueble disponible :(</h2>
                      </div>";
              } else {
                while ($fila = mysqli_fetch_array($consulta,MYSQLI_ASSOC)) {
                  echo "<div class='col-sm-4'>";
                  echo "<div class='panel panel-default'>";
                  echo "<div class='panel-body tnoticias'>";
                  echo "<img class='img-responsive' src='$fila[imagen]'>
                        <h2>$fila[direccion]</h2>
                        <h4>$fila[precio] €</h4>
                        <form action='./inmuebles/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-info' type='submit' name='ver' value='Ver inmueble'></form>"; //info inmueble
                  echo "</div></div></div>"; //cierre de col-sm, panel,panel-body
                }

              }
            }
            mysqli_close($con);
           ?>
        </div>
      </div>
    </div>

    <!-- footer -->
    <footer class="navbar-nav navbar-inverse">
      <p align="center"><a class="aweb" href="../inmobiliaria/php/mapa_web.php">Mapa web</a> | Estamos en Av. Doctor Oloriz, 6 (Granada) | Teléfono: 611622633 | Email: info@inmobiliaria.com</p>
    </footer>
  </body>
</html>
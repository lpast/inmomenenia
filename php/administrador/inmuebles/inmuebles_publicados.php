<?php
 session_start();
 include "../../../php/dbconnect.php";
 include "../../../php/class/interfaz.php";
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
    <title>Inmuebles Publicados</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
      <!-- Mi CSS -->
      <link rel="stylesheet" href="../../../css/estilos.css" media="screen">
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php $menu ?>
    <div class="container-fluid">
      <div class="row">
        <!-- Mostramos publicaciones de inmuebles -->
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
          <h1 align="center">Estos son los anuncios de los inmuebles publicados</h1>
          <?php Administrador::gestion_inmuebles(); ?>
        </div>
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
          <?php
            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_inmuebles";
            $consulta = mysqli_query($con, $sql);
      
            if (!$consulta) {
              echo 'Error al realizar la consulta';
            } else {
              $num_filas = mysqli_num_rows($consulta);
              if ($num_filas == 0) {
                echo "<div class='alert alert-warning warning-new col-sm-6 col-sm-offset-3' align='center'>
                  <h2>Ups... ahora mismo no tenemos ningún inmueble disponible :(</h2>
                </div>";
              } else {
                while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                  $_SESSION['id_inmueble'] = $fila['id'];
                  echo "<div class='col-sm-4'>
                    <div class='panel panel-default'>
                      <div class='panel-body tnoticias'>
                        <img class='img-responsive' src='../../../media/img/img_inmuebles/$fila[imagen]' alt='img-inmuble'>
                        <h2 align ='center'><span style='background-color: #baa35f'; 'color:black;'>$fila[titular]</span></h2>
                        <h3 align ='center'>$fila[calle]</h3>
                        <h4 align ='center' style='padding-bottom:15px'>$fila[localidad]</h4>
                          <div class ='iconos' align ='center' style='padding-top:5px  font-size:30px'>
                            <img src='../../../media/iconos/ducha.png' alt='banos-inmueble' width='50px'><b> $fila[num_banos]</b>
                            <img src='../../../media/iconos/dormitorio.png' alt='habitaciones-inmomenenia' width='50px' style='margin-left:45px'><b>$fila[num_hab]</b>
                            <img src='../../../media/iconos/metros.png' alt='metros-inmomenenia' width='50px' style='margin-left:45px'><b>$fila[metros] m<sup>2</sup></b>
                            <img src='../../../media/iconos/euro.png' alt='precio-inmueble' width='50px' style='margin-left:45px'><b>$fila[precio] €</b>
                          </div>
                        <h4 align ='center'>$fila[descripcion]</h4>
                        <form action='../../../php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme ' type='submit' name='ver' value='Ver inmueble'></form>
                      </div>
                    </div>
                  </div>";
                }
        
              }
            }
            mysqli_close($con);
          ?>
        </div>
      </diV>
    </diV>

    <?php footer(); ?> 
  </body>
</html>
<?php 
    session_start();
    include "dbconnect.php";
    include "class/interfaz.php";
    include "funciones.php";

  
  ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inmuebles</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
      <!-- Mi CSS -->
      <link rel="stylesheet" href="../css/estilos.css" media="screen">
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="../js/favoritos.js"></script>
  </head>
  <body>
    <?php $tipoMenu = Interfaz::mostrarMenu();  ?>
    <div class="container-fluid">
      <div class="row">
        <!-- Mostramos los inmuebles disponibles -->
        <div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio tinmuebles'>
          <h1 align="center">Ahora mismo, estos son los inmuebles están disponibles</h1>
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

                echo "<div class='col-sm-4'>";
                echo "<div class='panel panel-default'>";
                echo "<div class='panel-body tnoticias'>";
                echo "<img class='img-responsive' src='../media/img/img_inmuebles/$fila[imagen]' alt='img-inmuble'>
                      <h2 align ='center'><span style='background-color: #baa35f'; 'color:black;'>$fila[titular]</span></h2>";
      
                      if (isset($_SESSION['tipo'])) {
                        if (isset($_SESSION['id_usuario'])) {
                          $tipo_usuario = $_SESSION['tipo'];
                          $id_usuario = $_SESSION['id_usuario'];
                          
                          if ($tipo_usuario == 'u') {
                            $incremento = "SELECT auto_increment from information_schema.tables WHERE table_schema='dbbrhgswov0fge' and table_name='tbl_favoritos'";
                  
                            $datos = mysqli_query($con, $incremento);
                            $array = mysqli_fetch_array($datos, MYSQLI_NUM);
                            
                            echo "<div class='favorito'>
                              <form action='#' method='post'>
                                <td><input type='hidden' id='id_favorito' name='id_favorito' value = $array[0] ></td>
                                 
                                <td><input type='hidden' id='id_usuario' value='$_SESSION[id_usuario]'></td>
                                <td><input type='hidden' id='id_inmueble' value='$_SESSION[id_inmueble]'></td>
                  
                  
                                <button class='button button5'><img id='no_favorito' src='../media/iconos/no-favorito.png' alt='btn-favoritos' width='30px'>
                                  <a href='#' id='nuevo_favorito' type='submit' name='nuevo_favorito'> Añadir favorito</a></button>
                                </form>";
                                echo "$_SESSION[id_favorito]";
                                echo "$_SESSION[id_usuario]";
                                echo "$_SESSION[id_inmueble]";
                              
                              nuevo_favorito();
                            echo "</div>";
                          }
                        }
                      }
                echo "<h3 align ='center'>$fila[calle]</h3>
                      <h4 align ='center' style='padding-bottom:15px'>$fila[localidad]</h4>
                        <div class ='iconos' align ='center' style='padding-top:5px  font-size:30px'>
                        <img src='../media/iconos/ducha.png' alt='banos-inmueble' width='50px'><b> $fila[num_banos]</b>
                        <img src='../media/iconos/dormitorio.png' alt='habitaciones-inmomenenia' width='50px' style='margin-left:45px'><b>$fila[num_hab]</b>
                        <img src='../media/iconos/metros.png' alt='metros-inmomenenia' width='50px' style='margin-left:45px'><b>$fila[metros] m<sup>2</sup></b>
                        <img src='../media/iconos/euro.png' alt='precio-inmueble' width='50px' style='margin-left:45px'><b>$fila[precio] €</b>
                      </div>
                      <h4 align ='center'>$fila[descripcion]</h4>
                      <form action='../php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme ' type='submit' name='ver' value='Ver inmueble'></form>"; //info inmueble
                echo "</div></div></div>"; //cierre de col-sm, panel,panel-body
              }
      
            }
          }
          mysqli_close($con);
          echo "</div>";
          echo "</div>";
          echo "</div>";

        $disponibles = Interfaz::inmuebles_disponibles(); ?>
        </div>
      </diV>
    </diV>

    <?php $footer = Interfaz::footer();   ?> 
  </body>
</html>
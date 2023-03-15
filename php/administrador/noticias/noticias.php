<?php 
  session_start(); 
  include "../../../php/includes/dbconnect.php";
  include "../../../php/class/usuario.php";
  include "../../../php/class/administrador.php";
  include "../../../php/class/cita.php";
  include "../../../php/funciones.php";
  comprobarAdmin();
  $menu = Administrador::menuAdmin();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Noticias</title>
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
          <h1 class='margen-noticias ' align='center'>Actualidad Inmobiliaria</h1>
          <?php Administrador::gestion_noticias(); ?>
        </div>
      </div>
    </div>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 tnoticias'>
          <?php
            $conexion = abrirConexion();
            $consulta = "SELECT * from tbl_noticias";
  
            $noticias = mysqli_query($conexion, $consulta);
  
            if (!$noticias) {
              echo "Error al cargar las noticias desde la BD";
            } else {
              $num_filas = mysqli_num_rows($noticias);
              if ($num_filas > 0) {
                $num_noticas = 5; //limite de noticias a mostrar
                $pagina = false;
              }
  
              if (isset($_GET['pagina'])) {
                $pagina = $_GET['pagina'];
              }
  
              if (!$pagina) {
                $inicio = 0;
                $pagina = 1;
              } else {
                $inicio = ($pagina - 1) * $num_noticas;
              }
  
              $consulta_mostrar = "SELECT * from tbl_noticias order by fecha desc limit $inicio,$num_noticas";
  
              $mostrar = mysqli_query($conexion, $consulta_mostrar);
  
              if (!$mostrar) {
                echo "Error al cargar las noticias desde la BD";
              } else {
                while ($fila = mysqli_fetch_array($mostrar, MYSQLI_ASSOC)) {
                  $marca_cita = strtotime($fila['fecha']);
                  $f_formateada = date("d-m-Y", $marca_cita);
                  //muestro info de noticia
                  echo "<div class='panel-body tnoticias'>
                    <div class='petit-noticias' style=align='center'>
                      <img src='../../../media/img/img_noticias/$fila[imagen]' alt='img_noticia' >
                    </div>
                    <h3 align='center'><b>$fila[titular]</b></h3>
                    <p align='center'>Fecha de publicación: $f_formateada</p>
                    <p class='texto'>$fila[contenido]<p>
                    <form action='../../../php/ver_noticia.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver más'></form>";
                  echo "</div>";
                }
              }
              mysqli_close($conexion);
            }
          ?>
        </div>
      </div>
    </div>
    <?php
      if (isset($_SESSION['tipo'])) {
        $tipo_usuario = $_SESSION['tipo'];
        if ($tipo_usuario == 'a') {
          echo "<div class='container-fluid'>
            <div class='row'>
              <ul class='pager'>
                <li><a href='noticias.php?pagina=".($pagina - 1)."'>Atrás</a></li>
                <li><a href='noticias.php?pagina=".($pagina + 1)."'>Siguiente</a></li>
              </ul>
            </div>
          </div>";
        }
      }  
    ?>
    <div class="col-xs-4 col-md-6 col-sm-10">
      <p align='center'><a class='btn btn-theme' href='citas.php'>Volver a Agenda</b></a></p>
    </div>
    <?php footer(); ?> 
  </body>
</html>
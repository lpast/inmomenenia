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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver Noticia</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
      <!-- Mi CSS -->
      <link rel="stylesheet" href="../css/estilos.css" media="screen">
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>
    
    <!-- Menú de navegación -->
    <?php $menu = Interfaz::mostrarMenu(); ?>

    <!-- Muestro imagen de un inmueble aleatorio -->
    <?php $aleatoria = Interfaz::form_buscar_Inmuebles() ?>
    <?php buscar_Inmuebles(); ?>
         
   

</div>
      </div>     
  </div>
    <footer>
      <?php include_once('footer.php');	?>
  </footer>    
  </body>
</html>
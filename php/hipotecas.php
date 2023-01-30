<?php 
     include "../php/dbconnect.php";
     include "../php/class/interfaz.php";
     include "../php/funciones.php";
     session_start(); 

  ?>
<!DOCTYPE html>
<html lang="es">
  <head>
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
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="../js/calcula_hipoteca.js"></script>
    <style>
form {width:250px;}
form>div>span {width:100px;display: inline-block;text-align:left;}
form input {width:150px;}
form>div {text-align:center;}
table>tr>th, table>tr>td {text-align:right;}
</style>
  </head>
  <body>
    <head>
      <!-- Menú de navegación -->
      <?php $menu = Interfaz::mostrarMenu(); ?>
    </head>
    
    <section>
        <div class = 'hipotecas'>
        <!-- Se muestran las citas comprados por el usuario -->
        <?php $hipoteca = Interfaz::form_hipoteca(); ?>
      </div>
    </section>
    
    
    <!-- footer -->
   <footer class="navbar-nav navbar-inverse">
      <p align="center"><a class="aweb" href="../inmomenenia/php/mapa_web.php">Mapa web</a> |  Teléfono: 692605414 | Email: info@inmomenenia.com</p>
    </footer>
  </body>
</html>
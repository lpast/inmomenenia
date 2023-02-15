<?php 
session_start();
include "dbconnect.php";
include "class/interfaz.php";
include "funciones.php";

if (isset($_POST['acceder'])) {
  $usuario = $_POST['nick'];
  $pass = $_POST['password'];

  $con = abrirConexion();
  $sql = "SELECT * FROM tbl_usuarios WHERE nom_user='$usuario' and pass='$pass'";

  $consulta = mysqli_query($con,$sql);

  if ($consulta) {
    if (mysqli_num_rows($consulta) > 0) {
      $fila = mysqli_fetch_array($consulta,MYSQLI_ASSOC);
      $_SESSION['id_usuario'] = $fila['id'];

      if ($usuario == 'administrador') {
        $_SESSION['tipo'] = 'a';
        $_SESSION['nombre'] = 'Administrador';
      } else {
        $_SESSION['tipo'] = 'u';
        $_SESSION['nombre'] = $fila['nombre'].' '.$fila['apellidos'];
      }

      if (isset($_POST['check'])) {
        $datos = session_encode();
        setcookie('datos', $datos, time()+(15*24*60*60), '/');
      }

      echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
                      <strong>¡Acceso correcto!</strong> 
                    </div>";

              echo "<META HTTP-EQUIV='REFRESH'CONTENT='1; URL=home.php'>";

    } else {
      echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Usuario o contraseña incorrectos</h4>
                </div></div></div>";
    }
  } else {
    echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Usuario o contraseña incorrectos</h4>
                </div></div></div>";
  }

}

 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acceso</title>
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
    <style>
      body{
        background-image: url("../media/img/img_inmuebles/bbk_buhardilla_0890.jpeg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
      </style>
  </head>
  <body>
      <?php abrirConexion();?>
      <!-- Menú de navegación --> 
      <?php $menu = Interfaz::mostrarMenu(); ?>
  
    
  <!-- footer -->
    <?php $acceso = Interfaz::formulario_acceso(); ?>    
    
      <!-- footer -->
      <?php $footer = Interfaz::footer(); ?> 
  </body>
</html>
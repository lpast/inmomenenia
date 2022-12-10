<?php 
  include "../php/dbconnect.php";
  include "../php/funciones.php";
  session_start();

  if ($_SESSION['tipo'] == 'u') {
   echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
  } else if ($_SESSION['tipo'] == 'a') {
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
  } else {

  }

  if (isset($_POST['acceder'])) {
    $usuario = $_POST['nick'];
    $pass = $_POST['password'];

    //$bd01 = bd01($bd01($pass));

    $con = abrirConexion();
    $sql = "SELECT id, nombre, apellidos, nom_user FROM tbl_clientes WHERE nom_user='$usuario' and pass='$pass'";

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

                echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=../index.php'>";

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
    <title>Acceder</title>
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
    <nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
          <div class='container-fluid'>
            <div class='navbar-header'>
              <button type="button" class="n-resp navbar-toggle " data-toggle="collapse" data-target="#nav-responsive">
                <span class="icon-bar b-resp"></span>
                <span class="icon-bar b-resp"></span>
                <span class="icon-bar b-resp"></span>                        
              </button>
              <a href='../index.php'><img src='../logo.jpeg' alt='inmobiliaria' width='20%'></a>
            </div>
            <div class="collapse navbar-collapse" id="nav-responsive">
            <ul class='nav navbar-nav navbar-right'>
              <li><a href='galeria.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
              <li><a href='contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
              <li><a href='ubicacion.php'><span class='glyphicon glyphicon-envelope'></span> Ubicacion</a></li>
              <li class='active'><a href='../index.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
            </ul>
            </div>
          </div>
    </nav>
    
    <!-- Formulario de acceso -->
    <div class='container-fluid cabecera-form-cli'>
      <div class='row'>
        <div class='col-sm-6 col-sm-offset-3'>
          <h2 align='center'>Acceder a la aplicación</h2>
          <div class='panel panel-default '>
            <div class='panel-body'>
              <form action="#" method="post" class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-3 col-sm-offset-2">Usuario</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="nick">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-sm-offset-2">Contraseña</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="password" name="password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-sm-offset-2">¿Mantener sesión abierta?</label>
                  <div class="checkbox">
                  <input type="checkbox" value="open" name="check">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-2">
                    <input class="form-control btn-primary" type="submit" name="acceder" value="Acceder">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <footer class="navbar-nav navbar-inverse">
    </footer>
  </body>
</html>
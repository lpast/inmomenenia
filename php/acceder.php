<?php 
  session_start();
  include "dbconnect.php";
  include "class/usuario.php";
  include "class/administrador.php";
  include "funciones.php";

  /*if ($_SESSION['tipo'] == 'u') {
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../php/home.php'>";
   } else if ($_SESSION['tipo'] == 'a') {
     echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../php/home.php'>";
   } else {
    //echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../php/home.php'>";
   }
   */
 try {
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
            $_SESSION['nombre'] = $fila['nombre'];
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
          throw new Exception ('Usuario o contraseña incorrectos');
          echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
            <h4><strong>¡Error!</strong> Usuario o contraseña incorrectos</h4>
          </div>";
        }
      } else {
        throw new Exception ('Usuario o contraseña incorrectos');
        return $consulta;
      }
    }
  } catch (Exception $e) {
    echo "('Error' . $e->GetMessage())";
    return $consulta;
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
  <head>
    <meta charset="utf-8">
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
  </head>
  <body>
    <?php mostrarMenu(); ?>

    <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
          <div class='jumbotron'>
            <h1 style='margin-bottom:35px' align='center'>ACCESO</h1>
            <div class='panel panel-default'>
              <div class='panel-body'>
                <form action='#' method='post' class='form-horizontal'>
                  <div class='form-group'>
                    <h3><label class='col-sm-3 col-sm-offset-2'>Usuario</label></h3>
                      <div class='col-sm-6'>
                        <input class='form-control' type='text' name='nick' required>
                      </div>
                    </div>
                  <div class='form-group'>
                    <h3><label class='col-sm-3 col-sm-offset-2'>Contraseña</label></h3>
                      <div class='col-sm-6'>
                        <input class='form-control' type='password' name='password' required>
                      </div>
                  </div>
                  <div class='form-group'>
                    <div class='checkbox'>
                      <input class='form-control' type='checkbox' value='open' name='check'>
                    </div>
                    <div>
                      <h4><label class='col-sm-4 col-sm-offset-2'>Mantener la sesión abierta </label></h4>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-9 col-sm-offset-2'>
                      <input class='form-control btn-theme' type='submit' name='acceder' value='Acceder'>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php  footer(); ?>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../../../js/validar_contacto.js"></script>
        
  </body>
</html>
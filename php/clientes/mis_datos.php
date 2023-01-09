<?php 
        require_once "../../php/dbconnect.php";
        require_once "../../php/class/interfaz.php";
        require_once "../../php/funciones.php";
        session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
  <head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis datos personales</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <!-- Mi CSS -->
    <link rel="stylesheet" href="../../css/estilos.css" media="screen">
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>
    <!-- Menú de navegación -->
    <?php $menu = Interfaz::mostrarMenu(); ?>

    
     <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio">
          <h2 align="center" style="margin-top: 50px;">Estos son tus datos de cliente</h2>
          
            <p align="center"><b>Podrás modificar tu dirección, teléfono o contraseña</b></p>
            <?php 

              $id = $_SESSION['id_usuario'];
              //echo $id;

              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE id='$id'";

              $consulta = mysqli_query($con,$sql);

              if (!$consulta) {
                echo "Error al hacer la consulta en BD... :(";
              } else {
                $fila = mysqli_fetch_array($consulta,MYSQLI_ASSOC);
                $nombre = $fila['nombre'];
                $apellidos = $fila['apellidos'];
                $direccion = $fila['direccion'];
                $telefono = $fila['telefono'];
                $email = $fila['email'];
                $usuario = $fila['nom_user'];
                $pass = $fila['pass'];
              }

             ?>
              <form action="#" method="post" accept-charset="utf-8">
                <div class="panel panel-default">
                 <div class="panel-body">
                   <div class="form-group">
                      <div class="col-sm-2">
                        <label>Nombre</label>
                      </div>
                      <div class="col-sm-10">
                       <input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" readonly>
                      </div>
                   </div>
                   <div class="form-group">
                      <div class="col-sm-2">
                        <label>Apellidos</label>
                      </div>
                      <div class="col-sm-10">
                       <input class="form-control" type="text" name="apellidos" value="<?php echo $apellidos; ?>" readonly>
                      </div>
                   </div>
                   <div class="form-group">
                      <div class="col-sm-2">
                        <label>Dirección</label>
                      </div>
                      <div class="col-sm-10">
                       <input class="form-control" type="text" name="direccion" value="<?php echo $direccion; ?>">
                      </div>
                   </div>
                   <div class="form-group">
                      <div class="col-sm-2">
                        <label>Teléfono </label>
                      </div>
                      <div class="col-sm-10">
                       <input class="form-control" type="text" name="telefono" value="<?php echo $telefono; ?>">
                      </div>
                   </div>
                   <div class="form-group">
                      <div class="col-sm-2">
                        <label>Email </label>
                      </div>
                      <div class="col-sm-10">
                       <input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
                      </div>
                   </div>
                   <div class="form-group">
                      <div class="col-sm-2">
                        <label>Usuario</label>
                      </div>
                      <div class="col-sm-10">
                       <input class="form-control" type="text" name="usuario" value="<?php echo $usuario; ?>" readonly>
                      </div>
                   </div>
                   <div class="form-group">
                      <div class="col-sm-2">
                        <label>Contraseña</label>
                      </div>
                      <div class="col-sm-10">
                       <input class="form-control" type="text" name="password" placeholder="Si desea cambiar su contraseña escriba una nueva aquí">
                      </div>
                   </div>
                   <div>
                     <br>.
                   </div>
                   <div class="form-group">
                    <div class="col-sm-12 col-sm-offset-4">
                      <div class="col-sm-2">
                        <input class="form-control btn-primary" type="submit" name="guardar" value="Guardar">
                      </div>
                      <div class="col-sm-2">
                        <a href="../index.php" class="btn btn-danger">Cancelar</a>
                      </div>
                    </div>
                  </div>
                 </div>
               </div>
              </form>
              
              <?php 

               if (isset($_POST['cancelar'])) {
                 echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../mis_datos.php'>";
               }

               if (isset($_POST['guardar'])) {
                 
                if ($_POST['password'] == '') {
                  $direccion = $_POST['direccion'];
                  $telefono = $_POST['telefono'];

                  $con = abrirConexion();
                  $sql = "UPDATE tbl_clientes SET direccion='$direccion', telefono='$telefono' WHERE id='$id'";

                  if (mysqli_query($con,$sql)) {
                    echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
                        <b>Datos actualizados correctamente</b> 
                      </div>";

                    echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=mis_datos.php'>";
                  } else {
                    echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se han podido actualizar los datos</h4>
                  </div></div></div>";
                  }

                } else {
                  $direccion = $_POST['direccion'];
                  $telefono = $_POST['telefono'];
                 $password = $_POST['password'];
                  
                 // $password = md5(md5($password));

                  $con = abrirConexion();
                  $sql = "UPDATE tbl_clientes SET direccion='$direccion', telefono='$telefono', pass='$password' WHERE id='$id'";

                  if (mysqli_query($con,$sql)) {
                    echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
                        <b>Datos actualizados correctamente</b> 
                      </div>";

                    echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=mis_datos.php'>";
                  } else {
                    echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se han podido actualizar los datos</h4>
                  </div></div></div>";
                  }
                }
               }
               ?>

        </div>
      </div>
    </div>

    <!-- footer -->
    <footer class="navbar-nav navbar-inverse">
      <p align="center">Estamos en Av. Doctor Oloriz, 6 (Granada) | Teléfono: 611622633 | Email: info@inmobiliaria.com</p>
    </footer>
  </body>
</html>
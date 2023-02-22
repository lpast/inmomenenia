<?php

class Usuario { 

  public static function comprobarUsuario() {
    if (isset($_SESSION['tipo'])) {
      if ($_SESSION['tipo'] != 'u') {
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../php/home.php'>";
      }
      
    } else if ($_COOKIE['datos']) {
        session_decode($_COOKIE['datos']);
        if ($_SESSION['tipo'] != 'u') {
          echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../php/home.php'>";
        }
    } else {
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../php/home.php'>";
    }
  }

  function registrarse() {
    if (isset($_POST['cancelar'])) {
      header("url=../index.php");
    }
  
    if (isset($_POST['nuevo_usuario'])) {
      $id = $_POST['id'];
      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $telefono = $_POST['telefono'];
      $email = $_POST['email'];
      $fecha_alta = $_POST['fecha_alta'];
      $nom_user = $_POST['nom_user'];
      $pass = $_POST['pass'];
  
      $conexion = abrirConexion();
  
      $sql = "INSERT INTO tbl_usuarios (id, nombre, apellidos, telefono, email, fecha_alta, nom_user, pass) VALUES
      ('$id', '$nombre', '$apellidos', '$telefono', '$email', '$fecha_alta', '$nom_user', '$pass')";
  
      $datos = mysqli_query($conexion, $sql);
      echo $datos;
      
      if ($datos) {
        echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
                <strong>Datos guardados correctamente</strong>  
              </div>";
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=acceder.php'>";
      } else {
        echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                <h4><strong>¡Error!</strong>No ha sido posible el registro</h4>
              </div></div></div>";
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=home.php'>";
      }
      mysqli_close($conexion);
    }
  }
      

  

  static public function gestion_usuario(): bool {
    echo "<div class='col-xs-12 col-sm-12 col-md-10 '>
      <nav class='navbar'>
        <div class='container-fluid'>
          <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
            <li><a type='button' class='btn btn-theme' href='../php/usuarios/buscar_inmuebles.php'> Buscar Inmuebles</a></li>
            <li><a type='button' class='btn btn-theme' href='../php/usuarios/mis_inmuebles.php'> Ver mis inmuebles</a></li>
            <li><a type='button' class='btn btn-theme' href='../php/usuarios/mis_citas.php'> Ver mis citas</a></li>
          </ul>
        </div>
      </nav>
    </div>";
    return true;
  }

  function gestion_datos_usuario(): bool {
    if (isset($_POST['cancelar'])) {
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=area_personal.php'>";
    }
    if (isset($_POST['guardar'])) {
      if ($_POST['pass'] == '') {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $calle = $_POST['calle'];
        $portal = $_POST['portal'];
        $piso = $_POST['piso'];
        $puerta = $_POST['puerta'];
        $localidad = $_POST['localidad'];
        $cp = $_POST['cp'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $nom_user = $_POST['nom_user'];
  
        $con = abrirConexion();
        $sql1 = "UPDATE tbl_usuarios 
        SET nombre='$nombre', apellidos='$apellidos', telefono='$telefono', email='$email',
         nom_user='$nom_user' WHERE id='$id'";
  
        $sql2 = "UPDATE tbl_clientes SET calle='$calle', portal='$portal', piso='$piso', puerta='$puerta', cp='$cp', localidad='$localidad'
        WHERE id='$id'";
  
        if ((mysqli_query($con,$sql1)) && (mysqli_query($con,$sql2) )) {
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
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $calle = $_POST['calle'];
        $portal = $_POST['portal'];
        $piso = $_POST['piso'];
        $puerta = $_POST['puerta'];
        $localidad = $_POST['localidad'];
        $cp = $_POST['cp'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $nom_user = $_POST['nom_user'];
        $pass = $_POST['pass'];
  
        $con = abrirConexion();
        $sql1 = "UPDATE tbl_usuarios 
        SET nombre='$nombre', apellidos='$apellidos', telefono='$telefono', email='$email',
         nom_user='$nom_user' WHERE id='$id'";
  
        $sql2 = "UPDATE tbl_clientes SET calle='$calle', portal='$portal', piso='$piso', puerta='$puerta', cp='$cp', localidad='$localidad'
        WHERE id='$id'";
  
        if ((mysqli_query($con,$sql1)) && (mysqli_query($con,$sql2) )) {
          echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
              <b>Datos 1 actualizados correctamente</b> 
            </div>";
          echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=mis_datos.php'>";
        } else {
          echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
          <h4><strong>¡Error!</strong> No se han podido actualizar los datos</h4>
        </div></div></div>";
       }
     }
    }
    return true;
  }

  static public function area_personal(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>";
        if (isset($_SESSION['tipo'])) {
          $tipo_usuario = $_SESSION['tipo'];
          if ($tipo_usuario == 'u') {
            $nombre = $_SESSION['nombre'];
            //Mostramos una imagen aleatoria 
            echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio '>
                    <h1 align='center'> ¡ Hola $nombre ! </h1>
                    <h2 align='center'> ¿Qué quieres hacer?</h2>
                    <div class ='col-md-6'>
                      <ul>
                        <lo><a href='../usuarios/mis_datos.php'><img src='../../media/iconos/mis-datos.png' alt='logo-mis-datos' width='150px' align='center'>
                        <h2> Ver mis datos </h2></a></lo>

                        <lo><a href='../usuarios/mis_inmuebles.php'><img src='../../media/iconos/house.png' alt='logo-mis-inmuebles' width='150px' align='center'>
                        <h2> Ver mis inmuebles </h2></a></lo>
                      </ul>
                      
                    </div>
                    <div class ='col-md-6'>
                    <ul>
                        <lo><a href='../usuarios/mis_citas.php'><img src='../../media/iconos/calendar.png' alt='logo-mis-citas' width='150px' align='center'>
                        <h2>Ver mis citas </h2></a></lo>

                        <lo><a href='../usuarios/mis_favoritos.php'><img src='../../media/iconos/mis-favoritos.png' alt='logo-mis-favoritos' width='150px' align='center'>
                        <h2>Ver mis favoritos </h2></a></lo>
                      </ul>
                    </div>
                  </div>";
          }
        }
      echo "</div>";
    echo "</div>";


    return true;
  }

  static public function mostrarFavoritos() : bool {
    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
        <div class='tnoticias'>
          <h1 align='center''>Echa un vistazo a tus inmuebles</h1>
        </div>;
      </div>
      <div class='col-xs-12 col-sm-offset-2 col-sm-10'>";
        
          $id_usuario=$_SESSION['id_usuario'];
          $con = abrirConexion();
          $sql = "SELECT * from tbl_favoritos fav INNER JOIN tbl_inmuebles inm on fav.id_inmueble=inm.id WHERE fav.id_usuario='$id_usuario'";

          $consulta = mysqli_query($con, $sql);

          if (!$consulta) {
            echo 'Error al consultar favoritos';
          } else {
            $num_filas = mysqli_num_rows($consulta);
            if ($num_filas == 0) {
              echo "<div class='alert alert-warning warning-new col-sm-6 col-sm-offset-3' align='center'>
                      <h2>Ups... ahora mismo no tiene ningún inmueble guardado como favoritos :(</h2>
                    </div>";
            } else {
              while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
               
                echo "<div class='col-sm-4'>";
                echo "<div class='panel panel-default'>";
                echo "<div class='panel-body tnoticias'>";
                echo "<img class='img-responsive' src='../../media/img/img_inmuebles/$fila[imagen]' alt='img-inmuble'>
                      <h2 align ='center'><span style='background-color: #baa35f'; 'color:black;'>$fila[titular]</span></h2>";
                echo "<h3 align ='center'>$fila[calle]</h3>
                      <h4 align ='center' style='padding-bottom:15px'>$fila[localidad]</h4>
                      <div class ='iconos' align ='center' style='padding-top:5px  font-size:30px' padding-bottom:'50px'>
                        <h3><img src='../../media/iconos/ducha.png' alt='banos-inmueble' width='50px' style='margin-right:5px'><b> $fila[num_banos]</b>
                        <img src='../../media/iconos/dormitorio.png' alt='habitaciones-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b>  $fila[num_hab]</b><h3>
                        <h3><img src='../../media/iconos/garaje.png' alt='garaje-inmueble' width='50px' style='margin-right:5px'><b>  $fila[garaje]</b>
                        <img src='../../media/iconos/jardin.png' alt='jardin-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $fila[jardin]</b>
                        <img src='../../media/iconos/piscina.png' alt='piscina-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b>  $fila[piscina]</b><h3>
                        <h3><img src='../../media/iconos/estado.png' alt='estado-inmueble' width='50px' style='margin-right:5px'><b> $fila[estado]</b>
                        <img src='../../media/iconos/tipo.png' alt='tipo-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $fila[tipo]</b><h3>
                        <h3><img src='../../media/iconos/metros.png' alt='metros-inmueble' width='50px' style='margin-right:5px'><b>  $fila[metros] m<sup>2</sup></b>
                        <img src='../../media/iconos/euro.png' alt='precio-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b>  $fila[precio] €</b><h3>
                      </div>
                      <h4 align ='center'>$fila[descripcion]</h4>
                      <form action='../php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme ' type='submit' name='ver' value='Ver inmueble'></form>"; //info inmueble
                echo "</div></div></div>"; //cierre de col-sm, panel,panel-body
              }
            }
          }
          mysqli_close($con);
        echo "</div>
      </div>";
      echo "<div style='padding-top:15px'>
      <p align='center'><a class='btn btn-theme' href='../../php/usuarios/area_personal.php'>Volver</b></a></p>
    </div>";
    return true;
  }

  function nuevo_favorito(): bool  {/***** MEJORA ******/
    if (isset($_POST['nuevo_favorito'])) {
      $id = $_POST['id'];
      $id_inmueble = $_POST['id_inmueble'];
      $id_usuario = $_SESSION['id_usuario'];
  
      $conexion = abrirConexion();
      $insertar = "INSERT into tbl_favoritos (id_favorito, id_usuario, id_inmueble) VALUES
        ('$id', '$id_usuario', $id_inmueble)";
        
        if(mysqli_query($conexion, $insertar)) {
          "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
            <h4><strong>Favorito añadido</h4>
          </div></div></div>";
          
        } else {
          echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
            <h4><strong>¡Error!</strong>No ha sido posible añadir el inmueble a favoritos</h4>
          </div></div></div>";
        }
      mysqli_close($conexion);
    }
    return true;
  }

  static public function img_aleatoria(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
          <h1 align='center'> Encuentra lo que necesitas </h1>
        
        </div>
        <div class='col-xs-12 col-sm-offset-2 col-sm-8 col-sm-offset-2'>";
    $conexion = abrirConexion();
    $sql = 'SELECT imagen FROM tbl_inmuebles';
    $imagenes = array();

    $imagen = mysqli_query($conexion, $sql);

    if (!$imagen) {
      echo 'Eror al cargar las imagenes';
    } else {
      while ($fila = mysqli_fetch_array($imagen, MYSQLI_ASSOC)) {
        array_push($imagenes, $fila['imagen']);
      }
    }
    mysqli_close($conexion);

    $max = count($imagenes);
    $img_aleatoria1 = rand(0, $max - 1);
    $img_aleatoria2 = rand(0, $max - 1);
    echo "<ul class='contenedor-imagenes'>
            <img src='../../media/img/img_inmuebles/$imagenes[$img_aleatoria1]' alt='Img aleatoria' class='img-rounded' style='width:1200px; height:400px; border:solid 0.5px'>
          </ul>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    return true;
  }


  static public function datos_usuario(): bool {
    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
        <h2 align='center' style='margin-top: 50px;'>Estos son tus datos de usuario</h2>
          <p align='center'><b>Podrás modificar tu dirección, teléfono o contraseña</b></p>";

            $id = $_SESSION['id_usuario'];

            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_usuarios inner join tbl_clientes ON tbl_usuarios.id = tbl_clientes.id WHERE tbl_usuarios.id='$id'";

            $consulta = mysqli_query($con, $sql);

            if (!$consulta) {
              echo 'Error al hacer la consulta en BD... :(';
            } else {
              $fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
              $id = $fila['id'];
              $tipo = $fila['tipo'];
              $nombre = $fila['nombre'];
              $apellidos = $fila['apellidos'];
              $calle = $fila['calle'];
              $portal = $fila['portal'];
              $piso = $fila['piso'];
              $puerta = $fila['puerta'];
              $cp = $fila['cp'];
              $localidad = $fila['localidad'];
              $telefono = $fila['telefono'];
              $email = $fila['email'];
              $nom_user = $fila['nom_user'];
              $pass = $fila['pass'];
            }
    echo "<form action='#' method='post' accept-charset='utf-8'>
      <div class='panel panel-default'>
        <div class='panel-body'>
          <div class='form-group'>
            <div class='col-sm-2'>
              <label>ID:</label>
            </div>
            <div class='col-sm-10'>
              <input class='form-control' type='text' name='id' value='$id' readonly>
            </div>
          </div>
          <div class='form-group'>
            <div class='col-sm-2'>
              <label>Tipo:</label>
            </div>
            <div class='col-sm-10'>
              <input class='form-control' type='text' name='tipo' value='$tipo' readonly>
            </div>
          </div>
          <div class='form-group'>
            <div class='col-sm-2'>
              <label>Nombre:</label>
            </div>
            <div class='col-sm-10'>
              <input class='form-control' type='text' name='nombre' value='$nombre' readonly>
            </div>
          </div>
          <div class='form-group'>
            <div class='col-sm-2'>
              <label>Apellidos:</label>
            </div>
            <div class='col-sm-10'>
              <input class='form-control' type='text' name='apellidos' value='$apellidos' readonly>
            </div>
          </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Calle:</label>
                </div>
                <div class='col-sm-10'>
                 <input class='form-control' type='text' name='calle' value='$calle'>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Portal:</label>
                </div>
                <div class='col-sm-10'>
                <input class='form-control' type='text' name='portal' value='$portal'>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Piso:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='piso' value='$piso'>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Puerta:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='puerta' value='$puerta'>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>CP:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='cp' value='$cp'>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Localidad:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='localidad' value='$localidad'>
                </div>
              </div>

              <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Teléfono:</label>
                  </div>
                  <div class='col-sm-10'>
                  <input class='form-control' type='text' name='telefono' value='$telefono'>
                  </div>
              </div>
              <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Email:</label>
                  </div>
                  <div class='col-sm-10'>
                  <input class='form-control' type='text' name='email' value='$email'>
                  </div>
              </div>
              <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Usuario:</label>
                  </div>
                  <div class='col-sm-10'>
                  <input class='form-control' type='text' name='nom_user' value='$nom_user'>
                  </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Contraseña:</label>
                </div>
                <div class='col-sm-10'>
                <input class='form-control' type='text' name='pass' placeholder='Si desea cambiar su contraseña escriba una nueva aqui'>
                </div>
              </div>
            <div>
              <br>
            </div>
            <div class='form-group'>
              <div class='col-sm-12 col-sm-offset-4' style='padding-top:15px'>
                <div class='col-sm-2'>
                  <input class='form-control btn-theme' type='submit' name='guardar' value='Guardar'>
                </div>
                <div class='col-sm-2' >
                  <a href='../../php/usuarios/area_personal.php' class='btn btn-danger'>Cancelar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      </div>
    </div>";
    return true;
  }



}
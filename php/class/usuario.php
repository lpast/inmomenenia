<?php

class Usuario { 

  const BASE_URL = "https://inmomenenia.com/php";


  /* Menú de navegación usuario*/
  static public function mostrarMenu(): bool {
    if (isset($_SESSION['tipo'])) {
        $tipo_usuario = $_SESSION['tipo'];
        try {
          if (!$tipo_usuario){
             throw new Exception ('No hay dato de tipo');
          }
        } catch (Exception $e) {
            die ('Error' . $e->GetMessage());
        } finally {
          if ($tipo_usuario == 'u') {
            echo "<nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
              <div class='container-fluid'>
                <div class='navbar-header'>
                  <button type='button' class='n-resp navbar-toggle' data-toggle='collapse' data-target='#nav-responsive'>
                    <span class='icon-bar b-resp'></span>
                    <span class='icon-bar b-resp'></span>
                    <span class='icon-bar b-resp'></span>
                    <span class='icon-bar b-resp'></span>
                    <span class='icon-bar b-resp'></span>                             
                  </button>
                  <a href='../../index.html'><img src='../../media/img/logo.png' alt='logo-inmomenenia' width='15%'></a>
                  </div>
                <div class='collapse navbar-collapse' id='nav-responsive'>
                <ul class='nav navbar-nav navbar-right'>
                    <li><a href='../../php/home.php'><span class='glyphicon glyphicon-log-in'></span> Inicio</a></li>
                    <li><a href='../../php/inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Cartera de Inmuebles</a></li>
                    <li><a href='../../php/hipotecas.php'><span class='glyphicon glyphicon-calendar'></span> Calcula tu hipoteca</a></li>
                    <li><a href='../../php/contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
                    <li><a href='area_personal.php'><span class='glyphicon glyphicon-calendar'></span> Área Personal</a></li>
                    <li><a href='". self::BASE_URL . "/cerrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
                  </ul>
                </div>
              </div>
            </nav>";
          }
        }
      }
    return true;
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


  static public function mis_favoritos() : bool {
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

  

  static public function mis_inmuebles(): bool {
    echo "<div class='col-xs-12 col-sm-offset-2 col-sm-10'>";
      $id = $_SESSION['id_usuario'];
      $con = abrirConexion();
      $sql = "SELECT * FROM tbl_inmuebles WHERE id_cliente='$id'";
      $consulta = mysqli_query($con, $sql);

      if (!$consulta) {
        echo "Error al realizar la consulta";
      } else {
        $num_filas = mysqli_num_rows($consulta);
        if ($num_filas == 0) {
          echo "<div class='alert alert-warning warning-new col-sm-6 col-sm-offset-3' align='center'>
            <h2>Aún no tienen ningún inmueble comprado :(</h2>
          </div>";
        } else {
          while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            echo "<div class='col-sm-4'>";
              echo "<div class='panel panel-default'>";
                echo "<div class='panel-body tnoticias'>";
                  echo "<img class='img-responsive' src='../../media/img/img_inmuebles/$fila[imagen]' alt='inmueble_cliente'>
                  <h3 align ='center'>$fila[calle]</h3>
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
                    <h3><img src='../../media/iconos/codigo-de-barras .png' alt='id-inmueble' width='50px' style= 'margin-right:5px'><b>  $fila[id] €</b>
                    <img src='../../media/iconos/calendario .png' alt='fecha-inmueble' width='50px' style='margin-right:5px'><b>  $fila[fecha_alta]</b><h3>
                    </div>
                  <h4 align ='center'>$fila[descripcion]</h4>
                  <form action='../../php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme ' type='submit' name='ver' value='Ver inmueble'></form>
                </div>
              </div>
            </div>
          </div>
          </div>";
          echo "<div style='padding-top:15px'>
              <p align='center'><a class='btn btn-theme' href='area_personal.php'>Volver</b></a></p>
            </div>";
          }
        }
      }
      mysqli_close($con);
      echo "</div>";
    return true;
  }

  static public function mis_datos(): bool {
  
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

  static function modificar_datos(): bool {
    if (isset($_POST['cancelar'])) {
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=area_personal.php'>";
    }

    if (isset($_POST['guardar'])) {
      try {
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
            echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=area_personal.php'>";
          } else {
            throw new Exception ('No se han podido actualizar los datos');
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
            throw new Exception ('No se han podido actualizar los datos');
            echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
            <h4><strong>¡Error!</strong> No se han podido actualizar los datos</h4>
          </div></div></div>";
          }
        }
      } catch (Exception $e) {
        die ('Error' . $e->GetMessage());
      }
    }
    return true;
  }

  static public function mis_citas(): bool {
    echo "
        <div class='col-xs-12 col-sm-8 col-sm-offset-2  tnoticias'>";
            $actual = date('Y-m-d');
            $marca_actual = strtotime($actual);

            $id_cliente = $_SESSION['id_usuario'];
            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_citas WHERE id_cliente='$id_cliente' order by fecha desc";

            $consulta = mysqli_query($con, $sql);

            if (!$consulta) {
              echo "Error al realizar la consulta sql...";
            } else {
              $num_filas = mysqli_num_rows($consulta);

              if ($num_filas == 0) {
                echo "<div class='alert alert-warning warning-new col-sm-6 col-sm-offset-3' align='center'>
                              <h2>No tienes ninguna cita programada</h2>
                      </div>";
              } else {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-hover'>";
                echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th></tr></thead>";
                echo "<tbody>";
                while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                  $marca_cita = strtotime($fila['fecha']);
                  $marca_hora = strtotime($fila['hora']);
                  $f_formateada = date("d-m-Y", $marca_cita);
                  $h_formateada = date("G:i", $marca_hora);
                  if ($marca_cita >= $marca_actual) { // en verde las futuras citas)
                    echo "<tr class='success'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td></tr>";
                  } else { // en amarillo las citas pasadas)
                    echo "<tr class='warning'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td></tr>";
                  }
                }
                echo "</tbody>";
                echo "</table></div>"; //responsive, table-hover
              }
              
            }
              mysqli_close($con);
              echo "</div>
              </div>";
              echo "<div style='padding-top:15px'>
                <p align='center'><a class='btn btn-theme' href='../../php/contacto.php'>Solicitar <b>nueva cita</b></a></p>
                <p align='center'><a class='btn btn-theme' href='../../php/usuarios/area_personal.php'>Volver</b></a></p>

                </div>";
     
    return true;
  }

}
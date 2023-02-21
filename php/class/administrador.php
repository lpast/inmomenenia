<?php

class Administrador {

  const BASE_URL = "https://inmomenenia.com/php";

  /* Menú de navegación administrador*/
  static public function menuAdmin(): bool {
    if (isset($_SESSION['tipo'])) {
      $tipo_usuario = $_SESSION['tipo'];
      if ($tipo_usuario == 'a') {
        echo " <nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
        <div class='container-fluid'>
          <div class='navbar-header'>
            <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
              <span class='icon-bar b-resp'></span>
              <span class='icon-bar b-resp'></span>
              <span class='icon-bar b-resp'></span>                        
            </button>
            <a href='../../../index.html'><img src='../../../media/img/logo.png' alt='logo-inmomenenia' width='15%'></a>
            </div>
          <div class='collapse navbar-collapse' id='nav-responsive'>
          <ul class='nav navbar-nav navbar-right'>
            <li><a href='../../../php/home.php'><span class='glyphicon glyphicon-log-in'></span> Inicio</a></li>
            <li><a href='../noticias/noticias.php'><span class='glyphicon glyphicon-briefcase'></span> Noticias</a></li>
            <li><a href='../clientes/clientes.php'><span class='glyphicon glyphicon-folder-open'></span> Clientes</a></li>
            <li><a href='../inmuebles/inmuebles.php'><span class='glyphicon glyphicon-pencil'></span> Inmuebles</a></li>
            <li><a href='../citas/citas.php'><span class='glyphicon glyphicon-calendar'></span> Citas</a></li>
            <li><a href='". self::BASE_URL . "/cerrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
          </ul>
          </div>
        </div>
        </nav>";
      }
    }
    return true;
  }
  static public function area_administrador(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>";
        try {
          if (isset($_SESSION['tipo'])) {
            $tipo_usuario = $_SESSION['tipo'];
            if ($tipo_usuario == 'a') {
              //Mostramos una imagen aleatoria 
              echo "<h2 align='center'> ¿Qué quieres hacer?</h2>
              <div class ='col-md-offset-2 col-md-4'>
                <ul>
                <lo><a href='administrador/citas/citas.php'><img src='../../media/iconos/calendar.png' alt='logo-citas' width='150px' align='center'>
                  <h2>Ver Citas</h2></a>
                </lo>
                  <lo><a href='administrador/inmuebles/inmuebles.php'><img src='../../media/iconos/house.png' alt='logo-inmuebles' width='150px' align='center'>
                  <h2> Ver Inmuebles </h2></a>
                  </lo>
                </ul>
              </div>
              <div class ='col-md-offset-2 col-md-4'>
                <ul>
                  <lo><a href='administrador/clientes/clientes.php'><img src='../../media/iconos/mis-datos.png' alt='logo-clientes' width='150px' align='center'>
                  <h2>Ver CLientes </h2></a></lo>
                  <lo><a href='administrador/noticias/noticias.php'><img src='../../media/iconos/newspaper.png' alt='logo-noticias' width='150px' align='center'>
                  <h2>Ver Noticias </h2></a></lo>
                </ul>
              </div>";
            }
          }
          throw new Exception ('No existe tipo usuario');
        
        } catch (Exception $e) {
          die ('Error' . $e->GetMessage());
        } 
      echo "</div>";
    echo "</div>";


    return true;
  }
  static public function gestion_inmuebles(): bool {
    echo "<div class='container-fluid cabecera-menu-inicio'>
      <div class='row'>
        <div class='col-xs-12'>
          <nav class='navbar '>
            <div class='container-fluid'>
              <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
                <li><a type='button' class='btn btn-theme btn-md' href='nuevo_inmueble.php'>Añadir inmueble</a></li>
                <li><a type='button' class='btn btn-theme btn-md' href='borrar_inmueble.php'>Borrar inmueble</a></li>
                <li><a type='button' class='btn btn-theme btn-md' href='buscar_inmueble.php'>Buscar inmueble</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>";
    return true;
  }
  static public function listar_inmuebles(): bool {
    $conexion = abrirConexion();
    $mostrar = "SELECT id, direccion, metros, descripcion, precio, id_cliente, imagen
                    FROM tbl_inmuebles";
    $datos = mysqli_query($conexion, $mostrar);
    if (!$datos) {
      echo "No hay datos que mostrar";
    } else {
      $num_filas = mysqli_num_rows($datos);

      if ($num_filas == 0) {
        echo "No hay ningún inmueble almacenado";
      } else {
        echo "<p><strong>Total de inmuebles almacenados:</strong> $num_filas</p>";
        echo "<table class='table table-hover'";
        echo "<thead><tr><th>ID</th><th>Dirección</th><th>Metros</th><th>Precio</th><th>Imagen</th><th>Ver inmueble</th><th>Modificar inmueble</th></tr></thead>";
        while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
          // si es el usuario 'disponible' muestro cartel de disponible
          if ($fila['id_cliente'] == 0) {
            echo "<tbody><tr><td>$fila[id]</td><td>$fila[direccion]</td>td>$fila[metros]</td><td>$fila[precio] €</td><td><img src='$fila[imagen]' style='width:150px''></td></td>
              <td><form action='/php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
              <td><form action='modificar_inmueble.php' method='get'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
          } else {
            echo "<tbody><tr><td>$fila[id]</td><td>$fila[direccion]</td><td>$fila[metros]</td><td>$fila[precio] €</td><td><img src='$fila[imagen]' style='width:150px''></td></td>
                      <td><form action='../php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      <td><form action='modificar_inmueble.php' method='get'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
          }
        }
        echo "</table>";
      }
    }
    mysqli_close($conexion);
    return true;
  }
  static public function form_nuevo_inmueble(): bool {
    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
          <div class='panel-group'>
            <div class='panel panel-default menu-inicio'>
              <div class='panel-heading'>
                <h2 align='center'>Nuevo inmueble</h2>
              </div>
              <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                  <div class='form-group'>
                    <label class='col-sm-2'>ID:</label>
                    <div class='col-sm-10'>";
                      $con = abrirConexion();
                      $consulta = "SELECT auto_increment from information_schema.tables WHERE table_schema='db_inmomenenia' and table_name='tbl_inmuebles'";
                      $datos = mysqli_query($con, $consulta);
                      $array = mysqli_fetch_array($datos, MYSQLI_NUM);
                      echo "<td><input class='form-control' name='id' type='number' value = '$array[0]'></td>";
                    echo "</div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Tipo:</label>
                    <div class='col-sm-10'>
                      <select class='form-control' name='tipo' id='tipo'>
                        <option value='alquiler'>Selecciona una opcion</option>
                        <option value='alquiler'>Alquilar</option>
                        <option value='compra'>Vender</option>
                      </select>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Calle:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='calle' name='calle' type='text'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Portal:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='portal' name='portal' type='text'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Código Postal:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='cp' name='cp' type='number'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Localidad:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='localidad' name='localidad' type='text'><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Metros:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='metros' name='metros' type='number'><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Núm. de habitaciones:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='num_hab' name='num_hab' type='number'><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Núm. de baños:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='num_banos' name='num_banos' type='number'><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2' >Garaje:</label>
                      <div class='col-sm-10'>
                          <label class='radio-inline'>
                              <input type='radio' name='garaje' value='si' id= 'Si'> Si <span></span>
                          </label>
                          <label class='radio-inline'>
                              <input type='radio' name='garaje' value='no' id='No'> No <span></span>
                          </label>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Jardín:</label>
                      <div class='col-sm-10 '>
                          <label class='radio-inline'>
                              <input type='radio' name='jardin' value='si' id= 'Si'> Si
                          </label>
                          <label class='radio-inline'>
                              <input type='radio' name='jardin' value='no' id='No'> No<span></span>
                          </label>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Piscina:</label>
                      <div class='col-sm-10 '>
                          <label class='radio-inline'>
                              <input type='radio' name='piscina' value='si' id= 'Si'> Si<span></span>
                          </label>
                          <label class='radio-inline'>
                              <input type='radio' name='piscina' value='no' id='No'> No
                          </label>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>Estado:</label>
                      <div class='col-sm-10'>
                          <select class='form-control' id='estado' name='estado'>
                              <option value=''>Selecciona una opcion</option>
                              <option value='0'>Nuevo</option>
                              <option value='1'>Segunda mano</option>
                          </select><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>Titular:</label>
                      <div class='col-sm-10'>
                          <textarea class='form-control' id='titular' name='titular' rows='3'></textarea><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>Descripción:</label>
                      <div class='col-sm-10'>
                          <textarea class='form-control' id='descripcion' name='descripcion' rows='5'></textarea><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Precio:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='precio' name='precio' type='number'><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>Imagen:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='imagen' name='imagen' type='file'>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>Fecha de alta:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='fecha_alta' name='fecha_alta' type='date'>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>ID Cliente:</label>
                      <div class='col-sm-10'>
                        <select class='form-control' id='id_cliente' name='id_cliente'>";
                          $conexion = abrirConexion();
                          $consulta = 'SELECT id, nombre, apellidos from tbl_clientes';
                          $clientes = mysqli_query($conexion, $consulta);

                          if (!$clientes) {
                            echo 'Error al ajecutar la consulta';
                          } else {
                            while ($fila = mysqli_fetch_array($clientes, MYSQLI_ASSOC)) {
                              echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                            }
                          }
                          mysqli_close($conexion);
                        echo "</select>
                      </div>
                    </div>
                <div class='form-group'>
                  <div class='col-sm-12 col-sm-offset-4'>
                    <div class='col-sm-2'>
                        <input type='submit' class='form-control btn-theme' id='nuevo_inmueble' name='nuevo_inmueble' value='Añadir'>
                      </div>
                      <div class='col-sm-2'>
                        <button class='form-control btn-theme' id='btnLimpiar'>Limpiar</button>
                      </div>
                      <div class='col-sm-2'>
                        <a href='../php/inmuebles.php' class='btn btn-danger'>Cancelar</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    nuevo_inmueble();
    return true;
  }
  static public function tbl_borrar_inmueble(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
          <div class='panel-group'>
            <div class='panel panel-default menu-inicio'>
              <div class='panel-heading'>
                <h2 align='center'>Borrar inmueble</h2>
                <p align='center'>Seleccione el inmueble que desea borrar</p>
              </div>
              <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                  <div class='form-group'>
                   
                    <div class='col-sm-10'>";
                      $conexion = abrirConexion();
                      $consulta = "SELECT id, calle, imagen from tbl_inmuebles";

                      $datos = mysqli_query($conexion, $consulta);

                      if (!$datos) {
                        echo "Error!! No se han podido cargar los datos del inmueble";
                      } else {
                        echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>";
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-striped'";
                        echo "<thead><tr><th>id</th><th>Dirección</th><th>Imagen</th><th>¿Eliminar?</th></tr></thead>";
                        while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
                          echo "<tbody><tr><td>$fila[id]</td><td>'$fila[calle]$fila[portal]'</td><td><img src='/./media/img/img_inmuebles/$fila[imagen]' style='width:150px'></td>
                                                <td><form action='#' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-danger' type='submit' name='borrar' value='Eliminar'></form></td></tr></tbody>";
                        }
                        echo "</div></table></div>";
                      }
                      mysqli_close($conexion);
                    echo "</div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    borrar_inmueble();
    return true;
  }

  static public function form_buscar_inmueble_admin(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
          <div class='panel-group'>
            <div class='panel panel-default menu-inicio'>
              <div class='panel-heading'>
                <h2 align='center'>Buscar inmueble</h2>
              </div>
              <div class='panel-body'>
                <p align='center'>Rellene los campos por los que quiera filtrar realizar la búsqueda</p>
                <form class='form-horizontal' action='#' method='post'>
                  <div class='form-group'>
                    <label class='col-sm-3 col-sm-offset-2'>Tipo</label>
                    <div class='col-sm-6 '>
                      <select class='form-control' id='tipo' name='tipo'>
                        <option value='alquiler'>Alquilar</option>
                        <option value='compra'>Comprar</option>
                      </select>
                     </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-2'>Calle:</label>
                      <div class='col-sm-5 col-lg-offset-2'>
                        <input class='form-control' type='text' name='direccion'>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-2'>Metros<sup>2</sup>:</label>
                      <div class='col-sm-5 col-lg-offset-2'>
                        <input class='form-control' type='text' name='metros'>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-2'>Precio:</label>
                      <div class='col-sm-5  col-lg-offset-2'>
                        <input class='form-control' type='text' name='precio'>
                      </div>
                    </div>
                    <div class='form-group'>
                      <div class='col-sm-5 col-lg-offset-2'>
                        <input class='form-control btn-theme' align='center' type='submit' name='buscar' value='Buscar'>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    return true;
  }/*************** revisar  */

  static public function form_mod_inmueble(): bool {
    // $_POST NO FUNCIONA
    if (isset($_POST['modificar'])) {
      $id = $_POST['id'];

      $conexion = abrirConexion();
      $consulta = "SELECT * FROM tbl_inmuebles WHERE id='$id'";

      $sql = mysqli_query($conexion,$consulta);

      if (!$sql) {
        echo "¡ERROR! No hay datos en la consulta";
        header("location:inmuebles.php");
      } else {
        $num_filas = mysqli_num_rows($sql);
        if ($num_filas == 0) {
          echo "No hay datos de inmueble almacenados";
        } else {
          while ($fila = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
            $tipo = $fila['tipo'];
            $calle = $fila['calle'];
            $portal = $fila['portal'];
            $piso = $fila['piso'];
            $puerta = $fila['puerta'];
            $cp = $fila['cp'];
            $localidad = $fila['localidad'];
            $metros = $fila['metros'];
            $num_hab = $fila['num_hab'];
            $num_banos = $fila['num_banos'];
            $garaje = $fila['garaje'];
            $jardin = $fila['jardin'];
            $piscina = $fila['piscina'];
            $estado = $fila['estado'];
            $titular = $fila['titular'];
            $descripcion = $fila['descripcion'];
            $precio = $fila['precio'];
            $fecha_alta = $fila['fecha_alta'];
            $id_cliente = $fila['id_cliente'];
            $imagen = $fila['imagen'];
          }
        }
      }
      mysqli_close($conexion);

      echo "<div class='container-fluid'>
        <div class='row'>
          <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
          <div class='panel-group'>
            <div class='panel panel-default menu-inicio'>
              <div class='panel-heading'>
                <h2 align='center'>Modificar inmueble</h2>
              </div>
                <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                <div class='form-group'>
                    <label class='col-sm-2'>ID:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' name='id' type='number' value ='$id'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Tipo:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' name='tipo' type='text' value ='$tipo'></td>
                      </select>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Calle:</label>
                    <div class='col-sm-10'>
                    <input class='form-control'  name='calle' type='text' value='$calle'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Portal:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='number' name='portal' value='$portal'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Piso:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' name='piso' value='$piso'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Puerta:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' name='puerta' value='$puerta'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Código Postal:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='number' name='cp' value='$cp'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Localidad:</label>
                        <div class='col-sm-10'>
                            <input class='form-control' type='text' name='localidad' value='$localidad'>
                        </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-sm-2'>Metros:</label>
                          <div class='col-sm-10'>
                            <input class='form-control' type='number' name='localidad' value='$metros'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-sm-2'>Núm. de habitaciones:</label>
                          <div class='col-sm-10'>
                            <input class='form-control' type='number' name='num_hab' value='$num_hab'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-sm-2'>Núm. de baños:</label>
                          <div class='col-sm-10'>
                          <input class='form-control' type='number' name='num_banos' value='$num_banos'>
                          </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2' >Garaje:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' name='garaje' value='$garaje'>
                        </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-sm-2'>Jardín:</label>
                          <div class='col-sm-10'>
                            <input class='form-control' type='text' name='jardin' value='$jardin'>
                          </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Piscina:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' name='piscina' value='$piscina'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Estado:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' name='estado' value='$estado'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Titular:</label>
                        <div class='col-sm-10'>
                        <input class='form-control' type='text' name='titular' value='$titular'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Descripción:</label>
                        <div class='col-sm-10'>
                          <textarea class='form-control' id='descripcion' name='descripcion' rows='5' value='$descripcion'></textarea><span></span>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Precio:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' id='precio' name='precio' type='number' value='$precio'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Imagen:</label>
                        <div class='col-sm-5'>";
                          $conexion = abrirConexion();
                          $consulta = "SELECT id, imagen from tbl_inmuebles where id='$id'";
                          $imagen = mysqli_query($conexion, $consulta);
                          if (!$imagen) {
                            echo "error al cargar la miniatura...";
                          } else {
                            while($fila = mysqli_fetch_array($imagen,MYSQLI_ASSOC)) {
                              echo "<p><img src='/./media/img/img_inmuebles/$fila[imagen]' width='150px'></p>";
                            }
                          }
                          mysqli_close($conexion);
                        

                        echo "</div>";
                      echo "</div>";
                      echo "<div class='form-group'>
                          <label class='col-sm-2'>Fecha de alta:</label>
                          <div class='col-sm-10'>
                              <input class='form-control' id='fecha_alta' name='fecha_alta' type='date' value='$fecha_alta'>
                          </div>
                      </div>
                      <div class='form-group'>
                        <label class=' col-sm-2'>ID Cliente:</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='id_cliente' name='id_cliente'>";
                            $conexion = abrirConexion();
                            $consulta = "SELECT id, nombre, apellidos from tbl_clientes";
                            $sql = mysqli_query($conexion, $consulta);
                        
                            if (!$sql) {
                              echo 'Error al ajecutar la consulta';
                            } else {
                              while ($fila = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                                echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                              }
                            }
                            mysqli_close($conexion);
                          echo "</select>
                        </div>
                      </div>
                      <div class='form-group'>
                        <div class='col-sm-12 col-sm-offset-4'>
                          <div class='col-sm-2'>
                            <input class='form-control btn-theme' type='submit' name='guardar' value='Modificar'>
                          </div>
                          <div class='col-sm-2'>
                            <a href='cliente.php' class='btn btn-danger'>Cancelar</a>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>";
        return true;
    }
    return true;
  }/*************** revisar  */

  static public function gestion_noticias(): bool {
    echo "<div class='container-fluid cabecera-menu-inicio'>
      <div class='row'>
        <div class='col-xs-12'>
          <nav class='navbar '>
            <div class='container-fluid'>
              <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
                <li><a type='button' class='btn btn-theme btn-md' href='nueva_noticia.php'>Añadir noticias</a></li>
                <li><a type='button' class='btn btn-theme btn-md' href='borrar_noticia.php'>Borrar noticias</a></li>
                <li><a type='button' class='btn btn-theme btn-md' href='buscar_noticia.php'>Buscar noticias</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>";
    return true;
  }

  static public function form_nueva_noticia(): bool {
    echo "<div class='container-fluid cabecera-menu-inicio'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
        <div class='panel-group'>
          <div class='panel panel-default'>
            <div class='panel-heading'>
              <h2 align='center'>Añadir noticias</h2>
            </div>
            <div class='panel-body'>
              <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                <div class='form-group'>
                  <label class=' col-sm-3'>ID:</label>
                  <div class='col-sm-9'>";
                    $con = abrirConexion();
                    $consulta = "SELECT auto_increment from information_schema.tables WHERE table_schema='db_inmomenenia' and table_name='tbl_noticias'";

                    $datos = mysqli_query($con, $consulta);
                    $array = mysqli_fetch_array($datos, MYSQLI_NUM);
                    echo "<td><input class='form-control' type='text' name='id' value = '$array[0]'></td>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3'>Titular:</label>
                  <div class='col-sm-9'>
                    <input class='form-control' id='titular' type='text' name='titular' autofocus><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3'>Contenido:</label>
                  <div class='col-sm-9'>
                    <textarea class='form-control' id='contenido' name='contenido' rows='5'></textarea><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3'>Imagen:</label>
                  <div class='col-sm-9'>
                    <input class='form-control' id='imagen' type='file' name='imagen'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3'>Fecha de publicación:</label>
                  <div class='col-sm-5'>
                    <input class='form-control' id='fecha' type='date' name='fecha'><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-12 col-sm-offset-4'>
                    <div class='col-sm-2'>
                      <input class='form-control btn-theme' id='nueva_noticia' type='submit' name='nueva_noticia' value='Añadir'>
                    </div>
                    <div class='col-sm-2'>
                      <a href='noticias.php' class='btn btn-danger'>Cancelar</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>";
      return true;
  }

  static public function tbl_borrar_noticia(): bool {
    echo "<div class='container-fluid cabecera-menu-inicio'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
        <div class='panel-group'>
          <div class='panel panel-default'>
            <div class='panel-heading'>
              <h2 align='center'>Borrar una noticia</h2>
            </div>
            <div class='panel-body'>
              <p align='center'>Seleccione el inmueble que desea borrar</p>";

              $conexion = abrirConexion();
              $consulta = "SELECT id, titular from tbl_noticias";

              $datos = mysqli_query($conexion, $consulta);

              if (!$datos) {
                echo "Error, no se han podido cargar los datos de las noticas";
              } else {
                echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2'>";

                echo "<table class='table table-striped'";
                echo "<thead><tr><th>ID</th><th>Titular</th><th>¿Eliminar?</th></tr></thead>";
                while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
                  echo "<tbody><tr><td>$fila[id]</td><td>$fila[titular]</td>
                              <td><form action='#' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-danger' type='submit' name='borrar' value='Eliminar'></form></td></tr></tbody>";
                }
                echo "</table>
                    <a align='center' href='noticias.php' class='btn btn-danger'>Cancelar</a>
                  </div>";
              }
              mysqli_close($conexion);
            echo "</div>
          </div>
        </div>
      </div>
    </div>
    </div>";
    borrar_noticia();
    return true;
  }

  static public function form_buscar_noticia(): bool {
    echo "<div class='container-fluid menu-inicio'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
          <div class='panel-group'>
            <div class=' panel panel-default' action='#' method='post'>
              <div class='panel-heading'>
                <h2 align='center'>Buscar noticias</h2>
              </div>
              <div class='panel-body'>
                <p align='center'>Rellene el campo para realizar la búsqueda</p>
                <form class='form-horizontal' action='#' method='post' accept-charset='utf-8'>
                  <div class='form-group'>
                    <label class=' col-sm-3'>Titular de la noticia:</label>
                    <div class='col-sm-9'>
                      <input class='form-control' type='text' id='titular' name='titular' autofocus> <span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-12'>
                      <input id='buscar' class='form-control btn-theme' type='submit' name='buscar' value='Buscar' >
                    </div> 
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>";
      buscar_noticia();
    return true;
  }

  static public function gestion_clientes(): bool {
    echo "<div class='container-fluid cabecera-menu-inicio'>
      <div class='row'>
        <div class='col-xs-12'>
          <nav class='navbar '>
            <div class='container-fluid'>
              <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
                <li><a type='button' class='btn btn-theme btn-md' href='añadir_cliente.php'>Añadir cliente</a></li>
                <li><a type='button' class='btn btn-theme btn-md' href='buscar_cliente.php'>Buscar cliente</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>";
    return true;
  }

 
  static public function listar_clientes(): bool {
    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 lista-clientes'>
       <h2 class='margen-citas' align='center'>Listado de clientes</h2>
        <div class='panel panel-default'>
           <div class='panel-body'>
             <div class='table-responsive'>
              <div class='table table-striped'>";
                $conexion = abrirConexion();
                $consulta = "SELECT id, tipo, nombre, apellidos  ,telefono, email, localidad from tbl_clientes order by id";
                $datos = mysqli_query($conexion, $consulta);

                if (!$datos) {
                  echo "No hay datos que mostrar";
                } else {
                  $num_filas = mysqli_num_rows($datos);

                  if ($num_filas == 0) {
                    echo "No hay clientes";
                  } else {
                    $clientes_registrados = $num_filas;
                    echo "<p><strong>Número de clientes:</strong> $clientes_registrados</p>";
                    echo "<table class='table table-hover'";
                    echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Modificar</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                          <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                    }
                  }
                }
                mysqli_close($conexion);
              echo "</div>
            </div>
           </div>
          </div>
        </div>
      </div>
    </div>";
    return true;
  }

 static public function form_nuevo_cliente(): bool  {
    echo "
    <!-- Nuevo cliente -->
    <div class='container-fluid menu-inicio'>
      <div class='row'>
        <div class='col-xs-12 col-md-8 col-md-offset-2'>
          <div class='panel-group'>
            <div class='panel panel-default'>
              <div class='panel-heading'>
                <h2 align='center'>Nuevo cliente</h2>
              </div>
              <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post'>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>ID:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='id'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Tipo:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='tipo'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Nombre:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='nombre'>
                    </div>
                  </div>   
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Apellidos:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='apellidos'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Calle:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='calle'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Portal:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='portal'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Piso:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='piso'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Puerta:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='puerta'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>CP:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='cp'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Localidad:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='localidad'>
                    </div>
                  </div>

                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Teléfono:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='telefono'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Email:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='email'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-12 col-sm-offset-4'>
                      <div class='col-sm-2'>
                        <input class='form-control btn-thene' id='nuevo_cliente' type='submit' name='nuevo_cliente'>
                      </div>
                      <div class='col-sm-2'>
                        <a href='../php/clientes.php' class='btn btn-danger'>Cancelar</a>
                      </div>
                    </div>
                  </div> 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    nuevo_cliente();
    return true;
  }

  static public function form_buscar_cliente(): bool {
    echo "<div class='container-fluid menu-inicio'>
    <div class='row'>
      <div class='col-xs-12 col-md-8 col-md-offset-2'>
        <div class='panel-group'>
          <div class='panel panel-default'>
            <div class='panel-heading'>
              <h2 align='center'> Buscar un cliente</h2>
            </div>
            <div class='panel-body'>
              <form class='form-horizontal' action='#' method='post'>
                <div class='form-group'>
                  <label class=' col-sm-2'> ID:</label>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='id' autofocus>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-2'>Tipo</label>
                  <div class='col-sm-5 col-lg-offset-2'>
                    <select class='form-control' id='tipo' name='tipo'>
                      <option value=''>Seleccione el tipo de vivienda</option>
                      <option value='alquiler'>Alquilar</option>
                      <option value='venta'>Venta</option>
                    </select>
                  </div>
                </div>
                <div class='form-group'>
                  <label class=' col-sm-2'>Nombre:</label>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='nombre' autofocus>
                  </div>
                </div>
                <div class='form-group'>
                  <label class=' col-sm-2'>Apellidos:</label>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='apellidos'>
                  </div>
                </div>
                <div class='form-group'>
                <label class=' col-sm-2'>Localidad:</label>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='localidad'>
                </div>
              
                <div class='form-group' style='padding-top:'15px'>
                  <div class='col-sm-offset-2 col-sm-5 col-lg-offset-4'>
                    <input class='form-control btn-theme' type='submit' name='buscar' value='Buscar'>
                  </div>
                </div>
              </form>
            </div></div></div></div></div></div>";
            buscar_cliente();
    return true;
  } /*************** revisar  */

  static public function form_mod_cliente(): bool {

    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
        <h2 align='center'>Estos son los datos de cliente</h2>
          <p align='center'><b>Aquí puedes modificar los datos del cliente</b></p>
      </div>";
      echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2'>";

      if (isset($_POST['modificar'])) {
        $id = $_POST['id'];

        // almaceno en variables los datos para mostrarlas después en los 'value' del formulario
        $conexion = abrirConexion();
        $sql = "SELECT * FROM tbl_clientes WHERE id='$id'";

        $datos = mysqli_query($conexion, $sql);
          if (!$datos) {
            echo "No se han encontrado los datos del usuario en la BD";
            header("location:clientes.php");
          } else {
            $num_filas = mysqli_num_rows($datos);
            while ($fila = mysqli_fetch_array($datos,MYSQLI_ASSOC)) {
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
            }
          }
          mysqli_close($conexion);
                    
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
                  <input class='form-control' type='text' name='tipo' value='$tipo'>
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
                  <div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-12 col-sm-offset-4' style='padding-top:15px'>
                    <div class='col-sm-2'>
                      <input class='form-control btn-theme' type='submit' name='guardar' value='Modificar'>
                    </div>
                    <div class='col-sm-2'>
                      <a href='clientes.php' class='btn btn-danger'>Cancelar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>";
    }
    return true;

  } /*************** revisar  */
  
  static public function gestion_citas(): bool {
    echo "<div class='container-fluid cabecera-menu-inicio'>
      <div class='row'>
        <div class='col-xs-12'>
          <nav class='navbar '>
            <div class='container-fluid'>
              <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
                <li><a type='button' class='btn btn-theme' href='nueva_cita.php'>Añadir citas</a></li>
                <li><a type='button' class='btn btn-theme' href='borrar_cita.php'>Borrar citas</a></li>
                <li><a type='button' class='btn btn-theme' href='buscar_cita.php'>Buscar citas</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>";
    return true;
  }

  static public function form_nueva_cita() : bool {
    echo "<div class='container-fluid'>
    <div class='row'>
    <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
      <div class='panel-group'>
        <div class='panel panel-default menu-inicio'>
          <div class='panel-heading'>
            <h2 align='center'>Añadir cita</h2>
          </div>
            
          <form class='form-horinzontal panel-body' action='#' method='post'>
              <div class='form-group'>
                  <label class=' col-sm-2'>ID:</label>
                  <div class='col-sm-10'>";
                    $con = abrirConexion();
                    $consulta = "SELECT auto_increment from information_schema.tables where table_schema='db_inmobiliaria' and table_name='tbl_citas'";
                    $datos = mysqli_query($con, $consulta);
                    $array = mysqli_fetch_array($datos, MYSQLI_NUM);
                    echo "<td><input class='form-control' type='text' name='id' value = $array[0] readonly></td>";
                  echo "</div>
              </div>";
              // aquí compruebo si me han pasado mes por el enlace, si es así muestro la fecha pasada si no se muestra un date para seleccionarla
              if (isset($_GET['mes'])) {
                $mes = $_GET['mes'];
                $año= $_GET['año'];
                $dia = $_GET['dia'];
                echo "<div class='form-group'>
              <label class=' col-sm-2'>Fecha:</label>
              <div class='col-sm-10'>
                <input id='fecha' class='form-control' type='text' name='fecha' value='$dia/$mes/$año' readonly><span></span>
              </div>
            </div>";
              } else {
                echo "<div class='form-group'>
                  <label class=' col-sm-2'>Fecha:</label>
                  <div class='col-sm-10'>
                    <input id='fecha' class='form-control' type='date' name='fecha' autofocus><span></span>
                  </div>
                </div>";
              }
              
              echo "<div class='form-group'>
              <label class='col-sm-2'>Hora:</label>
              <div class='col-sm-10'>
                <input id='hora' class='form-control' type='time' name='hora'><span></span>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2'>Motivo:</label>
              <div class='col-sm-10'>
                <input id='motivo' class='form-control' type='text' name='motivo'><span></span>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2'>Lugar</label>
              <div class='col-sm-10'>
                <input id='lugar' class='form-control' type='text' name='lugar'><span></span>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2'>ID Cliente:</label>
              <div class='col-sm-10'>
                <select class='form-control' name='id_cliente'>";
                  $conexion = abrirConexion();
                  $consulta = "SELECT id, nombre, apellidos from tbl_clientes";
                  $clientes = mysqli_query($conexion,$consulta);
                  
                  if (!$clientes) {
                    echo "Error al ajecutar la consulta";
                  } else {
                    while ($fila = mysqli_fetch_array($clientes,MYSQLI_ASSOC)) {
                      if ($fila['nombre'] != 'disponible') {
                        echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                      }
                    }
                  }                     
                  mysqli_close($conexion);
                echo "</select>
                </div>
              </div>";
              echo "<div class='form-group'>
                  <div class='col-sm-12'>
                    <input class='form-control btn-theme' type='submit' id='nueva_cita' name='nueva_cita' value='Añadir cita'>
                  </div>
                  <div class='col-sm-2'>
                    <a href='citas.php' class='btn btn-danger'>Cancelar</a>
                  </div>
              </div>
            </form>
        </div>
      </div>
    </div>
    </div>
  </div>";
   /* Código PHP que añade una nueva cita */
   nueva_cita();
  return true;

  }

  static public function form_buscar_cita() : bool {
    echo "  <div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
        <div class='panel-group menu-inicio'>
          <div class='panel panel-default'>
            <div class='panel-heading'>
              <h2 align='center'>Buscar citas</h2>
            </div>
            <div class='panel-body'>
              <p align='center'>Rellene el campo o campos por los que quiere realizar la búsqueda</p>
                <form class='form-horizontal' action='#' method='post' accept-charset='utf-8'>
                <div class='form-group'>
                  <label class=' col-sm-3 '>Fecha:</label>
                  <div class='col-sm-7'>
                    <input class='form-control' type='date' name='fecha' autofocus>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-4'>Nombre del cliente:</label>
                  <select class='form-control' name='id_cliente'>";
                      
                    $conexion = abrirConexion();
                    $consulta = "SELECT id, nombre, apellidos FOM clientes";
                    $clientes = mysqli_query($conexion,$consulta);
                    
                    if (!$clientes) {
                      echo "Error al ajecutar la consulta";
                    } else {
                      echo "<option></option>";
                      while ($fila = mysqli_fetch_array($clientes,MYSQLI_ASSOC)) {
                        if ($fila['nombre'] != "disponible") {
                          echo "<option value=$fila[id]>$fila[nombre]</option>";
                        }
                        
                      }
                    }                     
                    mysqli_close($conexion);
                
                  echo "</select>
                </div>
                
                <div class='form-group'>
                  <div class='col-sm-12'>
                    <input class='form-control btn-theme' type='submit' name='buscar_cita' value='Buscar'>
                  </div> 
              </form>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>";
    buscar_cita();
    return true;
  }

  static public function tbl_borrar_cita(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-form'>
          <div class='panel-group menu-inicio'>
            <div class='panel panel-default'>
              <div class='panel-heading'>
                <h2 align='center'>Borrar una cita</h2>
              </div>
              <div class='panel-body'>
                <p align='center'>Seleccione la cita que desea borrar</p>";
                 //fecha actual para controlar que no se borra una cita ya pasada
                  $fecha_actual = date('Y-m-d');
  
                  $conexion = abrirConexion();
                  $consulta = "SELECT * from tbl_citas where fecha >= '$fecha_actual' order by fecha asc";

                  $datos = mysqli_query($conexion,$consulta);

                  if (!$datos) {
                    echo "Error, no se han podido cargar los datos de las citas";
                  } else {
                    echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2'>";
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-striped'";
                    echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th><th>Cliente</th><th>¿Eliminar?</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($datos,MYSQLI_ASSOC)) {
                      if ($fila['fecha'] >= $fecha_actual) {
                        
                      }
                      echo "<tbody><tr><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[id_cliente]</td>
                      <td><form action='#' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-danger' type='submit' name='borrar' value='Eliminar'></form></td></tr></tbody>";
                    }
                    echo "</table></div></div>";
                  }
                  mysqli_close($conexion);
              echo "</div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    borrar_cita();
    return true;
  }

  static public function mostrarCalendario($dia, $mes, $año): bool {
    switch ($mes) {
      case 1:
        $nombre_mes = 'Enero';
        break;
      case 2:
        $nombre_mes = 'Febrero';
        break;
      case 3:
        $nombre_mes = 'Marzo';
        break;
      case 4:
        $nombre_mes = 'Abril';
        break;
      case 5:
        $nombre_mes = 'Mayo';
        break;
      case 6:
        $nombre_mes = 'Junio';
        break;
      case 7:
        $nombre_mes = 'Julio';
        break;
      case 8:
        $nombre_mes = 'Agosto';
        break;
      case 9:
        $nombre_mes = 'Septiembre';
        break;
      case 10:
        $nombre_mes = 'Octubre';
        break;
      case 11:
        $nombre_mes = 'Noviembre';
        break;
      case 12:
        $nombre_mes = 'Diciembre';
        break;

      default:
        $nombre_mes = '';
        break;
    }
    // guardo el mes por semanas en un array
    $semana = 1;

    for ($i = 1; $i <= date('t', strtotime($año . "-" . $mes . "-" . $dia)); $i++) { // dia 1 al numero de dias del mes
      $dia_semana = date('N', strtotime($año . "-" . $mes . "-" . $i)); // numero del dia
      $calendario[$semana][$dia_semana] = $i; //Guardo el mes en un array
      if ($dia_semana == 7) // si el dia de la semana es 7 cambio de semana
        $semana++;
    }

    // consulto las citas del mes
    /* por cada fecha, cojo el mes y si es igual al actual lo guardo en un array (la fecha entera)
    y cuando muestro el calendario compara si hay un dia del array igual al dia del mes que pasa
    y si es así lo marco el calendario (background-color) */
    $citas_mes = array();
    $conexion = abrirConexion();
    $consulta = "SELECT fecha from tbl_citas WHERE fecha like '$año-$mes-%'";
    $fechas = mysqli_query($conexion, $consulta);
    if (!$fechas) {
      echo "Error al cargar las fechas de las citas...";
    } else {
      echo "<p align='center'><b>Las citas del mes aparecen marcadas</b></p>";
      while ($fila = mysqli_fetch_array($fechas, MYSQLI_ASSOC)) {
        $fe_marca = strtotime($fila['fecha']);
        $mesA = date('n', $fe_marca);
        $dia = date('d', $fe_marca);
        if ($mesA == date('n')) {
          array_push($citas_mes, $dia);
        }
      }
    }

    // muestro el calendario del mes
    echo "<h4>$nombre_mes</h4>";
    echo "<table class='table'>";
    echo "<tbody>";
    echo "<tr bgcolor='#b2b6b9'><th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th></tr>"; //Días de la semana
    foreach ($calendario as $dias_mes) { // cojo los días del mes almacenados en el array
      echo "<tr>";
      for ($i = 1; $i <= 7; $i++) {

        if (isset($dias_mes[$i])) {
          //busca en el array citas el día por el que va i para comprobar si hay alguna
          if (in_array($dias_mes[$i], $citas_mes)) { //busca en el array citas el numero del dia / aqui si hay cita
            $con = abrirConexion();
            $sql = "SELECT motivo, hora, lugar from tbl_citas WHERE fecha='$año-$mes-$dias_mes[$i]'";
            $cons_citas = mysqli_query($con, $sql);

            if ($cons_citas) {

              $num_filas = mysqli_num_rows($cons_citas);

              if ($num_filas == 1) { // hay 1 cita
                while ($fila = mysqli_fetch_array($cons_citas, MYSQLI_ASSOC)) {
                  //$fila = mysqli_fetch_array($consultar_citas,MYSQLI_ASSOC);
                  $marca_hora = strtotime($fila['hora']);
                  $h_formateada = date("G:i", $marca_hora);
                  echo "<td bgcolor='#baa35f'>
                        <a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$año'>" . $dias_mes[$i] . "</a><br>
                        <a href='#' data-toggle='popover' title='Citas del día' data-content='· $fila[motivo] a las $h_formateada en $fila[lugar]'><span class='glyphicon glyphicon-eye-open'></span></a>
                      </td>";
                }
              } else { // hay mas de una cita
                $contenido = "";
                while ($fila = mysqli_fetch_array($cons_citas, MYSQLI_ASSOC)) {
                  //$fila = mysqli_fetch_array($consultar_citas,MYSQLI_ASSOC);
                  $marca_hora = strtotime($fila['hora']);
                  $h_formateada = date("G:i", $marca_hora);
                  $contenido .= " · $fila[motivo] a las $h_formateada en $fila[lugar] &#013";
                }

                echo "<td bgcolor='#baa35f'>
                        <a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$año'>" . $dias_mes[$i] . "</a><br>
                        <a href='#' data-toggle='popover' title='Citas del día' data-content='" . $contenido . "'><span class='glyphicon glyphicon-eye-open'></span></a>
                      </td>";
              }
            } else {
              echo "¡ERROR! no se ha podido conectar con la BD...";
            }
          } else { // Día sin cita
            echo "<td bgcolor='white'><a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$año'>" . $dias_mes[$i] . "</a></td>";
          }
        } else {
          echo "<td></td>";
        }

      }
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    $mes_antes = $mes - 1;
    $mes_despues = $mes + 1;
    echo "<ul class='pager'>
              <li><a class='btn btn-warnig' role='button' href='citas.php?mes=$mes_antes&anio=" . $año . "'>Atrás</a></li>
              <li><a class='btn btn-warnig' role='button' href='citas.php?mes=$mes_despues&anio=" . $año . "'>Siguiente</a></li>
          </ul>";

    return true;
  }

  static public function mostrar_ProximasCitas(): bool {
    echo '<div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <h2 class="margen-citas" align="center">Próximas citas</h2>';

    $actual = date('Y-m-d');
    $marca_actual = strtotime($actual);

    $conexion = abrirConexion();
    $sql = "SELECT tbl_citas.id, tbl_citas.fecha, tbl_citas.hora, tbl_citas.motivo, tbl_citas.lugar, tbl_clientes.id
          from tbl_citas inner join tbl_clientes on tbl_citas.id_cliente = tbl_clientes.id order by fecha desc";

    $mostrar = mysqli_query($conexion, $sql);

    if (!$mostrar) {
      echo "Error al hacer la consulta a la BD";
    } else {
      $num_filas = mysqli_num_rows($mostrar);
      if ($num_filas == 0) {
        echo "No hay citas para mostrar";
      } else {
        echo "<p align='center'><b>Se han listado $num_filas citas</b></p>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-striped table-hover'";
        echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th><th>Cliente</th><th>Teléfono</th><th>Modificar</th></tr></thead>";
        while ($fila = mysqli_fetch_array($mostrar, MYSQLI_ASSOC)) {
          $marca_cita = strtotime($fila['fecha']);
          $marca_hora = strtotime($fila['hora']);
          $f_formateada = date("d-m-Y", $marca_cita);
          $h_formateada = date("G:i", $marca_hora);

          if ($marca_cita > $marca_actual) {
            echo "<tbody><tr class='success'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>$fila[telefono]</td>
                        <td><form action='modificar_cita.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-theme' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
          } else {
            echo "<tbody><tr class='warning'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>$fila[telefono]</td><td>No se puede modificar</td></tr></tbody>";
          }
        }
        echo "</table>
              </div>";
      }
    }
    return true;
  } /*************** revisar  */


}
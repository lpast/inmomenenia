<?php
class Inmueble {

    const BASE_URL = "https://inmomenenia.com/php";
    
  static public function form_busca_inmueble(): bool {
    echo "<div class='panel-group'>
      <div class='panel panel-default cabecera-inicio'>
        <div class='panel-heading'>
          <h2 align='center'><img src='/./media/iconos/buscar.png' alt='metros-inmueble' width='40px' style='margin-right:15px'>Encuentra lo que buscas</h2>
        </div>
        <div class='panel-body'>
          <form class='form-horizontal' action='#' method='post'>
            <div class='form-group'>
              <label class='col-sm-2'>Tipo</label>
              <div class='col-sm-5 col-lg-offset-2'>
                <select class='form-control' id='tipo' name='tipo' required>
                  <option value=''>Seleccione el tipo de vivienda</option>
                  <option value='alquiler'>Alquilar</option>
                  <option value='venta'>Venta</option>
                </select><span></span>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2'>Localidad</label>
              <div class='col-sm-5 col-lg-offset-2'>
                <select class='form-control' id='localidad' name='localidad'>
                  <option value=''>Seleccione la localidad</option>
                  <option value='puebla'>La Puebla de Alfindén</option>
                  <option value='pastriz'>Pastriz</option>
                </select><span></span>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2'>Nº de habitaciones:</label>
              <div class='col-sm-5 col-lg-offset-2'>
                <input class='form-control' type='text' id='num_hab' name='num_hab' placeholder='Nº de habitaciones'><span></span>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2'>Metros<sup>2</sup>:</label>
              <div class='col-sm-5 col-lg-offset-2'>
                <input class='form-control' type='text' id='metros' name='metros' placeholder='metros'><span></span>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2'>Precio:</label>
              <div class='col-sm-5  col-lg-offset-2'>
                <input class='form-control' type='text' id='precio' name='precio'  placeholder='€'><span></span>
              </div>
            </div>
            <div class='form-group'>
              <div class='col-sm-offset-2 col-sm-5 col-lg-offset-4'>
                <input class='form-control btn-theme' type='submit' id='buscar_inm' name='buscar_inm' value='Buscar'><span></span>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>";
    return true;
  }
  
  static public function listar_inmuebles() :bool {
    
    $conexion = abrirConexion();
    $mostrar = "SELECT id, calle, portal, descripcion, precio, id_cliente, imagen
                FROM tbl_inmuebles";
    $datos = mysqli_query($conexion,$mostrar);
    if (!$datos) {
      echo "No hay datos que mostrar";
    } else {
      $num_filas = mysqli_num_rows($datos);
      if ($num_filas == 0) {
        echo "No hay ningún inmueble almacenado";
      } else {
        echo "<p><strong>Total de inmuebles almacenados:</strong> $num_filas</p>";
        echo "<table class='table table-hover tnoticias'>";
        echo "<thead><tr><th>ID</th><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver inmueble</th><th>Modificar inmueble</th></tr></thead>";
        while ($fila = mysqli_fetch_array($datos,MYSQLI_ASSOC)) {
          echo "<tbody><tr><td>$fila[id]</td><td>$fila[calle] $fila[portal]</td><td>$fila[precio] €</td><td><img src='../../../media/img/img_inmuebles/$fila[imagen]' style='width:150px''></td></td>
          <td><form action='../../../php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
          <td><form action='modificar_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
        }
      }
      echo "</table>";
    }
    mysqli_close($conexion);
    return true;
  }

  function nuevo_inmueble() {

    if (isset($_POST['nuevo_inmueble'])){
      $id = $_POST['id'];
      $tipo = $_POST['tipo'];
      $calle = $_POST['calle'];
      $portal = $_POST['portal'];
      $piso = $_POST['piso'];
      $puerta = $_POST['puerta'];
      $cp = $_POST['cp'];
      $zona = $_POST['zona'];
      $metros = $_POST['metros'];
      $num_hab = $_POST['num_hab'];
      $banos = $_POST['banos'];
      $garaje = $_POST['garaje'];
      $jardin = $_POST['jardin'];
      $piscina = $_POST['piscina'];
      $estado = $_POST['estado'];
      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      $fecha_alta = $_POST['fecha_alta'];
      $id_cliente = $_POST['id_cliente'];
      
      $imagen = $_FILES['imagen']['name'];
      $imagen_tmp = $_FILES['imagen']['tmp_name'];
      $imagen_type = $_FILES['imagen']['type'];

      $img_correcto = false;
    

      //comprobamos que la extensión de la imagen sea válida
      if ($imagen_type != 'image/jpeg' && $imagen_type != 'image/png'){
        echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
          <h4><strong>¡Error!</strong>El tipo de imagen no es válido</h4><h5>Por favor, suba un archivo con formato: <b>.png</b> o <b>.jpeg</b></h5>
          </div></div></div>";
      }

      // subimos la imagen al servidor
      if (!file_exists('../../../media/img/img_inmuebles')){
        mkdir('../../../media/img/img_inmuebles');
        echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
          <strong>carpeta creada</strong> 
        </div>";
      }else{
        echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
        <strong>la carpeta estaba creada</strong> 
        </div>";
      }
                  
      // creo la ruta donde guardar la foto dependiendo del tipo que sea
      if ($imagen_type){
        $ruta_img = "../../../media/img/img_inmuebles/$imagen";
        echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
            <strong>ruta correcta</strong> 
          </div>";
    } 
              
    // guardo la foto en el servidor
    if (move_uploaded_file($imagen_tmp, $ruta_img)) {
      $img_correcto = true;
    }else{
      echo "<div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
              <strong>Error al subir la imagen del inmueble al servidor</strong> 
              </div>";
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=inmuebles.php'>";
    }

      // añado el inmueble a la BD si se ha subido la imagen correctamente
      if ($img_correcto){

        $conexion = abrirConexion();

        $insertar = "INSERT into tbl_inmuebles (id, tipo, direccion, cp, zona, metros, num_hab, num_baños, garaje, jardin, piscina, estado, descripcion, precio, imagen, fecha_alta, id_cliente) VALUES
        ($id, $tipo, $calle, $portal, $piso, $puerta, $cp, $zona, $metros, $num_hab, $banos, $garaje, $jardin, $piscina, $estado, $descripcion, $precio, $imagen, $fecha_alta, $id_cliente)";

        $datos = mysqli_query($conexion, $insertar);
        echo $datos;
        
        if ($datos){
          echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
                  <strong>Inmuebles añadido correctamente</strong> 
                </div>";
          echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=inmuebles.php'>";
        }else{
          echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong>No ha sido posible añadir el inmueble</h4>
                </div></div></div>";
        // echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=inmuebles.php'>";
        }
      }
    }
    echo "</div>    
      </div>
    </div>";
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

  static function buscar_Inmueble(): bool {
    if (isset($_POST['buscar_inm'])) {
      $tipo = $_POST['tipo'];
      $localidad = $_POST['localidad'];
      $num_hab = $_POST['num_hab'];
      $metros = $_POST['metros'];
      $precio = $_POST['precio'];
      
      echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2 tnoticias'>
      <h2 class='margen-noticias tnoticias' align='center'>Aquí tienes los resultados de tu búsqueda</h2>";
     
        if ($tipo == 'venta') {
          if ($localidad == "") {
            if ($num_hab == "") {
              if ($metros == "") {
                if ($precio == "") {
                  // venta
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta'";
                  $bventa = mysqli_query($conexion, $sql);
  
                  if (!$bventa) {
                    echo "Error al consultar BD - venta";
                  } else {
                    echo "<table class='table table-hover'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                } else {
                  //venta - precio
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE precio=$precio and tipo='venta'";
                  $bventa = mysqli_query($conexion, $sql);
  
                  if (!$bventa) {
                    echo "Error al consultar BD - venta - precio";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                }
              } else {
                if ($precio == "") {
                  // venta - metros
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE metros=$metros and tipo='venta'";
                  $bventa = mysqli_query($conexion, $sql);
  
                  if (!$bventa) {
                    echo "Error al consultar BD - venta - metros";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                } else {
                  //venta - metros - precio
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE metros=$metros and precio=$precio and tipo='venta'";
                  $bventa = mysqli_query($conexion, $sql);
    
                  if (!$bventa) {
                    echo "Error al consultar BD - venta - metros - precio";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                }
              }
            } else {
              if ($metros == "") {
                if ($precio == "") {
                  // venta - habitaciones
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and num_hab=$num_hab";
                  $bventa = mysqli_query($conexion, $sql);
  
                  if (!$bventa) {
                    echo "Error al consultar BD - venta - habitaciones";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                } else {
                  //venta -habitacions - precio
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and precio=$precio and num_hab=$num_hab";
                  $bventa = mysqli_query($conexion, $sql);
    
                  if (!$bventa) {
                    echo "Error al consultar BD - venta - precio - num_hab";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                }
              } else {
                if ($precio == "") {
                  // venta - metros
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and metros=$metros";
                  $bventa = mysqli_query($conexion, $sql);
  
                  if (!$bventa) {
                    echo "Error al consultar BD - venta - metros";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                } else {
                  //venta -habitaciones - metros - precio
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and precio=$precio and num_hab=$num_hab and metros=$metros";
                  $bventa = mysqli_query($conexion, $sql);
    
                  if (!$bventa) {
                    echo "Error al consultar BD - venta - precio - num_hab - metros";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                }
              }
            }
          } else {
            if ($localidad == 'puebla'){
              if ($num_hab == "") {
                if ($metros == "") {
                  if ($precio == "") {
                    //venta  - localidad
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='La Puebla de Alfindén'";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //venta  - localidad - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='La Puebla de Alfindén' and precio=$precio";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad - precio";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  }
                } else {
                  if ($precio == "") {
                    // venta - localidad - metros
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='La Puebla de Alfindén' and metros=$metros";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad - metros";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //venta - localidad - metros - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='La Puebla de Alfindén' and precio=$precio and metros=$metros";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  }
                }
              } else {
                if ($metros == "") {
                  if ($precio == "") {
                    // venta -  -localidad - habitaciones
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='La Puebla de Alfindén' and num_hab like $num_hab";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad - habitaciones";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                        <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //venta - localidad - habitacions - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='La Puebla de Alfindén' and num_hab like $num_hab and precio like $precio";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad - habitaciones - precio";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                        <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  }
                } else {
                  if ($precio == "") {
                    // localidad - venta - metros
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='La Puebla de Alfindén' and metros like $metros";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - metros";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //venta - localidad - habitaciones - metros - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='La Puebla de Alfindén' and num_hab=$num_hab and metros=$metros and precio=$precio";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad-  habitaciones - metros - precio";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                        <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
  
                  }
                }
              }
            }
  
            if ($localidad == 'pastriz'){
              if ($num_hab == "") {
                if ($metros == "") {
                  if ($precio == "") {
                    //venta  - localidad
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='pastriz'";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //venta  - localidad - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='pastriz' and precio=$precio";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad - precio";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  }
                } else {
                  if ($precio == "") {
                    // venta - localidad - metros
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='pastriz' and metros=$metros";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad - metros";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //venta - localidad - metros - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='pastriz' and precio=$precio and metros=$metros";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  }
                }
              } else {
                if ($metros == "") {
                  if ($precio == "") {
                    // venta -  -localidad - habitaciones
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='pastriz' and num_hab like $num_hab";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad - habitaciones";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                        <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //venta - localidad - habitacions - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='pastriz' and num_hab like $num_hab and precio like $precio";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad - habitaciones - precio";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                        <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  }
                } else {
                  if ($precio == "") {
                    // localidad - venta - metros
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='pastriz' and metros like $metros";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - metros";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //venta - localidad - habitaciones - metros - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta' and localidad='pastriz' and num_hab=$num_hab and metros=$metros and precio=$precio";
                    $bventa = mysqli_query($conexion, $sql);
      
                    if (!$bventa) {
                      echo "Error al consultar BD - venta - localidad-  habitaciones - metros - precio";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                        <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
  
                  }
                }
              }
            }
          }
        }
        if ($tipo == 'alquiler') {
          if ($localidad == "") {
            if ($num_hab == "") {
              if ($metros == "") {
                if ($precio == "") {
                  // alquiler
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler'";
                  $balquiler = mysqli_query($conexion, $sql);
  
                  if (!$balquiler) {
                    echo "Error al consultar BD - alquiler";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                } else {
                  //alquiler - precio
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE precio=$precio and tipo='alquiler'";
                  $balquiler = mysqli_query($conexion, $sql);
  
                  if (!$balquiler) {
                    echo "Error al consultar BD - alquiler - precio";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                }
              } else {
                if ($precio == "") {
                  // alquiler - metros
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE metros=$metros and tipo='alquiler'";
                  $balquiler = mysqli_query($conexion, $sql);
  
                  if (!$balquiler) {
                    echo "Error al consultar BD - alquiler - metros";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                } else {
                  //alquiler - metros - precio
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE metros=$metros and precio=$precio and tipo='alquiler'";
                  $balquiler = mysqli_query($conexion, $sql);
    
                  if (!$balquiler) {
                    echo "Error al consultar BD - alquiler - metros - precio";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                }
              }
            } else {
              if ($metros == "") {
                if ($precio == "") {
                  // alquiler - habitaciones
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and num_hab=$num_hab";
                  $balquiler = mysqli_query($conexion, $sql);
  
                  if (!$balquiler) {
                    echo "Error al consultar BD - alquiler - habitaciones";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                } else {
                  //alquiler -habitacions - precio
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and precio=$precio and num_hab=$num_hab";
                  $balquiler = mysqli_query($conexion, $sql);
    
                  if (!$balquiler) {
                    echo "Error al consultar BD - alquiler - precio - num_hab";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                }
              } else {
                if ($precio == "") {
                  // alquiler - metros
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and metros=$metros";
                  $balquiler = mysqli_query($conexion, $sql);
  
                  if (!$balquiler) {
                    echo "Error al consultar BD - alquiler - metros";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                } else {
                  //alquiler -habitaciones - metros - precio
                  $conexion = abrirConexion();
                  $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and precio=$precio and num_hab=$num_hab and metros=$metros";
                  $balquiler = mysqli_query($conexion, $sql);
    
                  if (!$balquiler) {
                    echo "Error al consultar BD - alquiler - precio - num_hab - metros";
                  } else {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                    </tr></tbody>";
                    }
                    echo "</table>";
                  }
                  mysqli_close($conexion); 
                }
              }
            }
          } else {
            if ($localidad == 'puebla'){
              if ($num_hab == "") {
                if ($metros == "") {
                  if ($precio == "") {
                    //alquiler  - localidad
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='La Puebla de Alfindén'";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //alquiler  - localidad - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='La Puebla de Alfindén' and precio=$precio";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad - precio";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  }
                } else {
                  if ($precio == "") {
                    // alquiler - localidad - metros
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='La Puebla de Alfindén' and metros=$metros";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad - metros";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //alquiler - localidad - metros - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='La Puebla de Alfindén' and precio=$precio and metros=$metros";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  }
                }
              } else {
                if ($metros == "") {
                  if ($precio == "") {
                    // alquiler -  -localidad - habitaciones
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='La Puebla de Alfindén' and num_hab like $num_hab";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad - habitaciones";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                        <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //alquiler - localidad - habitacions - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='La Puebla de Alfindén' and num_hab like $num_hab and precio like $precio";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad - habitaciones - precio";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                        <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  }
                } else {
                  if ($precio == "") {
                    // localidad - alquiler - metros
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='La Puebla de Alfindén' and metros like $metros";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - metros";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //alquiler - localidad - habitaciones - metros - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='La Puebla de Alfindén' and num_hab=$num_hab and metros=$metros and precio=$precio";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad-  habitaciones - metros - precio";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                        <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
  
                  }
                }
              }
            }
  
            if ($localidad == 'pastriz'){
              if ($num_hab == "") {
                if ($metros == "") {
                  if ($precio == "") {
                    //alquiler  - localidad
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='pastriz'";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //alquiler  - localidad - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='pastriz' and precio=$precio";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad - precio";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  }
                } else {
                  if ($precio == "") {
                    // alquiler - localidad - metros
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='pastriz' and metros=$metros";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad - metros";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //alquiler - localidad - metros - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='pastriz' and precio=$precio and metros=$metros";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  }
                }
              } else {
                if ($metros == "") {
                  if ($precio == "") {
                    // alquiler -  -localidad - habitaciones
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='pastriz' and num_hab like $num_hab";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad - habitaciones";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                        <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //alquiler - localidad - habitacions - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='pastriz' and num_hab like $num_hab and precio like $precio";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad - habitaciones - precio";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                        <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  }
                } else {
                  if ($precio == "") {
                    // localidad - alquiler - metros
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='pastriz' and metros like $metros";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - metros";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
                  } else {
                    //alquiler - localidad - habitaciones - metros - precio
                    $conexion = abrirConexion();
                    $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler' and localidad='pastriz' and num_hab=$num_hab and metros=$metros and precio=$precio";
                    $balquiler = mysqli_query($conexion, $sql);
      
                    if (!$balquiler) {
                      echo "Error al consultar BD - alquiler - localidad-  habitaciones - metros - precio";
                    } else {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Dirección</th><th>Localidad</th><th>Nº. Habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                      while ($fila = mysqli_fetch_array($balquiler, MYSQLI_ASSOC)) {
                        echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                        <td><form action='../ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      </tr></tbody>";
                      }
                      echo "</table>";
                    }
                    mysqli_close($conexion); 
  
                  }
                }
              }
            }
          }
        }
      echo "</div>";
    }//----fin isset
    return true;
  }
  
  static function borrar_inmueble(): bool {
    if (isset($_POST['borrar'])){
      $id = $_POST['id'];

      $conexion = abrirConexion();
      $img = "SELECT FROM tbl_inmuebles WHERE id='$id'";

      $url = mysqli_query($conexion,$img);

      // compruebo si tengo la ruta de la imagen del inmueble
      if (!$url){
          echo "Error al consulta la ruta de la imagen en la BD";
      }else{
          $fila = mysqli_fetch_array($url,MYSQLI_ASSOC);
          echo $fila['imagen'];
          // elimino la imagen del servidor
          if (!unlink($fila['imagen'])){
          echo "No se ha podido borrar la imagen del servidor";
          }else{
          echo "Imagen del inmueble borrada del servidor correctamente...";
          }
      }

      // una vez borrada la imagen del server procedo a borrar el inmueble de la BD
      $borrado = "DELETE FROM tbl_inmuebles WHERE id='$id'";

      $borrar = mysqli_query($conexion,$borrado);

      if ($borrar){
          echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
              <strong>EL iSe ha borrado correctamente el inmueble</strong> 
          </div>";
          echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=inmuebles.php'>";
      } else {
          echo "Error al eliminar el inmueble";
          echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=inmuebles.php'>";
      }

      mysqli_close($conexion);
      }
    return true;
  } /* -------------------- REVISAR -----*/

  static public function modificar_inmueble(): bool {

    if (isset($_POST['cancelar'])) {
      //echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=inmuebles.php'>";
    }

    if (isset($_POST['guardar'])) {
      $id = $_POST['id'];
      $tipo = $_POST['tipo'];
      $calle = $_POST['calle'];
      $portal = $_POST['portal'];
      $piso = $_POST['piso'];
      $puerta = $_POST['puerta'];
      $cp = $_POST['cp'];
      $localidad = $_POST['localidad'];
      $metros = $_POST['metros'];
      $num_hab = $_POST['num_hab'];
      $num_banos = $_POST['num_banos'];
      $garaje = $_POST['garaje'];
      $jardin = $_POST['jardin'];
      $piscina = $_POST['piscina'];
      $estado = $_POST['estado'];
      $titular = $_POST['titular'];
      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      $fecha_alta = $_POST['fecha_alta'];
      $id_cliente = $_POST['id_cliente'];

      $imagen = $_FILES['imagen']['name'];
      $imagen_tmp = $_FILES['imagen']['tmp_name'];
      $imagen_type = $_FILES['imagen']['type'];
      $imagen_size = $_FILES['imagen']['size'];
      
      $img_correcto = false;
      $modificar_imagen = false;

      // si el tamaño de la imagen es mayor que 0 significa que se quiere modificar
      if ($imagen_size > 0) {
        $modificar_imagen = true;
      }
      //si no se quiere modificar la imagen se actualizará todo menos esta, en caso contrario también se modificará la imagen
      if ($modificar_imagen) {
        
          //compruebo sea que sea una imagen
          if ($imagen_type != 'image/jpeg' && $imagen_type != 'image/png' ) {
            echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
            <h4><strong>¡Error!</strong>El tipo de imagen no es válido</h4><h5>Por favor, suba un archivo con formato: <b>.png</b> o <b>.jpeg</b></h5>
            </div></div></div>";
          }

        // subo la imagen al servidor
        if (!file_exists("../../../media/img/img_inmuebles")) {
          mkdir("../../../media/img/img_inmuebles");
          echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
            <strong>la carpeta se ha creado</strong> 
          </div>";
        } else {
          echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
            <strong>la carpeta estaba creada</strong> 
          </div>";
        }

            // creo la ruta donde guardar la foto dependiendo del tipo que sea
        if ($imagen_type){
          $ruta_img = "../../../media/img/img_inmuebles/$imagen";
          echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
            <strong>ruta correcta</strong> 
          </div>";
        } 

        // guardo la foto en el servidor
        if (move_uploaded_file($imagen_tmp, $ruta_img)) {
          $img_correcto = true;
        } else {
          echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
              <strong>Error al subir la imagen del inmueble al servidor</strong> 
            </div>";
          echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=inmuebles.php'>";
        }

        if ($img_correcto) {
          $conexion = abrirConexion();
          $sql = "UPDATE tbl_inmuebles SET tipo='$tipo',
          calle='$calle', portal='$portal', piso='$piso', puerta='$puerta',
          cp='$cp', localidad='$localidad', metros = '$metros', num_hab = '$num_hab',
          num_banos = '$num_banos',
          garaje = '$garaje',
          jardin = '$jardin',
          piscina = '$piscina',
          estado = '$estado',
          titular = '$titular',
          descripcion = '$descripcion',
          precio = '$precio',
          fecha_alta = '$fecha_alta',
          id_cliente = '$id_cliente',
          imagen = '$imagen'
          WHERE id='$id'";

        if (mysqli_query($conexion,$sql)) {
          echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
              <b>Datos actualizados correctamente</b> 
            </div>";
          echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=inmuebles.php'>";
        } else {
          
          echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
          <h4><strong>¡Error!</strong> No se han podido actualizar los datos</h4>
          </div></div></div>";
        }
        mysqli_close($conexion);
        }
      } else {
          $conexion = abrirConexion();
          $sql = "UPDATE tbl_inmuebles SET tipo='$tipo',
          calle='$calle', portal='$portal', piso='$piso', puerta='$puerta',
          cp='$cp', localidad='$localidad', metros = '$metros', num_hab = '$num_hab',
          num_banos = '$num_banos',
          garaje = '$garaje',
          jardin = '$jardin',
          piscina = '$piscina',
          estado = '$estado',
          titular = '$titular',
          descripcion = '$descripcion',
          precio = '$precio',
          fecha_alta = '$fecha_alta',
          id_cliente = '$id_cliente'
          WHERE id='$id'";

        if (mysqli_query($conexion,$sql)) {
          echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
              <b>Datos actualizados correctamente</b> 
            </div>";
          echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=inmuebles.php'>";
        } else {
          
          echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
          <h4><strong>¡Error!</strong> No se han podido actualizar los datos</h4>
          </div></div></div>";
        }
        mysqli_close($conexion);
      }

    }
    return true;
  }
}
<?php

function iniciar_sesion(){
 /* if (isset($_SESSION['tipo'])) {*/
    if ($_SESSION['tipo'] == 'u') {
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=home.php'>";
    } else if ($_SESSION['tipo'] == 'a') {
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=home.php'>";
    }

    if (isset($_POST['acceder'])) {
      $usuario = $_POST['nick'];
      $pass = $_POST['password'];

      $con = abrirConexion();
      $sql = "SELECT * FROM tbl_usuarios WHERE nom_user='$usuario' and pass='$pass'";
      $consulta = mysqli_query($con, $sql);

      if ($consulta) {
        if (mysqli_num_rows($consulta) > 0) {
          $fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
          $_SESSION['id_usuario'] = $fila['id'];

          if ($usuario == 'administrador') {
            $_SESSION['tipo'] = 'a';
            $_SESSION['nombre'] = 'Administrador';
            $home = "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=home.php'>";
          } else {
            $_SESSION['tipo'] = 'u';
            $_SESSION['nombre'] = $fila['nombre'] . ' ' . $fila['apellidos'];
            $home = "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=home.php'>";
          }

          if (isset($_POST['check'])) {
            $datos = session_encode();
            setcookie('datos', $datos, time() + (15 * 24 * 60 * 60), '/');
          }

          echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
          <strong>¡Acceso correcto!</strong> 
          </div>";
        } else {
          echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
          <h4><strong>¡Error!</strong> Usuario o contraseña incorrectos</h4></div></div></div>";
        }
      } else {
        echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
        <h4><strong>¡Error!</strong> Usuario o contraseña incorrectos</h4></div></div></div>";
      }
      echo $home;
    }
 /* }*/
}

function comprobarUsuario() {
  if (isset($_SESSION['tipo'])){
    if ($_SESSION['tipo'] != 'u'){
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../home.php'>";
    }
    
  }else if ($_COOKIE['datos']){
      session_decode($_COOKIE['datos']);
      if ($_SESSION['tipo'] != 'u'){
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../home.php'>";
      }
  }else{
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../home.php'>";
  }
}

function comprobarAdmin() {
  if (isset($_SESSION['tipo'])){
    if ($_SESSION['tipo'] != 'a'){
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../../../php/home.php'>";
    }
  } else if ($_COOKIE['datos']) {
    session_decode($_COOKIE['datos']);
    if ($_SESSION['tipo'] != 'a'){
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../home.php'>";
    }
  } else {
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../home.php'>";
  }
}

function comprobarIndex() {
  if (isset($_SESSION['tipo'])){
    //echo "Tipo: ".$_SESSION['tipo']." - Desde sesión";
  }else if (isset($_COOKIE['datos'])){
    session_decode($_COOKIE['datos']);
    //echo "Tipo: ".$_SESSION['tipo']." - Desde cookies";
  }else{
    //echo "No hay sesión";
  }
}

function buscar_Inmuebles() {
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
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                    echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                    echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                    echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                    echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                    echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                    echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                    echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                    echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                  <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                    <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
                      echo "<tbody><tr><td>$fila[calle]</td><td>$fila[localidad]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='../media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                      <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
}



function registrarse() {
  if (isset($_POST['cancelar'])) {
    header("url=../index.php");
  }

  if (isset($_POST['alta_usuario'])) {
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

function datos_noticia() {
  if (isset($_POST['ver'])) {
    $id = $_POST['id'];
    $conexion = abrirConexion();
    $consulta = "SELECT * FROM tbl_noticias WHERE id='$id'";
    $noticia = mysqli_query($conexion,$consulta);

    if (!$noticia) {
      echo "¡Error! No se ha podido acceder a la noticia :(";
    } else {
      while ($fila = mysqli_fetch_array($noticia, MYSQLI_ASSOC)) {
        $titular = $fila['titular'];
        $contenido = $fila['contenido'];
        $imagen = $fila['imagen'];
        $fecha = $fila['fecha'];

        echo "<div class='container-fluid cabecera-menu-inicio'>
        <div class='row'>
          <div class='col-sm-8 col-sm-offset-2'>
            <center><img src='../media/img/img_noticias/$imagen' alt='img-inmueble' img-align='center' width='60%'></center>
            <div class='contenido-noticia'>
              <h1><b> $titular</b></h1>
                  <p align='justify'> $contenido</p>
                  <p><b>Fecha de publicación: </b>$fecha</p>
                  <a class='btn btn-theme' href='./home.php'>Volver a <b>Inicio</b></a>
            </div>
          </div>
        </div>
      </div>";
      }
    }
    mysqli_close($conexion);
  }
}

/* USUARIOS */
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
       nom_user='$nom_user' HERE id='$id'";

      $sql2 = "UPDATE tbl_clientes SET calle='$calle', portal='$portal', piso='$piso', puerta='$puerta', cp='$cp', localidad='$localidad'
      HERE id='$id'";

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
       nom_user='$nom_user' HERE id='$id'";

      $sql2 = "UPDATE tbl_clientes SET calle='$calle', portal='$portal', piso='$piso', puerta='$puerta', cp='$cp', localidad='$localidad'
      HERE id='$id'";

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

function añadir_favorito(): bool  {/***** MEJORA ******/
  if (isset($_POST['añadir_favorito'])) {
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


/* ADMINISTRADOR */
function listar_inmuebles() {
  echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2 tnoticias'>
  <h2 class='margen-noticias tnoticias' align='center'>Aquí tienes los inmuenles de tu búsqueda</h2>";
 
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
      echo "<table class='table table-hover'>";
      echo "<thead><tr><th>ID</th><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver inmueble</th><th>Modificar inmueble</th></tr></thead>";
      while ($fila = mysqli_fetch_array($datos,MYSQLI_ASSOC)) {
        echo "<tbody><tr><td>$fila[id]</td><td>$fila[calle] $fila[portal]</td><td>$fila[precio] €</td><td><img src='../../../media/img/img_inmuebles/$fila[imagen]' style='width:150px''></td></td>
        <td><form action='/./php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
        <td><form action='modificar_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
      }
    }
      echo "</table>";
  }
  mysqli_close($conexion);
  modificar_inmueble();
}
function añadir_inmuebles() {

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

function buscar_inmuebles_admin(){  
  if (isset($_POST['buscar_inm'])){
    $tipo = $_POST['tipo'];
    $calle = $_POST['calle'];
    $portal = $_POST['portal'];
    $piso = $_POST['piso'];
    $puerta = $_POST['puerta'];
    $direccion = $calle . $portal . $piso . $puerta;
    $metros = $_POST['metros'];
    $precio = $_POST['precio'];

    if ($tipo == "compra"){ //SI venta
      if($direccion != ""){   //SI  venta y direccion
        if($metros != ""){ // SI  venta, direccion y metros 
          if($precio != ""){//SI  venta, direccion, metros y precio
            $con = abrirConexion();
            $sql = "SELECT *
                    FROM tbl_inmuebles
                    WHERE calle=$calle
                    WHERE portal=$portal
                    WHERE piso=$piso
                    WHERE metros=$metros
                    WHERE precio=$precio 
                    and tipo='venta'";
            $ballventa = mysqli_query($con,$sql);

            if (!$ballventa){
              echo "Error al consultar BD - Venta - Direccion. - Metros<sup>2</sup>  - Precio SI";
            }else{
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th><th>Metros<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($ballventa,MYSQLI_ASSOC)){
                echo "<tbody><tr><td>$direccion</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
              <td><form action='../../php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
              }
              echo "</table>";
            }
            mysqli_close($con);
          }/*else if($precio == ""){ //buscamos por venta, numero de habitaciones y metros 
            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_inmuebles WHERE num_hab='%num_hab%' WHERE metros='%metros%' and tipo='venta'";
            $bhmventa = mysqli_query($con,$sql);

            if (!$bhmventa){
              echo "Error al consultar BD - Venta -Nº. habitaciones - precio SI";
            }else{
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Nº. habitaciones</th><th>Metros<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($bhmventa,MYSQLI_ASSOC)){
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
              <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
            }
              echo "</table>";
            }
            mysqli_close($con);      
          }//------cierre llave if precio*/
          //buscamos por venta, dirección y metros
          $con = abrirConexion();
          $sql = "SELECT * FROM tbl_inmuebles WHERE direccion='%direccion%' WHERE metros='%metros%' and tipo='venta'";
          $bhmventa = mysqli_query($con,$sql);

          if (!$bhmventa){
            echo "Error al consultar BD - Venta - Metros - direccion SI";
          }else{
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>Dirección</th><th>Metros<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
            while ($fila = mysqli_fetch_array($bhmventa,MYSQLI_ASSOC)){
              echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
            <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
            </tr></tbody>";
          }
            echo "</table>";
          }
          mysqli_close($con);
        
          
        }else if($metros == ""){//SI  venta y direccion
          $con = abrirConexion();
          $sql = "SELECT * FROM tbl_inmuebles WHERE direccion='%direccion%' and tipo='venta'";

          $bhventa = mysqli_query($con,$sql);

          if (!$bhventa){
            echo "Error al consultar BD - Venta y direccion SI";
          }else{
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>Dirección</th><th>Metros<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
            while ($fila = mysqli_fetch_array($bhventa,MYSQLI_ASSOC)){
              echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
            <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
            </tr></tbody>";
          }
            echo "</table>";
          }
          mysqli_close($con);

        }//llave cierre metros 
      }
      $con = abrirConexion();
      $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='venta'";
      $bventa = mysqli_query($con,$sql);

      if (!$bventa){
        echo "Error al consultar BD - Venta SI";
      }else{
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
        while ($fila = mysqli_fetch_array($bventa,MYSQLI_ASSOC)){
          echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
        <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
        </tr></tbody>";
      }
        echo "</table>";
      }
      mysqli_close($con);
    }else if($tipo == "alquiler"){ //buscamos por alquiler
      $con = abrirConexion();
      $sql = "SELECT * FROM tbl_inmuebles WHERE tipo='alquiler'";
      $balquiler = mysqli_query($con,$sql);

      if (!$balquiler){
        echo "Error al consultar BD - Alquiler SI";
      }else{
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
        while ($fila = mysqli_fetch_array($balquiler,MYSQLI_ASSOC)){
          echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='../../php/$fila[imagen]' width='150px'></td>
        <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
        </tr></tbody>";
        }
        echo "</table>";
      }
      mysqli_close($con);
    }
  }//llave cierre  if (isset($_POST['buscar_inm']))
  
} /* -------------------- REVISAR -----*/

function borrar_inmueble(){
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
} /* -------------------- REVISAR -----*/

  function modificar_inmueble() {
    if (isset($_POST['cancelar'])) {
      header("url=inmuebles.php");
    }
  
    if (isset($_POST['modificar'])) {
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
        if (!file_exists("/./media/img/img_inmuebles")) {
          mkdir("/./media/img/img_inmuebles");
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
          $ruta_img = "/./media/img/img_inmuebles/$imagen";
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
          $sql = "UPDATE tbl_usuarios SET tipo='$tipo',
          calle='$calle', portal='$portal', piso='$piso', puerta='$puerta',
          cp='$cp', localidad='$localidad',metros = '$metros',num_hab = '$num_hab',
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
      }
  }
  }

function añadir_noticias() : bool {
  if (isset($_POST['añadir_noticia'])) {
    $id = $_POST['id'];
    $titular = $_POST['titular'];
    $contenido = $_POST['contenido'];
    $fecha = $_POST['fecha'];

    $imagen = $_FILES['imagen']['name'];
    $imagen_tmp = $_FILES['imagen']['tmp_name'];
    $imagen_type = $_FILES['imagen']['type'];
    
    $img_correcto = false;

    //comprobamos que la extensión de la imagen sea válida
    if ($imagen_type != 'image/jpeg' && $imagen_type != 'image/png' ) {
      echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
        <h4><strong>¡Error!</strong>El tipo de imagen no es válido</h4><h5>Por favor, suba un archivo con formato: <b>.png</b> o <b>.jpeg</b></h5>
        </div></div></div>";
    }

    // subimos la imagen al servidor
    if (!file_exists('../../../media/img/img_noticias')) {
      mkdir('../../../media/img/img_noticias');
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
      $ruta_img = "../../../media/img/img_noticias/$imagen";
      echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
        <strong>ruta correcta</strong> 
      </div>";
    } 
              
    // guardo la foto en el servidor
    if (move_uploaded_file($imagen_tmp, $ruta_img)) {
      $img_correcto = true;
    } else {
      echo "<div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
              <strong>Error al subir la imagen al servidor</strong> 
              </div>";
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=noticias.php'>";
    }
echo $imagen;
    if ($img_correcto) {
      $conexion = abrirConexion();
      $sql = "INSERT INTO tbl_noticias (id, titular, contenido, imagen, fecha) VALUES
      ('$id','$titular','$contenido','$imagen', '$fecha')";
      
      if(mysqli_query($conexion, $sql)) {
        echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
              <strong>Noticia publicada correctamente</strong> 
            </div>";
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=noticias.php'>";
      } else {
        echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
          <h4><strong>¡Error!</strong>No ha sido posible publicar la noticia</h4>
        </div></div></div>";
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=noticias.php'>";
      }
    }
    mysqli_close($conexion);
  }
  return true;
}

function buscar_noticias() : bool {
  if (isset($_POST['buscar'])) {
    $titular = $_POST['titular'];

    echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2 tnoticias'>
    <h2 class='margen-noticias tnoticias' align='center'>Aquí tienes los resultados de tu búsqueda</h2>";
   
    
    $conexion = abrirConexion();
    $consulta = "SELECT * FROM tbl_noticias WHERE titular='$titular'";

    $busqueda = mysqli_query($conexion,$consulta);

    if (!$busqueda) {
      echo "No se han encontrado coincidencias...";
    } else {
      $num_filas = mysqli_num_rows($busqueda);
      if ($num_filas == 0) {
        echo "Sin coincidencias";
      } else {
        echo "Se listarán $num_filas noticias relacionadas..."; 
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>Titular</th><th>Fecha de publicación</th><th>Imagen</th><th>Ver</th></tr></thead>";
        while ($fila = mysqli_fetch_array($busqueda,MYSQLI_ASSOC)) {
          echo "<tbody><tr><td><strong>$fila[titular]</strong></td><td>$fila[fecha]</td><td><img src='../../../media/img/img_noticias/$fila[imagen]' width='150px'></td>
          <td><form action='../../../php/ver_noticia.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-theme' type='submit' name='ver' value='Leer Más'></form></td></tr></tbody>";
        }
        echo "</table>";
        echo "</div>";
      }

    }
    mysqli_close($conexion);
  }
  return true;
}

function borrar_noticias(): bool {
  if (isset($_POST['borrar'])) {
    $id = $_POST['id'];
    $conexion = abrirConexion();
    $borrar = "DELETE FROM tbl_noticias WHERE id='$id'";
    if (mysqli_query($conexion,$borrar)) {
     echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
          <strong> Se ha borrado correctamente la notia</strong> 
        </div>";
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=noticias.php'>";
    } else {
      echo "<p>¡Error! No se ha podido borrar la noticia...</p>";
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=noticias.php'>";
    }
    mysqli_close($conexion);
  }
  return true;
}



function añadir_cliente(): bool {
  if (isset($_POST['cancelar'])) {
    header("url=/clientes.php");
  }

  if (isset($_POST['nuevo_cliente'])) {
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $calle = $_POST['calle'];
    $portal = $_POST['portal'];
    $piso = $_POST['piso'];
    $puerta = $_POST['puerta'];
    $cp = $_POST['cp'];
    $localidad = $_POST['localidad'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $conexion = abrirConexion();

    $sql = "INSERT INTO tbl_clientes (id, tipo, nombre, apellidos, telefono, email, calle, portal, piso, puerta, cp, localidad) VALUES
    ('$id', '$tipo', '$nombre', '$apellidos', '$telefono', '$email','$calle', '$portal', '$piso','$puerta', '$cp','$localidad')";

    if (mysqli_query($conexion,$sql)) {
      echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
                  <strong>Cliente añadido correctamente</strong> 
                </div>";
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=clientes.php'>";
    } else {
      echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
              <h4><strong>¡Error!</strong>No ha sido posible añadir el cliente</h4>
            </div></div></div>";
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=clientes.php'>";
    }
  mysqli_close($conexion);
  }
  return true;
}

function buscar_cliente() {
  if (isset($_POST['buscar'])) {
    $id = $_POST['id'];
    $tipo =$_POST['tipo'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $localidad = $_POST['localidad'];

    if ($id == "") {
      if ($tipo == "") {
        if ($nombre == "") {
          if ($apellidos == "") {
            if ($localidad == "") {
            } else {
              //buscamos por localidad
              $conexion = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE localidad='$localidad'";
              $buscar = mysqli_query($conexion, $sql);

              if (!$buscar) {
                echo "Error al consultar BD - localidad";
              } else {
                echo "<table class='table table-striped'>";
                echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Localidad</th><th>Ver</th></tr></thead>";
                while ($fila = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
                  echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[localidad]</td>n</td>
                <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
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
}

function modificar_cliente() {
  
  if (isset($_POST['cancelar'])) {
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=clientes.php'>";
  }

  if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $tipo = $_POST['tipo']; 
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $calle = $_POST['calle'];
    $portal = $_POST['portal'];
    $piso = $_POST['piso'];
    $puerta = $_POST['puerta'];
    $localidad = $_POST['localidad'];
    $cp = $_POST['cp'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
  
    $conexion = abrirConexion();
    $sql = "UPDATE tbl_clientes SET tipo='$tipo', nombre='$nombre', apellidos='$apellidos', calle='$calle,' portal='$portal', piso='$piso', puerta='$puerta', cp='$cp', localidad='$localidad' telefono='$telefono', email='$email' WHERE id='$id'";

    if (mysqli_query($conexion,$sql)) {
      echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
          <b>Datos actualizados correctamente</b> 
        </div>";
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=clientes.php'>";
    } else {
      echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
      <h4><strong>¡Error!</strong> No se han podido actualizar los datos</h4>
    </div></div></div>";
    }
    mysqli_close($conexion);
  }
  
  return true;
}

function añadir_citas(){
  if (isset($_POST['cancelar'])) {
    header('Location: citas.php');
  }
  if (isset($_POST['nueva_cita'])) {

    $mes = $_GET['mes'];
    $año= $_GET['año'];
    $dia = $_GET['dia'];

    // si isset de mes o dia pongo la fecha pasada por enlace, si no la del date de html
    if (isset($_GET['mes'])) {
      $fecha = $año."/".$mes."/".$dia;
    } else {
      $fecha = $_POST['fecha'];
    }

    
    $hora = $_POST['hora'];
    $motivo = $_POST['motivo'];
    $lugar = $_POST['lugar'];
    $id_cliente = $_POST['id_cliente'];

    // fecha actual
    $actual = date('Y-m-d');
    $marca_actual = strtotime($actual);
    $marca_fecha = strtotime($fecha);

    // hago la inserción si la fecha de la cita no es un día ya pasado
    if ($marca_fecha >= $marca_actual) {
        
        $conexion = abrirConexion();

        $sql = "INSERT INTO tbl_citas (id,fecha,hora,motivo,lugar,id_cliente) VALUES
        (null,'$fecha','$hora','$motivo','$lugar','$id_cliente')";

        if (mysqli_query($conexion,$sql)) {
         echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
                        <strong>Cita añadida correctamente</strong> 
                      </div>";
          echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=citas.php'>";
        } else {
           echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                        <h4><strong>¡Error!</strong>No se ha podido añadir la cita</h4>
                      </div></div></div>";
          echo "<META HTTP-EQUIV='REFRESH'CONTENT='2;URL=citas.php'>";
        }

        mysqli_close($conexion);
    } else {
      echo "La fecha introducída no es una fecha válida";
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=citas.php'>";
    }
  }
}

function buscar_citas() {
  if (isset($_POST['buscar_cita'])) {

    $fecha = $_POST['fecha'];
    $id_cliente = $_POST['id_cliente'];

    if ($fecha == "") {
      if ($id_cliente == "") {
        // No se realiza ninguna búsqueda porque no ha seleccionado nada
        echo "No ha seleccionado ningún criterio de búsqueda, vuelva a intentarlo";
      } else {
        // Aquí busco solo por el id del cliente
        $conexion = abrirConexion();
        $sql_id = "SELECT * FROM tbl_citas WHERE id_cliente='$id_cliente' order by fecha asc";

        $busca_cliente = mysqli_query($conexion,$sql_id);

        if (!$busca_cliente) {
          echo "Error al conectar BD-1";
        } else {
          $num_filas = mysqli_num_rows($busca_cliente);

          if ($num_filas == 0) {
            echo "No se han encontrado citas";
          } else {
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th></tr></thead>";
            while ($fila = mysqli_fetch_array($busca_cliente,MYSQLI_ASSOC)) {
              echo "<tbody><tr><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td></tr></tbody>";
            }
            echo "</table>";
          }
        }
        mysqli_close($conexion);
      }
    } else {
      echo $fecha;
      if ($id_cliente == "") {
        // aqui busco solo por la fecha
        $conexion = abrirConexion();
        $sql_fecha = "SELECT * FROM tbl_citas WHERE fecha='$fecha'";

        $busca_fecha = mysqli_query($conexion,$sql_fecha);

        if (!$busca_fecha) {
          echo "Error al conectar BD-2";
        } else {
          $num_filas = mysqli_num_rows($busca_fecha);

          if ($num_filas == 0) {
            echo "No se han encontrado citas";
          } else {
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th></tr></thead>";
            while ($fila = mysqli_fetch_array($busca_fecha,MYSQLI_ASSOC)) {
              echo "<tbody><tr><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td></tr></tbody>";
            }
            echo "</table>";
          }
        }
        mysqli_close($conexion);

      } else {
        // Aquí busco por FECHA y CLIENTE
        $conexion = abrirConexion();
        $sql_fe_cli = "SELECT * FROM tbl_citas WHERE fecha='$fecha' and id_cliente='$id_cliente'";

        $busca_fe_cli = mysqli_query($conexion,$sql_fe_cli);

        if (!$busca_fe_cli) {
          echo "Error al conectar BD-3";
        } else {
          $num_filas = mysqli_num_rows($busca_fe_cli);

          if ($num_filas == 0) {
            echo "No se han encontrado citas";
          } else {
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th></tr></thead>";
            while ($fila = mysqli_fetch_array($busca_fe_cli,MYSQLI_ASSOC)) {
            echo "<tbody><tr><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td></tr></tbody>";
            }
             echo "</table>";
          }
        }
      }
      
    } 
  }
}

function borrar_noticia(){
  if (isset($_POST['borrar'])) {
    $id = $_POST['id'];
    $conexion = abrirConexion();
    $borrar = "DELETE FROM tbl_citas where id='$id'";
    if (mysqli_query($conexion,$borrar)) {
      echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
          <strong>Cita borrada correctamente</strong> 
        </div>";
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=citas.php'>";
    } else {
      echo "<p>¡Error! No se ha podido borrar la cita...</p>";
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=citas.php'>";
    }
    mysqli_close($conexion);
  }
}

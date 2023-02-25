<?php
function comprobarIndex() {
  if (isset($_SESSION['tipo'])) {
    echo "Tipo: ".$_SESSION['tipo']." - Desde sesión";
  } else if (isset($_COOKIE['datos'])) {
    session_decode($_COOKIE['datos']);
    echo "Tipo: ".$_SESSION['tipo']." - Desde cookies";
  } else {
   echo "No hay sesión";
  }
}

function comprobarUsuario() {
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

function comprobarAdmin() {
  if (isset($_SESSION['tipo'])){
    if ($_SESSION['tipo'] != 'a'){
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../../../php/home.php'>";
    }
  } else if ($_COOKIE['datos']) {
    session_decode($_COOKIE['datos']);
    if ($_SESSION['tipo'] != 'a'){
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

    print_r($_POST);
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

function buscar_noticia() : bool {
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

function borrar_noticia(): bool {
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



function nuevo_cliente(): bool {
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

  if (isset($_POST['guardar'])) {
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

    print_r($_POST);
  
    $conexion = abrirConexion();
    $sql = "UPDATE tbl_clientes SET tipo='$tipo', nombre='$nombre', apellidos='$apellidos', calle='$calle', portal='$portal', piso='$piso',
     puerta='$puerta', cp='$cp', localidad='$localidad', telefono='$telefono', email='$email' WHERE id='$id'";


    if(mysqli_query($conexion,$sql)) {
      echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
          <b>Datos actualizados correctamente</b> 
        </div>";
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=clientes.php'>";
    } else {
      echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
      <h4><strong>¡Error!</strong> No se han podido actualizar los datos</h4>
    </div></div></div>";
    }
    //mysqli_close($conexion);
  }
  
  return true;
}

?>
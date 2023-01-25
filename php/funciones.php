<?php

function iniciar_sesion(){
  if ($_SESSION['tipo'] == 'u') {
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../home.php'>";
  } else if ($_SESSION['tipo'] == 'a') {
     echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../home.php'>";
  }

  if (isset($_POST['acceder'])) {
    $usuario = $_POST['nick'];
    $pass = $_POST['password'];

    $con = abrirConexion();
    $sql = "SELECT * from tbl_usuarios where nom_user='$usuario' and pass='$pass'";
    $consulta = mysqli_query($con, $sql);

    if ($consulta) {
      if (mysqli_num_rows($consulta) > 0) {
        $fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
        $_SESSION['id_usuario'] = $fila['id'];

        if ($usuario == 'administrador') {
          $_SESSION['tipo'] = 'a';
          $_SESSION['nombre'] = 'Administrador';
          $home = "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=../home.php'>";
        } else {
          $_SESSION['tipo'] = 'u';
          $_SESSION['nombre'] = $fila['nombre'] . ' ' . $fila['apellidos'];
          $home = "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=../home.php'>";
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

function comprobarAdmin(){
  if (isset($_SESSION['tipo'])){
    if ($_SESSION['tipo'] != 'a'){
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../home.php'>";
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

function comprobarIndex(){
  if (isset($_SESSION['tipo'])){
    //echo "Tipo: ".$_SESSION['tipo']." - Desde sesión";
  }else if (isset($_COOKIE['datos'])){
    session_decode($_COOKIE['datos']);
    //echo "Tipo: ".$_SESSION['tipo']." - Desde cookies";
  }else{
    //echo "No hay sesión";
  }
}

function buscar_Inmuebles(){ 
  if (isset($_POST['buscar_inm'])){
     $tipo = $_POST['tipo'];
     $num_hab = $_POST['num_hab'];
     $metros = $_POST['metros'];
     $precio = $_POST['precio'];

    if ($tipo == 'venta') { //buacamos por venta
        if ($num_hab != '') {//buscamos por venta - habitaciones
          if ($metros != '') { 
            if ($precio != '') { 
              $conexion = abrirConexion();// buscamos por venta - habitaciones - metros - precio
              $sql = "SELECT * from tbl_inmuebles where num_hab='$num_hab' and metros='$metros' and precio='$precio' and tipo='venta'";
              $bventa = mysqli_query($conexion, $sql);

              if (!$bventa) {
                echo "Error al consultar BD - venta - numero de hanitaciones - metros - precio";
              } else {
                echo "<table class='table table-striped'>";
                echo "<thead><tr><th>Dirección</th><th>Nº. habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                  echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='./php/$fila[imagen]' width='150px'></td>
                <td><form action='./php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
                </tr></tbody>";
                }
                echo "</table>";
              }
              mysqli_close($conexion);
            }// buscamos por venta - num_hab - metros
            $conexion = abrirConexion();
            $sql = "SELECT * from tbl_inmuebles where num_hab='$num_hab' and metros='$metros' and tipo='venta'";
            $bventa = mysqli_query($conexion, $sql);

            if (!$bventa) {
              echo "Error al consultar BD - venta - numero de hanitaciones - metros";
            } else {
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Nº. habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='./php/$fila[imagen]' width='150px'></td>
              <td><form action='./php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
              }
              echo "</table>";
            }
            mysqli_close($conexion);
          } else { //fin por venta - num_hab - metros
            $conexion = abrirConexion();
            $sql = "SELECT * from tbl_inmuebles where num_hab='$num_hab' and tipo='venta'";
            $bventa = mysqli_query($conexion, $sql);

            if (!$bventa) {
              echo "Error al consultar BD - venta - numero de hanitaciones";
            } else {
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Nº. habitaciones</th></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[num_hab]</td><td>$fila[precio]</td><td><img src='./php/$fila[imagen]' width='150px'></td>
              <td><form action='./php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
              }
              echo "</table>";
            }
            mysqli_close($conexion);
          }
        } else {
          $conexion = abrirConexion();
          $sql = "SELECT * from tbl_inmuebles where tipo='venta'";
          $bventa = mysqli_query($conexion, $sql);
  
          if (!$bventa) {
            echo "Error al consultar BD - venta - numero de hanitaciones";
          } else {
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>Dirección</th><th>Nº. abitaciones</th></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
                while ($fila = mysqli_fetch_array($bventa, MYSQLI_ASSOC)) {
                  echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[num_hab]</td><td>$fila[precio]</td><td><img src='media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
                <td><form action='./php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
                </tr></tbody>";
              }
              echo "</table>";
              }
          mysqli_close($conexion);
        }//fin venta - habitaciones
        
    }//-fin venta
  }//fin isset
}//fin buscar inmuebles

function listar_inmuebles(){
  $conexion = abrirConexion();
      $mostrar = "SELECT id, direccion, descripcion, precio, id_cliente, imagen
                  FROM tbl_inmuebles";
      $datos = mysqli_query($conexion,$mostrar);
      if (!$datos){
        echo "No hay datos que mostrar";
      }else{
        $num_filas = mysqli_num_rows($datos);

        if ($num_filas == 0){
          echo "No hay ningún inmueble almacenado";
        }else{
          echo "<p><strong>Total de inmuebles almacenados:</strong> $num_filas</p>";
          echo "<table class='table table-hover'";
          echo "<thead><tr><th>ID</th><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Disponibilidad</th><th>Ver inmueble</th><th>Modificar inmueble</th></tr></thead>";
          while ($fila = mysqli_fetch_array($datos,MYSQLI_ASSOC)) {
            // si es el usuario 'disponible' muestro cartel de disponible
            if ($fila['id_cliente'] == 0) {
              echo "<tbody><tr><td>$fila[id]</td><td>$fila[direccion]</td><td>$fila[precio] €</td><td><img src='$fila[imagen]' style='width:150px''></td><td><button type='button' class='btn btn-success'>Disponible</button></td></td>
            <td><form action='/php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
            <td><form action='modificar_inmueble.php' method='get'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
            }else{
              echo "<tbody><tr><td>$fila[id]</td><td>$fila[direccion]</td><td>$fila[precio] €</td><td><img src='$fila[imagen]' style='width:150px''></td><td><button type='button' class='btn btn-danger'>No disponible</button></td></td>
                    <td><form action='/php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
                    <td><form action='modificar_inmueble.php' method='get'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
            }
          }
          echo "</table>";
        }
      }
      mysqli_close($conexion); 
}

function datos_noticia() {
  if (isset($_POST['ver'])) {
    $id = $_POST['id'];
    $conexion = abrirConexion();
    $consulta = "SELECT * from tbl_noticias where id='$id'";
    $noticia = mysqli_query($conexion,$consulta);

    if (!$noticia) {
      echo "¡Error! No se ha podido acceder a la noticia :(";
    } else {
      while ($fila = mysqli_fetch_array($noticia, MYSQLI_ASSOC)) {
        $titular = $fila['titular'];
        $contenido = $fila['contenido'];
        $imagen = $fila['imagen'];
        $fecha = $fila['fecha'];
      }
    }
    mysqli_close($conexion);
  }
}

/* CLIENTE */

function gestion_datos_usuario(): bool {

  $id = $_SESSION['id_usuario'];

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

     $con = abrirConexion();
   
     $sql = "UPDATE tbl_usuarios SET pass='$password' WHERE id='$id'";
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
  return true;
}


/* ADMINISTRADOR */
function añadir_inmuebles(){

  if (isset($_POST['nuevo_inmueble'])){
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $direccion = $_POST['direccion'];
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
    if (!file_exists('../../../php/img_inmuebles')){
      mkdir('../../../php/img_inmuebles');
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
      $ruta_img = "../../../php/img_inmuebles/$imagen";
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
      ($id, '$tipo', '$direccion', $cp, '$zona', $metros, $num_hab, $banos, '$garaje', '$jardin', '$piscina', '$estado', '$descripcion', $precio, '$imagen', '$fecha_alta', $id_cliente)";

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
    $direccion = $_POST['direccion'];
    $metros = $_POST['metros'];
    $precio = $_POST['precio'];

    if ($tipo == "compra"){ //SI venta
      if($direccion != ""){   //SI  venta y direccion
        if($metros != ""){ // SI  venta, direccion y metros 
          if($precio != ""){//SI  venta, direccion, metros y precio
            $con = abrirConexion();
            $sql = "SELECT * from tbl_inmuebles where direccion like '%direccion%' where metros like '%metros%' where precio like precio '%precio%' and tipo='venta'";
            $ballventa = mysqli_query($con,$sql);

            if (!$ballventa){
              echo "Error al consultar BD - Venta - Direccion. - Metros<sup>2</sup>  - Precio SI";
            }else{
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th><th>Metros<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($ballventa,MYSQLI_ASSOC)){
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='media/img/img_inmuebles/$fila[imagen]' width='150px'></td>
              <td><form action='../../php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
              }
              echo "</table>";
            }
            mysqli_close($con);
          }/*else if($precio == ""){ //buscamos por venta, numero de habitaciones y metros 
            $con = abrirConexion();
            $sql = "SELECT * from tbl_inmuebles where num_hab like '%num_hab%' where metros like '%metros%' and tipo='venta'";
            $bhmventa = mysqli_query($con,$sql);

            if (!$bhmventa){
              echo "Error al consultar BD - Venta -Nº. habitaciones - precio SI";
            }else{
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Nº. habitaciones</th><th>Metros<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($bhmventa,MYSQLI_ASSOC)){
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
              <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
            }
              echo "</table>";
            }
            mysqli_close($con);      
          }//------cierre llave if precio*/
          //buscamos por venta, dirección y metros
          $con = abrirConexion();
          $sql = "SELECT * from tbl_inmuebles where direccion like '%direccion%' where metros like '%metros%' and tipo='venta'";
          $bhmventa = mysqli_query($con,$sql);

          if (!$bhmventa){
            echo "Error al consultar BD - Venta - Metros - direccion SI";
          }else{
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>Dirección</th><th>Metros<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
            while ($fila = mysqli_fetch_array($bhmventa,MYSQLI_ASSOC)){
              echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
            <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
            </tr></tbody>";
          }
            echo "</table>";
          }
          mysqli_close($con);
        
          
        }else if($metros == ""){//SI  venta y direccion
          $con = abrirConexion();
          $sql = "SELECT * from tbl_inmuebles where direccion like '%direccion%' and tipo='venta'";

          $bhventa = mysqli_query($con,$sql);

          if (!$bhventa){
            echo "Error al consultar BD - Venta y direccion SI";
          }else{
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>Dirección</th><th>Metros<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
            while ($fila = mysqli_fetch_array($bhventa,MYSQLI_ASSOC)){
              echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
            <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
            </tr></tbody>";
          }
            echo "</table>";
          }
          mysqli_close($con);

        }//llave cierre metros 
      }
      $con = abrirConexion();
      $sql = "SELECT * from tbl_inmuebles where tipo='venta'";
      $bventa = mysqli_query($con,$sql);

      if (!$bventa){
        echo "Error al consultar BD - Venta SI";
      }else{
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
        while ($fila = mysqli_fetch_array($bventa,MYSQLI_ASSOC)){
          echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
        <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
        </tr></tbody>";
      }
        echo "</table>";
      }
      mysqli_close($con);
    }else if($tipo == "alquiler"){ //buscamos por alquiler
      $con = abrirConexion();
      $sql = "SELECT * from tbl_inmuebles where tipo='alquiler'";
      $balquiler = mysqli_query($con,$sql);

      if (!$balquiler){
        echo "Error al consultar BD - Alquiler SI";
      }else{
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
        while ($fila = mysqli_fetch_array($balquiler,MYSQLI_ASSOC)){
          echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='../../php/$fila[imagen]' width='150px'></td>
        <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
        </tr></tbody>";
        }
        echo "</table>";
      }
      mysqli_close($con);
    }
  }//llave cierre  if (isset($_POST['buscar_inm']))
  
}

function borrar_inmueble(){
  if (isset($_POST['borrar'])){
    $id = $_POST['id'];

    $conexion = abrirConexion();
    $img = "SELECT from tbl_inmuebles where id='$id'";

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
    $borrado = "DELETE from tbl_inmuebles where id='$id'";

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
    if ($imagen_type != 'image/jpeg' && $imagen_type != 'image/png'){
      echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
        <h4><strong>¡Error!</strong>El tipo de imagen no es válido</h4><h5>Por favor, suba un archivo con formato: <b>.png</b> o <b>.jpeg</b></h5>
        </div></div></div>";
    }

    // subimos la imagen al servidor
    if (!file_exists('../../../php/img_noticias')){
      mkdir('../../../php/img_noticias');
      echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
        <strong>la carpeta se ha creado</strong> 
      </div>";
    }else{
      echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
      <strong>la carpeta estaba creada</strong> 
      </div>";
    }
                
    // creo la ruta donde guardar la foto dependiendo del tipo que sea
    if ($imagen_type){
        $ruta_img = "../../../php/img_noticias/$imagen";//.'$direccion.jpeg';
        echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
            <strong>ruta correcta</strong> 
          </div>";
          echo $ruta_img;
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

    if ($img_correcto) {
      $conexion = abrirConexion();
      $insertar = "INSERT into tbl_noticias (id, titular, contenido, imagen, fecha) VALUES
      ('$id','$titular','$contenido','$ruta_img', '$fecha')";
      
      if(mysqli_query($conexion, $insertar)) {
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

function borrar_noticias(): bool {
  if (isset($_POST['borrar'])) {
    $id = $_POST['id'];
    $conexion = abrirConexion();
    $borrar = "DELETE from tbl_noticias where id='$id'";
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
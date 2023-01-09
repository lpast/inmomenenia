<?php

function iniciar_sesion(){
  if ($_SESSION['tipo'] == 'u'){
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
  }else if ($_SESSION['tipo'] == 'a'){
     echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
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

        if ($usuario == 'administrador'){
          $_SESSION['tipo'] = 'a';
          $_SESSION['nombre'] = 'Administrador';

        } else {
          $_SESSION['tipo'] = 'u';
          $_SESSION['nombre'] = $fila['nombre'] . ' ' . $fila['apellidos'];
        }

        if (isset($_POST['check'])) {
          $datos = session_encode();
          setcookie('datos', $datos, time() + (15 * 24 * 60 * 60), '/');
        }
        echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
          <strong>¡Acceso correcto!</strong> 
          </div>";
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=../index.php'>";
      } else {
        echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
          <h4><strong>¡Error!</strong> Usuario o contraseña incorrectos</h4></div></div></div>";
      }
    } else {
      echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
        <h4><strong>¡Error!</strong> Usuario o contraseña incorrectos</h4></div></div></div>";
    }
  }
}

function comprobarUsuario() {
  if (isset($_SESSION['tipo'])){
    if ($_SESSION['tipo'] != 'u'){
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
    }
    
  }else if ($_COOKIE['datos']){
      session_decode($_COOKIE['datos']);
      if ($_SESSION['tipo'] != 'u'){
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
      }
  }else{
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
  }
}

function comprobarAdmin(){
  if (isset($_SESSION['tipo'])){
    if ($_SESSION['tipo'] != 'a'){
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
    }
  } else if ($_COOKIE['datos']) {
    session_decode($_COOKIE['datos']);
    if ($_SESSION['tipo'] != 'a'){
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
    }
  } else {
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
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

    if ($tipo == "compra"){ //SI venta
      if($num_hab != ""){   //SI  venta y numero de habitaciones
        if($metros != ""){ // SI  venta, numero de habitaciones y metros 
          if($precio != ""){//SI  venta, numero de habitaciones, metros y precio
            $con = abrirConexion();
            $sql = "SELECT * from tbl_inmuebles where num_hab like '%num_hab%' where metros like '%metros%' where precio like precio '%precio%' and tipo='venta'";
            $ballventa = mysqli_query($con,$sql);

            if (!$ballventa){
              echo "Error al consultar BD - Venta - Nº de hab. - Metros<sup>2</sup>  - Precio SI";
            }else{
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Nº. habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($ballventa,MYSQLI_ASSOC)){
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
              <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
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
          //buscamos por venta numero de habitaciones y metros
          $con = abrirConexion();
          $sql = "SELECT * from tbl_inmuebles where num_hab like '%num_hab%' where metros like '%metros%' and tipo='venta'";
          $bhmventa = mysqli_query($con,$sql);

          if (!$bhmventa){
            echo "Error al consultar BD - Venta - Metros - Habitaciones SI";
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
        
          
        }else if($metros == ""){//SI  venta y numero de habitaciones
          $con = abrirConexion();
          $sql = "SELECT * from tbl_inmuebles where num_hab like '%num_hab%' and tipo='venta'";

          $bhventa = mysqli_query($con,$sql);

          if (!$bhventa){
            echo "Error al consultar BD - Venta y Habitaciones SI";
          }else{
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>Dirección</th><th>Nº.habitaciones</th><th>Metros<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
            while ($fila = mysqli_fetch_array($bhventa,MYSQLI_ASSOC)){
              echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
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
    }else
    /*if ($tipo == "alquilar"){ //SI alquiler
      if($num_hab != ""){   //SI  alquiler y numero de habitaciones
        if($metros != ""){ // SI  alquiler, numero de habitaciones y metros 
          if($precio != ""){//SI  alquiler, numero de habitaciones, metros y precio
            $con = abrirConexion();
            $sql = "SELECT * from tbl_inmuebles where num_hab like '%num_hab%' where metros like '%metros%' where precio like precio '%precio%' and tipo='alquiler'";
            $ballalquiler = mysqli_query($con,$sql);

            if (!$ballalquiler){
              echo "Error al consultar BD - alquiler - Nº de hab. - Metros<sup>2</sup>  - Precio SI";
            }else{
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Nº. habitaciones</th><th>M<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($ballalquiler,MYSQLI_ASSOC)){
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
              <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
              }
              echo "</table>";
            }
            mysqli_close($con);
          }/*else if($precio == ""){ //buscamos por alquiler, numero de habitaciones y metros 
            $con = abrirConexion();
            $sql = "SELECT * from tbl_inmuebles where num_hab like '%num_hab%' where metros like '%metros%' and tipo='alquiler'";
            $bhmalquiler = mysqli_query($con,$sql);

            if (!$bhmalquiler){
              echo "Error al consultar BD - alquiler -Nº. habitaciones - precio SI";
            }else{
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Nº. habitaciones</th><th>Metros<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($bhmalquiler,MYSQLI_ASSOC)){
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
              <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
            }
              echo "</table>";
            }
            mysqli_close($con);      
          }//------cierre llave if precio
          //buscamos por alquiler numero de habitaciones y metros
          $con = abrirConexion();
          $sql = "SELECT * from tbl_inmuebles where num_hab like '%num_hab%' where metros like '%metros%' and tipo='alquiler'";
          $bhmalquiler = mysqli_query($con,$sql);

          if (!$bhmalquiler){
            echo "Error al consultar BD - alquiler - Metros - Habitaciones SI";
          }else{
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>Dirección</th><th>Nº. habitaciones</th><th>Metros<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
            while ($fila = mysqli_fetch_array($bhmalquiler,MYSQLI_ASSOC)){
              echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
            <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
            </tr></tbody>";
          }
            echo "</table>";
          }
          mysqli_close($con);
        
          
        }else if($metros == ""){//SI  alquiler y numero de habitaciones
          $con = abrirConexion();
          $sql = "SELECT * from tbl_inmuebles where num_hab like '%num_hab%' and tipo='alquiler'";

          $bhalquiler = mysqli_query($con,$sql);

          if (!$bhalquiler){
            echo "Error al consultar BD - alquiler y Habitaciones SI";
          }else{
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>Dirección</th><th>Nº.habitaciones</th><th>Metros<sup>2</sup></th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
            while ($fila = mysqli_fetch_array($bhalquiler,MYSQLI_ASSOC)){
              echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[num_hab]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
            <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
            </tr></tbody>";
          }
            echo "</table>";
          }
          mysqli_close($con);

        }//llave cierre metros 
      }
      $con = abrirConexion();
      $sql = "SELECT * from tbl_inmuebles where tipo='alquiler'";
      $balquiler = mysqli_query($con,$sql);

      if (!$balquiler){
        echo "Error al consultar BD - alquiler SI";
      }else{
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
        while ($fila = mysqli_fetch_array($balquiler,MYSQLI_ASSOC)){
          echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
        <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
        </tr></tbody>";
      }
        echo "</table>";
      }
      mysqli_close($con);
    }*/
    


    if($tipo == "alquiler"){ //buscamos por alquiler
      $con = abrirConexion(); 
      $sql = "SELECT * from tbl_inmuebles where tipo='alquiler'";
      $balquiler = mysqli_query($con,$sql);

      if (!$balquiler){
        echo "Error al consultar BD - Alquiler SI";
      }else{
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
        while ($fila = mysqli_fetch_array($balquiler,MYSQLI_ASSOC)){
          echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
        <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
        </tr></tbody>";
        }
        echo "</table>";
      }
      mysqli_close($con);
    }
  }//llave cierre  if (isset($_POST['buscar_inm']))
}


function inmuebles_cliente (){
  $id = $_SESSION['id_usuario'];
  $con = abrirConexion();
  $sql = "SELECT * FROM tbl_inmuebles WHERE id_cliente='$id'";
  $consulta = mysqli_query($con,$sql);

  if (!$consulta) {
    echo "Error al realizar la consulta";
  } else {
    $num_filas = mysqli_num_rows($consulta);
    if ($num_filas == 0) {
      echo "<div class='alert alert-warning warning-new col-sm-6 col-sm-offset-3' align='center'>
              <h2>Aún no tienen ningún inmueble comprado :(</h2>
            </div>";
    } else {
      while ($fila = mysqli_fetch_array($consulta,MYSQLI_ASSOC)) {
        echo "<div class='col-sm-4'>";
        echo "<div class='panel panel-default'>";
        echo "<div class='panel-body tnoticias'>";
        echo "<img class='img-responsive' src='$fila[imagen]'>
              <h2>$fila[direccion]</h2>
              <h4>$fila[precio] €</h4>
              <p>$fila[descripcion]</p>"; //info inmueble
        echo "</div></div></div>"; //cierre de col-sm, panel,panel-body
      }

    }
  }
  mysqli_close($con);
}

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
  /*function mostrar_inmueble_aleatorio(){
    $conexion = abrirConexion();
    $coge_imagen = "SELECT imagen FROM tbl_inmuebles";
    $imagenes = array();
            
    $imagen = mysqli_query($conexion,$coge_imagen);
    
    if (!$imagen) {
      echo "Se ha producido un error al cargar las imagenes";
    } else {
      while ($fila = mysqli_fetch_array($imagen,MYSQLI_ASSOC)) {
        array_push($imagenes,$fila['imagen']);
      }
    }
    mysqli_close($conexion);

    $max = count($imagenes);
    $azar = rand(0,$max);
    echo "<img src='./php/$imagenes[$azar]' class='img-rounded img-responsive' style='width:100%; align:center; border:solid 0.5px' > ";
  }*/



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
                $imagen = $_FILES['imagen']['name'];
                $imagen_tmp = $_FILES['imagen']['tmp_name'];
                $imagen_type = $_FILES['imagen']['type'];
                $img_correcto = false;
                $fecha_alta = $_POST['fecha_alta'];
                $id_cliente = $_POST['id_cliente'];


                //comprobamos que la extensión de la imagen sea válida
                if ($imagen_type != 'image/jpeg' && $imagen_type != 'image/png'){
                  echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                            <h4><strong>¡Error!</strong>El tipo de imagen no es válido</h4><h5>Por favor, suba un archivo con formato: <b>.png</b> o <b>.jpeg</b></h5>
                          </div></div></div>";
                }

                // subimos la imagen al servidor
                if (!file_exists('../../php/img_inmuebles')){
                  mkdir('../../php/img_inmuebles');
                  echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
                    <strong>carpeta creada</strong> 
                    </div>";
                }else{
                    echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
                    <strong>la carpeta estaba creada</strong> 
                  </div>";
                }

                // creo la ruta donde guardar la foto dependiendo del tipo que sea
                /*if ($imagen_type == 'image/png'){
                  $ruta_img = '../../php/img_inmuebles/$imagen'.'.png';
                   echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
                  <strong>ruta correcta png</strong> 
                </div>";
                echo $ruta_img;
                }else if ($imagen_type == 'image/jpeg'){
                  $ruta_img = "../../php/img_inmuebles/$imagen.jpeg";
                  echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
                  <strong>ruta correcta jpeg</strong> 
                    </div>";
                    echo $ruta_img;
                } */
                
                // creo la ruta donde guardar la foto dependiendo del tipo que sea
                if ($imagen_type){
                    $ruta_img = "../../php/img_inmuebles/$imagen";//.'$direccion.jpeg';
                    echo "<div class='alert alert-success col-sm-6 col-sm-offset-3' align='center'>
                        <strong>ruta correcta jpeg</strong> 
                      </div>";
                      echo $ruta_img;
                } 
                

                // guardo la foto en el servidor
                if (move_uploaded_file($imagen_tmp, $ruta_img)){
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

                  $insertar = "INSERT INTO tbl_inmuebles (id, tipo, direccion, cp, zona, metros, num_hab, num_baños, garaje, jardin, piscina, estado, descripcion, precio, imagen, fecha_alta, id_cliente) VALUES
                  ($id, '$tipo', '$direccion', $cp, '$zona', $metros, $num_hab, $banos, $garaje, $jardin, $piscina, $estado, '$descripcion', $precio, '$imagen', $fecha_alta, '$id_cliente')";

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
      echo"  </div>
        
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
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[metros]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
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
          echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
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

<?php

/*function abrirConexion() {

  $conexion = mysqli_connect('localhost', 'root', 'ubuntu','db_inmomenenia','60');
  //mysqli_set_charset($conexion, 'utf8');

  if (!$conexion) {
    echo "<strong>¡ERROR! Conexión a la BD fallida</strong>";
  }

  return $conexion;

}*/

function comprobarUsuario() {
  if (isset($_SESSION['tipo'])) {
    if ($_SESSION['tipo'] != 'u') {
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
    }
  } else if ($_COOKIE['datos']) {
      session_decode($_COOKIE['datos']);
      if ($_SESSION['tipo'] != 'u') {
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
      }
  } else {
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
  }
}

function comprobarAdmin() {
  if (isset($_SESSION['tipo'])) {
    if ($_SESSION['tipo'] != 'a') {
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
    }
  } else if ($_COOKIE['datos']) {
    session_decode($_COOKIE['datos']);
    if ($_SESSION['tipo'] != 'a') {
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
    }
  } else {
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
  }
}


function comprobarIndex() {
    if (isset($_SESSION['tipo'])) {
      //echo "Tipo: ".$_SESSION['tipo']." - Desde sesión";
    } else if (isset($_COOKIE['datos'])) {
      session_decode($_COOKIE['datos']);
      //echo "Tipo: ".$_SESSION['tipo']." - Desde cookies";
    } else {
      //echo "No hay sesión";
    }
  }

  function mostrar_Inmuebles (){

    $id = $_SESSION['id_usuario'];
    $con = abrirConexion();
    $sql = "SELECT * FROM tbl_inmuebles ";
    $consulta = mysqli_query($con,$sql);

    if (!$consulta) {
      echo "Error al realizar la consulta";
    } else {
        
      $num_filas = mysqli_num_rows($consulta);
      if ($num_filas == 0) {
        echo "<div class='alert alert-warning warning-new col-sm-6 col-sm-offset-3' align='center'>
                <h2>Ups... ahora mismo no tenemos ningún inmueble disponible :(</h2>
              </div>";
      } else {
        echo "<h2 align='center' style='margin-top: 50px;'>Todos estos inmuebles están disponibles</h2>
  ";
        while ($fila = mysqli_fetch_array($consulta,MYSQLI_ASSOC)) {
          
          echo "<div class='col-sm-4'>";
          echo "<div class='panel panel-default'>";
          echo "<div class='panel-body tnoticias'>";
          echo "<img class='img-responsive' src='$fila[imagen]'>
                <h2>$fila[direccion]</h2>
                <h4>$fila[precio] €</h4>
                <form action='../../php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-info' type='submit' name='ver' value='Ver inmueble'></form>"; //info inmueble
          echo "</div></div></div>"; //cierre de col-sm, panel,panel-body
        }

      }
    }
    mysqli_close($con);
  }

  function buscar_Inmuebles(){
     if (isset($_POST['buscar_inm'])) {
      $cp = $_POST['cp'];
      $disponibilidad = $_POST['disp'];
      $precio = $_POST['precio'];
      
      if ($cp == "") {
        
        if ($precio == "") {
          
          // busco por disponibilidad
          if ($disponibilidad == "si") {
            
            // SI disponibilidad

            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_inmuebles WHERE cp='$cp' and precio='$precio'";

            $bdisp = mysqli_query($con,$sql);

            if (!$bdisp) {
              echo "Error al consultar BD - Disponibilidad SI";
            } else {
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>cp</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($bdisp,MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
              <td><form action='/../inmomenenia/php/inmuebles/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
              }
              echo "<table>";
            }
            mysqli_close($con);

          } else {
                          
            // No disponibilidad

            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_inmuebles WHERE id_cliente!='0'";

            $bdisp = mysqli_query($con,$sql);

            if (!$bdisp) {
              echo "Error al consultar BD - Disponibilidad NO";
            } else {
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($bdisp,MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
              <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
              }
              echo "<table>";
            }
            mysqli_close($con);
          }

        } else {
                        
          // busco por precio y disponibilidad

          if ($disponibilidad == "si") {
            echo " - si disponibilidad";
            // disponibilidad SI

            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_inmuebles WHERE precio like '%$precio%' and id_cliente='0'";

            $bpredisp = mysqli_query($con,$sql);
            if (!$bpredisp) {
              echo "Error al consultar BD - Disponibilidad SI y PRECIO";
            } else {
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($bpredisp,MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
              <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
              }
              echo "<table>";
            }
            mysqli_close($con);

          } else {
            
            // disponibilidad NO

            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_inmuebles WHERE precio like '%$precio%' and id_cliente!='0'";

            $bpredisp = mysqli_query($con,$sql);
            if (!$bpredisp) {
              echo "Error al consultar BD - Disponibilidad SI y PRECIO";
            } else {
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($bpredisp,MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
              <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
              }
              echo "<table>";
            }
            mysqli_close($con);
          }
        }
      } else {
        
        if ($precio == "") {
          
          // busco por dirección y disponibilidad

          if ($disponibilidad == "si") {
            
            // disponibilidad SI

            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_inmuebles WHERE direccion like '%$direccion%' and id_cliente='0'";

            $bdirdisp = mysqli_query($con,$sql);

            if (!$bdirdisp) {
              echo "Error al consultar BD - DIRECCIÓN SI y DISPONIBILIDAD SI";
            } else {
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($bdirdisp,MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
              <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
              }
              echo "<table>";
            }
            mysqli_close($con);
          } else {
            
            // disponibilidad no

            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_inmuebles WHERE direccion like '%$direccion%' and id_cliente!='0'";

            $bdirdisp = mysqli_query($con,$sql);

            if (!$bdirdisp) {
              echo "Error al consultar BD - DIRECCIÓN SI y DISPONIBILIDAD NO";
            } else {
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($bdirdisp,MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
              <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
              }
              echo "<table>";
            }
            mysqli_close($con);
          }

        } else {
          
          // busco por dirección, precio, disponibilidad

          if ($disponibilidad == "si") {
            
            // Disponibilidad SI

            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_inmuebles WHERE direccion like '%$direccion%' and precio like '%$precio%' and id_cliente='0'";

            $bdirdispre = mysqli_query($con,$sql);

            if (!$bdirdispre) {
              echo "Error al consultar BD - DIRECCIÓN SI y DISPONIBILIDAD SI, PRECIO SI";
            } else {
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($bdirdispre,MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
              <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
              }
              echo "<table>";
            }
            mysqli_close($con);
          } else {
            
            // Disponibilidad NO

            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_inmuebles WHERE direccion like '%$direccion%' and precio like '%$precio%' and id_cliente!='0'";

            $bdirdispre = mysqli_query($con,$sql);

            if (!$bdirdispre) {
              echo "Error al consultar BD - DIRECCIÓN SI y DISPONIBILIDAD SI, PRECIO SI";
            } else {
              echo "<table class='table table-striped'>";
              echo "<thead><tr><th>Dirección</th><th>Precio</th><th>Imagen</th><th>Ver</th></tr></thead>";
              while ($fila = mysqli_fetch_array($bdirdispre,MYSQLI_ASSOC)) {
                echo "<tbody><tr><td>$fila[direccion]</td><td>$fila[precio]</td><td><img src='$fila[imagen]' width='150px'></td>
              <td><form action='ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              </tr></tbody>";
              }
              echo "<table>";
            }
            mysqli_close($con);
          }
        }
      }
    }


  }
?>
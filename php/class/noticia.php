<?php
class Noticia {

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
    return true;
  } 

  static public function nueva_noticia() : bool {
    if (isset($_POST['nueva_noticia'])) {
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
      if ($img_correcto) {
        $conexion = abrirConexion();
        $sql = "INSERT INTO tbl_noticias (id, titular, contenido, imagen, fecha) VALUES
        ('$null','$titular','$contenido','$imagen', '$fecha')";
        
        if (mysqli_query($conexion, $sql)) {
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

  static public function borrar_noticia(): bool {
    if (isset($_POST['borrar'])) {
      $id = $_POST['id'];
      $conexion = abrirConexion();
      $borrar = "DELETE  FROM tbl_noticias WHERE id='$id'";
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
}
?>


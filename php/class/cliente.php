<?php
class Cliente {

  static public function nuevo_cliente(): bool {
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
  
  static public function buscar_cliente(): bool  {
    if (isset($_POST['buscar'])) {
      $id = $_POST['id'];
      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $telefono = $_POST['telefono'];
  
      if ($id == "") {
        if ($nombre == "") {
          if ($apellidos == "") {
            if ($telefono == "") {
            } else { // si telefono
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE telefono='$telefono'";
  
              $btel = mysqli_query($con, $sql);
  
              if (!$btel) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($btel);
                if ($num_filas == 0) {
                  echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese teléfono</h4>
                  </div></div></div>";
                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Ver</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                    <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
            } // --fin si telefono
          } else { // si apellidos
            if ($telefono == "") { //----------no telefono si apellidos
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE apellidos='$apellidos'";
  
              $btel = mysqli_query($con, $sql);
  
              if (!$btel) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($btel);
                if ($num_filas == 0) {
                  echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con esos apellidos</h4>
                  </div></div></div>";
                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                    <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
            } else { ///si apellidos si telefono
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE apellidos='$apellidos' and telefono='$telefono'";
  
              $btelape = mysqli_query($con, $sql);
  
              if (!$btelape) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($btelape);
                if ($num_filas == 0) {
				  echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
				    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese teléfono ni esos apellidos</h4>
				  </div></div></div>";
                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                              <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
            } //fin si apellidos si telefono
          } //----fin si apellidos
        } else { // si nombre
          if ($apellidos == "") {
            if ($telefono == "") { //buscamos por nombre
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE nombre='$nombre'";
  
              $bnombre = mysqli_query($con, $sql);
  
              if (!$bnombre) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($bnombre);
                if ($num_filas == 0) {
                  echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese nombre</h4>
                  </div></div></div>";
                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($bnombre)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                    <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
            } else { //buscamos por nombre y telefono
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE nombre='$nombre' and telefono='$telefono'";
  
              $bnomtel = mysqli_query($con, $sql);
  
              if (!$bnomtel) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($bnomtel);
                if ($num_filas == 0) {
                  echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese nombre y teléfono</h4>
                  </div></div></div>";
                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                    <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
  
            }
          } else { //buscamos por nombre - apellidos
            if ($telefono == "") {
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE nombre='$nombre' and apellidos='$apellidos'";
  
              $btel = mysqli_query($con, $sql);
  
              if (!$btel) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($btel);
                if ($num_filas == 0) {
                  echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese nombre y apellidos</h4>
                  </div></div></div>";
                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                    <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
            } else {
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE nombre='$nombre' and apellidos='$apellidos' and telefono=?$telefono'";
  
              $btel = mysqli_query($con, $sql);
  
              if (!$btel) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($btel);
                if ($num_filas == 0) {
                  echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese nombre, apellido y teléfono</h4>
                  </div></div></div>";
                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                      <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
            }
  
          }
        } //--fin si nombre
      } else { //si id
        if ($nombre == "") {
          if ($apellidos == "") {
            if ($telefono == "") { //buscamos por id 
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE id='$id'";
  
              $btel = mysqli_query($con, $sql);
  
              if (!$btel) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($btel);
                if ($num_filas == 0) {
                  echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese id</h4>
                  </div></div></div>";
                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                      <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
            } else { //buscamos por id - telefono
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE id='$id' and telefono='$telefono'";
  
              $btel = mysqli_query($con, $sql);
  
              if (!$btel) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($btel);
                if ($num_filas == 0) {
                   echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese id y teléfono</h4>
                  </div></div></div>";
                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                      <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
            }
          } else { //buscamos por id-apellidos 
            if ($telefono == "") {
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE id='$id' and apellidos='$apellidos'";
  
              $btel = mysqli_query($con, $sql);
  
              if (!$btel) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($btel);
                if ($num_filas == 0) {
                   echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese id y esos apellidos</h4>
                  </div></div></div>";
                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                      <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
  
            } else {
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE id='$id' and apellidos='$apellidos' and telefono='$telefono'";
  
              $btel = mysqli_query($con, $sql);
  
              if (!$btel) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($btel);
                if ($num_filas == 0) {
                  echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese id, esos apellidos y ese teléfono</h4>
                  </div></div></div>";
                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                      <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
            }
          }
        } else { //buscamos por id-nombre
          if ($apellidos == "") {
            if ($telefono == "") {
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE id='$id' and nombre='$nombre'";
  
              $btel = mysqli_query($con, $sql);
  
              if (!$btel) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($btel);
                if ($num_filas == 0) {
                  echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese id y ese nombre</h4>
                  </div></div></div>";
                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                      <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
            } else {
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE id='$id' and nombre='$nombre' and telefono='$telefono'";
  
              $btel = mysqli_query($con, $sql);
  
              if (!$btel) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($btel);
                if ($num_filas == 0) {
                  echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese id, nombre y telefono</h4>
                  </div></div></div>";

                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                      <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
            }
          } else {
            if ($telefono == "") {
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE id='$id' and nombre='$nombre' and apellidos='$apellidos'";
  
              $btel = mysqli_query($con, $sql);
  
              if (!$btel) {echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($btel);
                if ($num_filas == 0) {
                  echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                    <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese id, nombre y apellidos</h4>
                  </div></div></div>";
               } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                    <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
            } else {
              $con = abrirConexion();
              $sql = "SELECT * FROM tbl_clientes WHERE id='$id' and nombre='$nombre' and apellidos='$apellidos' and telefono='$telefono'";
  
              $btel = mysqli_query($con, $sql);
  
              if (!$btel) {
                echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                  <h4><strong>¡Error!</strong> Al realizar la búsqueda</h4>
                </div></div></div>";
                echo "<META HTTP-EQUIV='REFRESH'CONTENT='3;URL=clientes.php'>";
              } else {
                $num_filas = mysqli_num_rows($btel);
                if ($num_filas == 0) {
                    echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
                      <h4><strong>¡Error!</strong> No se ha encontrado ningún cliente que coincida con ese id, nombre, apellidos y teléfono</h4>
                    </div></div></div>";
                } else {
                  echo "<table class='table table-striped'";
                  echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Ver</th><th>Localidad</th><th>Ver</th></tr></thead>";
                  while ($fila = mysqli_fetch_array($btel)) {
                    echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                      <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                  }
                  echo "</table>";
                }
              }
  
            }
          }
        } //--fin si id
      }
    }
     return true;
  }
   
  static public function modificar_cliente(): bool {
    
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
      mysqli_close($conexion);
    }
    return true;
  }
}
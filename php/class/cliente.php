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
      $tipo = $_POST['tipo'];
      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $localidad = $_POST['localidad'];

      if ($id = "") {
        if ($tipo = "") {
          if ($nombre = "") {
            if ($apellidos = "") {
              if ($localidad = "") {
                echo "Sin datos para buscar";
              } else {
                // Aquí busco solo por localidad
                $conexion = abrirConexion();
                $sql = "SELECT * FROM tbl_clientes WHERE localidad='$localidad';
                
                $busca = mysqli_query($conexion,$sql);
        
                if (!$busca_cliente) {
                  echo "Error al conectar BD";
                } else {
                  $num_filas = mysqli_num_rows($busca_cliente);
        
                  if ($num_filas == 0) {
                    echo "No se han encontrado citas";
                  } else {
                    echo "<table class='table table-striped tnoticias'>";
                    echo "<thead><tr><th>ID</th><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th><th>Cliente</th><th>Contacto</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($busca_cliente,MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[id]</td><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>$fila[telefono]</td></tr></tbody>";
                    }
                    echo "</table>";
                  }
                }
                mysqli_close($conexion);
              }
            }
          }
        }
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
    return true;
  }

}
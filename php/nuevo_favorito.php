<?php

$id = $_POST['id_favorito'];

$id = isset($_POST['id']) ? $_POST['id'] : '';
$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
$id_inmueble = isset($_POST['id_inmueble']) ? $_POST['id_inmueble'] : '';


try {

    $conexion = abrirConexion();
    $insertar = "INSERT into tbl_favoritos (id, id_usuario, id_inmueble) VALUES
      ('$id', '$id_usuario', $id_inmueble)";
      
      if(mysqli_query($conexion, $insertar)) {
        "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
          <h4><strong>Favorito añadido</h4>
        </div>";
        
      } else {
        echo "<div class='container-fluid'><div class='row'><div class='alert alert-danger col-sm-6 col-sm-offset-3' align='center'>
          <h4><strong>¡Error!</strong>No ha sido posible añadir el inmueble a favoritos</h4>
        </div>";
      }
    mysqli_close($conexion);

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}
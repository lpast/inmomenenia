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
?>
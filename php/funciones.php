<?php
  const BASE_URL = "https://inmomenenia.com/php";
  
  function comprobarUsuario() {
    if (isset($_SESSION['tipo'])) {
      if ($_SESSION['tipo'] != 'u') {
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL='../../../php/home.php'>";
      }
      
    } else if ($_COOKIE['datos']) {
        session_decode($_COOKIE['datos']);
        if ($_SESSION['tipo'] != 'u') {
          echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL='../../../php/home.php''>";
        }
    } else {
      echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL='../../../php/home.php''>";
    }
  }

  function comprobarAdmin() {
    if (isset($_SESSION['tipo'])){
      if ($_SESSION['tipo'] != 'a'){
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL='../../../php/home.php'>";
      }
    } else if ($_COOKIE['datos']) {
      session_decode($_COOKIE['datos']);
      if ($_SESSION['tipo'] != 'a'){
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL='../../../php/home.php'>";
      }
    } else {
      echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../../../php/home.php'>";
    }
  }

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

  function mostrarMenu() {
    if (isset($_SESSION['tipo'])) {
      $tipo_usuario = $_SESSION['tipo'];
      if ($tipo_usuario == 'u') {
        echo "<nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
          <div class='container-fluid'>
            <div class='navbar-header'>
              <button type='button' class='n-resp navbar-toggle' data-toggle='collapse' data-target='#nav-responsive'>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>                             
              </button>
              <a href='../index.html'><img src='../media/img/logo.png' alt='logo-inmomenenia' width='15%'></a>
              </div>
            <div class='collapse navbar-collapse' id='nav-responsive'>
            <ul class='nav navbar-nav navbar-right'>
              <li><a href='home.php'><span class='glyphicon glyphicon-log-in'></span> Inicio</a></li>
              <li><a href='inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Cartera de Inmuebles</a></li>
              <li><a href='hipotecas.php'><span class='glyphicon glyphicon-calendar'></span> Calcula tu hipoteca</a></li>
              <li><a href='contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
              <li><a href='usuarios/area_personal.php'><span class='glyphicon glyphicon-calendar'></span> Área Personal</a></li>
              <li><a href='". BASE_URL . "/cerrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
            </ul>
            </div>
          </div>
        </nav>";
      } else if ($tipo_usuario == 'a') {
        echo " <nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
          <div class='container-fluid'>
            <div class='navbar-header'>
              <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>                        
              </button>
              <a href='../index.html'><img src='../media/img/logo.png' alt='logo-inmomenenia' width='15%'></a>
            </div>
            <div class='collapse navbar-collapse' id='nav-responsive'>
              <ul class='nav navbar-nav navbar-right'>
                <li><a href='home.php'><span class='glyphicon glyphicon-log-in'></span> Inicio</a></li>
                <li><a href='administrador/noticias/noticias.php'><span class='glyphicon glyphicon-briefcase'></span> Noticias</a></li>
                <li><a href='administrador/clientes/clientes.php'><span class='glyphicon glyphicon-folder-open'></span> Clientes</a></li>
                <li><a href='administrador/inmuebles/inmuebles.php'><span class='glyphicon glyphicon-pencil'></span> Inmuebles</a></li>
                <li><a href='administrador/citas/citas.php'><span class='glyphicon glyphicon-calendar'></span> Citas</a></li>
                <li><a href='". BASE_URL . "/cerrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
              </ul>
            </div>
          </div>
        </nav>";
      } else {
        echo "<nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
          <div class='container-fluid'>
            <div class='navbar-header'>
              <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span> 
                <span class='icon-bar b-resp'></span> 
                <span class='icon-bar b-resp'></span>                              
              </button>
              <a href='../index.html'><img src='../media/img/logo.png' alt='logo-inmomenenia' width='15%'></a>
              </div>
            <div class='collapse navbar-collapse' id='nav-responsive'>
            <ul class='nav navbar-nav navbar-right'>
              <li><a href='home.php'><span class='glyphicon glyphicon-log-in'></span> Buscar Inmuebles</a></li>
              <li><a href='inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Cartera de Inmuebles</a></li>
              <li><a href='hipotecas.php'><span class='glyphicon glyphicon-calendar'></span> Calcula tu hipoteca</a></li>
              <li><a href='contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
              <li><a href='acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
            </ul>
            </div>
          </div>
        </nav>";
      }
    } else {
      echo "<nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
        <div class='container-fluid'>
          <div class='navbar-header'>
            <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
              <span class='icon-bar b-resp'></span>
              <span class='icon-bar b-resp'></span>
              <span class='icon-bar b-resp'></span> 
              <span class='icon-bar b-resp'></span> 
              <span class='icon-bar b-resp'></span>                              
            </button>
            <a href='../index.html'><img src='../media/img/logo.png' alt='logo-inmomenenia' width='15%'></a>
            </div>
          <div class='collapse navbar-collapse' id='nav-responsive'>
          <ul class='nav navbar-nav navbar-right'>
            <li><a href='home.php'><span class='glyphicon glyphicon-log-in'></span> Buscar Inmuebles</a></li>
            <li><a href='inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Cartera de Inmuebles</a></li>
            <li><a href='hipotecas.php'><span class='glyphicon glyphicon-calendar'></span> Calcula tu hipoteca</a></li>
            <li><a href='contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
            <li><a href='acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
          </ul>
          </div>
        </div>
      </nav>";
    }
    return true;
  }

  function menuTipo() {
    if (isset($_SESSION['tipo'])) {
      $tipo_usuario = $_SESSION['tipo'];
      if ($tipo_usuario == 'u') {
        echo "<nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
          <div class='container-fluid'>
            <div class='navbar-header'>
              <button type='button' class='n-resp navbar-toggle' data-toggle='collapse' data-target='#nav-responsive'>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>                             
              </button>
              <a href='../../../index.html'><img src='../../../media/img/logo.png' alt='logo-inmomenenia' width='15%'></a>
              </div>
            <div class='collapse navbar-collapse' id='nav-responsive'>
            <ul class='nav navbar-nav navbar-right'>
              <li><a href='". BASE_URL . "/home.php'><span class='glyphicon glyphicon-log-in'></span> Inicio</a></li>
              <li><a href='". BASE_URL . "/inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Cartera de Inmuebles</a></li>
              <li><a href='". BASE_URL . "/hipotecas.php'><span class='glyphicon glyphicon-calendar'></span> Calcula tu hipoteca</a></li>
              <li><a href='". BASE_URL . "/contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
              <li><a href='". BASE_URL . "/usuarios/area_personal.php'><span class='glyphicon glyphicon-calendar'></span> Área Personal</a></li>
              <li><a href='". BASE_URL . "/cerrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
            </ul>
            </div>
          </div>
        </nav>";
      } else if ($tipo_usuario == 'a') {
        echo " <nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
          <div class='container-fluid'>
            <div class='navbar-header'>
              <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>                        
              </button>
              <a href='../index.html'><img src='../media/img/logo.png' alt='logo-inmomenenia' width='15%'></a>
            </div>
            <div class='collapse navbar-collapse' id='nav-responsive'>
              <ul class='nav navbar-nav navbar-right'>
                <li><a href='home.php'><span class='glyphicon glyphicon-log-in'></span> Inicio</a></li>
                <li><a href='administrador/noticias/noticias.php'><span class='glyphicon glyphicon-briefcase'></span> Noticias</a></li>
                <li><a href='administrador/clientes/clientes.php'><span class='glyphicon glyphicon-folder-open'></span> Clientes</a></li>
                <li><a href='administrador/inmuebles/inmuebles.php'><span class='glyphicon glyphicon-pencil'></span> Inmuebles</a></li>
                <li><a href='administrador/citas/citas.php'><span class='glyphicon glyphicon-calendar'></span> Citas</a></li>
                <li><a href='". BASE_URL . "/cerrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
              </ul>
            </div>
          </div>
        </nav>";
      } else {
        echo "<nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
          <div class='container-fluid'>
            <div class='navbar-header'>
              <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span>
                <span class='icon-bar b-resp'></span> 
                <span class='icon-bar b-resp'></span> 
                <span class='icon-bar b-resp'></span>                              
              </button>
              <a href='../index.html'><img src='../media/img/logo.png' alt='logo-inmomenenia' width='15%'></a>
              </div>
            <div class='collapse navbar-collapse' id='nav-responsive'>
            <ul class='nav navbar-nav navbar-right'>
              <li><a href='home.php'><span class='glyphicon glyphicon-log-in'></span> Buscar Inmuebles</a></li>
              <li><a href='inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Cartera de Inmuebles</a></li>
              <li><a href='hipotecas.php'><span class='glyphicon glyphicon-calendar'></span> Calcula tu hipoteca</a></li>
              <li><a href='contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
              <li><a href='acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
            </ul>
            </div>
          </div>
        </nav>";
      }
    } else {
      echo "<nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
        <div class='container-fluid'>
          <div class='navbar-header'>
            <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
              <span class='icon-bar b-resp'></span>
              <span class='icon-bar b-resp'></span>
              <span class='icon-bar b-resp'></span> 
              <span class='icon-bar b-resp'></span> 
              <span class='icon-bar b-resp'></span>                              
            </button>
            <a href='../index.html'><img src='../media/img/logo.png' alt='logo-inmomenenia' width='15%'></a>
            </div>
          <div class='collapse navbar-collapse' id='nav-responsive'>
          <ul class='nav navbar-nav navbar-right'>
            <li><a href='home.php'><span class='glyphicon glyphicon-log-in'></span> Buscar Inmuebles</a></li>
            <li><a href='inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Cartera de Inmuebles</a></li>
            <li><a href='hipotecas.php'><span class='glyphicon glyphicon-calendar'></span> Calcula tu hipoteca</a></li>
            <li><a href='contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
            <li><a href='acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
          </ul>
          </div>
        </div>
      </nav>";
    }
    return true;
  }

  function mostrarHome() {
    if (isset($_SESSION['tipo'])) {
      if ($_SESSION['tipo']) {
        $tipo_usuario = $_SESSION['tipo'];
        if ($tipo_usuario == 'u') {
          $nombre = $_SESSION['nombre'];
          echo "<h1 align='center'> ¡ Hola $nombre ! </h1>
          <h2 align='center'> ¿En qué podemos ayudarte? </h2>";
          Usuario::gestion_usuarioHome();
          echo "<div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>";
            Noticia::mostrar_noticias();
          echo "</div>";
        } else if ($tipo_usuario == 'a') {
          echo "<h1 align='center'> Administración InmoMenenia </h1>";
          Administrador::area_administrador();
          echo "<div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>";
            Inmueble::form_busca_Inmueble();
            Inmueble::buscar_Inmueble();
          echo "</div>";
        }
      } else {
        echo "<div class='col-xs-12 col-sm-12 co-md-12 cabecera-menu'>
          <h1 align='center'> ¡ Hola! Bienvenido a InmoMenenia  </h1>
        </div>";
        echo "<div class='col-xs-12 col-sm-12 co-md-12 cabecera-menu'>";
        Inmueble::form_busca_Inmueble();
        Inmueble::buscar_Inmueble();
        Noticia::mostrar_noticias();   
        echo "</div>";
            
      }
    } else {
      echo "<div class='col-xs-12 col-sm-12 co-md-12 cabecera-menu-inicio'>
          <h1 align='center'> ¡ Bienvenido a InmoMenenia ! </h1>
      </div>";
      echo "<div class='col-xs-12 col-sm-12 co-md-12 cabecera-menu-inicio'>";
      Inmueble::form_busca_Inmueble();
      Inmueble::buscar_Inmueble();
      Noticia::mostrar_noticias();   
      echo "</div>";
    }
    return true;
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

  function footer () {
    echo "<footer class='navbar-nav navbar-inverse'>
      <p align='center'><span style='color:white'>info@inmomenenia.com</span>  |  <a class='aweb' href='..../php/mapa_web.php'>Mapa web</a>  |  <span style='color:white'> Copyright Menenia's Digital 2022</span></p>
    </footer>";
    return true;
  }
?>
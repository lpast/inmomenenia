<?php

class Interfaz {
  
  static public function mostrarMenuIndex() {
    if (isset($_SESSION['tipo'])) {
      $tipo_usuario = $_SESSION['tipo'];
      if ($tipo_usuario == 'u') {
        echo " <nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
                    <div class='container-fluid'>
                      <div class='navbar-header'>
                        <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
                          <span class='icon-bar b-resp'></span>
                          <span class='icon-bar b-resp'></span>
                          <span class='icon-bar b-resp'></span>                        
                        </button>
                        <a href='../index.php'><img src='../logo.jpeg' alt='inmomenenia' width='20%'></a>
                      </div>
                      <div class='collapse navbar-collapse' id='nav-responsive'>
                      <ul class='nav navbar-nav navbar-right'>
                        <li><a href='./php/galeria.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                        <li><a href='./php/misinmuebles.php'><span class='glyphicon glyphicon-folder-open'></span> Mis inmuebles</a></li>
                        <li><a href='../inmobiliaria/php/mis_datos.php'><span class='glyphicon glyphicon-pencil'></span> Mis datos personales</a></li>
                        <li><a href='./php/mis_citas.php'><span class='glyphicon glyphicon-calendar'></span> Mis citas</a></li>
                        <li><a href='./php/cerrarsesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
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
                        <a href='../index.php'><img src='../logo.jpeg' alt='inmobiliaria' width='20%'></a>
                      </div>
                      <div class='collapse navbar-collapse' id='nav-responsive'>
                      <ul class='nav navbar-nav navbar-right'>
                        <li><a href='./php/noticias.php'><span class='glyphicon glyphicon-bullhorn'></span> Noticias</a></li>
                        <li><a href='./php/clientes.php'><span class='glyphicon glyphicon-user'></span> Clientes</a></li>
                        <li><a href='./php/inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                        <li><a href='./php/citas.php'><span class='glyphicon glyphicon-calendar'></span> Citas</a></li>
                        <li><a href='./php/cerrarsesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
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
                </button>
                <a href='../index.php'><img src='../logo.jpeg' alt='inmomenenia' width='20%'></a>
              </div>
              <div class='collapse navbar-collapse' id='nav-responsive'>
              <ul class='nav navbar-nav navbar-right'>
                <li><a href='../php/galeria.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                <li><a href='../php/contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
                <li class='active'><a href='../php/ubicacion.php'><span class='glyphicon glyphicon-log-in'></span> Ubicacion</a></li>
                <li ><a href='../php/acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
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
                </button>
                <a href='./index.php'><img src='./logo.jpeg' alt='inmomenenia' width='20%'></a>
              </div>
              <div class='collapse navbar-collapse' id='nav-responsive'>
              <ul class='nav navbar-nav navbar-right'>
                <li><a href='../php/galeria.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                <li><a href='./php/contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
                <li><a href='./php/ubicacion.php'><span class='glyphicon glyphicon-log-in'></span> Ubicacion</a></li>
                <li><a href='./php/acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
              </ul>
              </div>
            </div>
      </nav>";
    }
    
  }

  static public function mostrarTipoMenu() {if (isset($_SESSION['tipo'])) {
    $tipo_usuario = $_SESSION['tipo'];
    if ($tipo_usuario == 'u') {
      echo " <nav class='menu navbar navbar-inverse texto navbar-fixed-top'>
                  <div class='container-fluid'>
                    <div class='navbar-header'>
                      <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
                        <span class='icon-bar b-resp'></span>
                        <span class='icon-bar b-resp'></span>
                        <span class='icon-bar b-resp'></span>                        
                      </button>
                      <a href='../index.php'><img src='../logo.jpeg' alt='inmomenenia' width='20%'></a>
                    </div>
                    <div class='collapse navbar-collapse' id='nav-responsive'>
                    <ul class='nav navbar-nav navbar-right'>
                      <li><a href='galeria.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                      <li><a href='misinmuebles.php'><span class='glyphicon glyphicon-folder-open'></span> Mis inmuebles</a></li>
                      <li><a href='mis_datos.php'><span class='glyphicon glyphicon-pencil'></span> Mis datos personales</a></li>
                      <li><a href='mis_citas.php'><span class='glyphicon glyphicon-calendar'></span> Mis citas</a></li>
                      <li><a href='cerrarsesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
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
                      <a href='../index.php'><img src='../logo.jpeg' alt='inmomenenia' width='20%'></a>
                    </div>
                    <div class='collapse navbar-collapse' id='nav-responsive'>
                    <ul class='nav navbar-nav navbar-right'>
                      <li><a href='noticias.php'><span class='glyphicon glyphicon-bullhorn'></span> Noticias</a></li>
                      <li><a href='clientes.php'><span class='glyphicon glyphicon-user'></span> Clientes</a></li>
                      <li><a href='inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                      <li><a href='citas.php'><span class='glyphicon glyphicon-calendar'></span> Citas</a></li>
                      <li><a href='cerrrarsesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
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
              </button>
              <a href='../index.php'><img src='../logo.jpeg' alt='inmomenenia' width='20%'></a>
            </div>
            <div class='collapse navbar-collapse' id='nav-responsive'>
            <ul class='nav navbar-nav navbar-right'>
              <li><a href='galeria.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
              <li><a href='contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
              <li><a href='ubicacion.php'><span class='glyphicon glyphicon-log-in'></span> Ubicacion</a></li>
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
              </button>
              <a href='../index.php'><img src='../logo.jpeg' alt='inmomenenia' width='20%'></a>
            </div>
            <div class='collapse navbar-collapse' id='nav-responsive'>
            <ul class='nav navbar-nav navbar-right'>
              <li><a href='galeria.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
              <li><a href='contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
              <li><a href='ubicacion.php'><span class='glyphicon glyphicon-log-in'></span> Ubicacion</a></li>
              <li><a href='acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
            </ul>
            </div>
          </div>
    </nav>";
  }
}

  static public function imagen_aleatoria(){
    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2 menu-inicio'>
        <h1 align='center'> Encuentra tu nuevo hogar</h1>";
          $conexion = abrirConexion();
          $sql = 'SELECT imagen FROM tbl_inmuebles';
          $imagenes = array();

static public function mostrarMenu() {if (isset($_SESSION['tipo'])) {
  $tipo_usuario = $_SESSION['tipo'];
  if ($tipo_usuario == 'u') {
    echo " <nav class='menu navbar navbar-inverse texto navbar-fixed-top'>
                <div class='container-fluid'>
                  <div class='navbar-header'>
                    <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
                      <span class='icon-bar b-resp'></span>
                      <span class='icon-bar b-resp'></span>
                      <span class='icon-bar b-resp'></span>                        
                    </button>
                    <a href='../../index.php'><img src='../../logo.jpeg' alt='inmomenenia' width='20%'></a>
                  </div>
                  <div class='collapse navbar-collapse' id='nav-responsive'>
                  <ul class='nav navbar-nav navbar-right'>
                    <li><a href='galeria.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                    <li><a href='misinmuebles.php'><span class='glyphicon glyphicon-folder-open'></span> Mis inmuebles</a></li>
                    <li><a href='mis_datos.php'><span class='glyphicon glyphicon-pencil'></span> Mis datos personales</a></li>
                    <li><a href='mis_citas.php'><span class='glyphicon glyphicon-calendar'></span> Mis citas</a></li>
                    <li><a href='cerrarsesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
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
                    <a href='../../index.php'><img src='../../logo.jpeg' alt='inmomenenia' width='20%'></a>
                  </div>
                  <div class='collapse navbar-collapse' id='nav-responsive'>
                  <ul class='nav navbar-nav navbar-right'>
                    <li><a href='../../php/noticias.php'><span class='glyphicon glyphicon-bullhorn'></span> Noticias</a></li>
                    <li><a href='../../php/aclientes.php'><span class='glyphicon glyphicon-user'></span> Clientes</a></li>
                    <li><a href='../../php/ainmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                    <li><a href='../../php/acitas.php'><span class='glyphicon glyphicon-calendar'></span> Citas</a></li>
                    <li><a href='../../php/acerrrarsesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
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
            </button>
            <a href='../../index.php'><img src='../../logo.jpeg' alt='inmomenenia' width='20%'></a>
          </div>
          <div class='collapse navbar-collapse' id='nav-responsive'>
          <ul class='nav navbar-nav navbar-right'>
            <li><a href='../../php/agaleria.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
            <li><a href='../../php/acontacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
            <li><a href='../../php/aubicacion.php'><span class='glyphicon glyphicon-log-in'></span> Ubicacion</a></li>
            <li><a href='../../php/aacceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
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
            </button>
            <a href='../index.php'><img src='../logo.jpeg' alt='inmomenenia' width='20%'></a>
          </div>
          <div class='collapse navbar-collapse' id='nav-responsive'>
          <ul class='nav navbar-nav navbar-right'>
            <li><a href='../../php/agaleria.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
            <li><a href='../../php/acontacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
            <li><a href='../../php/aubicacion.php'><span class='glyphicon glyphicon-log-in'></span> Ubicacion</a></li>
            <li><a href='../../php/acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
          </ul>
          </div>
        </div>
  </nav>";
}
}
}

?>
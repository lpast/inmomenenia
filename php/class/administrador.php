<?php

class Administrador {

  const BASE_URL = "https://inmomenenia.com/php";
     /* Menú de navegación administrador*/
  static public function menuAdmin(): bool {
      if (isset($_SESSION['tipo'])) {
        $tipo_usuario = $_SESSION['tipo'];
      
          if ($tipo_usuario == 'a') {
            echo " <nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
            <div class='container-fluid'>
              <div class='navbar-header'>
                <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
                  <span class='icon-bar b-resp'></span>
                  <span class='icon-bar b-resp'></span>
                  <span class='icon-bar b-resp'></span>                        
                </button>
                <a href='../../../index.html'><img src='../../../media/img/logo.png' alt='logo-inmomenenia' width='15%'></a>
                </div>
              <div class='collapse navbar-collapse' id='nav-responsive'>
              <ul class='nav navbar-nav navbar-right'>
                <li><a href='../../../php/home.php'><span class='glyphicon glyphicon-log-in'></span> Inicio</a></li>
                <li><a href='../noticias/noticias.php'><span class='glyphicon glyphicon-briefcase'></span> Noticias</a></li>
                <li><a href='../clientes/clientes.php'><span class='glyphicon glyphicon-folder-open'></span> Clientes</a></li>
                <li><a href='../inmuebles/inmuebles.php'><span class='glyphicon glyphicon-pencil'></span> Inmuebles</a></li>
                <li><a href='../citas/citas.php'><span class='glyphicon glyphicon-calendar'></span> Citas</a></li>
                <li><a href='". self::BASE_URL . "/cerrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
              </ul>
              </div>
            </div>
            </nav>";
          }
        
        return true;  
    }
  }
  
  static public function area_administrador(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>";
        if (isset($_SESSION['tipo'])) {
          $tipo_usuario = $_SESSION['tipo'];
          if ($tipo_usuario == 'a') {
            //Mostramos una imagen aleatoria 
            echo "<h2 align='center'> ¿Qué quieres hacer?</h2>
              <div class ='col-md-offset-2 col-md-4'>
                <ul>
                <lo><a href='administrador/citas/citas.php'><img src='../../media/iconos/calendar.png' alt='logo-citas' width='150px' align='center'>
                  <h2>Ver Citas</h2></a>
                </lo>
                  <lo><a href='administrador/inmuebles/inmuebles.php'><img src='../../media/iconos/house.png' alt='logo-inmuebles' width='150px' align='center'>
                  <h2> Ver Inmuebles </h2></a>
                  </lo>
                </ul>
              </div>
              <div class ='col-md-offset-2 col-md-4'>
              <ul>
                  <lo><a href='administrador/clientes/clientes.php'><img src='../../media/iconos/mis-datos.png' alt='logo-clientes' width='150px' align='center'>
                  <h2>Ver CLientes </h2></a></lo>
                  <lo><a href='administrador/noticias/noticias.php'><img src='../../media/iconos/newspaper.png' alt='logo-noticias' width='150px' align='center'>
                  <h2>Ver Noticias </h2></a></lo>
                </ul>
              </div>
            </div>";
          }
        }
      echo "</div>";
    echo "</div>";


    return true;
  }

  static public function gestion_inmuebles(): bool {
    echo "<div class='col-xs-12 col-sm-12 col-md-12'>
      <nav class='navbar'>
        <div class='container-fluid'>
          <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
            <li><a type='button' class='btn btn-theme btn-md' href='nuevo_inmueble.php'>Añadir inmueble</a></li>
            <li><a type='button' class='btn btn-theme btn-md' href='borrar_inmueble.php'>Borrar inmueble</a></li>
            <li><a type='button' class='btn btn-theme btn-md' href='../../../php/home.php'>Buscar inmueble</a></li>
            <li><a type='button' class='btn btn-theme btn-md' href='inmuebles_publicados.php'>Inmuebles publicados</a></li>
          </ul>
        </div>
      </nav>
    </div>";
    return true;
  }

  static public function gestion_noticias(): bool {
    echo "<div class='col-xs-12 col-sm-12 col-md-12'>
      <nav class='navbar'>
        <div class='container-fluid'>
          <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
          <li><a type='button' class='btn btn-theme btn-md' href='nueva_noticia.php'>Añadir noticias</a></li>
          <li><a type='button' class='btn btn-theme btn-md' href='borrar_noticia.php'>Borrar noticias</a></li>
          <li><a type='button' class='btn btn-theme btn-md' href='buscar_noticia.php'>Buscar noticias</a></li>
        </ul>
        </div>
      </nav>
    </div>";
    return true;
  }

  static public function gestion_citas(): bool {
    echo "<div class='col-xs-12 col-sm-12 col-md-12'>
      <nav class='navbar'>
        <div class='container-fluid'>
          <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
            <li><a type='button' class='btn btn-theme' href='nueva_cita.php'>Añadir citas</a></li>
            <li><a type='button' class='btn btn-theme' href='borrar_cita.php'>Borrar citas</a></li>
            <li><a type='button' class='btn btn-theme' href='buscar_cita.php'>Buscar citas</a></li>
          </ul>
        </div>
      </nav>
    </div>";
    return true;
  }

  static public function gestion_clientes(): bool {
    echo "<div class='col-xs-12 col-sm-12 col-md-12'>
      <nav class='navbar'>
        <div class='container-fluid'>
          <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
            <li><a type='button' class='btn btn-theme btn-md' href='nuevo_cliente.php'>Añadir cliente</a></li>
            <li><a type='button' class='btn btn-theme btn-md' href='buscar_cliente.php'>Buscar cliente</a></li>
          </ul>
        </div>
      </nav>
    </div>";
    return true;
  }

}
<?php

class Interfaz {

  const BASE_URL = "https://inmomenenia.com/php";
  /* Cabeceras */
  static public function mostrarMenuHome(): bool {
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
              <li><a href='". self::BASE_URL . "/cerrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
            </ul>
            </div>
          </div>
        </nav>";
      } elseif ($tipo_usuario == 'a') {
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
                <li><a href='". self::BASE_URL . "/cerrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
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

  static public function mostrarMenu(): bool {
    if (isset($_SESSION['tipo'])) {
      $tipo_usuario = $_SESSION['tipo'];
      if ($tipo_usuario == 'u') {
        Usuario::mostrarMenu(($_SESSION['tipo']));
      }
      if ($tipo_usuario == 'a') {
        Administrador::menuAdmin(($_SESSION['tipo']));
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
                <li><a href='../php/home.php'><span class='glyphicon glyphicon-log-in'></span> Buscar Inmuebles</a></li>
                <li><a href='../php/inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Cartera de Inmuebles</a></li>
                <li><a href='../php/hipotecas.php'><span class='glyphicon glyphicon-calendar'></span> Calcula tu hipoteca</a></li>
                <li><a href='../php/contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
                <li><a href='../php/acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
              </ul>
              </div>
            </div>
      </nav>";
    }
    return true;
  }
  
  static public function mostrar_home(): bool {
    if (isset($_SESSION['tipo'])) {
      if ($_SESSION['tipo']) {
        $tipo_usuario = $_SESSION['tipo'];
        if ($tipo_usuario == 'u') {
          $nombre = $_SESSION['nombre'];
          echo "<div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
            <h1 align='center'> ¡ Hola $nombre ! </h1>
            <h2 align='center'> ¿En qué podemos ayudarte? </h2>
          </div>";
          
            Usuario::gestion_usuario();
            Noticia::mostrar_noticias();
        } else if ($tipo_usuario == 'a') {
          echo "<div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
            <h1 align='center'> Administración InmoMenenia </h1>
          </div>  ";
          Administrador::area_administrador();
          Inmueble::form_busca_Inmueble();
          Inmueble::buscar_Inmueble();
        }
      } else {
        echo "<div class='col-xs-12 col-sm-12 co-md-12 cabecera-menu-inicio'>
          <h1 align='center'> ¡ Bienvenido a InmoMenenia ! </h1>";
          Inmueble::form_busca_Inmueble();
          Inmueble::buscar_Inmueble();
          Noticia::mostrar_noticias();
        echo "</div>";
      }
    } else {
      echo "<div class='col-xs-12 col-sm-12 co-md-12 cabecera-menu-inicio'>
          <h1 align='center'> ¡ Bienvenido a InmoMenenia ! </h1>";
          Inmueble::form_busca_Inmueble();
          Inmueble::buscar_Inmueble();
          Noticia::mostrar_noticias();
        echo "</div>";
    }
    return true;
  }

  static public function footer (): bool {
    echo "<footer class='navbar-nav navbar-inverse'>
      <p align='center'><span style='color:white'>info@inmomenenia.com</span>  |  <a class='aweb' href='..../php/mapa_web.php'>Mapa web</a>  |  <span style='color:white'> Copyright Menenia's Digital 2022</span></p>
    </footer>";
    return true;
  }
}
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
                    <a href='../../index.html'><img src='../../media/img/logo.png' alt='logo-inmomenenia' width='15%'></a>
                    </div>
                  <div class='collapse navbar-collapse' id='nav-responsive'>
                  <ul class='nav navbar-nav navbar-right'>
                    <li><a href='../../php/home.php'><span class='glyphicon glyphicon-log-in'></span> Inicio</a></li>
                    <li><a href='../../php/usuarios/buscar_inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Buscar Inmuebles</a></li>
                    <li><a href='../../php/inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Cartera de Inmuebles</a></li>
                    <li><a href='../../php/hipotecas.php'><span class='glyphicon glyphicon-calendar'></span> Calcula tu hipoteca</a></li>
                    <li><a href='../../php/contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
                    <li><a href='../../php/usuarios/area_personal.php'><span class='glyphicon glyphicon-calendar'></span> Área Personal</a></li>
                    <li><a href='". self::BASE_URL . "/cerrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
                  </ul>
                  </div>
                </div>
              </nav>";
      }
      if ($tipo_usuario == 'a') {
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
            <li><a href='../php/home.php'><span class='glyphicon glyphicon-log-in'></span> Inicio</a></li>
            <li><a href='../php/administrador/noticias/noticias.php'><span class='glyphicon glyphicon-briefcase'></span> Noticias</a></li>
            <li><a href='../php/administrador/clientes/clientes.php'><span class='glyphicon glyphicon-folder-open'></span> Clientes</a></li>
            <li><a href='../php/administrador/inmuebles/inmuebles.php'><span class='glyphicon glyphicon-pencil'></span> Inmuebles</a></li>
            <li><a href='../php/administrador/citas/citas.php'><span class='glyphicon glyphicon-calendar'></span> Citas</a></li>
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
    }
    return true;
  }

  static public function mostrar_home(): bool {
    
    
    if ($_SESSION['tipo']) {
      $tipo_usuario = $_SESSION['tipo'];
      if ($tipo_usuario == 'u') {
        $nombre = $_SESSION['nombre'];
        echo "<h1 align='center'> ¡ Hola $nombre ! </h1>
              <h2 align='center'> ¿En qué podemos ayudarte? </h2>";
        self::gestion_usuario();
        self::mostrar_noticias();
      } else if ($tipo_usuario == 'a') {
        echo "<h1 align='center'> Administración InmoMenenia </h1>";
        self::area_administrador();
        self::form_buscar_Inmuebles();
         buscar_Inmuebles();
      }
    } else {
      echo "<div class='col-xs-12 col-sm-12 co-md-12 cabecera-menu-inicio'>
        <h1 align='center'> ¡ Bienvenido a InmoMenenia ! </h1>";
        self::form_buscar_Inmuebles();
        buscar_Inmuebles();
        self::mostrar_noticias();
      echo "</div>";
    }
    return true;
  }

  static public function form_buscar_Inmuebles(): bool {
    echo "<div class='panel-group'>
       <div class='panel panel-default cabecera-inicio'>
            <div class='panel-heading'>
              <h2 align='center'><img src='/./media/iconos/buscar.png' alt='metros-inmueble' width='40px' style='margin-right:15px'>Encuentra lo que buscas</h2>
            </div>
          <div class='panel-body'>
          <form class='form-horizontal' action='#' method='post'>
          <div class='form-group'>
            <label class='col-sm-2'>Tipo</label>
            <div class='col-sm-5 col-lg-offset-2'>
              <select class='form-control' id='tipo' name='tipo' required>
                <option value=''>Seleccione el tipo de vivienda</option>
                <option value='alquiler'>Alquilar</option>
                <option value='venta'>Venta</option>
              </select><span></span>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2'>Localidad</label>
            <div class='col-sm-5 col-lg-offset-2'>
              <select class='form-control' id='localidad' name='localidad'>
                <option value=''>Seleccione la localidad</option>
                <option value='puebla'>La Puebla de Alfindén</option>
                <option value='pastriz'>Pastriz</option>
              </select><span></span>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2'>Nº de habitaciones:</label>
            <div class='col-sm-5 col-lg-offset-2'>
              <input class='form-control' type='text' id='num_hab' name='num_hab' placeholder='Nº de habitaciones'><span></span>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2'>Metros<sup>2</sup>:</label>
            <div class='col-sm-5 col-lg-offset-2'>
              <input class='form-control' type='text' id='metros' name='metros' placeholder='metros'><span></span>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2'>Precio:</label>
            <div class='col-sm-5  col-lg-offset-2'>
              <input class='form-control' type='text' id='precio' name='precio'  placeholder='€'><span></span>
            </div>
          </div>
          <div class='form-group'>
            <div class='col-sm-offset-2 col-sm-5 col-lg-offset-4'>
              <input class='form-control btn-theme' type='submit' id='buscar_inm' name='buscar_inm' value='Buscar'><span></span>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>";
    return true;
  }

  /*static public function carousel() : bool {
    echo "<div class='container-carousel'>
    <div class='row'>
    <!-- Carousel -->
    <div id='carousel-example-generic' class='carousel slide' data-ride='carousel'>
    <!-- Indicators -->
    <ol class='carousel-indicators'>
    <li data-target='#carousel-example-generic' data-slide-to='0' class='active'></li>
    <li data-target='#carousel-example-generic' data-slide-to='1'></li>
    <li data-target='#carousel-example-generic' data-slide-to='2'></li>
    </ol>
    <!-- Wrapper for slides -->
    
    <div class='carousel-inner'>
    <div class='item active'>";
    $conexion = abrirConexion();
    $sql = 'SELECT imagen FROM tbl_inmuebles';
    $imagenes = array();
    
    $imagen = mysqli_query($conexion, $sql);
    
    if (!$imagen) {
    echo 'Eror al cargar las imagenes';
    } else {
    while ($fila = mysqli_fetch_array($imagen, MYSQLI_ASSOC)) {
    array_push($imagenes, $fila['imagen']);
    }
    }
    mysqli_close($conexion);
    
    $max = count($imagenes);
    $img_aleatoria = rand(0, $max - 1);
    echo "<img src='media/img/$imagenes[$img_aleatoria]' alt='First slide' class='img-rounded img-responsive'  width: '900px' height:'400px' border:solid 0.5px>
    </div>";
    
    echo "<div class='item'>";
    $conexion = abrirConexion();
    $sql = 'SELECT imagen FROM tbl_inmuebles';
    $imagenes = array();
    
    $imagen = mysqli_query($conexion, $sql);
    
    if (!$imagen) {
    echo 'Eror al cargar las imagenes';
    } else {
    while ($fila = mysqli_fetch_array($imagen, MYSQLI_ASSOC)) {
    array_push($imagenes, $fila['imagen']);
    }
    }
    mysqli_close($conexion);
    
    $max = count($imagenes);
    $img_aleatoria = rand(0, $max - 1);
    echo "<img src='media/img/$imagenes[$img_aleatoria]' alt='Second slide' class='img-rounded img-responsive' border:solid 0.5px>
    </div>";
    echo "<div class='item'>";
    $conexion = abrirConexion();
    $sql = 'SELECT imagen FROM tbl_inmuebles';
    $imagenes = array();
    
    $imagen = mysqli_query($conexion, $sql);
    
    if (!$imagen) {
    echo 'Eror al cargar las imagenes';
    } else {
    while ($fila = mysqli_fetch_array($imagen, MYSQLI_ASSOC)) {
    array_push($imagenes, $fila['imagen']);
    }
    }
    mysqli_close($conexion);
    
    $max = count($imagenes);
    $img_aleatoria = rand(0, $max - 1);
    echo "<img src='media/img/$imagenes[$img_aleatoria]' alt='Thierts slide' class='img-rounded img-responsive' border:solid 0.5px>
    </div>";
    //-- Controls -->
    echo "<a class='left carousel-control' href='#carousel-example-generic' data-slide='prev'>
    <span class='glyphicon glyphicon-chevron-left'></span>
    </a>
    <a class='right carousel-control' href='#carousel-example-generic' data-slide='next'>
    <span class='glyphicon glyphicon-chevron-right'></span>
    </a>
    </div><!-- /carousel -->
    </div>
    </div>";
    return true;
  } 
  */

  static public function mostrar_noticias(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 tnoticias'>
          <h2 class='margen-noticias tnoticias' align='center'>Actualidad Inmobiliaria</h2>";
          // Cargamos las noticias de forma paginada
          $conexion = abrirConexion();
          $consulta = "SELECT * from tbl_noticias";

          $noticias = mysqli_query($conexion, $consulta);

          if (!$noticias) {
            echo "Error al cargar las noticias desde la BD";
          } else {
            $num_filas = mysqli_num_rows($noticias);
            if ($num_filas > 0) {
              $num_noticas = 5; //limite de noticias a mostrar
              $pagina = false;
            }

            if (isset($_GET['pagina'])) {
              $pagina = $_GET['pagina'];
            }

            if (!$pagina) {
              $inicio = 0;
              $pagina = 1;
            } else {
              $inicio = ($pagina - 1) * $num_noticas;
            }

            $consulta_mostrar = "SELECT * from tbl_noticias order by fecha desc limit $inicio,$num_noticas";

            $mostrar = mysqli_query($conexion, $consulta_mostrar);

            if (!$mostrar) {
              echo "Error al cargar las noticias desde la BD";
            } else {
              while ($fila = mysqli_fetch_array($mostrar, MYSQLI_ASSOC)) {
                $marca_cita = strtotime($fila['fecha']);
                $f_formateada = date("d-m-Y", $marca_cita);
                //muestro info de noticia
                echo "<div class='panel-body tnoticias'>
                  <div class='petit-noticias' style=align='center'>
                    <img src='/./media/img/img_noticias/$fila[imagen]' alt='img_noticia' >
                  </div>
                  <h3 align='center'><b>$fila[titular]</b></h3>
                  <p align='center'>Fecha de publicación: $f_formateada</p>
                  <p class='texto'>$fila[contenido]<p>
                  <form action='/./php/ver_noticia.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver más'></form>";
                echo "</div>";
              }
            }
            mysqli_close($conexion);
          }
        echo "</div>";
      echo "</div>";
    echo "</div>";

    if (isset($_SESSION['tipo'])) {
      $tipo_usuario = $_SESSION['tipo'];
      if ($tipo_usuario == 'a') {
        echo "<div class='container-fluid'>
          <div class='row'>
            <ul class='pager'>
              <li><a href='noticias.php?pagina=".($pagina - 1)."'>Atrás</a></li>
              <li><a href='noticias.php?pagina=".($pagina + 1)."'>Siguiente</a></li>
            </ul>
          </div>
        </div>";
      }
    }  
    
      return true;
    
  }

  static public function inmuebles_disponibles(): bool {
    $con = abrirConexion();
    $incremento = "SELECT auto_increment from information_schema.tables WHERE table_schema='db_inmomenenia' and table_name='tbl_favoritos'";

    $datos = mysqli_query($con, $incremento);
    $array = mysqli_fetch_array($datos, MYSQLI_NUM);

    $sql = "SELECT * FROM tbl_inmuebles";
    $consulta = mysqli_query($con, $sql);

    if (!$consulta) {
      echo 'Error al realizar la consulta';
    } else {
      $num_filas = mysqli_num_rows($consulta);
      if ($num_filas == 0) {
        echo "<div class='alert alert-warning warning-new col-sm-6 col-sm-offset-3' align='center'>
          <h2>Ups... ahora mismo no tenemos ningún inmueble disponible :(</h2>
        </div>";
      } else {
        while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
          $_SESSION['id_inmueble'] = $fila['id'];
          echo "<div class='col-sm-4'>";
          echo "<div class='panel panel-default'>";
          echo "<div class='panel-body tnoticias'>";
          echo "<img class='img-responsive' src='../media/img/img_inmuebles/$fila[imagen]' alt='img-inmuble'>
                <h2 align ='center'><span style='background-color: #baa35f'; 'color:black;'>$fila[titular]</span></h2>";

          if (isset($_SESSION['tipo'])) {
            if (isset($_SESSION['id_usuario'])) {
              $tipo_usuario = $_SESSION['tipo'];
              if ($tipo_usuario == 'u') {
                echo "<div class='favorito'>
                <form action='#' method='post'>
                  <button class='button button5'><img id='no_favorito' src='../media/iconos/no-favorito.png' alt='btn-favoritos' width='30px'>
                    <a href='#' id='nuevo_favorito' type='submit' name='nuevo_favorito'> Añadir favorito</a></button>
                    <input type='hidden' id='id' value = '$_SESSION[id]'></td>
                    <input type='hidden' id='id_usuario' value='$_SESSION[id_usuario]'/>
                    <input type='hidden' id='id_inmueble' value='$_SESSION[id_inmueble]'/>";
                    echo "$_SESSION[id]'";
                    echo "$_SESSION[id_usuario]";
                    echo "$_SESSION[id_inmueble]
                </form>";
                nuevo_favorito();
                echo "</div>";
              }
            }
          }
          echo "<h3 align ='center'>$fila[calle]</h3>
                <h4 align ='center' style='padding-bottom:15px'>$fila[localidad]</h4>
                  <div class ='iconos' align ='center' style='padding-top:5px  font-size:30px'>
                  <img src='../media/iconos/ducha.png' alt='banos-inmueble' width='50px'><b> $fila[num_banos]</b>
                  <img src='../media/iconos/dormitorio.png' alt='habitaciones-inmomenenia' width='50px' style='margin-left:45px'><b>$fila[num_hab]</b>
                  <img src='../media/iconos/metros.png' alt='metros-inmomenenia' width='50px' style='margin-left:45px'><b>$fila[metros] m<sup>2</sup></b>
                  <img src='../media/iconos/euro.png' alt='precio-inmueble' width='50px' style='margin-left:45px'><b>$fila[precio] €</b>
                </div>
                <h4 align ='center'>$fila[descripcion]</h4>
                <form action='../php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme ' type='submit' name='ver' value='Ver inmueble'></form>"; //info inmueble
          echo "</div></div></div>"; //cierre de col-sm, panel,panel-body
        }

      }
    }
    mysqli_close($con);
    echo "</div>";
    echo "</div>";
    echo "</div>";
    return true;
  }
  
  static public function form_hipoteca(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-menu-inicio'>
          <div class='panel-group'>
            <h1 align ='center'>Cálcula tu hipoteca o préstamo</h2>
          </div>
        </div>
        <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera'>
          <div class='panel panel-default'>
            <div class='panel-body'>
              <form class='form-horizontal' action='#' method='post'>
                <div class='form-group'>
                <span><label class='col-md-12 col-sm-2' style='margin-bottom:10px'> Importe: </label></span>
                  <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                  <span><input class='form-control' type='text' name='importe' maxlength=9 value=1000 autofocus></span>
                  </div>
                </div>
                <div class='form-group'>
                <span><label class='col-md-12 col-sm-2' style='margin-bottom:10px'> Años: </label></span>
                <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                <span><input class='form-control' type='text' name='anios' maxlength=2 value=1 autofocus></span>
                  </div>
                </div>
                <div class='form-group'>
                <span><label class='col-md-12 col-sm-2' style='margin-bottom:10px'> Interés: </label></span>
                  <div class='col-md-12 col-sm-2' style='margin-bottom:15px'>
                  <span><input class='form-control' type='text' name='interes' maxlength=9 value=3.6 autofocus></span>
                  </div>
                <div>
                <div class='form-group'>
                  <div class='col-sm-offset-2 col-sm-5 col-lg-offset-4'>
                    <p><input class='form-control btn-theme' type='button' value='Calcular' onclick='calcular()'</p>
                  </div>
                </div>  
              </form>
            </div>
          </div>
        </div>
        <div id='resultado'></div>
      </div>
      <div class='jumbotron'>
          <h3 align ='center'>Si quieres más información no dudes en ponerte en contacto con nosotros</h3>
          <h3 align ='center'>Trataremos de responderte lo antes posible</h3>
        </div>
        <p align='center'><a class='btn btn-theme' href='../php/contacto.php'>Solicitar <b>una cita</b></a></p>
    </div>
  </div>";
    return true;
  }


 
  static public function formulario_registro(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
          <div class='jumbotron'>
            <h1 style='margin-bottom:35px' align='center'>Registro</h1>
            <div class='panel panel-default'>
              <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                  <div class='form-group'>
                    <label class='col-sm-2'>DNI:</label>
                    <div class='col-sm-10'>
                        <input class='form-control' type='text' id='id' name='id' placeholder='aqui tu Dni'><span></span>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-2'>Nombre:</label>
                      <div class='col-sm-10'>
                        <input class='form-control' type='text' id='nombre' name='nombre' placeholder='aqui tu nombre'><span></span>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-2'>Apellidos:</label>
                      <div class='col-sm-10'>
                        <input class='form-control' type='text' id='apellidos' name='apellidos' placeholder='aqui tus apellidos'><span></span>
                      </div>
                    </div>
                    <div class='form-group'>
                    <label class='col-sm-2'>Teléfono:</label>
                      <div class='col-sm-10'>
                        <input class='form-control' type='text' id='telefono' name='telefono' placeholder='aqui tu teléfono'><span></span>
                      </div>
                    </div>
                    <div class='form-group'>
                    <label class='col-sm-2'>Email:</label>
                      <div class='col-sm-10'>
                        <input class='form-control' type='text' id='email' name='email' placeholder='aqui tu email'><span></span>
                      </div>
                    </div>
                    <div class='form-group'>
                    <label class='col-sm-2'>Fecha actual:</label>
                      <div class='col-sm-10'>
                        <input class='form-control' type='date' id='fecha' name='fecha_alta'> <span></span>
                      </div>
                    </div>
                    <div class='form-group'>
                    <label class='col-sm-2'>Nombre de usuario:</label>
                      <div class='col-sm-10'>
                        <input class='form-control' type='text' id='nom_user' name='nom_user' placeholder='aqui tu nombre de usuario'><span></span>
                      </div>
                    </div>
                    <div class='form-group'>
                    <label class='col-sm-2'>Contraseña:</label>
                      <div class='col-sm-10'>
                        <input class='form-control' type='text' id='pass' name='pass' placeholder='aqui tu contraseña'><span></span>
                      </div>
                    </div>
                  <div class='form-group'>
                    <div class='checkbox'>
                      <input class='form-control' type='checkbox' id='privacidad' name='privacidad' value='aceptar'><span></span>
                    </div>
                    <div>
                      <h4><label class='col-sm-4 col-sm-offset-2'> Acepto los términos de privacidad</label></h4>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-5'>
                      <input class='form-control btn-theme' type='submit' id='nuevo_usuario' name='nuevo_usuario' value='Aceptar'>
                    </div>
                    <div class='col-sm-2' >
                      <a type='button' href='./clientes.php' class='btn btn-danger' >Cancelar</a>
                    </div> 
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";


    return true;

  }

  /* Menú de navegación usuario*/

  static public function gestion_usuario(): bool {
    echo "<div class='container-fluid cabecera-menu'>
    <div class='row'>
      <div class='col-xs-12'>
        <nav class='navbar'>
          <div class='container-fluid'>
            <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
              <li><a type='button' class='btn btn-theme' href='../php/usuarios/buscar_inmuebles.php'> Buscar Inmuebles</a></li>
              <li><a type='button' class='btn btn-theme' href='../php/usuarios/mis_inmuebles.php'> Ver mis inmuebles</a></li>
              <li><a type='button' class='btn btn-theme' href='../php/usuarios/mis_citas.php'> Ver mis citas</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    </div>";
    return true;
  }

  static public function area_personal(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>";
        if (isset($_SESSION['tipo'])) {
          $tipo_usuario = $_SESSION['tipo'];
          if ($tipo_usuario == 'u') {
            $nombre = $_SESSION['nombre'];
            //Mostramos una imagen aleatoria 
            echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio '>
                    <h1 align='center'> ¡ Hola $nombre ! </h1>
                    <h2 align='center'> ¿Qué quieres hacer?</h2>
                    <div class ='col-md-6'>
                      <ul>
                        <lo><a href='../usuarios/mis_datos.php'><img src='../../media/iconos/mis-datos.png' alt='logo-mis-datos' width='150px' align='center'>
                        <h2> Ver mis datos </h2></a></lo>

                        <lo><a href='../usuarios/mis_inmuebles.php'><img src='../../media/iconos/house.png' alt='logo-mis-inmuebles' width='150px' align='center'>
                        <h2> Ver mis inmuebles </h2></a></lo>
                      </ul>
                      
                    </div>
                    <div class ='col-md-6'>
                    <ul>
                        <lo><a href='../usuarios/mis_citas.php'><img src='../../media/iconos/calendar.png' alt='logo-mis-citas' width='150px' align='center'>
                        <h2>Ver mis citas </h2></a></lo>

                        <lo><a href='../usuarios/mis_favoritos.php'><img src='../../media/iconos/mis-favoritos.png' alt='logo-mis-favoritos' width='150px' align='center'>
                        <h2>Ver mis favoritos </h2></a></lo>
                      </ul>
                    </div>
                  </div>";
          }
        }
      echo "</div>";
    echo "</div>";


    return true;
  }

  static public function mostrarFavoritos() : bool {
    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
        <div class='tnoticias'>
          <h1 align='center''>Echa un vistazo a tus inmuebles</h1>
        </div>;
      </div>
      <div class='col-xs-12 col-sm-offset-2 col-sm-10'>";
        
          $id_usuario=$_SESSION['id_usuario'];
          $con = abrirConexion();
          $sql = "SELECT * from tbl_favoritos fav INNER JOIN tbl_inmuebles inm on fav.id_inmueble=inm.id WHERE fav.id_usuario='$id_usuario'";

          $consulta = mysqli_query($con, $sql);

          if (!$consulta) {
            echo 'Error al consultar favoritos';
          } else {
            $num_filas = mysqli_num_rows($consulta);
            if ($num_filas == 0) {
              echo "<div class='alert alert-warning warning-new col-sm-6 col-sm-offset-3' align='center'>
                      <h2>Ups... ahora mismo no tiene ningún inmueble guardado como favoritos :(</h2>
                    </div>";
            } else {
              while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
               
                echo "<div class='col-sm-4'>";
                echo "<div class='panel panel-default'>";
                echo "<div class='panel-body tnoticias'>";
                echo "<img class='img-responsive' src='../../media/img/img_inmuebles/$fila[imagen]' alt='img-inmuble'>
                      <h2 align ='center'><span style='background-color: #baa35f'; 'color:black;'>$fila[titular]</span></h2>";
                echo "<h3 align ='center'>$fila[calle]</h3>
                      <h4 align ='center' style='padding-bottom:15px'>$fila[localidad]</h4>
                      <div class ='iconos' align ='center' style='padding-top:5px  font-size:30px' padding-bottom:'50px'>
                        <h3><img src='../../media/iconos/ducha.png' alt='banos-inmueble' width='50px' style='margin-right:5px'><b> $fila[num_banos]</b>
                        <img src='../../media/iconos/dormitorio.png' alt='habitaciones-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b>  $fila[num_hab]</b><h3>
                        <h3><img src='../../media/iconos/garaje.png' alt='garaje-inmueble' width='50px' style='margin-right:5px'><b>  $fila[garaje]</b>
                        <img src='../../media/iconos/jardin.png' alt='jardin-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $fila[jardin]</b>
                        <img src='../../media/iconos/piscina.png' alt='piscina-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b>  $fila[piscina]</b><h3>
                        <h3><img src='../../media/iconos/estado.png' alt='estado-inmueble' width='50px' style='margin-right:5px'><b> $fila[estado]</b>
                        <img src='../../media/iconos/tipo.png' alt='tipo-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $fila[tipo]</b><h3>
                        <h3><img src='../../media/iconos/metros.png' alt='metros-inmueble' width='50px' style='margin-right:5px'><b>  $fila[metros] m<sup>2</sup></b>
                        <img src='../../media/iconos/euro.png' alt='precio-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b>  $fila[precio] €</b><h3>
                      </div>
                      <h4 align ='center'>$fila[descripcion]</h4>
                      <form action='../php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme ' type='submit' name='ver' value='Ver inmueble'></form>"; //info inmueble
                echo "</div></div></div>"; //cierre de col-sm, panel,panel-body
              }
            }
          }
          mysqli_close($con);
        echo "</div>
      </div>";
      echo "<div style='padding-top:15px'>
      <p align='center'><a class='btn btn-theme' href='../../php/usuarios/area_personal.php'>Volver</b></a></p>
    </div>";
    return true;
  }

  static public function img_aleatoria(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
          <h1 align='center'> Encuentra lo que necesitas </h1>
        
        </div>
        <div class='col-xs-12 col-sm-offset-2 col-sm-8 col-sm-offset-2'>";
    $conexion = abrirConexion();
    $sql = 'SELECT imagen FROM tbl_inmuebles';
    $imagenes = array();

    $imagen = mysqli_query($conexion, $sql);

    if (!$imagen) {
      echo 'Eror al cargar las imagenes';
    } else {
      while ($fila = mysqli_fetch_array($imagen, MYSQLI_ASSOC)) {
        array_push($imagenes, $fila['imagen']);
      }
    }
    mysqli_close($conexion);

    $max = count($imagenes);
    $img_aleatoria1 = rand(0, $max - 1);
    $img_aleatoria2 = rand(0, $max - 1);
    echo "<ul class='contenedor-imagenes'>
            <img src='../../media/img/img_inmuebles/$imagenes[$img_aleatoria1]' alt='Img aleatoria' class='img-rounded' style='width:1200px; height:400px; border:solid 0.5px'>
          </ul>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    return true;
  }

  static public function inmuebles_usuario(): bool {
    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
        <div class='tnoticias'>
          <h1 align='center''>Echa un vistazo a tus inmuebles</h1>
        </div>;
      </div>
      <div class='col-xs-12 col-sm-offset-2 col-sm-10'>";
        
        $id = $_SESSION['id_usuario'];
        $con = abrirConexion();
        $sql = "SELECT * FROM tbl_inmuebles WHERE id_cliente='$id'";
        $consulta = mysqli_query($con, $sql);

        if (!$consulta) {
          echo "Error al realizar la consulta";
        } else {
          $num_filas = mysqli_num_rows($consulta);
          if ($num_filas == 0) {
            echo "<div class='alert alert-warning warning-new col-sm-6 col-sm-offset-3' align='center'>
                          <h2>Aún no tienen ningún inmueble comprado :(</h2>
                        </div>";
          } else {
            while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
              echo "<div class='col-sm-4'>";
                echo "<div class='panel panel-default'>";
                  echo "<div class='panel-body tnoticias'>";
                    echo "<img class='img-responsive' src='../../media/img/img_inmuebles/$fila[imagen]' alt='inmueble_cliente'>
                    <h3 align ='center'>$fila[calle]</h3>
                    <h4 align ='center' style='padding-bottom:15px'>$fila[localidad]</h4>
                    <div class ='iconos' align ='center' style='padding-top:5px  font-size:30px' padding-bottom:'50px'>
                      <h3><img src='../../media/iconos/ducha.png' alt='banos-inmueble' width='50px' style='margin-right:5px'><b> $fila[num_banos]</b>
                      <img src='../../media/iconos/dormitorio.png' alt='habitaciones-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b>  $fila[num_hab]</b><h3>
                      <h3><img src='../../media/iconos/garaje.png' alt='garaje-inmueble' width='50px' style='margin-right:5px'><b>  $fila[garaje]</b>
                      <img src='../../media/iconos/jardin.png' alt='jardin-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $fila[jardin]</b>
                      <img src='../../media/iconos/piscina.png' alt='piscina-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b>  $fila[piscina]</b><h3>
                      <h3><img src='../../media/iconos/estado.png' alt='estado-inmueble' width='50px' style='margin-right:5px'><b> $fila[estado]</b>
                      <img src='../../media/iconos/tipo.png' alt='tipo-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b> $fila[tipo]</b><h3>
                      <h3><img src='../../media/iconos/metros.png' alt='metros-inmueble' width='50px' style='margin-right:5px'><b>  $fila[metros] m<sup>2</sup></b>
                      <img src='../../media/iconos/euro.png' alt='precio-inmueble' width='50px' style='margin-left:55px' 'margin-right:15px'><b>  $fila[precio] €</b><h3>
                      <h3><img src='../../media/iconos/codigo-de-barras .png' alt='id-inmueble' width='50px' style= 'margin-right:5px'><b>  $fila[id] €</b>
                      <img src='../../media/iconos/calendario .png' alt='fecha-inmueble' width='50px' style='margin-right:5px'><b>  $fila[fecha_alta]</b><h3>
                      </div>
                    <h4 align ='center'>$fila[descripcion]</h4>
                    <form action='../../php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme ' type='submit' name='ver' value='Ver inmueble'></form>
                  </div>
                </div>
              </div>
            </div>
            </div>";
            echo "<div style='padding-top:15px'>
                <p align='center'><a class='btn btn-theme' href='../../php/usuarios/area_personal.php'>Volver</b></a></p>
              </div>";
            }
          }
        }
        mysqli_close($con);

      echo "</div></div></div>";
    return true;
  }

  static public function datos_usuario(): bool {
    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
        <h2 align='center' style='margin-top: 50px;'>Estos son tus datos de usuario</h2>
          <p align='center'><b>Podrás modificar tu dirección, teléfono o contraseña</b></p>";

            $id = $_SESSION['id_usuario'];

            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_usuarios inner join tbl_clientes ON tbl_usuarios.id = tbl_clientes.id WHERE tbl_usuarios.id='$id'";

            $consulta = mysqli_query($con, $sql);

            if (!$consulta) {
              echo 'Error al hacer la consulta en BD... :(';
            } else {
              $fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
              $id = $fila['id'];
              $tipo = $fila['tipo'];
              $nombre = $fila['nombre'];
              $apellidos = $fila['apellidos'];
              $calle = $fila['calle'];
              $portal = $fila['portal'];
              $piso = $fila['piso'];
              $puerta = $fila['puerta'];
              $cp = $fila['cp'];
              $localidad = $fila['localidad'];
              $telefono = $fila['telefono'];
              $email = $fila['email'];
              $nom_user = $fila['nom_user'];
              $pass = $fila['pass'];
            }
    echo "<form action='#' method='post' accept-charset='utf-8'>
      <div class='panel panel-default'>
        <div class='panel-body'>
          <div class='form-group'>
            <div class='col-sm-2'>
              <label>ID:</label>
            </div>
            <div class='col-sm-10'>
              <input class='form-control' type='text' name='id' value='$id' readonly>
            </div>
          </div>
          <div class='form-group'>
            <div class='col-sm-2'>
              <label>Tipo:</label>
            </div>
            <div class='col-sm-10'>
              <input class='form-control' type='text' name='tipo' value='$tipo' readonly>
            </div>
          </div>
          <div class='form-group'>
            <div class='col-sm-2'>
              <label>Nombre:</label>
            </div>
            <div class='col-sm-10'>
              <input class='form-control' type='text' name='nombre' value='$nombre' readonly>
            </div>
          </div>
          <div class='form-group'>
            <div class='col-sm-2'>
              <label>Apellidos:</label>
            </div>
            <div class='col-sm-10'>
              <input class='form-control' type='text' name='apellidos' value='$apellidos' readonly>
            </div>
          </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Calle:</label>
                </div>
                <div class='col-sm-10'>
                 <input class='form-control' type='text' name='calle' value='$calle'>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Portal:</label>
                </div>
                <div class='col-sm-10'>
                <input class='form-control' type='text' name='portal' value='$portal'>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Piso:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='piso' value='$piso'>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Puerta:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='puerta' value='$puerta'>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>CP:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='cp' value='$cp'>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Localidad:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='localidad' value='$localidad'>
                </div>
              </div>

              <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Teléfono:</label>
                  </div>
                  <div class='col-sm-10'>
                  <input class='form-control' type='text' name='telefono' value='$telefono'>
                  </div>
              </div>
              <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Email:</label>
                  </div>
                  <div class='col-sm-10'>
                  <input class='form-control' type='text' name='email' value='$email'>
                  </div>
              </div>
              <div class='form-group'>
                  <div class='col-sm-2'>
                    <label>Usuario:</label>
                  </div>
                  <div class='col-sm-10'>
                  <input class='form-control' type='text' name='nom_user' value='$nom_user'>
                  </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Contraseña:</label>
                </div>
                <div class='col-sm-10'>
                <input class='form-control' type='text' name='pass' placeholder='Si desea cambiar su contraseña escriba una nueva aqui'>
                </div>
              </div>
            <div>
              <br>
            </div>
            <div class='form-group'>
              <div class='col-sm-12 col-sm-offset-4' style='padding-top:15px'>
                <div class='col-sm-2'>
                  <input class='form-control btn-theme' type='submit' name='guardar' value='Guardar'>
                </div>
                <div class='col-sm-2' >
                  <a href='../../php/usuarios/area_personal.php' class='btn btn-danger'>Cancelar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      </div>
    </div>";
    return true;
  }

  static public function citas_usuario(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
          <div class='tnoticias'>
            <h1 align='center''>Echa un vistazo a tus citas</h1>
            <p align='center'><b>Tus próximas citas aparecen marcadas en <span style='color:green'>verde</span> y la pasadas en <span style='color:#baa35f'>amarillo</span></b></p>
          </div>;
        </div>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2  tnoticias'>";
            $actual = date('Y-m-d');
            $marca_actual = strtotime($actual);

            $id_cliente = $_SESSION['id_usuario'];
            $con = abrirConexion();
            $sql = "SELECT * FROM tbl_citas WHERE id_cliente='$id_cliente' order by fecha desc";

            $consulta = mysqli_query($con, $sql);

            if (!$consulta) {
              echo "Error al realizar la consulta sql...";
            } else {
              $num_filas = mysqli_num_rows($consulta);

              if ($num_filas == 0) {
                echo "<div class='alert alert-warning warning-new col-sm-6 col-sm-offset-3' align='center'>
                              <h2>No tienes ninguna cita programada</h2>
                      </div>";
              } else {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-hover'>";
                echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th></tr></thead>";
                echo "<tbody>";
                while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                  $marca_cita = strtotime($fila['fecha']);
                  $marca_hora = strtotime($fila['hora']);
                  $f_formateada = date("d-m-Y", $marca_cita);
                  $h_formateada = date("G:i", $marca_hora);
                  if ($marca_cita >= $marca_actual) { // en verde las futuras citas)
                    echo "<tr class='success'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td></tr>";
                  } else { // en amarillo las citas pasadas)
                    echo "<tr class='warning'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td></tr>";
                  }
                }
                echo "</tbody>";
                echo "</table></div>"; //responsive, table-hover
              }
              
            }
              mysqli_close($con);
              echo "</div>
              </div>";
              echo "<div style='padding-top:15px'>
                <p align='center'><a class='btn btn-theme' href='../../php/contacto.php'>Solicitar <b>nueva cita</b></a></p>
              </div>";
      echo "</div>
    </div>";
    return true;
  }

 
  /* Menú de navegación administrador*/
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
    echo "<div class='container-fluid cabecera-menu-inicio'>
      <div class='row'>
        <div class='col-xs-12'>
          <nav class='navbar '>
            <div class='container-fluid'>
              <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
                <li><a type='button' class='btn btn-theme btn-md' href='nuevo_inmueble.php'>Añadir inmueble</a></li>
                <li><a type='button' class='btn btn-theme btn-md' href='borrar_inmueble.php'>Borrar inmueble</a></li>
                <li><a type='button' class='btn btn-theme btn-md' href='buscar_inmueble.php'>Buscar inmueble</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>";
    return true;
  }
  static public function listar_inmuebles(): bool {
    $conexion = abrirConexion();
    $mostrar = "SELECT id, direccion, metros, descripcion, precio, id_cliente, imagen
                    FROM tbl_inmuebles";
    $datos = mysqli_query($conexion, $mostrar);
    if (!$datos) {
      echo "No hay datos que mostrar";
    } else {
      $num_filas = mysqli_num_rows($datos);

      if ($num_filas == 0) {
        echo "No hay ningún inmueble almacenado";
      } else {
        echo "<p><strong>Total de inmuebles almacenados:</strong> $num_filas</p>";
        echo "<table class='table table-hover'";
        echo "<thead><tr><th>ID</th><th>Dirección</th><th>Metros</th><th>Precio</th><th>Imagen</th><th>Ver inmueble</th><th>Modificar inmueble</th></tr></thead>";
        while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
          // si es el usuario 'disponible' muestro cartel de disponible
          if ($fila['id_cliente'] == 0) {
            echo "<tbody><tr><td>$fila[id]</td><td>$fila[direccion]</td>td>$fila[metros]</td><td>$fila[precio] €</td><td><img src='$fila[imagen]' style='width:150px''></td></td>
              <td><form action='/php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
              <td><form action='modificar_inmueble.php' method='get'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
          } else {
            echo "<tbody><tr><td>$fila[id]</td><td>$fila[direccion]</td><td>$fila[metros]</td><td>$fila[precio] €</td><td><img src='$fila[imagen]' style='width:150px''></td></td>
                      <td><form action='../php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td>
                      <td><form action='modificar_inmueble.php' method='get'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
          }
        }
        echo "</table>";
      }
    }
    mysqli_close($conexion);
    return true;
  }
  static public function form_nuevo_inmueble(): bool {
    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
          <div class='panel-group'>
            <div class='panel panel-default menu-inicio'>
              <div class='panel-heading'>
                <h2 align='center'>Nuevo inmueble</h2>
              </div>
              <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                  <div class='form-group'>
                    <label class='col-sm-2'>ID:</label>
                    <div class='col-sm-10'>";
                      $con = abrirConexion();
                      $consulta = "SELECT auto_increment from information_schema.tables WHERE table_schema='db_inmomenenia' and table_name='tbl_inmuebles'";
                      $datos = mysqli_query($con, $consulta);
                      $array = mysqli_fetch_array($datos, MYSQLI_NUM);
                      echo "<td><input class='form-control' name='id' type='number' value = '$array[0]'></td>";
                    echo "</div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Tipo:</label>
                    <div class='col-sm-10'>
                      <select class='form-control' name='tipo' id='tipo'>
                        <option value='alquiler'>Selecciona una opcion</option>
                        <option value='alquiler'>Alquilar</option>
                        <option value='compra'>Vender</option>
                      </select>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Calle:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='calle' name='calle' type='text'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Portal:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='portal' name='portal' type='text'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Código Postal:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='cp' name='cp' type='number'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Localidad:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='localidad' name='localidad' type='text'><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Metros:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='metros' name='metros' type='number'><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Núm. de habitaciones:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='num_hab' name='num_hab' type='number'><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Núm. de baños:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='num_banos' name='num_banos' type='number'><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2' >Garaje:</label>
                      <div class='col-sm-10'>
                          <label class='radio-inline'>
                              <input type='radio' name='garaje' value='si' id= 'Si'> Si <span></span>
                          </label>
                          <label class='radio-inline'>
                              <input type='radio' name='garaje' value='no' id='No'> No <span></span>
                          </label>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Jardín:</label>
                      <div class='col-sm-10 '>
                          <label class='radio-inline'>
                              <input type='radio' name='jardin' value='si' id= 'Si'> Si
                          </label>
                          <label class='radio-inline'>
                              <input type='radio' name='jardin' value='no' id='No'> No<span></span>
                          </label>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Piscina:</label>
                      <div class='col-sm-10 '>
                          <label class='radio-inline'>
                              <input type='radio' name='piscina' value='si' id= 'Si'> Si<span></span>
                          </label>
                          <label class='radio-inline'>
                              <input type='radio' name='piscina' value='no' id='No'> No
                          </label>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>Estado:</label>
                      <div class='col-sm-10'>
                          <select class='form-control' id='estado' name='estado'>
                              <option value=''>Selecciona una opcion</option>
                              <option value='0'>Nuevo</option>
                              <option value='1'>Segunda mano</option>
                          </select><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>Titular:</label>
                      <div class='col-sm-10'>
                          <textarea class='form-control' id='titular' name='titular' rows='3'></textarea><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>Descripción:</label>
                      <div class='col-sm-10'>
                          <textarea class='form-control' id='descripcion' name='descripcion' rows='5'></textarea><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Precio:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='precio' name='precio' type='number'><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>Imagen:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='imagen' name='imagen' type='file'>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>Fecha de alta:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='fecha_alta' name='fecha_alta' type='date'>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>ID Cliente:</label>
                      <div class='col-sm-10'>
                        <select class='form-control' id='id_cliente' name='id_cliente'>";
                          $conexion = abrirConexion();
                          $consulta = 'SELECT id, nombre, apellidos from tbl_clientes';
                          $clientes = mysqli_query($conexion, $consulta);

                          if (!$clientes) {
                            echo 'Error al ajecutar la consulta';
                          } else {
                            while ($fila = mysqli_fetch_array($clientes, MYSQLI_ASSOC)) {
                              echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                            }
                          }
                          mysqli_close($conexion);
                        echo "</select>
                      </div>
                    </div>
                <div class='form-group'>
                  <div class='col-sm-12 col-sm-offset-4'>
                    <div class='col-sm-2'>
                        <input type='submit' class='form-control btn-theme' id='nuevo_inmueble' name='nuevo_inmueble' value='Añadir'>
                      </div>
                      <div class='col-sm-2'>
                        <button class='form-control btn-theme' id='btnLimpiar'>Limpiar</button>
                      </div>
                      <div class='col-sm-2'>
                        <a href='../php/inmuebles.php' class='btn btn-danger'>Cancelar</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    nuevo_inmueble();
    return true;
  }
  static public function tbl_borrar_inmueble(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
          <div class='panel-group'>
            <div class='panel panel-default menu-inicio'>
              <div class='panel-heading'>
                <h2 align='center'>Borrar inmueble</h2>
                <p align='center'>Seleccione el inmueble que desea borrar</p>
              </div>
              <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                  <div class='form-group'>
                   
                    <div class='col-sm-10'>";
                      $conexion = abrirConexion();
                      $consulta = "SELECT id, calle, imagen from tbl_inmuebles";

                      $datos = mysqli_query($conexion, $consulta);

                      if (!$datos) {
                        echo "Error!! No se han podido cargar los datos del inmueble";
                      } else {
                        echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>";
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-striped'";
                        echo "<thead><tr><th>id</th><th>Dirección</th><th>Imagen</th><th>¿Eliminar?</th></tr></thead>";
                        while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
                          echo "<tbody><tr><td>$fila[id]</td><td>'$fila[calle]$fila[portal]'</td><td><img src='/./media/img/img_inmuebles/$fila[imagen]' style='width:150px'></td>
                                                <td><form action='#' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-danger' type='submit' name='borrar' value='Eliminar'></form></td></tr></tbody>";
                        }
                        echo "</div></table></div>";
                      }
                      mysqli_close($conexion);
                    echo "</div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    borrar_inmueble();
    return true;
  }

  static public function form_buscar_inmueble_admin(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
          <div class='panel-group'>
            <div class='panel panel-default menu-inicio'>
              <div class='panel-heading'>
                <h2 align='center'>Buscar inmueble</h2>
              </div>
              <div class='panel-body'>
                <p align='center'>Rellene los campos por los que quiera filtrar realizar la búsqueda</p>
                <form class='form-horizontal' action='#' method='post'>
                  <div class='form-group'>
                    <label class='col-sm-3 col-sm-offset-2'>Tipo</label>
                    <div class='col-sm-6 '>
                      <select class='form-control' id='tipo' name='tipo'>
                        <option value='alquiler'>Alquilar</option>
                        <option value='compra'>Comprar</option>
                      </select>
                     </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-2'>Calle:</label>
                      <div class='col-sm-5 col-lg-offset-2'>
                        <input class='form-control' type='text' name='direccion'>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-2'>Metros<sup>2</sup>:</label>
                      <div class='col-sm-5 col-lg-offset-2'>
                        <input class='form-control' type='text' name='metros'>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-2'>Precio:</label>
                      <div class='col-sm-5  col-lg-offset-2'>
                        <input class='form-control' type='text' name='precio'>
                      </div>
                    </div>
                    <div class='form-group'>
                      <div class='col-sm-5 col-lg-offset-2'>
                        <input class='form-control btn-theme' align='center' type='submit' name='buscar' value='Buscar'>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    return true;
  }/*************** revisar  */

  static public function form_mod_inmueble(): bool {
    // $_POST NO FUNCIONA
    if (isset($_POST['modificar'])) {
      $id = $_POST['id'];

      $conexion = abrirConexion();
      $consulta = "SELECT * FROM tbl_inmuebles WHERE id='$id'";

      $sql = mysqli_query($conexion,$consulta);

      if (!$sql) {
        echo "¡ERROR! No hay datos en la consulta";
        header("location:inmuebles.php");
      } else {
        $num_filas = mysqli_num_rows($sql);
        if ($num_filas == 0) {
          echo "No hay datos de inmueble almacenados";
        } else {
          while ($fila = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
            $tipo = $fila['tipo'];
            $calle = $fila['calle'];
            $portal = $fila['portal'];
            $piso = $fila['piso'];
            $puerta = $fila['puerta'];
            $cp = $fila['cp'];
            $localidad = $fila['localidad'];
            $metros = $fila['metros'];
            $num_hab = $fila['num_hab'];
            $num_banos = $fila['num_banos'];
            $garaje = $fila['garaje'];
            $jardin = $fila['jardin'];
            $piscina = $fila['piscina'];
            $estado = $fila['estado'];
            $titular = $fila['titular'];
            $descripcion = $fila['descripcion'];
            $precio = $fila['precio'];
            $fecha_alta = $fila['fecha_alta'];
            $id_cliente = $fila['id_cliente'];
            $imagen = $fila['imagen'];
          }
        }
      }
      mysqli_close($conexion);

      echo "<div class='container-fluid'>
        <div class='row'>
          <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
          <div class='panel-group'>
            <div class='panel panel-default menu-inicio'>
              <div class='panel-heading'>
                <h2 align='center'>Modificar inmueble</h2>
              </div>
                <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                <div class='form-group'>
                    <label class='col-sm-2'>ID:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' name='id' type='number' value ='$id'></td>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Tipo:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' name='tipo' type='text' value ='$tipo'></td>
                      </select>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Calle:</label>
                    <div class='col-sm-10'>
                    <input class='form-control'  name='calle' type='text' value='$calle'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Portal:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' type='number' name='portal' value='$portal'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Piso:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' name='piso' value='$piso'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Puerta:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' name='puerta' value='$puerta'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Código Postal:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='number' name='cp' value='$cp'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Localidad:</label>
                        <div class='col-sm-10'>
                            <input class='form-control' type='text' name='localidad' value='$localidad'>
                        </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-sm-2'>Metros:</label>
                          <div class='col-sm-10'>
                            <input class='form-control' type='number' name='localidad' value='$metros'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-sm-2'>Núm. de habitaciones:</label>
                          <div class='col-sm-10'>
                            <input class='form-control' type='number' name='num_hab' value='$num_hab'>
                          </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-sm-2'>Núm. de baños:</label>
                          <div class='col-sm-10'>
                          <input class='form-control' type='number' name='num_banos' value='$num_banos'>
                          </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2' >Garaje:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' name='garaje' value='$garaje'>
                        </div>
                      </div>
                      <div class='form-group'>
                          <label class='col-sm-2'>Jardín:</label>
                          <div class='col-sm-10'>
                            <input class='form-control' type='text' name='jardin' value='$jardin'>
                          </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Piscina:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' name='piscina' value='$piscina'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Estado:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' type='text' name='estado' value='$estado'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Titular:</label>
                        <div class='col-sm-10'>
                        <input class='form-control' type='text' name='titular' value='$titular'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Descripción:</label>
                        <div class='col-sm-10'>
                          <textarea class='form-control' id='descripcion' name='descripcion' rows='5' value='$descripcion'></textarea><span></span>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Precio:</label>
                        <div class='col-sm-10'>
                          <input class='form-control' id='precio' name='precio' type='number' value='$precio'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2'>Imagen:</label>
                        <div class='col-sm-5'>";
                          $conexion = abrirConexion();
                          $consulta = "SELECT id, imagen from tbl_inmuebles where id='$id'";
                          $imagen = mysqli_query($conexion, $consulta);
                          if (!$imagen) {
                            echo "error al cargar la miniatura...";
                          } else {
                            while($fila = mysqli_fetch_array($imagen,MYSQLI_ASSOC)) {
                              echo "<p><img src='/./media/img/img_inmuebles/$fila[imagen]' width='150px'></p>";
                            }
                          }
                          mysqli_close($conexion);
                        

                        echo "</div>";
                      echo "</div>";
                      echo "<div class='form-group'>
                          <label class='col-sm-2'>Fecha de alta:</label>
                          <div class='col-sm-10'>
                              <input class='form-control' id='fecha_alta' name='fecha_alta' type='date' value='$fecha_alta'>
                          </div>
                      </div>
                      <div class='form-group'>
                        <label class=' col-sm-2'>ID Cliente:</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='id_cliente' name='id_cliente'>";
                            $conexion = abrirConexion();
                            $consulta = "SELECT id, nombre, apellidos from tbl_clientes";
                            $sql = mysqli_query($conexion, $consulta);
                        
                            if (!$sql) {
                              echo 'Error al ajecutar la consulta';
                            } else {
                              while ($fila = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                                echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                              }
                            }
                            mysqli_close($conexion);
                          echo "</select>
                        </div>
                      </div>
                      <div class='form-group'>
                        <div class='col-sm-12 col-sm-offset-4'>
                          <div class='col-sm-2'>
                            <input class='form-control btn-theme' type='submit' name='guardar' value='Modificar'>
                          </div>
                          <div class='col-sm-2'>
                            <a href='cliente.php' class='btn btn-danger'>Cancelar</a>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>";
        return true;
    }
    return true;
  }/*************** revisar  */

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

  static public function form_nueva_noticia(): bool {
    echo "<div class='container-fluid cabecera-menu-inicio'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
        <div class='panel-group'>
          <div class='panel panel-default'>
            <div class='panel-heading'>
              <h2 align='center'>Añadir noticias</h2>
            </div>
            <div class='panel-body'>
              <form class='form-horizontal' action='#' method='post' enctype='multipart/form-data'>
                <div class='form-group'>
                  <label class=' col-sm-3'>ID:</label>
                  <div class='col-sm-9'>";
                    $con = abrirConexion();
                    $consulta = "SELECT auto_increment from information_schema.tables WHERE table_schema='db_inmomenenia' and table_name='tbl_noticias'";

                    $datos = mysqli_query($con, $consulta);
                    $array = mysqli_fetch_array($datos, MYSQLI_NUM);
                    echo "<td><input class='form-control' type='text' name='id' value = '$array[0]'></td>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3'>Titular:</label>
                  <div class='col-sm-9'>
                    <input class='form-control' id='titular' type='text' name='titular' autofocus><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3'>Contenido:</label>
                  <div class='col-sm-9'>
                    <textarea class='form-control' id='contenido' name='contenido' rows='5'></textarea><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3'>Imagen:</label>
                  <div class='col-sm-9'>
                    <input class='form-control' id='imagen' type='file' name='imagen'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3'>Fecha de publicación:</label>
                  <div class='col-sm-5'>
                    <input class='form-control' id='fecha' type='date' name='fecha'><span></span>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-12 col-sm-offset-4'>
                    <div class='col-sm-2'>
                      <input class='form-control btn-theme' id='nueva_noticia' type='submit' name='nueva_noticia' value='Añadir'>
                    </div>
                    <div class='col-sm-2'>
                      <a href='noticias.php' class='btn btn-danger'>Cancelar</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>";
      return true;
  }

  static public function tbl_borrar_noticia(): bool {
    echo "<div class='container-fluid cabecera-menu-inicio'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
        <div class='panel-group'>
          <div class='panel panel-default'>
            <div class='panel-heading'>
              <h2 align='center'>Borrar una noticia</h2>
            </div>
            <div class='panel-body'>
              <p align='center'>Seleccione el inmueble que desea borrar</p>";

              $conexion = abrirConexion();
              $consulta = "SELECT id, titular from tbl_noticias";

              $datos = mysqli_query($conexion, $consulta);

              if (!$datos) {
                echo "Error, no se han podido cargar los datos de las noticas";
              } else {
                echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2'>";

                echo "<table class='table table-striped'";
                echo "<thead><tr><th>ID</th><th>Titular</th><th>¿Eliminar?</th></tr></thead>";
                while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
                  echo "<tbody><tr><td>$fila[id]</td><td>$fila[titular]</td>
                              <td><form action='#' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-danger' type='submit' name='borrar' value='Eliminar'></form></td></tr></tbody>";
                }
                echo "</table>
                    <a align='center' href='noticias.php' class='btn btn-danger'>Cancelar</a>
                  </div>";
              }
              mysqli_close($conexion);
            echo "</div>
          </div>
        </div>
      </div>
    </div>
    </div>";
    borrar_noticia();
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
      buscar_noticia();
    return true;
  }

  static public function gestion_clientes(): bool {
    echo "<div class='container-fluid cabecera-menu-inicio'>
      <div class='row'>
        <div class='col-xs-12'>
          <nav class='navbar '>
            <div class='container-fluid'>
              <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
                <li><a type='button' class='btn btn-theme btn-md' href='añadir_cliente.php'>Añadir cliente</a></li>
                <li><a type='button' class='btn btn-theme btn-md' href='buscar_cliente.php'>Buscar cliente</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>";
    return true;
  }

 
  static public function listar_clientes(): bool {
    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 lista-clientes'>
       <h2 class='margen-citas' align='center'>Listado de clientes</h2>
        <div class='panel panel-default'>
           <div class='panel-body'>
             <div class='table-responsive'>
              <div class='table table-striped'>";
                $conexion = abrirConexion();
                $consulta = "SELECT id, tipo, nombre, apellidos  ,telefono, email, localidad from tbl_clientes order by id";
                $datos = mysqli_query($conexion, $consulta);

                if (!$datos) {
                  echo "No hay datos que mostrar";
                } else {
                  $num_filas = mysqli_num_rows($datos);

                  if ($num_filas == 0) {
                    echo "No hay clientes";
                  } else {
                    $clientes_registrados = $num_filas;
                    echo "<p><strong>Número de clientes:</strong> $clientes_registrados</p>";
                    echo "<table class='table table-hover'";
                    echo "<thead><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Localidad</th><th>Modificar</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
                      echo "<tbody><tr><td>$fila[id]</td><td>$fila[tipo]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[telefono]</td><td>$fila[email]</td><td>$fila[localidad]</td>
                          <td><form action='ver_cliente.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-theme' type='submit' name='ver' value='Ver'></form></td></tr></tbody>";
                    }
                  }
                }
                mysqli_close($conexion);
              echo "</div>
            </div>
           </div>
          </div>
        </div>
      </div>
    </div>";
    return true;
  }

 static public function form_nuevo_cliente(): bool  {
    echo "
    <!-- Nuevo cliente -->
    <div class='container-fluid menu-inicio'>
      <div class='row'>
        <div class='col-xs-12 col-md-8 col-md-offset-2'>
          <div class='panel-group'>
            <div class='panel panel-default'>
              <div class='panel-heading'>
                <h2 align='center'>Nuevo cliente</h2>
              </div>
              <div class='panel-body'>
                <form class='form-horizontal' action='#' method='post'>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>ID:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='id'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Tipo:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='tipo'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Nombre:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='nombre'>
                    </div>
                  </div>   
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Apellidos:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='apellidos'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Calle:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='calle'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Portal:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='portal'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Piso:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='piso'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Puerta:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='puerta'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>CP:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='cp'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Localidad:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='localidad'>
                    </div>
                  </div>

                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Teléfono:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='telefono'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Email:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='email'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-12 col-sm-offset-4'>
                      <div class='col-sm-2'>
                        <input class='form-control btn-thene' id='nuevo_cliente' type='submit' name='nuevo_cliente'>
                      </div>
                      <div class='col-sm-2'>
                        <a href='../php/clientes.php' class='btn btn-danger'>Cancelar</a>
                      </div>
                    </div>
                  </div> 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    nuevo_cliente();
    return true;
  }

  static public function form_buscar_cliente(): bool {
    echo "<div class='container-fluid menu-inicio'>
    <div class='row'>
      <div class='col-xs-12 col-md-8 col-md-offset-2'>
        <div class='panel-group'>
          <div class='panel panel-default'>
            <div class='panel-heading'>
              <h2 align='center'> Buscar un cliente</h2>
            </div>
            <div class='panel-body'>
              <form class='form-horizontal' action='#' method='post'>
                <div class='form-group'>
                  <label class=' col-sm-2'> ID:</label>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='id' autofocus>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-2'>Tipo</label>
                  <div class='col-sm-5 col-lg-offset-2'>
                    <select class='form-control' id='tipo' name='tipo'>
                      <option value=''>Seleccione el tipo de vivienda</option>
                      <option value='alquiler'>Alquilar</option>
                      <option value='venta'>Venta</option>
                    </select>
                  </div>
                </div>
                <div class='form-group'>
                  <label class=' col-sm-2'>Nombre:</label>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='nombre' autofocus>
                  </div>
                </div>
                <div class='form-group'>
                  <label class=' col-sm-2'>Apellidos:</label>
                  <div class='col-sm-10'>
                    <input class='form-control' type='text' name='apellidos'>
                  </div>
                </div>
                <div class='form-group'>
                <label class=' col-sm-2'>Localidad:</label>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='localidad'>
                </div>
              
                <div class='form-group' style='padding-top:'15px'>
                  <div class='col-sm-offset-2 col-sm-5 col-lg-offset-4'>
                    <input class='form-control btn-theme' type='submit' name='buscar' value='Buscar'>
                  </div>
                </div>
              </form>
            </div></div></div></div></div></div>";
            buscar_cliente();
    return true;
  } /*************** revisar  */

  static public function form_mod_cliente(): bool {

    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
        <h2 align='center'>Estos son los datos de cliente</h2>
          <p align='center'><b>Aquí puedes modificar los datos del cliente</b></p>
      </div>";
      echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2'>";

      if (isset($_POST['modificar'])) {
        $id = $_POST['id'];

        // almaceno en variables los datos para mostrarlas después en los 'value' del formulario
        $conexion = abrirConexion();
        $sql = "SELECT * FROM tbl_clientes WHERE id='$id'";

        $datos = mysqli_query($conexion, $sql);
          if (!$datos) {
            echo "No se han encontrado los datos del usuario en la BD";
            header("location:clientes.php");
          } else {
            $num_filas = mysqli_num_rows($datos);
            while ($fila = mysqli_fetch_array($datos,MYSQLI_ASSOC)) {
              $tipo = $fila['tipo'];
              $nombre = $fila['nombre'];
              $apellidos = $fila['apellidos'];
              $calle = $fila['calle'];
              $portal = $fila['portal'];
              $piso = $fila['piso'];
              $puerta = $fila['puerta'];
              $cp = $fila['cp'];
              $localidad = $fila['localidad'];
              $telefono = $fila['telefono'];
              $email = $fila['email'];
            }
          }
          mysqli_close($conexion);
                    
          echo "<form action='#' method='post' accept-charset='utf-8'>
          <div class='panel panel-default'>
            <div class='panel-body'>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>ID:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='id' value='$id' readonly>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Tipo:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='tipo' value='$tipo'>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Nombre:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='nombre' value='$nombre' readonly>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label>Apellidos:</label>
                </div>
                <div class='col-sm-10'>
                  <input class='form-control' type='text' name='apellidos' value='$apellidos' readonly>
                </div>
              </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Calle:</label>
                    </div>
                    <div class='col-sm-10'>
                     <input class='form-control' type='text' name='calle' value='$calle'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Portal:</label>
                    </div>
                    <div class='col-sm-10'>
                    <input class='form-control' type='text' name='portal' value='$portal'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Piso:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='piso' value='$piso'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Puerta:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='puerta' value='$puerta'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>CP:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='cp' value='$cp'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class='col-sm-2'>
                      <label>Localidad:</label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control' type='text' name='localidad' value='$localidad'>
                    </div>
                  </div>
    
                  <div class='form-group'>
                      <div class='col-sm-2'>
                        <label>Teléfono:</label>
                      </div>
                      <div class='col-sm-10'>
                      <input class='form-control' type='text' name='telefono' value='$telefono'>
                      </div>
                  </div>
                  <div class='form-group'>
                      <div class='col-sm-2'>
                        <label>Email:</label>
                      </div>
                      <div class='col-sm-10'>
                      <input class='form-control' type='text' name='email' value='$email'>
                      </div>
                  </div>
                  <div>
                </div>
                <div class='form-group'>
                  <div class='col-sm-12 col-sm-offset-4' style='padding-top:15px'>
                    <div class='col-sm-2'>
                      <input class='form-control btn-theme' type='submit' name='guardar' value='Modificar'>
                    </div>
                    <div class='col-sm-2'>
                      <a href='clientes.php' class='btn btn-danger'>Cancelar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>";
    }
    return true;

  } /*************** revisar  */
  
  static public function gestion_citas(): bool {
    echo "<div class='container-fluid cabecera-menu-inicio'>
      <div class='row'>
        <div class='col-xs-12'>
          <nav class='navbar '>
            <div class='container-fluid'>
              <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
                <li><a type='button' class='btn btn-theme' href='nueva_cita.php'>Añadir citas</a></li>
                <li><a type='button' class='btn btn-theme' href='borrar_cita.php'>Borrar citas</a></li>
                <li><a type='button' class='btn btn-theme' href='buscar_cita.php'>Buscar citas</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>";
    return true;
  }

  static public function form_nueva_cita() : bool {
    echo "<div class='container-fluid'>
    <div class='row'>
    <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
      <div class='panel-group'>
        <div class='panel panel-default menu-inicio'>
          <div class='panel-heading'>
            <h2 align='center'>Añadir cita</h2>
          </div>
            
          <form class='form-horinzontal panel-body' action='#' method='post'>
              <div class='form-group'>
                  <label class=' col-sm-2'>ID:</label>
                  <div class='col-sm-10'>";
                    $con = abrirConexion();
                    $consulta = "SELECT auto_increment from information_schema.tables where table_schema='db_inmobiliaria' and table_name='tbl_citas'";
                    $datos = mysqli_query($con, $consulta);
                    $array = mysqli_fetch_array($datos, MYSQLI_NUM);
                    echo "<td><input class='form-control' type='text' name='id' value = $array[0] readonly></td>";
                  echo "</div>
              </div>";
              // aquí compruebo si me han pasado mes por el enlace, si es así muestro la fecha pasada si no se muestra un date para seleccionarla
              if (isset($_GET['mes'])) {
                $mes = $_GET['mes'];
                $año= $_GET['año'];
                $dia = $_GET['dia'];
                echo "<div class='form-group'>
              <label class=' col-sm-2'>Fecha:</label>
              <div class='col-sm-10'>
                <input id='fecha' class='form-control' type='text' name='fecha' value='$dia/$mes/$año' readonly><span></span>
              </div>
            </div>";
              } else {
                echo "<div class='form-group'>
                  <label class=' col-sm-2'>Fecha:</label>
                  <div class='col-sm-10'>
                    <input id='fecha' class='form-control' type='date' name='fecha' autofocus><span></span>
                  </div>
                </div>";
              }
              
              echo "<div class='form-group'>
              <label class='col-sm-2'>Hora:</label>
              <div class='col-sm-10'>
                <input id='hora' class='form-control' type='time' name='hora'><span></span>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2'>Motivo:</label>
              <div class='col-sm-10'>
                <input id='motivo' class='form-control' type='text' name='motivo'><span></span>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2'>Lugar</label>
              <div class='col-sm-10'>
                <input id='lugar' class='form-control' type='text' name='lugar'><span></span>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2'>ID Cliente:</label>
              <div class='col-sm-10'>
                <select class='form-control' name='id_cliente'>";
                  $conexion = abrirConexion();
                  $consulta = "SELECT id, nombre, apellidos from tbl_clientes";
                  $clientes = mysqli_query($conexion,$consulta);
                  
                  if (!$clientes) {
                    echo "Error al ajecutar la consulta";
                  } else {
                    while ($fila = mysqli_fetch_array($clientes,MYSQLI_ASSOC)) {
                      if ($fila['nombre'] != 'disponible') {
                        echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                      }
                    }
                  }                     
                  mysqli_close($conexion);
                echo "</select>
                </div>
              </div>";
              echo "<div class='form-group'>
                  <div class='col-sm-12'>
                    <input class='form-control btn-theme' type='submit' id='nueva_cita' name='nueva_cita' value='Añadir cita'>
                  </div>
                  <div class='col-sm-2'>
                    <a href='citas.php' class='btn btn-danger'>Cancelar</a>
                  </div>
              </div>
            </form>
        </div>
      </div>
    </div>
    </div>
  </div>";
   /* Código PHP que añade una nueva cita */
   nueva_cita();
  return true;

  }

  static public function form_buscar_cita() : bool {
    echo "  <div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
        <div class='panel-group menu-inicio'>
          <div class='panel panel-default'>
            <div class='panel-heading'>
              <h2 align='center'>Buscar citas</h2>
            </div>
            <div class='panel-body'>
              <p align='center'>Rellene el campo o campos por los que quiere realizar la búsqueda</p>
                <form class='form-horizontal' action='#' method='post' accept-charset='utf-8'>
                <div class='form-group'>
                  <label class=' col-sm-3 '>Fecha:</label>
                  <div class='col-sm-7'>
                    <input class='form-control' type='date' name='fecha' autofocus>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-4'>Nombre del cliente:</label>
                  <select class='form-control' name='id_cliente'>";
                      
                    $conexion = abrirConexion();
                    $consulta = "SELECT id, nombre, apellidos FOM clientes";
                    $clientes = mysqli_query($conexion,$consulta);
                    
                    if (!$clientes) {
                      echo "Error al ajecutar la consulta";
                    } else {
                      echo "<option></option>";
                      while ($fila = mysqli_fetch_array($clientes,MYSQLI_ASSOC)) {
                        if ($fila['nombre'] != "disponible") {
                          echo "<option value=$fila[id]>$fila[nombre]</option>";
                        }
                        
                      }
                    }                     
                    mysqli_close($conexion);
                
                  echo "</select>
                </div>
                
                <div class='form-group'>
                  <div class='col-sm-12'>
                    <input class='form-control btn-theme' type='submit' name='buscar_cita' value='Buscar'>
                  </div> 
              </form>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>";
    buscar_cita();
    return true;
  }

  static public function tbl_borrar_cita(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-form'>
          <div class='panel-group menu-inicio'>
            <div class='panel panel-default'>
              <div class='panel-heading'>
                <h2 align='center'>Borrar una cita</h2>
              </div>
              <div class='panel-body'>
                <p align='center'>Seleccione la cita que desea borrar</p>";
                 //fecha actual para controlar que no se borra una cita ya pasada
                  $fecha_actual = date('Y-m-d');
  
                  $conexion = abrirConexion();
                  $consulta = "SELECT * from tbl_citas where fecha >= '$fecha_actual' order by fecha asc";

                  $datos = mysqli_query($conexion,$consulta);

                  if (!$datos) {
                    echo "Error, no se han podido cargar los datos de las citas";
                  } else {
                    echo "<div class='col-xs-12 col-sm-8 col-sm-offset-2'>";
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-striped'";
                    echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th><th>Cliente</th><th>¿Eliminar?</th></tr></thead>";
                    while ($fila = mysqli_fetch_array($datos,MYSQLI_ASSOC)) {
                      if ($fila['fecha'] >= $fecha_actual) {
                        
                      }
                      echo "<tbody><tr><td>$fila[fecha]</td><td>$fila[hora]</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[id_cliente]</td>
                      <td><form action='#' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-danger' type='submit' name='borrar' value='Eliminar'></form></td></tr></tbody>";
                    }
                    echo "</table></div></div>";
                  }
                  mysqli_close($conexion);
              echo "</div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    borrar_cita();
    return true;
  }

  static public function mostrarCalendario($dia, $mes, $año): bool {
    switch ($mes) {
      case 1:
        $nombre_mes = 'Enero';
        break;
      case 2:
        $nombre_mes = 'Febrero';
        break;
      case 3:
        $nombre_mes = 'Marzo';
        break;
      case 4:
        $nombre_mes = 'Abril';
        break;
      case 5:
        $nombre_mes = 'Mayo';
        break;
      case 6:
        $nombre_mes = 'Junio';
        break;
      case 7:
        $nombre_mes = 'Julio';
        break;
      case 8:
        $nombre_mes = 'Agosto';
        break;
      case 9:
        $nombre_mes = 'Septiembre';
        break;
      case 10:
        $nombre_mes = 'Octubre';
        break;
      case 11:
        $nombre_mes = 'Noviembre';
        break;
      case 12:
        $nombre_mes = 'Diciembre';
        break;

      default:
        $nombre_mes = '';
        break;
    }
    // guardo el mes por semanas en un array
    $semana = 1;

    for ($i = 1; $i <= date('t', strtotime($año . "-" . $mes . "-" . $dia)); $i++) { // dia 1 al numero de dias del mes
      $dia_semana = date('N', strtotime($año . "-" . $mes . "-" . $i)); // numero del dia
      $calendario[$semana][$dia_semana] = $i; //Guardo el mes en un array
      if ($dia_semana == 7) // si el dia de la semana es 7 cambio de semana
        $semana++;
    }

    // consulto las citas del mes
    /* por cada fecha, cojo el mes y si es igual al actual lo guardo en un array (la fecha entera)
    y cuando muestro el calendario compara si hay un dia del array igual al dia del mes que pasa
    y si es así lo marco el calendario (background-color) */
    $citas_mes = array();
    $conexion = abrirConexion();
    $consulta = "SELECT fecha from tbl_citas WHERE fecha like '$año-$mes-%'";
    $fechas = mysqli_query($conexion, $consulta);
    if (!$fechas) {
      echo "Error al cargar las fechas de las citas...";
    } else {
      echo "<p align='center'><b>Las citas del mes aparecen marcadas</b></p>";
      while ($fila = mysqli_fetch_array($fechas, MYSQLI_ASSOC)) {
        $fe_marca = strtotime($fila['fecha']);
        $mesA = date('n', $fe_marca);
        $dia = date('d', $fe_marca);
        if ($mesA == date('n')) {
          array_push($citas_mes, $dia);
        }
      }
    }

    // muestro el calendario del mes
    echo "<h4>$nombre_mes</h4>";
    echo "<table class='table'>";
    echo "<tbody>";
    echo "<tr bgcolor='#b2b6b9'><th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th></tr>"; //Días de la semana
    foreach ($calendario as $dias_mes) { // cojo los días del mes almacenados en el array
      echo "<tr>";
      for ($i = 1; $i <= 7; $i++) {

        if (isset($dias_mes[$i])) {
          //busca en el array citas el día por el que va i para comprobar si hay alguna
          if (in_array($dias_mes[$i], $citas_mes)) { //busca en el array citas el numero del dia / aqui si hay cita
            $con = abrirConexion();
            $sql = "SELECT motivo, hora, lugar from tbl_citas WHERE fecha='$año-$mes-$dias_mes[$i]'";
            $cons_citas = mysqli_query($con, $sql);

            if ($cons_citas) {

              $num_filas = mysqli_num_rows($cons_citas);

              if ($num_filas == 1) { // hay 1 cita
                while ($fila = mysqli_fetch_array($cons_citas, MYSQLI_ASSOC)) {
                  //$fila = mysqli_fetch_array($consultar_citas,MYSQLI_ASSOC);
                  $marca_hora = strtotime($fila['hora']);
                  $h_formateada = date("G:i", $marca_hora);
                  echo "<td bgcolor='#baa35f'>
                        <a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$año'>" . $dias_mes[$i] . "</a><br>
                        <a href='#' data-toggle='popover' title='Citas del día' data-content='· $fila[motivo] a las $h_formateada en $fila[lugar]'><span class='glyphicon glyphicon-eye-open'></span></a>
                      </td>";
                }
              } else { // hay mas de una cita
                $contenido = "";
                while ($fila = mysqli_fetch_array($cons_citas, MYSQLI_ASSOC)) {
                  //$fila = mysqli_fetch_array($consultar_citas,MYSQLI_ASSOC);
                  $marca_hora = strtotime($fila['hora']);
                  $h_formateada = date("G:i", $marca_hora);
                  $contenido .= " · $fila[motivo] a las $h_formateada en $fila[lugar] &#013";
                }

                echo "<td bgcolor='#baa35f'>
                        <a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$año'>" . $dias_mes[$i] . "</a><br>
                        <a href='#' data-toggle='popover' title='Citas del día' data-content='" . $contenido . "'><span class='glyphicon glyphicon-eye-open'></span></a>
                      </td>";
              }
            } else {
              echo "¡ERROR! no se ha podido conectar con la BD...";
            }
          } else { // Día sin cita
            echo "<td bgcolor='white'><a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$año'>" . $dias_mes[$i] . "</a></td>";
          }
        } else {
          echo "<td></td>";
        }

      }
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    $mes_antes = $mes - 1;
    $mes_despues = $mes + 1;
    echo "<ul class='pager'>
              <li><a class='btn btn-warnig' role='button' href='citas.php?mes=$mes_antes&anio=" . $año . "'>Atrás</a></li>
              <li><a class='btn btn-warnig' role='button' href='citas.php?mes=$mes_despues&anio=" . $año . "'>Siguiente</a></li>
          </ul>";

    return true;
  }

  static public function mostrar_ProximasCitas(): bool {
    echo '<div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <h2 class="margen-citas" align="center">Próximas citas</h2>';

    $actual = date('Y-m-d');
    $marca_actual = strtotime($actual);

    $conexion = abrirConexion();
    $sql = "SELECT tbl_citas.id, tbl_citas.fecha, tbl_citas.hora, tbl_citas.motivo, tbl_citas.lugar, tbl_clientes.id
          from tbl_citas inner join tbl_clientes on tbl_citas.id_cliente = tbl_clientes.id order by fecha desc";

    $mostrar = mysqli_query($conexion, $sql);

    if (!$mostrar) {
      echo "Error al hacer la consulta a la BD";
    } else {
      $num_filas = mysqli_num_rows($mostrar);
      if ($num_filas == 0) {
        echo "No hay citas para mostrar";
      } else {
        echo "<p align='center'><b>Se han listado $num_filas citas</b></p>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-striped table-hover'";
        echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th><th>Cliente</th><th>Teléfono</th><th>Modificar</th></tr></thead>";
        while ($fila = mysqli_fetch_array($mostrar, MYSQLI_ASSOC)) {
          $marca_cita = strtotime($fila['fecha']);
          $marca_hora = strtotime($fila['hora']);
          $f_formateada = date("d-m-Y", $marca_cita);
          $h_formateada = date("G:i", $marca_hora);

          if ($marca_cita > $marca_actual) {
            echo "<tbody><tr class='success'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>$fila[telefono1]</td>
                        <td><form action='modificar_cita.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-theme' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
          } else {
            echo "<tbody><tr class='warning'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>$fila[telefono1]</td><td>No se puede modificar</td></tr></tbody>";
          }
        }
        echo "</table>
              </div>";
      }
    }
    return true;
  } /*************** revisar  */

  static public function mapaWeb(): bool {
    echo "<div class='container-fluid'>
      <div class='row'>
      <div class='col-xs-12 cabecera-menu-inicio' align='center'>
        <h1>Mapa web</h1>
        <h3 class='tmapa'><a href='/./php/home.php'>Inicio</a></h3>
        <h3 class='tmapa'><a href='/./php/home.php'>Buscar Inmuebles</a></h3>
        <h3 class='tmapa'><a href='/./php/inmuebles.php'>Cartera de Inmuebles</a></h3>
        <h3 class='tmapa'><a href='/./php/hipotecas.php'>Calcula tu hipoteca</a></h3>
        <h3 class='tmapa'><a href='/./php/contacto.php'>Contacto</a></h3>
        <h3 class='tmapa'><a href='/./php/clientes/area_personal.php'>Área Personal</a></h3>
        </div>
      </div>";
    return true;
  }

  static public function footer (): bool {
    echo "<footer class='navbar-nav navbar-inverse'>
      <p align='center'><span style='color:white'>info@inmomenenia.com</span>  |  <a class='aweb' href='..../php/mapa_web.php'>Mapa web</a>  |  <span style='color:white'> Copyright Menenia's Digital 2022</span></p>
    </footer>";
    return true;
  }
}
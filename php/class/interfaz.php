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
  

  static public function mostrar_home(): bool {
    if ($_SESSION['tipo']) {
      $tipo_usuario = $_SESSION['tipo'];
      if ($tipo_usuario == 'u') {
        $nombre = $_SESSION['nombre'];
        echo "<div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
          <h1 align='center'> ¡ Hola $nombre ! </h1>
          <h2 align='center'> ¿En qué podemos ayudarte? </h2>
        </div>  ";
        Usuario::gestion_usuario();
        Usuario::mostrar_noticias();
      } else if ($tipo_usuario == 'a') {
        echo "<div class='col-xs-12 col-sm-12 col-md-12 cabecera-menu-inicio'>
          <h1 align='center'> Administración InmoMenenia </h1>
        </div>";
        Administrador::area_administrador();
        Administrador::form_buscar_Inmuebles();
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

  static public function footer (): bool {
    echo "<footer class='navbar-nav navbar-inverse'>
      <p align='center'><span style='color:white'>info@inmomenenia.com</span>  |  <a class='aweb' href='..../php/mapa_web.php'>Mapa web</a>  |  <span style='color:white'> Copyright Menenia's Digital 2022</span></p>
    </footer>";
    return true;
  }
}
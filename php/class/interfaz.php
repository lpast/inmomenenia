<?php

class Interfaz {
  
  static public function mostrarMenuIndex(){
    if (isset($_SESSION['tipo'])){
      $tipo_usuario = $_SESSION['tipo'];
      if ($tipo_usuario == 'u'){
        echo "<nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
                <div class='container-fluid'>
                  <div class='navbar-header'>
                    <button type='button' class='n-resp navbar-toggle' data-toggle='collapse' data-target='#nav-responsive'>
                      <span class='icon-bar b-resp'></span>
                      <span class='icon-bar b-resp'></span>
                      <span class='icon-bar b-resp'></span>                        
                    </button>
                    <a href='./index.php'><img src='logo.jpeg' alt='inmomenenia' width='20%'></a>
                    </div>
                  <div class='collapse navbar-collapse' id='nav-responsive'>
                  <ul class='nav navbar-nav navbar-right'>
                    <li><a href='php/inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                    <li><a href='php/clientes/mis_inmuebles.php'><span class='glyphicon glyphicon-folder-open'></span> Mis inmuebles</a></li>
                    <li><a href='php/clientes/mis_datos.php'><span class='glyphicon glyphicon-pencil'></span> Mis datos personales</a></li>
                    <li><a href='php/clientes/mis_citas.php'><span class='glyphicon glyphicon-calendar'></span> Mis citas</a></li>
                    <li><a href='php/cerrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
                  </ul>
                  </div>
                </div>
              </nav>";
      }if ($tipo_usuario == 'a'){
        echo " <nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
        <div class='container-fluid'>
          <div class='navbar-header'>
            <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
              <span class='icon-bar b-resp'></span>
              <span class='icon-bar b-resp'></span>
              <span class='icon-bar b-resp'></span>                        
            </button>
            <a href='./index.php'><img src='logo.jpeg' alt='inmomenenia' width='20%'></a>
            </div>
          <div class='collapse navbar-collapse' id='nav-responsive'>
          <ul class='nav navbar-nav navbar-right'>
            <li><a href='php/noticias.php'><span class='glyphicon glyphicon-briefcase'></span> noticias</a></li>
            <li><a href='php/administrador/clientes.php'><span class='glyphicon glyphicon-folder-open'></span> Clientes</a></li>
            <li><a href='php/administrador/inmuebles.php'><span class='glyphicon glyphicon-pencil'></span> Inmuebles</a></li>
            <li><a href='php/administrador/citas.php'><span class='glyphicon glyphicon-calendar'></span> Citas</a></li>
            <li><a href='php/cerrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
          </ul>
          </div>
        </div>
        </nav>";
      }/*else{
        echo "<nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
            <div class='container-fluid'>
              <div class='navbar-header'>
                <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
                  <span class='icon-bar b-resp'></span>
                  <span class='icon-bar b-resp'></span>
                  <span class='icon-bar b-resp'></span>    
                  <span class='icon-bar b-resp'></span>                           
                </button>
                <a href='index.php'><img src='logo.jpeg' alt='inmomenenia' width='20%'></a>
              </div>
              <div class='collapse navbar-collapse' id='nav-responsive'>
              <ul class='nav navbar-nav navbar-right'>
                <li><a href='php/inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                <li><a href='php/contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
                <li><a href='php/ubicacion.php'><span class='glyphicon glyphicon-log-in'></span> Ubicacion</a></li>
                <li><a href='php/acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
              </ul>
              </div>
            </div>
      </nav>";
      }*/
    }else{
      echo "<nav class='menu navbar navbar-inverse navbar-fixed-top texto'>
            <div class='container-fluid'>
              <div class='navbar-header'>
                <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
                  <span class='icon-bar b-resp'></span>
                  <span class='icon-bar b-resp'></span>
                  <span class='icon-bar b-resp'></span> 
                  <span class='icon-bar b-resp'></span>                              
                </button>
                <a href='index.php'><img src='logo.jpeg' alt='inmomenenia' width='20%'></a>
              </div>
              <div class='collapse navbar-collapse' id='nav-responsive'>
              <ul class='nav navbar-nav navbar-right'>
                <li><a href='php/inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                <li><a href='php/contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
                <li><a href='php/ubicacion.php'><span class='glyphicon glyphicon-log-in'></span> Ubicacion</a></li>
                <li><a href='php/acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
              </ul>
              </div>
            </div>
      </nav>";
    }
  }

  static public function mostrarMenu(){
    if (isset($_SESSION['tipo'])){
      $tipo_usuario = $_SESSION['tipo'];
      if ($tipo_usuario == 'u'){
        echo " <nav class='menu navbar navbar-inverse texto navbar-fixed-top'>
                    <div class='container-fluid'>
                      <div class='navbar-header'>
                        <button type='button' class='n-resp navbar-toggle ' data-toggle='collapse' data-target='#nav-responsive'>
                          <span class='icon-bar b-resp'></span>
                          <span class='icon-bar b-resp'></span>
                          <span class='icon-bar b-resp'></span>                        
                        </button>
                        <a href='./../index.php'><img src='./../logo.jpeg' alt='inmomenenia' width='20%'></a>
                      </div>
                      <div class='collapse navbar-collapse' id='nav-responsive'>
                      <ul class='nav navbar-nav navbar-right'>
                        <li><a href='/php/inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span>Inmuebles</a></li>
                        <li><a href='/php/clientes/mis_inmuebles.php'><span class='glyphicon glyphicon-folder-open'></span> Mis inmuebles</a></li>
                        <li><a href='/php/clientes/mis_datos.php'><span class='glyphicon glyphicon-pencil'></span> Mis datos personales</a></li>
                        <li><a href='/php/clientes/mis_citas.php'><span class='glyphicon glyphicon-calendar'></span> Mis citas</a></li>
                        <li><a href='/php/cerrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
                      </ul>
                      </div>
                    </div>
              </nav>";
      }if ($tipo_usuario == 'a'){
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
                        <li><a href='/php/clientes.php'><span class='glyphicon glyphicon-user'></span> Clientes</a></li>
                        <li><a href='/php/administrador/inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span>Inmuebles</a></li>
                        <li><a href='/php/administrador/citas.php'><span class='glyphicon glyphicon-calendar'></span> Citas</a></li>
                        <li><a href='/php/cerrrar_sesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
                      </ul>
                      </div>
                    </div>
              </nav>";
      }/*else{
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
                <li><a href='inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                <li><a href='contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
                <li><a href='ubicacion.php'><span class='glyphicon glyphicon-log-in'></span> Ubicacion</a></li>
                <li><a href='acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
              </ul>
              </div>
            </div>
        </nav>";
      }*/
    }else{
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
                <li><a href='inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
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
    <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
        <h1 align='center'> Encuentra tu nuevo hogar</h1>";
          $conexion = abrirConexion();
          $sql = 'SELECT imagen FROM tbl_inmuebles';
          $imagenes = array();
            
          $imagen = mysqli_query($conexion,$sql);
            
          if (!$imagen){
            echo 'Eror al cargar las imagenes';
          } else {
            while ($fila = mysqli_fetch_array($imagen,MYSQLI_ASSOC)) {
              array_push ($imagenes,$fila['imagen']);
            }
          }
          mysqli_close($conexion);

          $max = count($imagenes);
          $img_aleatoria = rand(0,$max);
          echo "<center><img src='php/$imagenes[$img_aleatoria]' class='img-rounded img-responsive' style='width:612px; height:408px; border:solid 0.5px'><center>;         
      </div>
    </div>";
  }

  static public function form_buscar_Inmuebles(){
    echo "<div class='container-fluid col-sm-8 col-sm-offset-2'>
      <div class='row'>
      <div class='col-xs-12 col-md-8 col-md-offset-2 cabecera-form'>
      <div class='panel-group'>
          <div class='panel panel-default cabecera'>
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
                      <label class='col-sm-2'>Nº de habitaciones:</label>
                      <div class='col-sm-5 col-lg-offset-2'>
                        <input class='form-control' type='text' name='num_hab'>
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
                        <input class='form-control btn-primary' type='submit' name='buscar_inm' value='Buscar'>
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
  }
          

  static public function formulario_contacto (){
    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2 menu-inicio'>
          <h2 align ='center'> </h2>
          <h2 align ='center'>Si quieres ponerte en contacto con nosotros puedes rellenar el siguiente formulario</h2>
          <h2 align ='center'>Trataremos de responderte lo antes posible</h3>
          </div>
          <div class='col-md-6 col-md-offset-3'>
            <div class='panel panel-default'>
              <div class='panel-body'>
                <form id='contacto' action='#' method='post' accept-charset='utf-8'>
                  <div class='form-group'>
                    <label class='col-sm-2' for='nombre'> Nombre *</label>
                    <div class='col-sm-10 '>
                      <input class='form-control' type='text' name='nombre' placeholder='escribe aquí tu nombre' autofocus>
                    </div>
                  </div>
                  <br>
                  <div class='form-group'>
                    <label class='col-sm-2' for='Email'> Email *</label>
                    <div class='col-sm-10 '>
                      <input class='form-control' type='text' name='email' placeholder='escribe aquí tu email'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2' for='telefono'> Teléfono</label>
                    <div class='col-sm-10 '>
                      <input class='form-control' type='number' name='telefono' placeholder='escribe aquí tu teléfono'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2' for='asunto'> Asunto</label>
                    <div class='col-sm-10 '>
                      <label class='radio-inline'>
                        <input type='radio' name='asunto'>Pedir información
                      </label>
                      <label class='radio-inline'>
                        <input type='radio' name='asunto'>Consulta
                      </label>
                      <label class='radio-inline'>
                        <input type='radio' name='asunto'>Sugerencia
                      </label>
                    </div>
                  </div>
                  <br>
                  <div class='form-group'>
                    <label class=' col-sm-2'>Mensaje *</label>
                    <div class='col-sm-10'>
                      <textarea id='mensaje' class='form-control' name='mensaje' rows='5'></textarea>
                    </div>
                  </div>
                  <br>
                  <div class='form-group'>
                    <div class='col-sm-12 col-sm-offset-5'>
                      <div class='col-sm-2'>
                        <input class='form-control btn-primary' style='background-color: #000000;	border-color: #000000; color: #baa35f; align=center'; type='submit' name='guardar' value='Guardar'>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>";
  }

  static public function formulario_acceso (){
    echo "<div class='container-fluid'>
    <div class='row'>
      <div class='col-xs-12 col-sm-8 col-sm-offset-2 menu-inicio'>
        <h2 align='center'>Acceder a la aplicación</h2>
        <div class='panel panel-default'>
          <div class='panel-body'>
            <form action='#' method='post' class='form-horizontal'>
              <div class='form-group'>
                <label class='col-sm-3 col-sm-offset-2'>Usuario</label>
                <div class='col-sm-6'>
                  <input class='form-control' type='text' name='nick' required>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-3 col-sm-offset-2'>Contraseña</label>
                <div class='col-sm-6'>
                  <input class='form-control' type='password' name='password' required>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-4 col-sm-offset-2'>¿Mantener sesión abierta?</label>
                <div class='checkbox'>
                <input type='checkbox' value='open' name='check'>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-9 col-sm-offset-2'>
                  <input class='form-control btn-primary' type='submit' name='acceder' value='Acceder'>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>";

  }

  static public function mostrarCalendario($dia, $mes, $año) {
    switch ($mes) {
      case 1:
        $nombre_mes='Enero';
        break;
      case 2:
        $nombre_mes='Febrero';
        break;
      case 3:
        $nombre_mes='Marzo';
        break;
      case 4:
        $nombre_mes='Abril';
        break;
      case 5:
        $nombre_mes='Mayo';
        break;
      case 6:
        $nombre_mes='Junio';
        break;
      case 7:
        $nombre_mes='Julio';
        break;
      case 8:
        $nombre_mes='Agosto';
        break;
      case 9:
        $nombre_mes='Septiembre';
        break;
      case 10:
        $nombre_mes='Octubre';
        break;
      case 11:
        $nombre_mes='Noviembre';
        break;  
      case 12:
        $nombre_mes='Diciembre';
        break;

      default:
        $nombre_mes='';
        break;
    }
    // guardo el mes por semanas en un array
    $semana = 1;

    for ( $i=1;$i<=date( 't', strtotime( $año."-".$mes."-".$dia) );$i++ ) { // dia 1 al numero de dias del mes
      $dia_semana = date( 'N', strtotime(  $año."-".$mes."-".$i )  );// numero del dia
      $calendario[$semana][$dia_semana] = $i; //Guardo el mes en un array
      if ( $dia_semana == 7 ) // si el dia de la semana es 7 cambio de semana
      $semana++;
    }

    // consulto las citas del mes
    /* por cada fecha, cojo el mes y si es igual al actual lo guardo en un array (la fecha entera)
        y cuando muestro el calendario compara si hay un dia del array igual al dia del mes que pasa
        y si es así lo marco el calendario (background-color) */
    $citas_mes = array();
    $conexion = abrirConexion();
    $consulta = "SELECT fecha from tbl_citas where fecha like '$año-$mes-%'";
    $fechas = mysqli_query($conexion,$consulta);
    if (!$fechas) {
      echo "Error al cargar las fechas de las citas...";
    } else {
      echo "<p align='center'><b>Las citas del mes aparecen marcadas</b></p>";
      while ($fila = mysqli_fetch_array($fechas,MYSQLI_ASSOC)) {
        $fe_marca = strtotime($fila['fecha']);
        $mesA = date('n',$fe_marca);
        $dia = date('d',$fe_marca);
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
            if (in_array($dias_mes[$i],$citas_mes)) { //busca en el array citas el numero del dia / aquí si hay cita
              $con = abrirConexion();
              $sql = "SELECT motivo, hora, lugar from tbl_citas where fecha='$año-$mes-$dias_mes[$i]'";
              $cons_citas = mysqli_query($con,$sql);
              
              if ($cons_citas){

                $num_filas = mysqli_num_rows($cons_citas);

                if ($num_filas == 1) { // hay 1 cita
                  while ($fila = mysqli_fetch_array($cons_citas,MYSQLI_ASSOC)) {
                    //$fila = mysqli_fetch_array($consultar_citas,MYSQLI_ASSOC);
                    $marca_hora = strtotime($fila['hora']);
                    $h_formateada = date("G:i",$marca_hora);
                    echo "<td bgcolor='#baa35f'>
                        <a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$año'>".$dias_mes[$i]."</a><br>
                        <a href='#' data-toggle='popover' title='Citas del día' data-content='· $fila[motivo] a las $h_formateada en $fila[lugar]'><span class='glyphicon glyphicon-eye-open'></span></a>
                      </td>";
                  }
                }else{ // hay mas de una cita
                    $contenido = ""; 
                    while ($fila = mysqli_fetch_array($cons_citas,MYSQLI_ASSOC)) {
                      //$fila = mysqli_fetch_array($consultar_citas,MYSQLI_ASSOC);
                      $marca_hora = strtotime($fila['hora']);
                      $h_formateada = date("G:i",$marca_hora);
                      $contenido .= " · $fila[motivo] a las $h_formateada en $fila[lugar] &#013";
                    }

                    echo "<td bgcolor='#baa35f'>
                        <a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$año'>".$dias_mes[$i]."</a><br>
                        <a href='#' data-toggle='popover' title='Citas del día' data-content='".$contenido."'><span class='glyphicon glyphicon-eye-open'></span></a>
                      </td>";
                }
              }else{
                echo "¡ERROR! no se ha podido conectar con la BD...";
              }
            }else{ // Día sin cita
              echo "<td bgcolor='white'><a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$año'>".$dias_mes[$i]."</a></td>";
            }
          }else{
            echo "<td></td>";
          }

        }
        echo "</tr>";
      }
      echo "</tbody>";
    echo "</table>";
  
    $mes_antes = $mes-1;
    $mes_despues = $mes+1;
    echo "<ul class='pager'>
              <li><a class='btn btn-warnig' role='button' href='citas.php?mes=$mes_antes&anio=".$año."'>Atrás</a></li>
              <li><a class='btn btn-warnig' role='button' href='citas.php?mes=$mes_despues&anio=".$año."'>Siguiente</a></li>
          </ul>";

  }

  static public function gestion_inmuebles(){
    echo "<div class='container-fluid menu-inicio'>
      <div class='row'>
        <div class='col-xs-12'>
          <nav class='navbar '>
            <div class='container-fluid'>
              <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
                <li><a type='button' class='btn btn-primary btn-md' href='añadir_inmueble.php'>Añadir inmueble</a></li>
                <li><a type='button' class='btn btn-primary btn-md' href='borrar_inmueble.php'>Borrar inmueble</a></li>
                <li><a type='button' class='btn btn-primary btn-md' href='buscar_inmueble.php'>Buscar inmueble</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>";

  }

  static public function listar_inmuebles(){
    $conexion = abrirConexion();
        $mostrar = "SELECT id, direccion, metros, descripcion, precio, id_cliente, imagen
                    FROM tbl_inmuebles";
        $datos = mysqli_query($conexion,$mostrar);
        if (!$datos){
          echo "No hay datos que mostrar";
        }else{
          $num_filas = mysqli_num_rows($datos);
  
          if ($num_filas == 0){
            echo "No hay ningún inmueble almacenado";
          }else{
            echo "<p><strong>Total de inmuebles almacenados:</strong> $num_filas</p>";
            echo "<table class='table table-hover'";
            echo "<thead><tr><th>ID</th><th>Dirección</th><th>Metros</th><th>Precio</th><th>Imagen</th><th>Ver inmueble</th><th>Modificar inmueble</th></tr></thead>";
            while ($fila = mysqli_fetch_array($datos,MYSQLI_ASSOC)) {
              // si es el usuario 'disponible' muestro cartel de disponible
              if ($fila['id_cliente'] == 0) {
                echo "<tbody><tr><td>$fila[id]</td><td>$fila[direccion]</td>td>$fila[metros]</td><td>$fila[precio] €</td><td><img src='$fila[imagen]' style='width:150px''></td></td>
              <td><form action='/php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
              <td><form action='modificar_inmueble.php' method='get'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
              }else{
                echo "<tbody><tr><td>$fila[id]</td><td>$fila[direccion]</td><td>$fila[metros]</td><td>$fila[precio] €</td><td><img src='$fila[imagen]' style='width:150px''></td></td>
                      <td><form action='/php/ver_inmueble.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='ver' value='Ver'></form></td>
                      <td><form action='modificar_inmueble.php' method='get'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn-primary' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
              }
            }
            echo "</table>";
          }
        }
        mysqli_close($conexion); 
  }
   

  static public function gestion_citas(){
    echo "<div class='container-fluid menu-inicio'>
    <div class='row'>
    <div class='col-xs-12'>
        <nav class='navbar'>
        <div class='container-fluid'>
            <ul class='nav navbar-nav navbar-center margen-cont' align='center'>
            <li><a type='button' class='btn btn-primary btn-md' type='submit' name='añadir' value='añadir' href='añadir_citas.php'>Añadir cita</a></li>
            <li><a type='button' class='btn btn-primary btn-md' type='submit' name='submit' value='borrar' href='gestion_citas.php'>Borrar citas</a></li>
            <li><a type='button' class='btn btn-primary btn-md' type='submit' name='submit' value='buscar' href='gestion_citas.php'>Buscar citas</a></li>
            </ul>
        </div>
        </nav>
    </div>
    </div>
    </div>";
  }

  static public function mostrar_ProximasCitas(){

    echo '<div class="container-fluid">
    <div class="row">
      <!-- Citas y Modificar -->
      <div class="col-xs-12 col-md-6">
        <h2 class="margen-citas" align="center">Próximas citas</h2>';
  
    $actual = date('Y-m-d');
    $marca_actual = strtotime($actual); 

    $conexion = abrirConexion();
    $sql = "SELECT tbl_citas.id, tbl_citas.fecha, tbl_citas.hora, tbl_citas.motivo, tbl_citas.lugar, tbl_clientes.id_cliente
            from tbl_citas inner join tbl_clientes
            on tbl_citas.id_cliente = tbl_clientes.id
            order by fecha desc";

    $mostrar = mysqli_query($conexion,$sql);

    if (!$mostrar) {
      echo "Error al hacer la consulta a la BD";
    } else {
      $num_filas = mysqli_num_rows($mostrar);
      if ($num_filas == 0) {
        echo "No hay citas para mostrar";
      }else{
        echo "<p align='center'><b>Se han listado $num_filas citas</b></p>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-striped table-hover'";
        echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Motivo</th><th>Lugar</th><th>Cliente</th><th>Teléfono</th><th>Modificar</th></tr></thead>";
        while ($fila = mysqli_fetch_array($mostrar,MYSQLI_ASSOC)) {
          $marca_cita = strtotime($fila['fecha']);
          $marca_hora = strtotime($fila['hora']);
          $f_formateada = date("d-m-Y",$marca_cita);
          $h_formateada = date("G:i",$marca_hora);

          if ($marca_cita > $marca_actual) {
            echo "<tbody><tr class='success'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>$fila[telefono1]</td>
              <td><form action='modificar_cita.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-md btn-primary' type='submit' name='modificar' value='Modificar'></form></td></tr></tbody>";
          } else {
            echo "<tbody><tr class='warning'><td>$f_formateada</td><td>$h_formateada</td><td>$fila[motivo]</td><td>$fila[lugar]</td><td>$fila[nombre]</td><td>$fila[telefono1]</td><td>No se puede modificar</td></tr></tbody>";
          }
        }
        echo "</table></div>";
      }
    }
  }

  static public function form_añadir_inmueb (){
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
                      $consulta = "SELECT auto_increment from information_schema.tables where table_schema='db_inmomenenia' and table_name='tbl_inmuebles'";
                      $datos = mysqli_query($con, $consulta);
                      $array = mysqli_fetch_array($datos, MYSQLI_NUM);
                      echo "<td><input class='form-control' name='id' type='number' value = '$array[0]' readonly></td>";  
                    echo "</div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Tipo:</label>
                    <div class='col-sm-10'>
                      <select class='form-control' name='tipo' id='tipo'>
                        <option value='alquiler'>Selecciona una opcion</option>
                        <option value='alquiler'>Alquilar</option>
                        <option value='compra'>Comprar</option>
                      </select>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Dirección:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='direccion' name='direccion' type='text'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-2'>Código Postal:</label>
                    <div class='col-sm-10'>
                      <input class='form-control' id='cp' name='cp' type='number'><span></span>
                    </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Zona:</label>
                      <div class='col-sm-10'>
                          <input class='form-control' id='zona' name='zona' type='text'><span></span>
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
                          <input class='form-control' id='banos' name='banos' type='number'><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2' >Garaje:</label>
                      <div class='col-sm-10'>
                          <label class='radio-inline'>
                              <input type='radio' name='garaje' value='si' id= 'gSi'> Si
                          </label>
                          <label class='radio-inline'>
                              <input type='radio' name='garaje' value='no' id='gNo'> No
                          </label>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Jardín:</label>
                      <div class='col-sm-10 '>
                          <label class='radio-inline'>
                              <input type='radio' name='jardin' id='jSi'  value='si'> Si 
                          </label>
                          <label class='radio-inline'>
                              <input type='radio' name='jardin' id='jNo' value='no'>No
                          </label>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class='col-sm-2'>Piscina:</label>
                      <div class='col-sm-10 '>
                          <label class='radio-inline'>
                              <input type='radio' name='piscina' value='si' id='pSi' >Si 
                          </label>
                          <label class='radio-inline'>
                              <input type='radio' name='piscina' value='no' id='pNo'>No
                          </label>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>Estado:</label>
                      <div class='col-sm-10'>
                          <select class='form-control' name='tipo' id='tipo'>
                              <option value='alquiler'>Selecciona una opcion</option>
                              <option value='alquiler'>Nuevo</option>
                              <option value='compra'>Segunda mano</option>
                          </select>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>Descripción:</label>
                      <div class='col-sm-10'>
                          <textarea class='form-control' id='descripcion' name='descripcion' rows='5'></textarea><span></span>
                      </div>
                  </div>
                  <div class='form-group'>
                      <label class=' col-sm-2'>Precio:</label>
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
                      <label class=' col-sm-2'>Fecha de alta::</label>
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
                          $clientes = mysqli_query($conexion,$consulta);
                          
                          if (!$clientes){
                              echo 'Error al ajecutar la consulta';
                          }else{
                            while ($fila = mysqli_fetch_array($clientes,MYSQLI_ASSOC)){
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
                            <input type='submit' class='form-control btn-primary' id='nuevo_inmueble' name='nuevo_inmueble' value='Añadir'>
                          </div>
                          <div class='col-sm-2'>
                            <button class='form-control btn-primary' id='btnLimpiar'>Limpiar</button>
                          </div>
                          <div class='col-sm-2'>
                            <a href='./inmuebles.php' class='btn btn-danger'>Cancelar</a>
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
  }

  static public function form_borrar_inmueble(){
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
                    <label class='col-sm-2'>ID:</label>
                    <div class='col-sm-10'>";
                      $conexion = abrirConexion();
                      $consulta = "SELECT id, direccion, imagen from tbl_inmuebles";

                      $datos = mysqli_query($conexion,$consulta);

                      if (!$datos){
                      echo "Error!! No se han podido cargar los datos del inmueble";
                      }else{
                        echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>";
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-striped'";
                        echo "<thead><tr><th>Dirección</th><th>Imagen</th><th>¿Eliminar?</th></tr></thead>";
                        while ($fila = mysqli_fetch_array($datos,MYSQLI_ASSOC)){
                        echo "<tbody><tr><td>$fila[direccion]</td><td><img src='$fila[imagen]' style='width:150px'></td>
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
  }

  static public function form_buscar_inmueble_admin(){
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
                      <label class='col-sm-2'>Dirección:</label>
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
                        <input class='form-control btn-primary' type='submit' name='buscar_inm' value='Buscar'>
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
  }
}//llave cierre de clase

?>



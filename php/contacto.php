<?php 
  include "funciones.php";
  session_start()
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacto</title>
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- Mi CSS -->
    <link rel="stylesheet" href="../css/estilos.css" media="screen">
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (se pueden
         incluir archivos JavaScript individuales de los únicos
         pluginps que se utilicen) -->
         <scrit src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
  </head>
  <body>
    <!-- Menú de navegación -->
    <?php tipoMenu(); ?>
        
    <!-- Formulario de contacto -->
    <div class="container-fluid menu-inicio">
      <div class="row">
          <h2 align ="center">Si quieres ponerte en contacto con nosotros puedes rellenar el siguiente formulario</h2>
          <h2 align ="center">Trataremos de responderte lo antes posible</h3>
          <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
              <div class="panel-body">
                <form id="contacto" action="guarda.php" method="post" accept-charset="utf-8">
                  <div class="form-group">
                    <label class="col-sm-2" for="nombre">* Nombre</label>
                    <div class="col-sm-10 ">
                      <input class="form-control " type="text" name="nombre" placeholder="escribe aquí tu nombre" autofocus>
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <label class="col-sm-2" for="nombre"> * Email</label>
                    <div class="col-sm-10 ">
                      <input class="form-control" type="text" name="email" placeholder="escribe aquí tu email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2" for="nombre"> Teléfono</label>
                    <div class="col-sm-10 ">
                      <input class="form-control" type="text" name="telefono" placeholder="escribe aquí tu teléfono">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2" for="nombre"> Asunto</label>
                    <div class="col-sm-10 ">
                      <label class="radio-inline">
                        <input type="radio" name="asunto">Pedir información
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="asunto">Consulta
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="asunto">Sugerencia
                      </label>
                    </div>
                  </div>
                   <br>
                  <div class="form-group">
                    <label class=" col-sm-2">* Mensaje</label>
                    <div class="col-sm-10">
                      <textarea id="des" class="form-control" name="descripcion" rows="5"></textarea>
                    </div>
                  </div>
                   <br>
                  <div class="form-group">
                    <div class="col-sm-12 col-sm-offset-5">
                      <div class="col-sm-2">
                        <input class="form-control btn-primary" type="submit" name="guardar" value="Guardar">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
    

    <footer class="navbar-nav navbar-inverse">
    <p align="center">Copyright Menenia's Digital 2022</p>
    </footer>
        
  </body>
</html>
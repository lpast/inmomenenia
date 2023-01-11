<?php
   require_once "php/dbconnect.php";
   require_once "php/class/interfaz.php";
   require_once "php/funciones.php";
  session_start(); 
  comprobarIndex();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplicación Inmobiliaria</title>
<!-- Insertamos el archivo CSS compilado y comprimido -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
      <!-- Mi CSS -->
	  <link rel="stylesheet" href="css/estilos.css" media="screen">
    <link rel="stylesheet" href="css/estilos-slides.css" media="screen">
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	
</head>
<body>
	 <!-- Menú de navegación -->
	 <?php $menuIndex = Interfaz::mostrarMenuHome(); ?>

	 <div class='container-fluid'>
      <div class='row'>
        <div class='col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio'>
			<h1 align='center'>  </h1>	
	</div>
	  </div>
	<div class="container">
	<div class="row">
		<!-- Carousel -->
    	<div id="carousel-example-generic" class="carousel slide " data-ride="carousel" >
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			    <div class="item active">
			    	<img src="css/img_snow_wide.jpg" alt="First slide" style="width:100%">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                            	<span><strong>Bienvenido a Inmomenenia</strong></span>
                            </h2>
                            <br>
                            <h3>
                            	<span>¿Cómo quiere acceder?</span>
                            </h3>
							
                            <br>
                            <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="home.php">Usuario sin registrar</a><a class="btn btn-theme btn-sm btn-min-block" href="php/acceder.php">Usuario registrado</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item cabecera-inicio">
			    	<img src="css/0.png" alt="Second slide" style="width:100%">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
					<div class="col-md-12 text-center">
                            <h2>
                            	<span><strong>Bienvenido a Inmomenenia</strong></span>
                            </h2>
                            <br>
                            <h3>
                            	<span>¿Cómo quiere acceder?</span>
                            </h3>
							
                            <br>
                            <div class="">
                            <a class="btn btn-theme btn-sm btn-min-block" href="home.php">Usuario sin registrar</a><a class="btn btn-theme btn-sm btn-min-block" href="php/acceder.php">Usuario registrado</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
				<img src="css/img_nature_wide.jpg" style="width:100%">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
					<div class="col-md-12 text-center">
                            <h2>
                            	<span><strong>Bienvenido a Inmomenenia</strong></span>
                            </h2>
                            <br>
                            <h3>
                            	<span>¿Cómo quiere acceder?</span>
                            </h3>
							
                            <br>
                            <div class="">
                            <a class="btn btn-theme btn-sm btn-min-block" href="home.php">Usuario sin registrar</a><a class="btn btn-theme btn-sm btn-min-block" href="php/acceder.php">Usuario registrado</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div><!-- /carousel -->
	</div>
</div>
</body>
</html>
<?php
include "../../../php/dbconnect.php";
include "../../../php/class/interfaz.php";
include "../../../php/funciones.php";
session_start();
comprobarAdmin();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver Cliente</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <!-- Mi CSS -->
    <link rel="stylesheet" href="../../../css/estilos.css" media="screen">
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url("../../../media/img/img_inmuebles/bbk_fachada_0533.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <!-- Menú de navegación -->
    <?php $menu = Interfaz::menuAdmin(); ?>

    <!-- Recojo en variables los datos a mostrar mediante PHP -->
    <?php
    if (isset($_POST['ver'])) {
        $id = $_POST['id'];

        $conexion = abrirConexion();
        $sql = "SELECT * FROM tbl_clientes WHERE id='$id'";

        $datos = mysqli_query($conexion, $sql);

        if (!$datos) {
            echo "Error, no se ha podido consultar los datos del cliente";
        } else {
            while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
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
            }
        }
        mysqli_close($conexion);
    }
    ?>

    <!-- Muestro los datos del cliente -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 cabecera-menu-inicio">
                <div class='jumbotron'>
                    <h1 align='center'>Datos de Cliente</h1>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 tnoticias">
                <div class="jumbotron">
                    <div class='iconos' align='center' style='font-size:30px;'>
                        <h3><img src='../../../media/iconos/codigo-de-barras .png' alt='id-cliente' width='50px' style='margin-right:5px'><b><?php echo $id; ?></b>
                        <img src='../../../media/iconos/llave.png' alt='tipo-cliente' width='50px' style='margin-left:55px; margin-right:15px'><b><?php echo $tipo; ?></b><h3>
                        <h3><img src='../../../media/iconos/nombre.png' alt='nombre-cliente' width='50px' style='margin-right:5px'><b><?php echo "$apellidos, $nombre"; ?></b><h3>
                        <h3><img src='../../../media/iconos/ubicacion.png' alt='direccion-cliente' width='50px' style='margin-right:5px'><b><?php echo "$calle, $portal, $piso, $puerta"; ?></b>
                        <b> <?php echo "$localidad, $cp"; ?></b><h3>
                        <h3><img src='../../../media/iconos/telefono.png' alt='telefono-cliente' width='50px' style='margin-left:55px; margin-right:15px'><b> <?php echo $telefono; ?></b>
                        <h3><img src='../../../media/iconos/email.png' alt='email-cliente' width='50px' style='margin-left:55px ;margin-right:15px'><b> <?php echo $email; ?></b><h3>
                    </div>
                    <form action='modificar_cliente.php' method='post'>
                        <input type='hidden' name='id' value='<?php echo $id ?>'>
                        <input class='form-control btn-theme' type='submit' name='modificar' value='Modificar Cliente'>
                    </form>
                    <p align='center'><a class='btn btn-theme' href='clientes.php'>Volver</a></p>
                </div>
            </div>
        </div>
      </div>
    </div>
        <!-- footer -->
        <?php $footer = Interfaz::footer(); ?>
</body>

</html>
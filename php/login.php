<?php 
    include "dbconnect.php";
    include "class/interfaz.php";
    include "funciones.php";
    session_start();
    header ('Cache-Control: no-cache');
    login();
?>
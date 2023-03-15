<?php 
	session_start();//Recordamos variable de sesion
	setcookie('datos','',time()-1,'/'); // Elimino la cookie
	$_SESSION = array(); // Limpio el array $_SESSION
	session_unset();//Olvidamos sesion
	session_destroy(); // Elimininamos la sesión
	header('Location: ../index.html');
?>
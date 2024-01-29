<?php
	session_start();
	require "../Funciones/conecta.php";
	$con = conecta();
	
	$nombre = $_REQUEST['nombre'];
	$pass = $_REQUEST['pass'];

	$encPass = md5($pass);
	
	$sql = "SELECT * FROM citador WHERE Nombre = '$nombre' AND pass = '$encPass'";
	$res = mysqli_query($con,$sql);
	
	$resultado =(!empty($res) AND mysqli_num_rows($res) > 0) ? 1 : 0;
	
	if($resultado==1) {
		$_SESSION['sesion'] = array();
		$row = $res->fetch_assoc();
		$_SESSION['sesion']['id'] = session_id();
		$_SESSION['sesion']['idC'] = $row['Id_citador'];
	}
	
	else {
		session_destroy();
	}
	echo $resultado;
?>
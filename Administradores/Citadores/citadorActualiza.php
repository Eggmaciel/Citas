<?php
	require "../Funciones/conecta.php";
    require "../Funciones/comprobarSesionA.php";
    probarSesion();
	$con = conecta();
	
	$id = $_REQUEST['id'];
	$nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
	$pass = $_REQUEST['pass'];
	$area = $_REQUEST['area'];

	if(empty($nombre) or empty($apellido) or empty($area) or empty($id)) header("Location: ./ListadoCitadores.php");

	$sql = "UPDATE citador SET Nombre = '$nombre', Apellido = '$apellido'";

	if(!empty($pass)){
		$encpass = md5($pass);

		if($area!=0) $sql = $sql . ", Area = '$area', pass = '$encpass' WHERE id_citador = $id";
		else $sql = $sql . ", pass = '$encpass' WHERE id_citador = $id";
	}
	else{
		if($area!=0) $sql = $sql . ", Area = '$area' WHERE id_citador = $id";
		else $sql = $sql . "WHERE id_citador = $id ";
	}
	$res = $con->query($sql); 
	
	header("Location: ./ListadoCitadores.php");
?>
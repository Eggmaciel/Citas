<?php
	require "../Funciones/conecta.php";
    require "../Funciones/comprobarSesionA.php";
    probarSesion();
	$con = conecta();
	
	$id = $_REQUEST['id'];
	$nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
	$pass = $_REQUEST['pass'];

	if(empty($id) or empty($nombre) or empty($apellido)){
		header("Location: ./ListadoAdministrador.php");
	}

	if(!empty($pass)){
		$encpass = md5($pass);
		$sql = "UPDATE administrador SET Nombre = '$nombre', Apellido = '$apellido', pass = '$encpass' WHERE id_administrador = $id ";
	}
	else{
		$sql = "UPDATE administrador SET Nombre = '$nombre', Apellido = '$apellido' WHERE id_administrador = $id ";
	}

	$res = $con->query($sql); 
	
	header("Location: ./ListadoAdministrador.php");
?>
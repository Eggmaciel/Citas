<?php
	require "../Funciones/conecta.php";
    require "../Funciones/comprobarSesionA.php";
    probarSesion();
	$con = conecta();
	
	$id = $_REQUEST['id'];
	$nombre = $_REQUEST['nombre'];
    $iniciales = $_REQUEST['iniciales'];
	$descripcion = $_REQUEST['descripcion'];

	if(empty($nombre) or empty($id) or empty($descripcion) or empty($iniciales)) header("Location: ./listadoAreas.php");

	$sql = "UPDATE area SET nombre_area = '$nombre', descripcion = '$descripcion', iniciales = '$iniciales' WHERE id_area = $id ";
	
	$res = $con->query($sql); 
	
	header("Location: ./listadoAreas.php");
?>
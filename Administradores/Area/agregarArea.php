<?php 
require "../Funciones/conecta.php";
require "../Funciones/comprobarSesionA.php";
probarSesion();

$con = conecta();

$nombre = $_POST['NombreArea'];
$iniciales = $_POST['Iniciales'];
$descripcion = $_POST['descripcion'];

if(empty($nombre) or empty($iniciales) or empty($descripcion)) header("Location: ./listadoAreas.php");

$sql = "INSERT INTO area
			(nombre_area,descripcion,iniciales)
			VALUES ('$nombre','$descripcion','$iniciales')";
			
$res = $con->query($sql);
		
header("Location: ./ListadoAreas.php");
?>
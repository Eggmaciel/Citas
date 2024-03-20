<?php 
require "../Funciones/conecta.php";
require "../Funciones/comprobarSesionA.php";
probarSesion();

$con = conecta();

$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$area = $_POST['area'];
$pass = $_POST['contra'];
$encPass = md5($pass);

if(empty($nombre) || empty($Apellido) || empty($area) || empty($contra)){
	header("Location: ./ListadoCitadores.php");
}

$sql = "INSERT INTO citador
			(Nombre,Apellido,Area,stat,pass)
			VALUES ('$nombre','$apellido','$area','0','$encPass')";
			
$res = $con->query($sql);
		
header("Location: ./ListadoCitadores.php");
?>
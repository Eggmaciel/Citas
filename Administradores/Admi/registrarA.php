<?php 
require "../Funciones/conecta.php";
require "../Funciones/comprobarSesionA.php";

probarSesion();

$con = conecta();

$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$pass = $_POST['contra'];
$encPass = md5($pass);

if(empty($nombre) || empty($Apellido) || empty($pass)){
	header("Location: ./ListadoAdministrador.php");
}

$sql = "INSERT INTO administrador
			(Nombre,Apellido,pass)
			VALUES ('$nombre','$apellido','$encPass')";
			
$res = $con->query($sql);
		
header("Location: ./ListadoAdministrador.php");
?>
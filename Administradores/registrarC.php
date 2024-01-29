<?php 
require "../Funciones/conecta.php";

$con = conecta();

$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$area = $_POST['area'];
$pass = $_POST['contra'];
$encPass = md5($pass);

$sql = "INSERT INTO citador
			(Nombre,Apellido,Area,stat,pass)
			VALUES ('$nombre','$apellido','$area','0','$encPass')";
			
$res = $con->query($sql);
		
//header("Location: Citadores_Lista.php");
?>
<?php
require "../Funciones/conecta.php";
require "../Funciones/comprobarSesion.php";
probarSesion();
$con = conecta();

$id = $_POST['id_hora'];
$hora = $_POST['hora'];

if(empty($id) or empty($hora)) header("Location: ./Administrar_hora.php");

$sql = "UPDATE horas_cita SET hora = '$hora' WHERE id_hora=$id";

$con->query($sql);

header("Location: ./Administrar_hora.php");
?>
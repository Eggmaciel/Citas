<?php

include "../Funciones/conecta.php";
require "../Funciones/comprobarSesion.php";

probarSesion();

$con = conecta();
$hora = $_POST['Newtime'];
$idC = $_POST['idCitador'];

if(empty($hora) or empty($idC)) header("Location: ./Administrar_hora.php");

$sql = "INSERT INTO horas_cita (hora,Id_citador) VALUES ('$hora',$idC)";

$con->query($sql);

header("Location: ./Administrar_hora.php");
?>
<?php

include "../Funciones/conecta.php";

$con = conecta();
$hora = $_POST['Newtime'];
$idC = $_POST['idCitador'];
$sql = "INSERT INTO horas_cita (hora,Id_citador) VALUES ('$hora',$idC)";

$con->query($sql);

header("Location: ./Administrar_hora.php");
?>
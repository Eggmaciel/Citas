<?php
require "../../Funciones/conecta.php";
$con = conecta();

$id = $_POST['id_hora'];
$hora = $_POST['hora'];

$sql = "UPDATE horas_cita SET hora = '$hora' WHERE id_hora=$id";

$con->query($sql);

header("Location: ./Administrar_hora.php");
?>
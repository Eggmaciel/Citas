<?php
    require "../../Funciones/conecta.php";

    $con = conecta();

    $id = $_GET['idH'];

    $sql = "UPDATE horas_cita SET Habilitada = 0 WHERE Id_hora = $id";
	$con->query($sql);

    header("Location: ./Administrar_hora.php");
?>
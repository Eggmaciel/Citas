<?php
    require "../Funciones/conecta.php";
    require "../Funciones/comprobarSesion.php";
    
    probarSesion();

    $con = conecta();

    $id = $_GET['idH'];

    if(empty($id)) header("Location: ./Administrar_hora.php");

    $sql = "UPDATE horas_cita SET Habilitada = 0 WHERE Id_hora = $id";
	$con->query($sql);

    header("Location: ./Administrar_hora.php");
?>